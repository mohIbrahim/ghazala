@if(in_array('view_unit_models', $permissions))
    <li class="dropdown">
        @if(in_array('view_permissions',$permissions))
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
           <strong>النماذج و الوحدات </strong>
            <span class="caret"></span>
        </a>
        @endif

        <ul class="dropdown-menu">
            <li class="dropdown-header text-center"><h4>نماذج الوحدات</h4></li>
            <li><a href="{{ action('UnitModelsController@index') }}" class="text-center">عرض كل النماذج</a></li>
            @if(in_array('create_unit_models', $permissions))
                <li><a href="{{ action('UnitModelsController@create') }}" class="text-center">إنشاء نموذج جديد</a></li>
            @endif
            <li role="separator" class="divider"></li>           
        </ul>
    </li>
@endif

