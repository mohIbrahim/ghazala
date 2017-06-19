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
                        <h4>{!! Form::label('op', 'بحــــث') !!}</h4>
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
                                    <td>{{ $entrySticker->updated_at }}</td>
                                    <td>{{ $entrySticker->created_at }}</td>
                                    <td>
                                        @if($entrySticker->creator)
                                            {{ $entrySticker->creator->name }}
                                        @endif
                                    </td>
                                    <td>{{ $entrySticker->comments }}</td>
                                    <td>{!! ($entrySticker->status)? '<span style="color:green">مسموح بالدخول</span>' : '<span style="color:red">غير مسموح بالدخول</span>' !!}</td>
                                    <td>{{ $entrySticker->color }}</td>
                                    <td>{{ $entrySticker->model }}</td>
                                    <td>{{ $entrySticker->type }}</td>
                                    <td>{{ $entrySticker->the_manufacture_company }}</td>
                                    <td>{{ $entrySticker->plate_number }}</td>
                                    <td>{{ $entrySticker->release_date->format('Y') }}</td>
                                    <td>{{ $entrySticker->car_owner}}</td>
                                    <td>
                                        @if($entrySticker->owner)
                                            <a href="{{ action('OwnersController@show', ['slug'=>$entrySticker->owner->slug]) }}" target="_blank"> 
                                                {{ $entrySticker->owner->name}}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ action('EntryStickersForCarsController@show', ['id'=>$entrySticker->id]) }}" target="_blank"> 
                                            {{ $entrySticker->code}}
                                        </a>
                                    </td>
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
                    url:"{{action('EntryStickersForCarsController@indexAjax')}}",
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


