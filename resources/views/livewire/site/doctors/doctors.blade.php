<div id="team">
    {{-- @if ($doctors->count() > 0) --}}
        <section class="partners py-md-5 py-3 bg-white">
            <div class="container">
                <header class="text-center mb-4">
                    <h2 class="title-o pb-3 position-relative">{{__('Meet the Best Clinic family')}}</h2>
                    <h5 class="mx-auto w-75">{{__('We are proud of Best Clinic s staff of the most qualified doctors specializing in the field of male health
                         And urology, who are ready to serve you and provide advice, with more than ten years of experience.
                         Their history is full of successful operations.')}}</h5>
                </header>

                <div class="owl-carousel owl-theme" id="partners3">
                    <div class="item mb-4">
                        <div data-aos="fade-right" data-aos-delay="0">
                            <div class="card border-0 text-center">
                                <div class="h-260p d-flex justify-content-center align-items-start overflow-hidden">
                                    <img src="{{ asset('front/img/image1.jpg') }}" class="card-img-top" alt="...">
                                </div>

                                <div class="card-body box-o shadow">
                                    <h5 class="card-title">{{__('Dr. Murad Al-Hammouri')}}</h5>
                                    <p>
                                        {{__('Board in Urology
                                         Treating diseases, disorders and infections
                                         And benign and malignant tumors in
                                         Male reproductive organs and kidneys.')}}

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item mb-4">
                        <div data-aos="fade-right" data-aos-delay="0">
                            <div class="card border-0 text-center">
                                <div class="h-260p d-flex justify-content-center align-items-start overflow-hidden">
                                    <img src="{{ asset('front/img/image2.jpg') }}" class="card-img-top" alt="...">
                                </div>

                                <div class="card-body box-o shadow">
                                    <h5 class="card-title"> {{__('Dr. Maan Ashqir')}}</h5>
                                    <p>
                                        {{__('Palestinian Board of Internal Medicine
                                         He previously worked at the National Government Hospital
                                         Follow up and treat diabetes, high blood pressure and heart diseases')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- @foreach ($doctors as $doctor)
                        <div class="item mb-4">
                            <div data-aos="fade-right" data-aos-delay="0">
                                <div class="card border-0 text-center">
                                    <div class="h-260p d-flex justify-content-center align-items-start overflow-hidden">
                                        <img src="{{ $doctor->image ? $doctor->image : url('front/img/doc.png') }}"
                                            class="card-img-top" alt="...">
                                    </div>

                                    <div class="card-body box-o shadow">
                                        <h5 class="card-title">{{ $doctor->name }}</h5>
                                        @if ($doctor->category)
                                            <p>{{ $doctor->category->name }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </section>
    {{-- @endif --}}
</div>
