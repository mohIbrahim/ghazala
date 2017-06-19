@extends('layouts.app')
@section('title')
    عرض المستأجرين 
@endsection
@section('content')

    
    

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><strong>عرض المستأجرين</strong></h3>
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
                                <td><strong>المهنة</strong></td>
                                
                                <td><strong>العنوان</strong></td>

                                <td><strong>الايميل الشخصى</strong></td>

                                <td><strong>التليفون الارضي</strong></td>

                                <td><strong>موبيل 2</strong></td>
                                <td><strong>موبيل 1</strong></td>
                                

                                <td><strong>رقم البطاقة</strong></td>
                                
                                <td><strong>الوحدات المستأجرة</strong></td>
                                <td><strong>الاسم</strong></td>
                                <td><strong>#</strong></td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($renters as $key=>$renter)
                                <tr>
                                    
                                    <td>{{$renter->occupation}}</td>
                                    <td>{{$renter->address}}</td>
                                    <td>{{$renter->email}}</td>
                                    <td>{{$renter->telephone}}</td>
                                    <td>{{$renter->mobile_2}}</td>
                                    <td>{{$renter->mobile_1}}</td>
                                    

                                    <td>{{$renter->ssn}}</td>
                                    <td>
                                        @foreach($renter->units as $unit)
                                            <p><a href="{{ action('UnitsController@show', ['id'=>$unit->id]) }}"> {{ $unit->code }} </a></p>
                                        @endforeach
                                    </td>
                                    <td><a href="{{ action('RentersController@show', ['slug'=>$renter->slug]) }}" target="_blank"> {{$renter->name}}</a>
                                    </td>
                                    
                                    <td>{{$renter->id}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            {{ $renters->links() }}

        </div>
    </div>


    
     
@endsection
@section('jsFooter')
    <script>
        $(document).ready(function(){
            $('#op').on('keyup',function(){
                var key = $('#op').val();
                $.ajax({
                    url:"{{action('RentersController@indexAjax')}}",
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


