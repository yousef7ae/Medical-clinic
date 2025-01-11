<ul class="nav nav-tabs navs-o border-bottom-0">


    @if(auth()->user()->can('menus show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/menus') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.menus') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/ss/1.png')}}"
                    alt="">
                {{__("Menus")}}</a>
        </li>
    @endif

    @if(auth()->user()->can('sliders show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/sliders') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.sliders') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/ss/2.png')}}"
                    alt="">
                {{__("Sliders")}}</a>
        </li>
    @endif

    @if(auth()->user()->can('pages show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/pages') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.pages') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/ss/3.png')}}"
                    alt="">
                {{__("Pages")}}</a>
        </li>
    @endif

    @if(auth()->user()->can('services show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/services') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.services') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/ss/4.png')}}"
                    alt="">
                {{__("Services")}}</a>
        </li>
    @endif

    @if(auth()->user()->can('statistics show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/statistics') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.statistics') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/ss/5.png')}}"
                    alt="">
                {{__("Statistics")}}</a>
        </li>
    @endif

    @if(auth()->user()->can('posts show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/posts') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.posts') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/ss/6.png')}}"
                    alt="">
                {{__("Posts")}}</a>
        </li>
    @endif

    @if(auth()->user()->can('ads show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/ads') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.ads') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/ss/6.png')}}"
                    alt="">
                {{__("Ads")}}</a>
        </li>
    @endif

    @if(auth()->user()->can('contacts show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/contacts') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.contacts') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/ss/7.png')}}"
                    alt="">
                {{__("Contacts")}}</a>
        </li>
    @endif

    @if(auth()->user()->can('subscribes show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/subscribes') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.subscribes') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/ss/7.png')}}"
                    alt="">
                {{__("Subscribes New")}}</a>
        </li>
    @endif

    @if(auth()->user()->can('applicants show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/applicants') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.applicants') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/ss/7.png')}}"
                    alt="">
                {{__("Applicants")}}</a>
        </li>
    @endif

    @if(auth()->user()->can('settings show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/settings') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.settings') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/ss/8.png')}}"
                    alt="">
                {{__("Settings")}}</a>
        </li>
    @endif


</ul>
