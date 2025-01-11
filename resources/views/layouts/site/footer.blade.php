<footer class="bg-primary pt-5" id="footer">
    <div class="container">
        <div class="row align-items-center py-3">
            <div class="col-lg-2 col-md-6 text-lg-start text-center mb-2">
                <a href="#">
                    <img class="img-fluid" width="145"
                                 src="{{ ($logo = \App\Models\Setting::where('name','logo')->first()) ? url("storage/".$logo->value) : url('front/img/logo-white.png')}}"
                                 alt="">
                </a>
                <!--                <address class=" my-4 fw-bold">-->
                <!--                    <span class="mx-2"> فلسطين</span>- -->
                <!--                    <span class="mx-2"> قطاع غزة</span>- -->
                <!--                    <span class="mx-2">  مدينة غزة</span>- -->
                <!--                    <span class="mx-2"> شارع الجلاء</span>-->
                <!--                </address>-->
                <!--                <a class="nav-item nav-link fw-bold" href="tel:970594304049"> <strong class="pe-5">الهاتف</strong>:-->
                <!--                    970594304049+</a>-->
                <!--                <a class="nav-item nav-link fw-bold" href="mailto:info@ormediaco.com"><strong class="ps-1">البريد-->
                <!--                    الالكتروني</strong>: info@ormediaco.com</a>-->
            </div>
            <div class="col-lg-7 col-md-6 col-11 mx-auto footer-links mb-2">
                <ul class="nav nav-o">
                    @if($sub_menues)
                        @foreach($sub_menues as $key => $submenu)
                            <li class="nav-item fw-bold">
                                <a class="nav-link text-white" href="{{$submenu->url}}">{{$submenu->name}}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div
            class="border-top border-primary d-md-flex justify-content-md-between justify-content-center align-items-center py-3">
            <p class="mb-0 text-white text-center">{{__('All rights reserved - Best Clinic')}}</p>
            <ul class="nav justify-content-lg-start justify-content-center  text-center text-lg-start pt-4">
                <li class="nav-item">
                    <a href="{{($setting = \App\Models\Setting::where('name',"url_twitter")->first()) ? $setting->value : '#'}}"
                       target="_blank"
                       class="nav-link btn-primary w-35p h-35p d-flex justify-content-center align-items-center text-white rounded-circle mx-2"
                       title="twitter"><i class="fa-brands text-white fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{($setting = \App\Models\Setting::where('name',"url_facebook")->first()) ? $setting->value : '#'}}"
                       target="_blank"
                       class="nav-link btn-primary w-35p h-35p d-flex justify-content-center align-items-center text-white rounded-circle mx-2"
                       title="facebook"><i class="fa-brands text-white fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{($setting = \App\Models\Setting::where('name',"url_instagram")->first()) ? $setting->value : '#'}}"
                       target="_blank"
                       class="nav-link btn-primary w-35p h-35p d-flex justify-content-center align-items-center text-white rounded-circle mx-2"
                       title="instagram"><i class="fa-brands text-white fa-instagram"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{($setting = \App\Models\Setting::where('name',"url_whatsapp")->first()) ? $setting->value : '#'}}"
                       target="_blank"
                       class="nav-link btn-primary w-35p h-35p d-flex justify-content-center align-items-center text-white rounded-circle mx-2"
                       title="whatsapp"><i class="fa-brands text-white fa-whatsapp"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>

