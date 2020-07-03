
    <section class="menu">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
            <div class="container">
                <a href="index.html">
                    <img src="./img/logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                    aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse w-100" id="main_nav">
                    <div class="row w-100 mr-0">
                        <div class="col-md-7 pr-0">
                            <ul class="nav navbar-nav float-right">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Bolg</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-5 pr-0">
                            <ul class="nav navbar-nav navbar-right float-right">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i></a>
                                </li>
                                @guest
                                    <li class="nav-item login">
                                        <i class="fa fa-user"></i>
                                        <a class="nav-link" href="{{ route("login") }}">Login</a>
                                        <span> Or </span>
                                        <a class="nav-link" href="{{ route('register') }}">register</a>
                                    </li>
                                @else
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->full_name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- collapse .// -->
            </div>
            <!-- container .// -->
        </nav>
    </section>