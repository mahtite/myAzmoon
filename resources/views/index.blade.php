@extends('layouts.master')
@section('title','سایت آزمون آنلاین')
@section('content')
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">برای شرکت در آزمون لطفا کلیک نمایید</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است
                    </p>

                    <a class="btn btn-light btn-xl" href="{{ route('azmoon') }}">شرکت در آزمون آنلاین</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">خدمات ما</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="fa fa-laptop fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">کامپیوتر</h3>
                        <p class="text-muted mb-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ طراحان گرافیک است</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="fa fa-sitemap fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">شبکه</h3>
                        <p class="text-muted mb-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ طراحان گرافیک است</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="fa fa-cube fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">معماری و گرافیک</h3>
                        <p class="text-muted mb-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ طراحان گرافیک است</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="fa fa-code fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">نرم افزار</h3>
                        <p class="text-muted mb-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ طراحان گرافیک است</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">تماس با ما</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">
                        لطفا با ما
                        در شبکه های اجتماعی همراه باشید
                    </p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <ul class="contactS">
                        <li>
                            <a href="#"><i class="fa fa-send" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-whatsapp"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                    <i class="bi-phone fs-2 mb-3 "></i>
                    <div>
                        09111111111
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
