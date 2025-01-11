<div id="about">
    @if ($page )
        <section class="about py-5 bg-white">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-5 rounded-3 overflow-hidden"
                         style="background: url({{ $page->image ? $page->image : url('front/img/img-2.jpg')}}) center center no-repeat;background-size: cover">

                        @if (!empty($page->url))
                            <div
                                class="video-box d-flex justify-content-center align-items-stretch position-relative h-100">
                                <a href="{{$page->url}} " data-fancybox="video1"
                                   class="stretched-link mb-4"><span class="play-btn"></span></a>
                            </div>
                        @endif

                    </div>
                    <div class="col-lg-7">
                        <div class="content d-flex flex-column justify-content-center">
                            <div class="py-md-5" data-aos="fade-up-right" data-aos-delay="900">
{{--                                <h5 class="text-primary">25+ سنة من الخبرة</h5>--}}
                                <h2 class="fw-bold">
                                    {{$page->title}}
                                </h2>
                                <p> {{ nl2br($page->description) }} </p>

                            </div>
                        </div>
                        <!-- End .content-->
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="py-5">
        <div class="container">
            <div class="row ">
                <div class="col-lg-7">
                    <div class="content d-flex flex-column justify-content-center">
                        <div class="py-md-5" data-aos="fade-up-right" data-aos-delay="900">
                            <h4 class="fw-bold">{{__('Linear wave therapy')}}</h4>
                            <p>{{__('For the first time in Palestine, we provide in the clinic the Morenova device from the Direx group, which is considered a revolution
                                 Technology
                                 Medical in the world of male health, and the new and best generation of Renova wave therapy device
                                 Linearity, it is characterized
                                 It distributes the waves to all vessels and tissues completely with higher frequencies to ensure blood flow
                                 Naturally
                                 In the penis, and regaining automatic response to stimuli during marital relations')}} </p>
                            <h4 class="fw-bold">{{__('A definitive treatment for erectile dysfunction without')}}<br>{{__('Surgery and without medications')}}</h4>
                            <p>{{__('The duration of the treatment session is short and does not require anesthesia or painkillers. The blood vessels are expanded and the tissues of the penis are regenerated, so that blood flow returns to its previous level, and you can complete your day normally immediately after the session ends.')}}</p>


                            <h4 class="fw-bold"> {{__('What is the success rate of treatment for erectile dysfunction?')}}</h4>
                            <p> {{__('A very high percentage of men of all ages, and its effect extends for years after the end of the last session.')}} </p>

                        </div>
                    </div>
                    <!-- End .content-->
                </div>

                <div class="col-lg-5 rounded-3 overflow-hidden"
                     style="background: url({{ 'front/img/11.png'}}) center center no-repeat;background-size: cover">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8">
                    <div class="content d-flex flex-column justify-content-center">
                        <div class="py-md-5" data-aos="fade-up-right" data-aos-delay="900">
                            <h4 class="fw-bold">{{__('Advantages of the revolutionary treatment for erectile dysfunction')}}</h4>
                            <p class="d-flex"><i class="fa-solid fa-check pe-2"></i>
                                {{__('The treatment is approved and licensed by the European Urological Association, the Ministry of Health, the Ministry of Health and the FDA
                                                                 United States of America')}}
                            </p>
                            <p class="d-flex"><i class="fa-solid fa-check pe-2"></i>
                                {{__('Radical treatment treats the cause and not the symptoms like other treatments')}}
                            </p>
                            <p class="d-flex"><i class="fa-solid fa-check pe-2"></i>
                                {{__('The therapeutic effect lasts for a very long time to enjoy a normal marital relationship')}}
                            </p>
                            <p class="d-flex"><i class="fa-solid fa-check pe-2"></i>
                                {{__('The treatment is free of any side effects in the short or long term')}}
                            </p>
                            <p class="d-flex"><i class="fa-solid fa-check pe-2"></i>
                                {{__('The treatment is suitable for men of all ages')}}
                            </p>
                            <p class="d-flex"><i class="fa-solid fa-check pe-2"></i>
                                {{__('There is no need for pills or advance planning before marital relations because the treatment restores the automatic response
                                                                 Natural')}}
                            </p>
                            <p class="d-flex"><i class="fa-solid fa-check pe-2"></i>
                                {{__('There is no risk for men with health conditions that preclude other treatments')}}
                            </p>
                        </div>
                    </div>
                    <!-- End .content-->
                </div>

                <div class="col-lg-4 rounded-3 overflow-hidden"
                     style="background: url({{ 'front/img/img-12.png'}}) center center no-repeat;background-size: cover">
                </div>
            </div>
        </div>
    </section>

</div>
