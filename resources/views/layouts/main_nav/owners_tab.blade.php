@if(in_array('view_owners', $permissions))
    <li class="dropdown">
        @if(in_array('view_owners',$permissions))
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               <strong>المُلاَّك</strong>
                <span class="caret"></span>
            </a>
        @endif

        <ul class="dropdown-menu">

            @if(in_array('view_owners', $permissions))
                <li class="dropdown-header text-center"><h4>المُلاَّك</h4></li>
                <li><a href="{{ action('OwnersController@index') }}" class="text-center">عرض كل المُلاَّك</a></li>
                @if(in_array('create_owners', $permissions))
                    <li><a href="{{ action('OwnersController@create') }}" class="text-center">إنشاء مالك جديدة</a></li>
                @endif
            @endif

            <li role="separator" class="divider"></li>            
            
        </ul>
    </li>
@endif