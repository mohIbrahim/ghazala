@if(in_array('view_gates', $permissions) || in_array('view_gates', $permissions))
    <li class="dropdown">
        @if(in_array('view_gates',$permissions))
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               <strong>البوابات</strong>
                <span class="caret"></span>
            </a>
        @endif

        <ul class="dropdown-menu">

            @if(in_array('view_gates', $permissions))
                <li class="dropdown-header text-center"><h4>استعلامات</h4></li>
                <li><a href="{{ action('GatesController@index') }}" class="text-center">كروت العضوية</a></li>               
            @endif

            <li role="separator" class="divider"></li>            
            
        </ul>
    </li>
@endif

