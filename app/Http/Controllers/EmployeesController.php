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
    public function update(EmployeesRequest $request, $slug)
    {
        $employee = Employee::where('slug', $slug)->first();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
