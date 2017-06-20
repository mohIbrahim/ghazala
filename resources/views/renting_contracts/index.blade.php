@extends('layouts.app')
@section('title')
    عرض المُلاَّك 
@endsection
@section('content')

    
    

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><strong>عرض المُلاَّك</strong></h3>
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
                                <td><strong>حالة المالك</strong></td>
                                <td><strong>المهنة</strong></td>
                                <td><strong>العنوان</strong></td>
                                <td><strong>رقم الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك</strong></td>
                                <td><strong>اسم الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك</strong></td>
                                <td><strong>الايميل الخاص بالعمل</strong></td>
                                <td><strong>الايميل الشخصى</strong></td>
                                <td><strong>التليفون الارضي</strong></td>
                                <td><strong>موبيل 2</strong></td>
                                <td><strong>موبيل 1</strong></td>
                                <td><strong>السن</strong></td>
                                <td><strong>رقم البطاقة</strong></td>
                                <td><strong>أرقام الوحدات</strong></td>
                                <td><strong>الاسم</strong></td>
                                <td><strong>الصورة الشخصية</strong></td>
                                <td><strong>الرقم</strong></td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($owners as $key=>$owner)
                                <tr>
                                    <td>{{$owner->owner_status}}</td>
                                    <td>{{$owner->occupation}}</td>
                                    <td>{{$owner->address}}</td>
                                    <td>{{$owner->contact_person_phone}}</td>
                                    <td>{{$owner->contact_person_name}}</td>
                                    <td>{{$owner->work_email}}</td>
                                    <td>{{$owner->email}}</td>
                                    <td>{{$owner->telephone}}</td>
                                    <td>{{$owner->mobile_2}}</td>
                                    <td>{{$owner->mobile_1}}</td>
                                    <td>{{$owner->date_of_birth->age}}</td>
                                    <td>{{$owner->ssn}}</td>
                                    <td>
                                        @foreach($owner->units as $unit)
                                            <p><a href="{{ action('UnitsController@show', ['id'=>$unit->id]) }}"> {{ $unit->code }} </a></p>
                                        @endforeach
                                    </td>
                                    <td><a href="{{ action('OwnersController@show', ['slug'=>$owner->slug]) }}" target="_blank"> {{$owner->name}}</a></td>
                                    <td>
                                        <img src="{{ asset("images/owner_images/".$owner->personal_image) }}" class="img-responsive" alt="Image" width="30px">
                                    </td>
                                    <td>{{$owner->id}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            {{ $owners->links() }}

        </div>
    </div>


    
     
@endsection
@section('jsFooter')
    <script>
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


