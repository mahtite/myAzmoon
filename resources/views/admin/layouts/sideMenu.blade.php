<div class="ecaps-sidemenu-area">
    <!-- Desktop Logo -->
    <div class="ecaps-logo">
        <a href="/"><img class="desktop-logo" src="/admin/img/core-img/logo.png" alt="لوگوی دسک تاپ"> <img class="small-logo" src="img/core-img/small-logo.png" alt="آرم موبایل"></a>
    </div>

    <!-- Side Nav -->
    <div class="ecaps-sidenav" id="ecapsSideNav">
        <!-- Side Menu Area -->
        <div class="side-menu-area">
            <!-- Sidebar Menu -->
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="{{ request()->is('dashboard') ? 'active' :'' }}"><a href="/dashboard"><i class="zmdi zmdi-view-dashboard"></i><span>داشبورد</span></a></li>

                    @can('questioins')
                    <li class="treeview @php if(( request()->is('dashboard/azmoon'))||(request()->is('dashboard/azmoon/create'))) {echo  'active';} @endphp" >
                        <a href="javascript:void(0)"><i class="zmdi zmdi-apps"></i> <span>مدیریت سوالات</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('azmoon.index') }}" style ="{{ request()->is('dashboard/azmoon') ? 'color:white':'' }}">لیست سوالات</a></li>
                            <li><a href="{{ route('azmoon.create') }}" style ="{{ request()->is('dashboard/azmoon/create') ? 'color:white':'' }}">درج سوال</a></li>
                        </ul>
                    </li>
                    @endcan

                    @can('azmoon')
                    <li class="treeview @php if(( request()->is('dashboard/karname'))||(request()->is('dashboard/chart'))) {echo  'active';} @endphp">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-email"></i> <span>مدیریت آزمون</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('karname.all') }}" style ="{{ request()->is('dashboard/karname') ? 'color:white':'' }}">مشاهده نمرات</a></li>
                            <li><a href="{{ route('chart') }}" style ="{{ request()->is('dashboard/chart') ? 'color:white':'' }}">تعداد قبولی</a></li>
                        </ul>
                    </li>
                    @endcan

                    <li class="treeview @php if(( request()->is('dashboard/users'))||(request()->is('dashboard/users/create'))) {echo  'active';} @endphp">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-apps"></i> <span>مدیریت کاربران</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('users.index') }}" style ="{{ request()->is('dashboard/users') ? 'color:white':'' }}">لیست کاربران</a></li>
                            <li><a href="{{ route('users.create') }}" style="{{ request()->is('dashboard/users/create') ? 'color : white':'' }}">افزودن کاربر</a></li>
                        </ul>
                    </li>

                    <li class="treeview @php if(( request()->is('dashboard/states'))||(request()->is('dashboard/states/create'))) {echo  'active';} @endphp">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-apps"></i> <span>مدیریت استان</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('states.index') }}" style ="{{ request()->is('dashboard/states') ? 'color:white':'' }}">مدیریت همه</a></li>
                            <li><a href="{{ route('states.create') }}" style="{{ request()->is('dashboard/states/create') ? 'color : white':'' }}">افزودن استان جدید</a></li>
                        </ul>
                    </li>

                    <li class="treeview @php if(( request()->is('dashboard/city'))||(request()->is('dashboard/city/create'))) {echo  'active';} @endphp">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-apps"></i> <span>مدیریت شهر </span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('city.index') }}" style ="{{ request()->is('dashboard/city') ? 'color:white':'' }}">مدیریت همه</a></li>
                            <li><a href="{{ route('city.create') }}" style="{{ request()->is('dashboard/city/create') ? 'color : white':'' }}">افزودن شهر جدید</a></li>
                        </ul>
                    </li>


                    <li class="treeview @php if(( request()->is('dashboard/permissions'))||(request()->is('dashboard/roles'))) {echo  'active';} @endphp">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-apps"></i> <span> سطوح دسترسی</span> <i class="fa fa-angle-left"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('permissions.index') }}" style ="{{ request()->is('dashboard/users') ? 'color:white':'' }}">همه دسترسی ها</a></li>
                            <li><a href="{{ route('roles.index') }}" style="{{ request()->is('dashboard/users/create') ? 'color : white':'' }}">همه نقش ها</a></li>
                        </ul>
                    </li>
                    <li><a href="/"><i class="zmdi zmdi-collection-image-o"></i><span>صفحه اصلی</span></a></li>

                </ul>
            </nav>
        </div>
    </div>
</div>
