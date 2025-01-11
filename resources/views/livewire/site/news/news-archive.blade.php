<div>
    <!--hero-->
    <div class="bg-imgContact hero bg-imgContact d-flex flex-column justify-content-center align-items-center">
        <div class="container text-center text-white h-100" data-aos="fade-in">
            <h1 class="h3">{{__('Clinic articles')}}</h1>
        </div>
    </div>
@if($posts->count() > 0)
    <!--news-->
        <section class="news py-md-5 py-3">
            <div class="container">
                <div class="row">
                    @foreach($posts as $key => $post)
                        <div class="col-md-3 col-6 mb-4">
                            <div data-aos="fade-right" data-aos-delay="{{$key+1}}00">
                                <div class="card card-body pb-1">
                                    <div class="d-flex justify-content-center align-items-start overflow-hidden">
                                        <a href=" {{route('news-single',$post->id)}}" class="stretched-link">
                                            <img src="{{ $post->image ? $post->image : url('front/img/img-10.png')}}"
                                                 class="card-img-top" alt="...">
                                        </a>
                                    </div>

                                    <div class="mb-3">
                                        <h5 class="card-title text-primary mt-2 mb-0">{{ Str::limit($post->title,50) }}</h5>
                                        <p class="card-text ">{{ Str::limit($post->description,75) }}</p>
                                    </div>
                                    <div class="d-flex align-items-center border-top">
                                        <div class="person-img">
                                            <img width="70"
                                                 src="{{ $post->user ? $post->user->image : url('front/img/img-10.png')}}"
                                                 alt="">
                                        </div>
                                        <div class="ps-3">
                                            <p class="mb-0">{{ $post->user ? $post->user->name : '' }}</p>
                                            <p class="mb-0">{{ \Carbon\Carbon::parse($post->created_at )->format('j F, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12 text-center pt-4">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </section>
    @else
        <h2 class="text-white round-badge-danger"> {{__('There are currently no articles')}} </h2>
    @endif
</div>
