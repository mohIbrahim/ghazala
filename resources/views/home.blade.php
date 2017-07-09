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
                        @if(in_array('view_membership_cards_for_individuals', $permissions))
                            <a href="{{action('MembershipCardsForIndividualsController@index')}}"><button type="
                            button" class="list-group-item">الإستعلام عن الكروت</button></a>
                        @endif
                        @if(in_array('view_entry_stickers_for_cars', $permissions))
                            <a href="{{action('EntryStickersForCarsController@index')}}"><button type="button" class="list-group-item">الإستعلام عن السيارات</button></a>
                        @endif
                        @if(in_array('view_units', $permissions))
                            <a href="{{action('UnitsController@index')}}"><button type="button" class="list-group-item">الإستعلام عن الوحدات</button></a>
                        @endif
                        @if(in_array('view_owners', $permissions))
                            <a href="{{action('OwnersController@index')}}"><button type="button" class="list-group-item">الإستعلام عن الملاك</button></a>
                        @endif
                        @if(in_array('view_renters', $permissions))
                            <a href="{{action('RentersController@index')}}"><button type="button" class="list-group-item">الإستعلام عن المستأجرين</button></a>
                        @endif
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