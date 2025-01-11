<header class="shadow-sm text-white fixed-top">
    <div class="border-bottom border-primary">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between py-2">
                <a class="navbar-brand me-0 d-md-inline-block d-none position-relative" target="_blank" href="{{route('home')}}"><img width="100" class="img-fluid" src="{{ ($logo = \App\Models\Setting::where('name','logo')->first()) ? url("storage/".$logo->value) : url('dashboard/img/logo-white.png')}}" alt=""></a>
                <p class="mb-0 text-white">{{__('Welcome to the site')}} {{($setting = \App\Models\Setting::where('name',"site_name")->first()) ? $setting->value : env('APP_NAME')}}</p>
                <div class="d-flex justify-content-center align-self-center">
                    <img class="rounded-circle border border-white shadow" width="50" height="50" src="{{asset('dashboard/img/img-1.png')}}" alt="">
                    <div class="ps-2">
                        <p class="mb-0">{{auth()->user()->name}}</p>
                        <div class="dropdown">
                            <a href="#" class="btn py-1 dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __(auth()->user()->roles->pluck('name')->implode(',')) }}
                            </a>
                            <ul class="dropdown-menu">
{{--                                <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                                <li><a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('admin.logout') }}"><i data-feather="log-out"></i>{{__("Logout")}}</a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!--  mobile-->
        <div class="d-flex justify-content-between">
            <a class="navbar-brand me-0 d-md-none d-block" href="{{route('home')}}"><img width="100" class="img-fluid" src="{{ ($logo = \App\Models\Setting::where('name','logo')->first()) ? url("storage/".$logo->value) : url('dashboard/img/logo-white.png')}}" alt=""></a>
            <button class="navbar-toggler position-relative border-0 collapsed mt-3" type="button"
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
        </div>

        @if(auth()->check())
            @livewire('admin.layouts.sidebar')
        @endif
    </div>
</header>
