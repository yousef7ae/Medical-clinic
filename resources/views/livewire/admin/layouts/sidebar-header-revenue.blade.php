<ul class="nav nav-tabs navs-o border-bottom-0">

    @if(auth()->user()->can('revenues show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/revenues') ? 'active' : ''}} "
               aria-current="page"
               href="{{ route('admin.revenues') }}"><img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/r-2.png')}}"
                    alt="">
                 {{__("Revenues")}} </a>
        </li>
    @endif

    @if(auth()->user()->can('expenses show') )
        <li class="nav-item ms-1">
            <a class="nav-link rounded-0 text-p fw-bold px-md-3 px-1 {{request()->is('admin/expenses*') ? 'active' : ''}} "
               href="{{ route('admin.expenses') }}"> <img
                    class="d-block mx-auto mb-1" width="44" src="{{asset('dashboard/img/r-1.png')}}"
                    alt="{{__("Expenses")}}">{{__("Expenses")}}</a>
        </li>
    @endif

</ul>
