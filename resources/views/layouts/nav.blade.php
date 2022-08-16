<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">Azmoon</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
               @if(auth()->check())

                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">پروفایل کاربر</a></li>
                            <li>
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" >خروج</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">ثبت نام</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">ورود</a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="#about">شرکت در آزمون</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">خدمات</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">تماس با ما</a></li>
            </ul>
        </div>
    </div>
</nav>
