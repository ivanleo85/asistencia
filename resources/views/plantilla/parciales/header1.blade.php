<header class="main-header">
    <!-- Logo -->
    <a class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!--<span class="logo-mini">
               <img src="{{ asset('dist/img') }}" style="width: 25px; height: 25px; border-radius: 50%">
            </span>-->
        <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <!--<img src="" style="width: 25px; height: 25px; border-radius: 50%">-->
                <b>Asistencias</b>
            </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        @if(!is_null(Session::get('rol')))
            <a href="#" style="padding: 15px 10px; color: #fff;" data-toggle="offcanvas" role="button">
                <span class="glyphicon glyphicon-align-justify" aria-hidden="true" style="margin-top: 15px;"></span>
            </a>
        @endif
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(is_null(Auth::user()->foto) || empty(Auth::user()->foto))
                            @if(Auth::user()->sexo == 'M')
                                <img src="{{ asset('dist/img/male.png') }}" class="user-image">
                            @else
                                <img src="{{ asset('dist/img/female.png') }}" class="user-image">
                            @endif
                        @else
                            <img src="{{ asset('dist/img/' . Auth::user()->foto ) }}" class="user-image">
                        @endif
                        <span class="hidden-xs">{{ Auth::user()->nombres }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if(is_null(Auth::user()->foto) || empty(Auth::user()->foto))
                                @if(Auth::user()->sexo == 'M')
                                    <img src="{{ asset('dist/img/male.png') }}" class="img-circle">
                                @else
                                    <img src="{{ asset('dist/img/female.png') }}" class="img-circle">
                                @endif
                            @else
                                <img src="{{ asset('dist/img/' . Auth::user()->foto ) }}" class="img-circle">
                            @endif
                            <p>
                                {{ Auth::user()->nombres . ' ' . Auth::user()->apellidopaterno . ' ' . Auth::user()->apellidomaterno }}
                                @if(!is_null(Session::get('rol')))
                                    <small>
                                        {{ Session::get('rol')->nombre }}&nbsp;
                                        @if(Session::get('rol_cantidad') > 1)
                                            <a href="{{ url('home') }}" style="color: #fff;">[Cambiar]</a>
                                        @endif
                                    </small>
                                @endif

                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/perfil') }}" class="btn btn-default btn-flat">Perfil de Usuario</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>