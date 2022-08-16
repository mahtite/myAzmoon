<ul class="profile-menu-items">

    <li>
        <a href="{{ route('profile') }}" {{ request()->is('profile')? 'class= active':'' }} >
            <i class="fa fa-user"></i>
            پروفایل
        </a>
    </li>

    <li>
        <a href="{{ route('password.request') }}" >
            <i class="fa fa-refresh"></i>
            تغییر رمز عبور
        </a>
    </li>
    <li>
        <a href="{{ route('file.download') }}">
            <i class="fa fa-download"></i>
            دانلود فایل راهنما
        </a>
    </li>
    <li>
        <a href="{{ route('azmoon') }}">
            <i class="fa fa-file-text"></i>
            شرکت در آزمون
        </a>
    </li>
    <li>
        <a href="{{ route('karname.show') }}" {{ request()->is('profile/karname')? 'class= active':'' }} >
            <i class="fa fa-laptop"></i>
            مشاهده کارنامه
        </a>
    </li>
    <li>
        <a href="{{ route('twofactor') }}" {{ request()->is('profile/twofactor')? 'class= active':'' }} >
            <i class="fa fa-mobile-phone"></i>
            احراز هویت دو مرحله ای
        </a>
    </li>
    <li>
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button class="btn-sm" style="border: none;

    background: no-repeat;
    color: #f4623a;"><i class="fa fa-power-off"></i>
                خروج از حساب
            </button>
        </form>
    </li>
</ul>
