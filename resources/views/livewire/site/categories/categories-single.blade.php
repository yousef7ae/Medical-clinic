<div>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2">
                <li class="breadcrumb-item"><a class="text-secondary fw-bold" href="{{route('home')}}">{{__('Home')}}</a></li>
                {{-- <li class="breadcrumb-item"><a class="text-secondary fw-bold" href="#">الخدمات</a></li> --}}
                <li class="breadcrumb-item text-primary active" aria-current="page">{{  $category->name }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-6 mb-3">
                <img class="img-fluid" src="{{ $category->image  }}" alt="{{ $category->name }}">
            </div>
            <div class="col-md-6 mb-3">
                <h1>{{ $category->name }}</h1>
                <p>{{ $category->description }}</p>
            </div>
        </div>
    </div>
</div>
