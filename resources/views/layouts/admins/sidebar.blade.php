<nav class="navbar navbar-expand-lg navbar-light pb-0">
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <div class="text-center">
            <a class="navbar-brand d-lg-none d-block logo-mo my-4 " href="{{ route('admin.home') }}"><img
                    class="img-fluid" width="100"
                    src="{{ ($logo = \App\Models\Setting::where('name','logo')->first()) ? url("storage/".$logo->value) : url('dashboard/img/logo-white.png')}}"
                    alt=""></a>
        </div>
        <ul class="navbar-nav justify-content-center w-100 text-center position-relative mt-md-3">
            <li class="nav-item mx-1 mb-md-0 mb-2 {{request()->is('admin') ? 'active' : ''}}">
                <a class="nav-link font-weight-bold text-white" href="{{ route('admin.home') }}"><i
                        class="fa-sharp fa-solid fa-house fs-5 pe-2"></i> {{__('Home')}} </a>
            </li>

            @if(auth()->user()->can('users show') )
                <li class="nav-item mx-1 mb-md-0 mb-2 @if(request()->is('admin/users') or request()->is('admin/visits') or request()->is('admin/prescriptions') or request()->is('admin/analyses') ) active @endif">
                    <a class="nav-link font-weight-bold text-white" href="{{ route('admin.users') }}"><i
                            class="fa-solid fa-hospital-user fs-5 pe-2"></i>ملفات المرضى </a>
                </li>
            @endif

            @if(auth()->user()->can('reservations show') )
                <li class="nav-item mx-1 mb-md-0 mb-2 {{request()->is('admin/reservations') ? 'active' : ''}}">
                    <a class="nav-link font-weight-bold text-white" href="{{route('admin.reservations')}}"><i
                            class="fa-solid fa-file fs-5 pe-2"></i>{{__('Doctor reservations')}} </a>
                </li>
            @endif

            @if(auth()->user()->can('consultations show') )
                <li class="nav-item mx-1 mb-md-0 mb-2 {{request()->is('admin/consultations') ? 'active' : ''}} ">
                    <a class="nav-link font-weight-bold text-white" href="{{route('admin.consultations')}}"><i
                            class="fa-solid fa-address-book fs-5 pe-2 "></i> {{__('Medical consulting')}} </a>
                </li>
            @endif
            @if(auth()->user()->can('employees show') )
                <li class="nav-item mx-1 mb-md-0 mb-2 {{request()->is('admin/employees') ? 'active' : ''}} ">
                    <a class="nav-link font-weight-bold text-white" href="{{route('admin.employees')}}"><i
                            class="fa-solid fa-file fs-5 pe-2"></i>
                         {{__('Personnel file')}}</a>
                </li>
            @endif
            @if(auth()->user()->can('roles show') )
                <li class="nav-item mx-1 mb-md-0 mb-2 {{request()->is('admin/roles') ? 'active' : ''}} ">
                    <a class="nav-link font-weight-bold text-white" href="{{route('admin.roles')}}"><i
                            class="fa-solid fa-lock fs-5 pe-2"></i>
                        {{__("Roles")}} </a>
                </li>
            @endif
            @if(auth()->user()->can('revenues show') )
                <li class="nav-item mx-1 mb-md-0 mb-2 @if(request()->is('admin/revenues') or request()->is('admin/expenses*') ) active @endif ">
                    <a class="nav-link font-weight-bold text-white" href="{{route('admin.revenues')}}"><i
                            class="fa-solid fa-file-invoice-dollar fs-5 pe-2"></i>{{__("Financial movements")}} </a>
                </li>
            @endif

            @if(auth()->user()->can('categories show') )
                <li class="nav-item mx-1 mb-md-0 mb-2 {{request()->is('admin/categories') ? 'active' : ''}} ">
                    <a class="nav-link font-weight-bold text-white" href="{{route('admin.categories')}}"><i
                            class="fa-solid fa-notes-medical fs-5 pe-2"></i>{{__("Categories")}} </a>
                </li>
            @endif

            @if(auth()->user()->can('insurances show') )
                <li class="nav-item mx-1 mb-md-0 mb-2 {{request()->is('admin/insurances') ? 'active' : ''}}">
                    <a class="nav-link font-weight-bold text-white" href="{{route('admin.insurances')}}"><i
                            class="fa-solid fa-city fs-5 pe-2"></i>{{__("insurance")}} </a>
                </li>
            @endif

            @if(auth()->user()->can('menus show') )
                <li class="nav-item mx-1 mb-md-0 mb-2 @if(request()->is('admin/menus') or request()->is('admin/sliders') or request()->is('admin/ads') or request()->is('admin/pages') or request()->is('admin/services') or request()->is('admin/statistics') or request()->is('admin/posts') or request()->is('admin/applicants') or request()->is('admin/settings') or request()->is('admin/contacts') or request()->is('admin/subscribes') ) active @endif">
                    <a class="nav-link font-weight-bold text-white" href="{{route('admin.menus')}}"><i
                            class="fa-solid fa-file fs-5 pe-2"></i>{{__("Web")}}</a>
                </li>
            @endif


        </ul>
    </div>
</nav>
