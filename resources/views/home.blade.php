@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h2 style="font-family: 'Aref Ruqaa', serif;">الاستعلامات</h2></div>

                <div class="panel-body ">
                    <div class="list-group " >
                        <a href="{{action('MembershipCardsForIndividualsController@index')}}"><button type="button" class="list-group-item">الإستعلام عن الكروت</button></a>
                        <a href="{{action('EntryStickersForCarsController@index')}}"><button type="button" class="list-group-item">الإستعلام عن السيارات</button></a>
                        <a href="{{action('UnitsController@index')}}"><button type="button" class="list-group-item">الإستعلام عن الوحدات</button></a>
                        <a href="{{action('OwnersController@index')}}"><button type="button" class="list-group-item">الإستعلام عن الملاك</button></a>
                        <a href="{{action('RentersController@index')}}"><button type="button" class="list-group-item">الإستعلام عن المستأجرين</button></a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('head')
    <link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa" rel="stylesheet">
    <style type="text/css">
        .panel-body button{
            text-align: center;
            font-family: 'Aref Ruqaa', serif;
            font-size: 1.5em;
            
        }
        .panel-body a{
            text-decoration: none;
            

        }
    </style>
@endsection