<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MembershipCardForIndividual;

class GatesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('gates');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membershipCards = MembershipCardForIndividual::latest()->paginate(25);
        return view('gates.index',  compact('membershipCards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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


     public function indexAjax()
    {
       $key = request()->key;
       $startTable = '<div class="table-responsive"><table id="gates" class="table table-condensed table-hover table-bordered text-center">';
       $tHead = '<thead>
                       <tr>                            
                            <td><strong>حالة الكارت</strong></td>
                            <td><strong>تاريخ الإصدار</strong></td>
                            <td><strong>نوع الكارت</strong></td>
                            <td><strong>كود الوحدة</strong></td>
                            <td><strong>اسم مالك الوحدة</strong></td>
                            <td><strong>الكود</strong></td>
                       </tr>
                </thead>';
        $tableBody = '<tbody>';
        $membershipCards = MembershipCardForIndividual::where('serial', 'like', '%'.$key.'%')
                                    ->orWhereHas('owner', function($query) use($key) {
                                                        $query->where('name', 'like', '%'.$key.'%');
                                                })
                                    ->orWhereHas('unit', function($query) use($key) {
                                                        $query->where('code', 'like', '%'.$key.'%');
                                                })->paginate(100);
        foreach ($membershipCards as $key => $membershipCard) 
        {
            $tableBody .= '<tr>                                
                                <td>'.(($membershipCard->status)? "فعال":"<span style='color:red'>موقوف</span>").'</td>

                                <td>'.(($membershipCard->release_date)?$membershipCard->release_date->format("Y") : "") .'</td>

                                <td>'.$membershipCard->type.'</td>
                                <td>'.$membershipCard->unit->code.'</td>
                                <td>'.$membershipCard->owner->name.'</td>
                                <td>'.$membershipCard->serial.'</td>
                        </tr>';
        }
        $endTable = '</table></div>
    <script>
        $("#gates").dataTable( {
                "paging": false,
                "searching": false,
                dom: "Bfrtip",
                buttons: [
                ';
                
                if(in_array('create_gates', auth()->user()->roles()->first()->permissions()->pluck('name')->toArray()))
                {
                  $endTable .=  '"copy", "csv", "excel", "print"';
                }
                $endTable .='

                ]
            } );
    </script>
        ';
        
            return $startTable.$tHead.$tableBody.$endTable;
    }
}
