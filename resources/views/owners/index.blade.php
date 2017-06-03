@extends('layouts.app')
@section('title')
    عرض المُلاَّك 
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endsection


@section('content')

    
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="form-group">
            {!! Form::label('op', 'Search') !!}
            {!! Form::text('op', null, ['class'=>'form-control', 'id'=>'op']) !!}
        </div>
    </div>
    <div id="search_results">
       {{-- resutls --}}

       <table class="table table-bordered" id="owners-table">
            <thead>
                <tr>
                    <th>تاريخ التعديل</th>
                    <th>تاريخ الانشاء</th>
                    <th>حالة المالك</th>
                    <th>المهنة</th>
                    <th>العنوان</th>
                    <th>رقم الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك</th>
                    <th>اسم الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك</th>
                    <th>الايميل الخاص بالعمل</th>
                    <th>الايميل الشخصى</th>
                    <th>التليفون الارضي</th>
                    <th>موبيل 2</th>
                    <th>موبيل 1</th>
                    <th>تاريخ الميلاد</th>
                    <th>رقم البطاقة</th>
                    <th>الاسم</th>
                    <th>الرقم</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>a</td>
                    <td>b</td>
                    <td>c</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            
        </table>

    </div>
     
@endsection
@section('jsFooter')
    <script>
        $(function() {
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
                    beforeSend:function(http){
                        $('#search_results').html('Loading..');
                    },
                    success:function (response, status, http) {
                        $('#search_results').html(response);
                    }
                });
            });
        });
    </script>
@endsection


