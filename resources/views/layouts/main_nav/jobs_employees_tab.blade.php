@if(in_array('view_jobs', $permissions) || in_array('view_employees', $permissions))
    <li class="dropdown">
        @if(in_array('view_employees',$permissions) || in_array('view_jobs', $permissions))
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
           <strong>الوظائف والموظفين</strong>
            <span class="caret"></span>
        </a>
        @endif

        <ul class="dropdown-menu">
            @if(in_array('view_employees', $permissions))
                <li class="dropdown-header text-center"><h4>الموظفين</h4></li>
                <li><a href="{{ action('EmployeesController@index') }}" class="text-center">عرض كل الموظفين</a></li>
                @if(in_array('create_employees', $permissions))
                    <li><a href="{{ action('EmployeesController@create') }}" class="text-center">إضافة موظف جديد</a></li>
                @endif
            @endif            
           <li role="separator" class="divider"></li> 

           @if(in_array('view_jobs', $permissions))
                <li class="dropdown-header text-center"><h4>الوظائف</h4></li>
                <li><a href="{{ action('JobsController@index') }}" class="text-center">عرض كل الوظائف</a></li>
                @if(in_array('create_jobs', $permissions))
                    <li><a href="{{ action('JobsController@create') }}" class="text-center">إضافة وظيفة إيجار </a></li>
                @endif
            @endif            
        </ul>        
    </li>
@endif

