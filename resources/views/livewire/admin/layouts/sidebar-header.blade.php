<ul class="nav nav-tabs navs-o border-bottom-0">

        @if(auth()->user()->can('users show') )
            <li class="nav-item ms-1">
                <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/users') ? 'active' : ''}} "
                   aria-current="page"
                   href="{{ route('admin.users') }}"><img
                        class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/icon-1.png')}}"
                        alt="">{{__("All patients")}}
                     </a>
            </li>
        @endif

        @if(auth()->user()->can('visits show') )
            <li class="nav-item ms-1">
                <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/visits*') ? 'active' : ''}} "
                   href="{{ route('admin.visits') }}"> <img
                        class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/icon-2.png')}}"
                        alt="{{__("Patient visits")}}">{{__("Patient visits")}}</a>
            </li>
        @endif

        @if(auth()->user()->can('prescriptions show') )
            <li class="nav-item ms-1">
                <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/prescriptions*') ? 'active' : ''}}"
                   href="{{ route('admin.prescriptions') }}"> <img
                        class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/icon-3.png')}}"
                        alt="{{__("Patients' prescriptions")}}">{{__("Patients' prescriptions")}}</a>
            </li>
        @endif

        @if(auth()->user()->can('analyses show') )
            <li class="nav-item ms-1">
                <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/analyses') ? 'active' : ''}} "
                   href="{{ route('admin.analyses') }}"> <img
                        class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/icon-4.png')}}"
                        alt="{{__("Patient analyses")}}">{{__("Patient analyses")}}</a>
            </li>
        @endif

{{--    @elseif (request()->is('admin/consultations*'))--}}
{{--        @if(auth()->user()->can('consultations show') )--}}
{{--            <li class="nav-item ms-1">--}}
{{--                <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/consultations') ? 'active' : ''}} "--}}
{{--                   href="{{ route('admin.consultations') }}"> <img--}}
{{--                        class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/icon-4.png')}}"--}}
{{--                        alt="{{__("Free Consultation")}}">{{__("Free Consultation")}}</a>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        @if(auth()->user()->can('consultations show') and request()->is('admin/consultations*') )--}}
{{--            <li class="nav-item ms-1">--}}
{{--                <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1  "--}}
{{--                   href="{{ route('admin.consultations') }}"> <img--}}
{{--                        class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/icon-4.png')}}"--}}
{{--                        alt="{{__("Paid Consultation")}}">{{__("Paid Consultation")}}</a>--}}
{{--            </li>--}}
{{--        @endif--}}


</ul>
