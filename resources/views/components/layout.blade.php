<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</head>

<body>


    <nav class="navbar navbar-expand-lg bg-light px-5 shadow-sm mb-5 bg-body rounded ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Multi-Auth</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        {{-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a> --}}
                        @if (Auth::guard('web')->user() instanceof App\Models\User)
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">{{ Auth::user()->name }}</a>
                        @elseif (Auth::guard('student')->user() instanceof App\Models\Student)
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">{{ Auth::guard('student')->user()->name }}</a>
                        @elseif (Auth::guard('admin')->user() instanceof App\Models\Admin)
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">{{ Auth::guard('admin')->user()->name }}</a>
                        @endif


                        <ul class="dropdown-menu">
                            <li>
                                @if (Auth::guard('web')->user() instanceof App\Models\User)
                                    <form method="POST" action="{{ route('user.logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            User Log Out
                                        </button>
                                    </form>
                                @elseif (Auth::guard('student')->user() instanceof App\Models\Student)
                                    <form method="POST" action="{{ route('student.logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            Student Log Out
                                        </button>
                                    </form>
                                @elseif (Auth::guard('admin')->user() instanceof App\Models\Admin)
                                    <form method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            Admin Log Out
                                        </button>
                                    </form>
                                @endif

                            </li>
                        </ul>



                        {{-- <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">
                                    Log out
                                </a></li>
                        </ul> --}}

                        {{-- @if (Auth::guard('admin')->user() instanceof App\Models\Admin)
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Admin Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @elseif (Auth::guard('student')->user() instanceof App\Models\Student)
                            <form method="POST" action="{{ route('student.logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Student Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @elseif (Auth::user() instanceof App\Models\User)
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @endif --}}


                    </li>
                </ul>

            </div>
        @endauth

        @guest
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        @endguest
    </nav>
    <main>
        {{ $slot }}
    </main>


</body>

</html>
