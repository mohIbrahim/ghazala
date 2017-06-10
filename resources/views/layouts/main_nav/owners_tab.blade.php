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

            @if(in_array('view_owners_family_members', $permissions))
                <li class="dropdown-header text-center"><h4>أفراد عائلات المُلاَّك</h4></li>
                <li><a href="{{ action('OwnersFamilyMembersController@index') }}" class="text-center">عرض كل الافراد</a></li>
                @if(in_array('create_owners_family_members', $permissions))
                    <li><a href="{{ action('OwnersFamilyMembersController@create') }}" class="text-center">إنشاء عضو عائلة جديد</a></li>
                @endif
            @endif

            <li role="separator" class="divider"></li>

            @if(in_array('view_membership_cards_for_individuals', $permissions))
                <li class="dropdown-header text-center"><h4>كروت دخول القرية</h4></li>
                <li><a href="{{ action('MembershipCardsForIndividualsController@index') }}" class="text-center">عرض كل الكروت</a></li>
                @if(in_array('create_membership_cards_for_individuals', $permissions))
                    <li><a href="{{ action('MembershipCardsForIndividualsController@create') }}" class="text-center">إنشاء كارت جديد</a></li>
                @endif
            @endif
            
        </ul>
    </li>
@endif