@extends('layouts.app')
@section('title')
    عرض ملصقات دخول السيارات
@endsection
@section('content')

    
    

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><strong>عرض ملصقات دخول السيارات</strong></h3>
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
                                <td><strong>التعليقات</strong></td>
                                <td><strong>السماح بدخول السيارة</strong></td>
                                <td><strong>لون السيارة</strong></td>
                                <td><strong>موديل السيارة</strong></td>
                                <td><strong>تصنيف السيارة</strong></td>
                                <td><strong>اسم الشركة المصنعة للسيارة</strong></td>
                                <td><strong>رقم لوحة السيارة</strong></td>
                                <td><strong>تاريخ الإصدار</strong></td>
                                <td><strong>اسم المالك الفعلي للسيارة</strong></td>
                                <td><strong>اسم مالك الوحدة</strong></td>
                                <td><strong>كود الملصق الخاص بالسيارة</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entryStickers as $key=>$entrySticker)
                                <tr>                                    
                                    <td>{{$entrySticker->car_owner}}</td>
                                    <td>{{$entrySticker->owner->name}}</td>
                                    <td>{{$entrySticker->code}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            {{ $entryStickers->links() }}

        </div>
    </div>


    
     
@endsection
@section('jsFooter')
    <script>
        $(document).ready(function(){
            $('#op').on('keyup',function(){
                var key = $('#op').val();
                $.ajax({
                    url:"{{action('MembershipCardsForIndividualsController@indexAjax')}}",
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


