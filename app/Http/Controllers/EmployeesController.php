<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Ghazala\EgyptCities\EgyptCities;
use App\Employee;
use App\Job;
use App\Http\Requests\EmployeesRequest;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('employees');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(35);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $egyptCities = new EgyptCities();        
        $cities = $egyptCities->getCities();
        $jobs = Job::all()->pluck('name', 'id');
        return view('employees.create', compact('cities', 'jobs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesRequest $request)
    {
        $formValues = $request->all();

        $formValues['creator_user_id'] = auth()->user()->id;
        $formValues['slug'] = str_slug($request->input('name'));

        if ($request->hasFile('personal_image') && 
            $request->file('personal_image')->isValid()) 
        {
            $image = $request->file('personal_image');
            $imageNewName = str_random(64).'.'.$image->guessExtension();
            $image->move('images/employees_images', $imageNewName);
            $formValues['personal_image'] = $imageNewName;
        }

        $employee = Employee::create($formValues);
        $employee->jobs()->attach($request->jobs);
        flash()->success('تم إضافة الموظف بنجاح')->important();
        return redirect()->action('EmployeesController@show', ['slug'=>$employee->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $employee = Employee::where('slug', $slug)->first();

        
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $employee = Employee::where('slug', $slug)->first();
        $egyptCities =  new EgyptCities();
        $cities = $egyptCities->getCities();
        $jobs = Job::all()->pluck('name', 'id');
        return view('employees.edit', compact('employee', 'cities', 'jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $formValues = $request->all();
        $formValues['slug'] = str_slug($request->name);


        //if we need to delete old images
        if(isset($request->imageToDelete) && !empty($request->imageToDelete))
        {
            $this->deleteFile('images/employees_images/'.$request->imageToDelete);
            $employee->personal_image = 'no_image.png';
        }
        //update new image if uploaded
        if ($request->hasFile('personal_image') && 
            $request->file('personal_image')->isValid()) 
        {
            $image = $request->file('personal_image');
            $imageNewName = str_random(64).'.'.$image->guessExtension();
            $image->move('images/employees_images', $imageNewName);
            $formValues['personal_image'] = $imageNewName;
            if($employee->personal_image !== "no_image.png")
            {
                $this->deleteFile('images/employees_images/'.$employee->personal_image);
            }
        }

        $employee->update($formValues);
        $employee->jobs()->sync($request->jobs);
        flash()->success('تم تعديل الموظف بنجاح')->important();
        return redirect()->action('EmployeesController@show', ['slug'=>$employee->slug]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        if($employee->personal_image !== "no_image.png")
        {
            $this->deleteFile('images/employees_images/'.$employee->personal_image);
        }
        $employee->delete();
        flash()->success('تم حذف الموظف بنجاح')->important();
        return redirect()->action('EmployeesController@index');
    }


    /**
     * [deleteFile description]
     * @param  [type] $source [description]
     * @return [type]         [description]
     */
    private function deleteFile($source)
    {        
        if(file_exists($source)){
            try{
                unlink(public_path().'/'.$source);
            }catch(\Exception $e){
                return $e->getMessage();
            }
        }    
    }



    public function indexAjax()
    {  
        $key = request()->key;

        $employees = Employee::where('name', 'like', '%'.$key.'%')
                                ->orWhereHas('jobs', function($query) use($key) 
                             {
                                $query->where('name', 'like', '%'.$key.'%')
                                      ->orWhere('department', 'like', '%'.$key.'%');
                            })->get();

       $startTable ='<div class="table-responsive">
                    <table id="employees" class="table table-condensed table-hover table-bordered text-center">';
       $tHead = '<thead>
                       <tr>                           
                            <td><strong>تاريخ التعيين</strong></td>
                            <td><strong>السن</strong></td>
                            <td><strong>المدينة  </strong></td>
                            <td><strong>الرقم القومى</strong></td>
                            <td><strong>كود الموظف</strong></td>
                            <td><strong>الوظائف</strong></td>
                            <td><strong>الحالة الوظيفية</strong></td>
                            <td><strong>الاسم </strong></td>
                       </tr>
                </thead>';
        $tableBody = '<tbody>';
        $unitsCodes = '';

        

        foreach ($employees as $key => $employee) 
        {

            $tableBody .= '<tr>
                                <td>'.(($employee->date_of_hiring)?$employee->date_of_hiring->format('d-m-Y'):"").'</td>
                                <td>'.(($employee->date_of_birth)?$employee->date_of_birth->age:"").'</td>
                                <td>'.$employee->city.'</td>
                                <td>'.$employee->ssn.'</td>
                                <td>'.$employee->code.'</td>
                                <td>';
                                    foreach($employee->jobs as $job){
                                        $tableBody .= $job->name."&bull; <br>";
                                    }
            $tableBody .= '     </td>
                                <td>'.$employee->status.'</td>
                                
                                <td>
                                    <a href="'.action("EmployeesController@show",["slug"=>$employee->slug]).'" target="_blank">'.$employee->name.'
                                    </a>
                                </td>
                        </tr>';
            
        }
        $endTable = '</table>
        </div>

    <script>
        $("#employees").dataTable( {
                "paging": false,
                "searching": false,
                dom: "Bfrtip",
                buttons: [
                ';
                
                if(in_array('create_owners', auth()->user()->roles()->first()->permissions()->pluck('name')->toArray()))
                {
                  $endTable .=  '"copy", "csv", "excel", "print"';
                }
                $endTable .='

                ]
            } );
    </script>';
        
            return $startTable.$tHead.$tableBody.$endTable;
            
        
        
    }



}
