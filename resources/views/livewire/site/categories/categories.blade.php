<div  id="sections">
    @if ($categories->count() > 0)
        <section class="partners py-5">
            <div class="container">
            <header class="text-center mb-4">
                <h2 class="title-o pb-3 position-relative">{{__('Medical departments')}} </h2>
{{--                <h5 class="mx-auto w-75">تأسس بيست كلينك” على يد البروفيسور/محمد ديب عيد – استشاري جراحة التجميل بمدينة--}}
{{--                    جدة عام--}}
{{--                    ٢٠٠١، كأول مركز تجميل في الممكلة العربية السعودية--}}
{{--                    لتوفير جميع الخدمات الطبية التي تختص بالتجميل والجلدية،وجراحة اليوم الواحد.</h5>--}}
            </header>

                <div class="owl-carousel owl-theme" id="partners">
                    @foreach ($categories as $category)
                            <div class="item mb-4">
                                <div data-aos="fade-right" data-aos-delay="100">
                                    <div class="card border-0 shadow text-center overflow-hidden">
                                        <div
                                            class="h-160p d-flex justify-content-center align-items-center overflow-hidden">
                                            <img
                                                src="{{ $category->image ? $category->image : url('front/img/img-4.jpg')}}"
                                                class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{-- <a class="stretched-link" href="{{ route('categories-single', $category->id) }}">{{$category->name}}
                                                </a> --}}
                                                <a class="stretched-link" href="#">{{$category->name}}
                                                </a>
                                            </h5>
                                            {{--                                    <a href="#" class="btn stretched-link">قراءة المزيد</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>
