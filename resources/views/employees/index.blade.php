@extends('layouts.app')
@section('title')
   عرض كل الموظفين
@endsection
@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
@endsection
@section('content')

    
    

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><strong>عرض كل الموظفين </strong></h3>
        </div>
        <div class="panel-body">

            <div class="row">            
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 pull-right text-right">
                    <div class="form-group">
                        <h4>{!! Form::label('op', 'بحــــث') !!}</h4>
                        {!! Form::text('op', null, ['class'=>'form-control', 'id'=>'op']) !!}
                    </div>
                </div>
            </div>
            
            <div id="search_results">
               {{-- resutls --}}
                <div class="table-responsive">
                    <table id="employees" class="table table-condensed table-hover table-bordered text-center">
                       <thead>
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
                        </thead>
                        <tbody>

                            @foreach($employees as $key=>$employee)
                                <tr>
                                    <td> 
                                        @if($employee->date_of_hiring)
                                            {{ $employee->date_of_hiring->format('d-m-Y') }}
                                        @endif
                                    </td>
                                    <td> 
                                        @if($employee->date_of_birth)
                                             {{ $employee->date_of_birth->age }} 
                                        @endif
                                    </td>
                                    <td> {{ $employee->city }} </td>
                                    <td> {{ $employee->ssn }} </td>
                                    <td> {{ $employee->code }} </td>
                                    <td>
                                        @foreach($employee->jobs as $key => $job )
                                            {{ $job->name }} &bull; <br>                                            
                                        @endforeach
                                    </td>
                                    <td>
                                        {{(($employee->status)? "حالي":"سابق")}}                                        
                                    </td>                                    
                                    <td> {{ $employee->name }} </td>
                                                                     
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            {{ $employees->links() }}
            </div>

        </div>
    </div>


    
     
@endsection
@section('jsFooter')
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    
    <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function(){

            $("#employees").dataTable( {
                "paging": false,
                "searching": false,
                dom: 'Bfrtip',
                buttons: [
                @if(in_array('create_owners', $permissions))
                    'copy', 'csv', 'excel', 'print'
                @endif
                ]
            } );
        });
    </script>
@endsection


