		<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Ghazala') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
						{{-- privieges --}}
			            <li class="dropdown">
			                @if(in_array('view_permissions',$permissions))
			                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			                    Privileges
			                    <span class="caret"></span>
			                </a>
			                @endif

			                <ul class="dropdown-menu">
			                    @if(in_array('view_users', $permissions))
			                        <li class="dropdown-header">Users</li>
			                        <li><a href="{{ action('UserController@index') }}">Show All Users</a></li>
			                        <li role="separator" class="divider"></li>
			                    @endif

			                    @if(in_array("view_roles", $permissions))
			                        <li class="dropdown-header">Roles</li>

			                        @if(in_array("create_roles", $permissions))
			                            <li><a href="{{ action('RoleController@create') }}">Create Role</a></li>
			                        @endif

			                        @if(in_array('view_roles', $permissions))
			                            <li><a href="{{ action('RoleController@index') }}">View All Role</a></li>
			                        @endif

			                        <li role="separator" class="divider"></li>
			                    @endif


			                    @if(in_array('view_permissions', $permissions))
			                        <li class="dropdown-header">Permissions</li>
			                        @if(in_array('create_permissions', $permissions))
			                            <li><a href="{{ action('PermissionController@create') }}">Create Permission</a></li>
			                        @endif

			                        @if(in_array('view_permissions', $permissions))
			                            <li><a href="{{ action('PermissionController@index') }}" >View All Permissions</a></li>
			                        @endif
			                    @endif                          
			                </ul>
			            </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>