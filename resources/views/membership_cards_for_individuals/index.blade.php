@extends('layouts.app')
@section('title')
    عرض الكروت
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endsection


@section('content')

    
    

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><strong>عرض الكروت</strong></h3>
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
                    <table class="table table-condensed table-hover table-bordered text-center">
                       <thead>
                            <tr>                            
                                <td><strong>تاريخ و وقت التعديل</strong></td>
                                <td><strong>تاريخ و وقت الإنشاء</strong></td>
                                <td><strong>إنشاء من قبل المستخدم</strong></td>
                                <td><strong>تاريخ تسليم الكارت</strong></td>
                                <td><strong>هل تم تسليم الكارت؟</strong></td>
                                <td><strong>حالة الكارت</strong></td>
                                <td><strong>تاريخ الإصدار</strong></td>
                                <td><strong>نوع الكارت</strong></td>
                                <td><strong>اسم مالك الوحدة</strong></td>
                                <td><strong>الكود</strong></td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($membershipCards as $key=>$membershipCard)
                                <tr>
                                    <td>{{$membershipCard->updated_at}}</td>
                                    <td>{{$membershipCard->created_at}}</td>
                                    <td>{{$membershipCard->creator->name}}</td>
                                    <td>{{($membershipCard->delivered_date)? $membershipCard->delivered_date->format('d-m-Y') : ""}}</td>
                                    <td>{{$membershipCard->deliverd}}</td>
                                    <td>{{$membershipCard->status}}</td>
                                    <td>{{($membershipCard->release_date)?$membershipCard->release_date->format('d-m-Y') : ""}}</td>
                                    <td>{{$membershipCard->type}}</td>
                                    <td>{{$membershipCard->owner->name}}</td>
                                    <td>{{$membershipCard->serial}}</td>
                                    
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            {{ $membershipCards->links() }}

        </div>
    </div>


    
     
@endsection
@section('jsFooter')
    <script>
        $(document).ready(function() {
            $('#owners-table').DataTable({               
               "searching": false,
            });
        });

        $(document).ready(function(){
            $('#op').on('keyup',function(){
                var key = $('#op').val();
                $.ajax({
                    url:"{{action('OwnersController@indexAjax')}}",
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
        });
    </script>
@endsection


