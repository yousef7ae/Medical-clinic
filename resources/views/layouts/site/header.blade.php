<div>
    <!-- Modal احجز موعدك-->
    <div class="modal modal-lg fade" wire:ignore.self id="exampleModal" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <div class="col-md-4"
                             style="background-image: url({{asset('front/img/Backgroundimg-modal.png')}}); background-size: 100%">
                            <div class="d-flex flex-column justify-content-center text-white p-3 h-100">
{{--                                <img width="100" src="{{asset('front/img/logo-white.png')}}" alt="">--}}
{{--                                <h3 class="pb-3">احصل على خصومات--}}
{{--                                    تصل الى 60%</h3>--}}
{{--                                <h5>تمتع دائمًا بصحة جيدة</h5>--}}
{{--                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في--}}
{{--                                    نفس المساحة، لقد تم توليد هذا النص من مولد--}}
{{--                                    النص العربى، حيث يمكنك أن إلى زيادة--}}
{{--                                    عدد الحروف التى يولدها التطبيق</p>--}}
                            </div>
                        </div>
{{--                        <div class="col-md-8 p-3">--}}

{{--                            <button type="button" class="btn-close-o btn float-end" data-bs-dismiss="modal"--}}
{{--                                    aria-label="Close"><i class="fa-solid fa-xmark"></i></button>--}}
{{--                            <h5 class="border-bottom text-center text-primary pb-2">{{__('Book your appointment')}}</h5>--}}

{{--                            @livewire('site.applicants-create')--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="fixed-top bg-white">
        <nav class="bg-primary nav-top">
            <div class="container">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div class="text-white d-md-flex fs-14p">
{{--                        <a href="mailto:info@oraclmedia.com" class="text-white mb-0 px-2 hover"><i--}}
{{--                                class="fa-solid pe-1 fa-envelope text-warning"></i>{{($setting = \App\Models\Setting::where('name',"email")->first()) ? $setting->value : ''}}--}}
{{--                        </a>--}}
{{--                        <a href="tel:{{ ($setting = \App\Models\Setting::where('name',"mobile")->first()) ? $setting->value : '' }}"--}}
{{--                           class="mb-0 text-white px-2 hover"><i--}}
{{--                                class="fa-solid fa-phone text-warning pe-1"></i>{{ ($setting = \App\Models\Setting::where('name',"mobile")->first()) ? $setting->value : '' }}--}}
{{--                        </a>--}}
{{--                        --}}{{--                    <p class="mb-0 d-inline-block px-2 text-white"><i class="fa-regular fa-clock text-warning pe-1"></i>--}}
{{--                        --}}{{--                        pm 6:0 ---}}
{{--                        --}}{{--                        8-00 am</p>--}}
                    </div>
                    <ul class="nav justify-content-md-end justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link px-2 text-white"
                               href="{{($setting = \App\Models\Setting::where('name',"url_facebook")->first()) ? $setting->value : '#'}}"
                               target="_blank"><i
                                    class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 text-white"
                               href="{{($setting = \App\Models\Setting::where('name',"url_instagram")->first()) ? $setting->value : '#'}}"
                               target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 text-white"
                               href="{{($setting = \App\Models\Setting::where('name',"url_whatsapp")->first()) ? $setting->value : '#'}}"
                               target="_blank"><i
                                    class="fab fa-whatsapp"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 text-white"
                               href="{{($setting = \App\Models\Setting::where('name',"url_twitter")->first()) ? $setting->value : '#'}}"
                               target="_blank"><i
                                    class="fab fa-twitter"></i></a>
                        </li>
                        {{--                    <li class="dropdown d-inline-block">--}}
                        {{--                        <button class="text-white px-2 hover d-inline-block btn dropdown-toggle" type="button"--}}
                        {{--                                data-bs-toggle="dropdown" aria-expanded="false">--}}
                        {{--                            <i class="fa-solid fa-globe"></i>--}}
                        {{--                        </button>--}}
                        {{--                        <ul class="dropdown-menu bg-primary">--}}
                        {{--                            <li><a class="dropdown-item text-white" href="#">arabic</a></li>--}}
                        {{--                            <li><a class="dropdown-item text-white" href="#">Englesh</a></li>--}}
                        {{--                        </ul>--}}
                        {{--                    </li>--}}
                    </ul>
                </div>
            </div>
        </nav>
        @if (!request()->is('register'))
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a class="navbar-brand me-0" href="{{route('home')}}"><img width="100" class="img-fluid"
                                                                                   src="{{ ($logo2 = \App\Models\Setting::where('name','logo2')->first()) ? url("storage/".$logo2->value) : url('front/img/logo-white.png')}}"
                                                                                   alt=""></a>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="navbar-collapse collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav justify-content-center w-100 text-center">
                                <li class="nav-item">
                                    <a class="navbar-brand d-block d-lg-none" href="{{route('home')}}">
                                        <img class="img-fluid" width="100" src="{{asset('front/img/logo-white.png')}}"
                                             alt=""></a>
                                </li>

                                @if($menus)
                                    @foreach($menus->submenus as $key =>  $submenu)
                                        <li class="nav-item px-2 {{ $key == 0 ? 'active' : '' }}">
                                            <a class="nav-link fw-bold text-dark"
                                               href="{{route('home',$submenu->url)}}">{{$submenu->name}} </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </nav>
                    <div class="">
                        <button class="navbar-toggler position-relative border-0 collapsed d-lg-none mt-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                    <span class="our-btn">
                        <span class="the-bar"></span>
                        <span class="the-bar"></span>
                        <span class="the-bar"></span>
                    </span>
                            <span class="btn overlaymnu d-lg-none d-block">
                        <span class="our-btn"></span>
                    </span>
                        </button>
                        <a type="button"  href="{{route('applicants-create')}}" class="btn btn-primary" {{--data-bs-toggle="modal"--}}
                              {{--  data-bs-target="#exampleModal"--}}>
                            {{__('Book your appointment')}}
                        </a>

                        <a type="button"  href="{{route('consultation-create')}}" class="btn btn-primary" {{--data-bs-toggle="modal"--}}
                            {{--  data-bs-target="#exampleModal"--}}>
                            {{__('Book a consultation')}}
                        </a>

{{--                        <a class="btn btn-success" href="{{route('register')}}">--}}
{{--                            سجل معنا--}}
{{--                        </a>--}}
                    </div>
                </div>
            </div>
        @endif

    </header>
    <div class="height-header"></div>
</div>
