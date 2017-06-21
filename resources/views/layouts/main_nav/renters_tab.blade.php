@if(in_array('view_renters', $permissions) || in_array('view_renting_contracts', $permissions))
    <li class="dropdown">
        @if(in_array('view_renters',$permissions))
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
           <strong>المستأجرين و عقود الإيجار</strong>
            <span class="caret"></span>
        </a>
        @endif

        <ul class="dropdown-menu">
            @if(in_array('view_renters', $permissions))
                <li class="dropdown-header text-center"><h4>المستأجرين</h4></li>
                <li><a href="{{ action('RentersController@index') }}" class="text-center">عرض كل المستأجرين</a></li>
                @if(in_array('create_renters', $permissions))
                    <li><a href="{{ action('RentersController@create') }}" class="text-center">إضافة مستأجر جديد</a></li>
                @endif
            @endif            
           <li role="separator" class="divider"></li> 

           @if(in_array('view_renting_contracts', $permissions))
                <li class="dropdown-header text-center"><h4>عقود الإيجار</h4></li>
                <li><a href="{{ action('RentingContractsController@index') }}" class="text-center">عرض كل عقود الإيجار</a></li>
                @if(in_array('create_renting_contracts', $permissions))
                    <li><a href="{{ action('RentingContractsController@create') }}" class="text-center">إضافة عقد إيجار </a></li>
                @endif
            @endif            
        </ul>


        
    </li>
@endif

