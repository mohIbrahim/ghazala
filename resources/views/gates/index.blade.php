@extends('layouts.app')
@section('title')
    عرض الكروت
@endsection
@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
@endsection
@section('content')

    
    

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><strong>الاستعلامات عن كروت</strong></h3>
        </div>
        <div class="panel-body">

            <div class="row">            
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 pull-right text-right">
                    <div class="form-group">
                        <h4>{!! Form::label('op', 'بحــــث') !!}</h3>
                        {!! Form::text('op', null, ['class'=>'form-control', 'id'=>'op']) !!}
                    </div>
                </div>
            </div>
            
            <div id="search_results">
               {{-- resutls --}}
                <div class="table-responsive">
                    <table id="gates" class="table table-condensed table-hover table-bordered text-center">
                       <thead>
                            <tr>                            
                                
                                <td><strong>حالة الكارت</strong></td>
                                <td><strong>تاريخ الإصدار</strong></td>
                                <td><strong>نوع الكارت</strong></td>
                                <td><strong>كود الوحدة</strong></td>
                                <td><strong>اسم مالك الوحدة</strong></td>
                                <td><strong>الكود</strong></td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($membershipCards as $key=>$membershipCard)
                                <tr>                                    
                                    <td>{!!($membershipCard->status)? "فعال":"<span style='color:red'>موقوف</span>"!!}</td>
                                    <td>{{($membershipCard->release_date)?$membershipCard->release_date->format('Y') : ""}}</td>
                                    <td>{{$membershipCard->type}}</td>
                                    <td>
                                        @if($membershipCard->unit)
                                            {{$membershipCard->unit->code}}
                                            
                                        @endif
                                    </td>
                                    <td>
                                        @if($membershipCard->owner)                                            
                                            {{$membershipCard->owner->name}}
                                        @endif
                                    </td>
                                    <td>
                                        {{$membershipCard->serial}}                                        
                                    </td>
                                    
                            @endforeach
                        </tbody>
                    </table>
                </div>

            {{ $membershipCards->links() }}
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
            $('#op').on('keyup',function(){
                var key = $('#op').val();
                $.ajax({
                    url:"{{action('GatesController@indexAjax')}}",
                    type:"GET",
                    data:"key="+key,
                    dataType:'script',
                    timeout: 3000,
                    beforeSend:function(http){
                        $('#search_results').html('Loading..');
                    },
                    success:function (response, status, http) {
                        $('#search_results').html(response);
                    },
                });
            });

            $("#gates").dataTable( {
                "paging": false,
                "searching": false,
                dom: 'Bfrtip',
                buttons: [
                @if(in_array('create_gates', $permissions))
                    'copy', 'csv', 'excel', 'print'
                @endif
                ]
            } );
        });
    </script>
@endsection


