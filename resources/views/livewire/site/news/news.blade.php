<div id="news">

    @if ($posts->count() > 0)
        <section class="news py-md-5 py-3">
            <div class="container">
            <header class="text-center mb-4">
                <h2 class="title-o pb-3 position-relative">المقالات (الاخبار) </h2>
{{--                <h5 class="mx-auto w-75">تأسس بيست كلينك” على يد البروفيسور/محمد ديب عيد – استشاري جراحة التجميل بمدينة جدة عام--}}
{{--                    ٢٠٠١، كأول مركز تجميل في الممكلة العربية السعودية--}}
{{--                    لتوفير جميع الخدمات الطبية التي تختص بالتجميل والجلدية،وجراحة اليوم الواحد.</h5>--}}

            </header>
                <div class="row">
                    @foreach($posts as $key => $post)
                        <div class="col-md-3 col-6 mb-4">
                            <div data-aos="fade-right" data-aos-delay="{{$key+1}}00">
                                <div class="card card-body pb-1">
                                    <div class="d-flex justify-content-center align-items-start overflow-hidden">
                                        <a href="{{route('news-single',$post->id)}}" class="stretched-link">
                                            <img src="{{ $post->image ? $post->image : url('front/img/img-10.png')}}" class="card-img-top" alt="...">
                                        </a>
                                    </div>

                                    <div class="mb-3">
                                        <h5 class="card-title text-primary mt-2 mb-0">{{ Str::limit($post->title, 50) }}</h5>
                                        <div> {!! $post->description !!}</div>
                                    </div>
                                    <div class="d-flex align-items-center border-top">
                                        <div class="person-img">
                                            <img width="70" src="{{ $post->user ? $post->user->image : url('front/img/img-10.png')}}" alt="">
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
                        <a class="btn btn-primary px-md-5 px-3 hover" href="{{ route('news') }}">{{__('Show more')}}</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

</div>
