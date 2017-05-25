<li class="dropdown">
    @if(in_array('view_permissions',$permissions))
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        الوحدات
        <span class="caret"></span>
    </a>
    @endif

    <ul class="dropdown-menu">
        @if(in_array('view_users', $permissions))
            <li class="dropdown-header text-center"><h4>النماذج الوحدات</h4></li>
            <li><a href="{{ action('UnitModelsController@index') }}" class="text-center">عرض كل النماذج</a></li>
            <li><a href="{{ action('UnitModelsController@create') }}" class="text-center">إنشاء نموذج جديد</a></li>
            <li role="separator" class="divider"></li>
        @endif

       
    </ul>
</li>