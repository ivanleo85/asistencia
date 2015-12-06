<header class="main-header" style="max-height: 200px;">
    <nav class="navbar navbar-static-top">
        <div class="container" style="width: 100%; background-color: #fff;">
            <div class="navbar-header" style="background-image: url('{{ url('dist/img/logo.png') }}'); height: 105px; width: 320px;">
                &nbsp;&nbsp;
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <nav class="navbar navbar-static-top">
        <div class="container" style="width: 100%;">
            <div class="navbar-header">
                &nbsp;&nbsp;
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            @if(Session::has('rol'))
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        {!! Session::get('menu') !!}
                    </ul>
                </div><!-- /.navbar-collapse -->
            @endif

            <!-- Navbar Right Menu -->
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
                            {{ Auth::user()->nombres }}&nbsp;
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
                                <div class="pull-right">
                                    <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
    </nav>
</header>