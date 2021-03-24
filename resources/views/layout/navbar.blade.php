<div class="container-fluid bg-info">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-info navbar-light">
            <a class="navbar-brand text-white" href="#">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Pricing</a>
                    </li>
                    @if(Auth::check())
                         @if(Auth::user()->hasRole('Manager'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{url('admin/')}}">Admin Panel</a>
                            </li>
                        @endif
                    @endif
                    @if(Auth::check())
                        @if(Auth::user()->hasRole(['Manager','Supervisor','Staff']))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Post
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                    <a class="dropdown-item" href="{{url('postcreator/posts')}}">All</a>

                                    <a class="dropdown-item" href="{{url('postcreator/posts/create')}}">Create</a>




                                </div>
                            </li>
                            @endif
                        @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::check())
                                {{Auth::user()->name}}
                                @else
                                Member
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if(Auth::check())
                                <a class="dropdown-item" href="{{url('/user/logout')}}">Logout</a>
                                @else
                                <a class="dropdown-item" href="{{url('/user/login')}}">Login</a>
                                <a class="dropdown-item" href="{{url('/user/register')}}">Register</a>
                            @endif


                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>