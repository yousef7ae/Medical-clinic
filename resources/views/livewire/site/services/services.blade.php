<div id="services">
{{--    @if ($services->count() > 0)--}}
{{--        <section id="services" class="services overflow-hidden py-md-5">--}}
{{--            <div class="container">--}}
{{--                <div class="row my-3">--}}
{{--                    <div class="col-md-4 align-self-center">--}}
{{--                        <div class="section-title">--}}
{{--                            <h3 class="text-white">--}}
{{--                                {{ $page ? $page->title : 'خدماتنا' }}--}}
{{--                            </h3>--}}
{{--                            <p class="fs-6 text-white">{{ $page ? $page->description : 'خدماتنا' }}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    @foreach ($services as $service)--}}
{{--                        <div class="col-md-4 col-sm-6 col-10 mx-auto my-3 mb-lg-0 mb-5">--}}
{{--                            <div class="h-100" data-aos="fade-right" data-aos-delay="0">--}}
{{--                                <div class="card border-white bg-transparent text-center h-100">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="icon mb-3">--}}
{{--                                            <img width="70"--}}
{{--                                                 src="{{ $service->image ? $service->image : url('front/img/icon-5.png')}}"--}}
{{--                                                 class="img-fluid" alt="">--}}
{{--                                        </div>--}}
{{--                                        <h4 class="title text-white">{{$service->title}}</h4>--}}
{{--                                        <p class="description text-white">{{$service->description}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    @endif--}}

    <section class="py-5">
        <div class="container">
            <header class="text-center mb-4">
                <h2 class="title-o pb-3 position-relative">{{__('Causes of impotence')}} </h2>
            </header>
            <div class="row py-4 align-items-center">
                <div class="col-md-4 order-md-1 order-2">
                    <div class="">
                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #60C9C4; color: #60C9C4">1</span>
                            <p class="mb-0 p-2"> {{__('Metabolic diseases (diabetes, high blood pressure, obesity, cholesterol')}}
                              </p>
                        </div>
                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #69787D; color: #69787D">2</span>
                            <p class="mb-0 p-2">{{__('Nervous system problems')}} </p>
                        </div>
                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #F7612C; color: #F7612C">3</span>
                            <p class="mb-0 p-2">{{__('Previous injuries and operations')}} </p>
                        </div>
                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #DC408A; color: #DC408A">4</span>
                            <p class="mb-0 p-2">
                                {{__('Alcohol and drug addiction')}}
                            </p>
                        </div>
                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #53BCE9; color: #53BCE9">5</span>
                            <p class="mb-0 p-2">
                                {{__('Alcohol and drug addiction')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-9 mx-auto order-md-2 order-1 mb-3">
                    <div class="position-relative px-md-5">
                        <img class="w-100" src="{{asset('front/img/img-gg.png')}}" alt="">
                        <h4 class="text-center position-absolute top-50 right-50 fw-bold"> {{__('Organic reasons')}}<br> {{__('And physical')}}</h4>
                    </div>
                </div>
                <div class="col-md-4 order-md-3 order-3">
                    <div class="">
                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #507AB4; color: #507AB4">6</span>
                            <p class="mb-0 p-2"> {{__('Vascular blockage')}}</p>
                        </div>

                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #FFAA01; color: #FFAA01">7</span>
                            <p class="mb-0 p-2">{{__('Problems with the structure of the penis')}}</p>
                        </div>

                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #F7612C; color: #F7612C">8</span>
                            <p class="mb-0 p-2">{{__('Harmful effects of smoking')}}</p>
                        </div>

                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #60C9C4; color: #60C9C4">9</span>
                            <p class="mb-0 p-2">{{__('Getting older')}}</p>
                        </div>

                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #DC408A; color: #DC408A">10</span>
                            <p class="mb-0 p-2"><br>{{__('Complications of some medications')}} </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center py-4 border-top">
                <div class="col-md-4 order-md-1 order-2">
                    <div class="">
                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #60C9C4; color: #60C9C4">1</span>
                            <p class="mb-0 p-2">{{__('Depression')}}</p>
                        </div>
                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #69787D; color: #69787D">2</span>
                            <p class="mb-0 p-2">{{__('Anxiety')}}</p>
                        </div>
                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #F7612C; color: #F7612C">3</span>
                            <p class="mb-0 p-2">{{__('Pressures')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-9 mx-auto order-md-2 order-1 mb-3">
                    <div class="position-relative px-md-5">
                        <img class="w-100" src="{{asset('front/img/img-gg.png')}}" alt="">
                        <h4 class="text-center position-absolute top-50 right-50 fw-bold">أسباب عقلية<br>ونفسية</h4>
                    </div>
                </div>
                <div class="col-md-4 order-md-3 order-3">
                    <div class="">
                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #507AB4; color: #507AB4">4</span>
                            <p class="mb-0 p-2">{{__('Incompatibility with the partner')}}</p>
                        </div>

                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #FFAA01; color: #FFAA01">5</span>
                            <p class="mb-0 p-2">{{__('The surrounding environment')}}</p>
                        </div>

                        <div class="border cont rounded-pill mb-2 bg-white" data-aos="zoom-out-lefs" data-aos-delay="0">
                            <span style="border-color: #F7612C; color: #F7612C">6</span>
                            <p class="mb-0 p-2">{{__('Personality traits')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 trip">
        <div class="container">
            <header class="text-center mb-4">
                <h2 class="title-o pb-3 position-relative">{{__('Treatment journey at Best Clinic')}} </h2>
            </header>
            <div class="row">
                <div class="col-md-4 box">
                    <div class="item flex-column p-5 text-center">
                        <h3 class="text-danger">{{__('01 First stage')}} </h3>
                        <h6 class="fw-bold">{{__('Accurate consultation and diagnosis')}}</h6>
                        <p>{{__('It is ensured that all comprehensive examinations are completed before the final diagnosis is made to accurately determine the cause and solve the problem from its roots, such as physical examination, urine tests, blood tests, and ultrasound.')}} </p>
                    </div>
                </div>
                <div class="col-md-4 box">
                    <div class="item flex-column p-5 text-center">
                        <h3 class="text-primary">{{__('02 The second stage')}}</h3>
                        <h6 class="fw-bold">{{__('Treatment takes a number of sessions depending on the case')}}</h6>
                        <p>
                            {{__('After an accurate diagnosis, the observing physician determines the appropriate number of sessions for the case, and monitors the case’s response to treatment and its effectiveness')}}
                        </p>
                    </div>
                </div>
                <div class="col-md-4 box">
                    <div class="item flex-column p-5 text-center">
                        <h3 style="color: #FF0676">{{__('03 The third stage')}} </h3>
                        <h6 class="fw-bold">{{__('Follow up with the case and ensure the effectiveness of the treatment')}}</h6>
                        <p>
                            {{__('Finally, the case is followed up to ensure that the success and results of the treatment are maintained for as long as possible')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
