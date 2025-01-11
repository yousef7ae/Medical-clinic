<div>
{{--    @if ($sliders->count() > 0)--}}

        <section class="maxw-1700p">
            <div class="owl-carousel owl-theme " id="slider">
{{--                @foreach ($sliders as $slider)--}}
                    <div class="item  vh-80"
                         style="background-image: url({{ /*$slider->image ? $slider->image :*/ url('front/img/base.png')}});background-size: cover;">
                        <div
                            class="h-100 d-flex justify-content-center align-items-md-center flex-column text-white box pt-md-5 px-3"
                            style="max-width: 650px">
{{--                            <h2 class="text-light fw-bold">--}}{{--{{$slider->name}}--}}{{--  عيادة BEST CLINIC </h2>--}}
{{--                            <p class="text-white-50 ">{{ Str::limit($slider->description,500) }}</p>--}}

{{--                            <ul class="nav flex-column">--}}
{{--                               <li>--}}
{{--                                   <i class="fa-regular pe-2 fa-star"></i> الدقة بالتشخيص--}}
{{--                               </li>--}}
{{--                               <li>--}}
{{--                                   <i class="fa-regular pe-2 fa-star"></i>    الخبرة بالعلاج--}}
{{--                               </li>--}}
{{--                               <li>--}}
{{--                                    <i class="fa-regular pe-2 fa-star"></i> الأولوية للمريض وخصوصيته--}}
{{--                               </li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
{{--                @endforeach--}}
            </div>
        </section>
{{--    @endif--}}
</div>

