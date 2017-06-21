@extends('layouts.app')
@section('title')
    عرض عقود الإيجار 
@endsection
@section('content')    

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><strong>عرض عقود الإيجار</strong></h3>
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
                                <td><strong>وقت و تاريخ التعديل</strong></td>
                                <td><strong>وقت و تاريخ الإنشاء</strong></td>
                                <td><strong>اسم منشئ المحتوى</strong></td>
                                <td><strong>تاريخ نهاية العقد</strong></td>
                                <td><strong>تاريخ بداية العقد</strong></td>
                                <td><strong>اسم المستأجر</strong></td>
                                <td><strong>كود الوحدة</strong></td>
                                <td><strong>المسلسل</strong></td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($rentingContracts as $key=>$rentingContract)
                                <tr>
                                    <td>{{ $rentingContract->updated_at }}</td>
                                    <td>{{ $rentingContract->created_at }}</td>

                                    <td>
                                        @if($rentingContract->creator)
                                            {{ $rentingContract->creator->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($rentingContract->to)
                                            {{ $rentingContract->to->format('d-m-Y') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($rentingContract->from)
                                            {{ $rentingContract->from->format('d-m-Y') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($rentingContract->renter)
                                            <a href="{{ action('RentersController@show', ['slug'=>$rentingContract->renter->slug]) }}" target="_blank">
                                                {{ $rentingContract->renter->name }}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($rentingContract->unit)
                                            <a href="{{ action('UnitsController@show', ['id'=>$rentingContract->unit->id]) }}" target="_blank">
                                                {{ $rentingContract->unit->code }}
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{$rentingContract->id}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            {{ $rentingContracts->links() }}

        </div>
    </div>


    
     
@endsection
@section('jsFooter')
    <script>
        $(document).ready(function(){
            $('#op').on('keyup',function(){
                var key = $('#op').val();
                $.ajax({
                    url:"{{action('RentingContractsController@indexAjax')}}",
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


