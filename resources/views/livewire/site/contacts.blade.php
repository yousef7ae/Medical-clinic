<div id="connect">
    <section class="contact py-5">

        <div class="container" data-aos="fade-up" wire:ignore.self>
            <header class="text-center mb-4" wire:ignore>
                <h2 class="title-o pb-3 position-relative">{{ __('Connect with us') }} </h2>
                <h5 class="mx-auto w-75">{{ __('Welcome to Best Clinic') }}</h5>
                {{--                <h5 class="mx-auto w-75">{{($setting = \App\Models\Setting::where('name',"description")->first()) ? $setting->value : 'الوصف فارغ'}}</h5> --}}
            </header>

            <div class="row mt-5">
                <div class="col-lg-4" wire:ignore>
                    <div class="info">
                        <div class="mb-2 bg-white d-flex align-items-center p-2 shadow-sm rounded-2"
                            data-aos="zoom-out-left" data-aos-delay="400">
                            <i class="fa-solid fa-phone fs-3 text-primary"></i>
                            <div class="ps-3">
                                <h5 class="text-primary">{{ __('Mobile number') }} </h5>
                                <p class="mb-0">
                                    {{ ($setting = \App\Models\Setting::where('name', 'mobile')->first()) ? $setting->value : __('The mobile is empty') }}
                                </p>
                            </div>
                        </div>
                        <div class="mb-2 bg-white d-flex align-items-center p-2 shadow-sm rounded-2"
                            data-aos="zoom-out-left" data-aos-delay="800">
                            <i class="fa-solid fa-envelope fs-3 text-primary"></i>
                            <div class="ps-3">
                                <h5 class="text-primary">{{ __('E-mail address') }} </h5>
                                <p class="mb-0">
                                    {{ ($setting = \App\Models\Setting::where('name', 'email')->first()) ? $setting->value : __('Email is empty')  }}
                                </p>
                            </div>
                        </div>
                        <div class="mb-2 bg-white d-flex align-items-center p-2 shadow-sm rounded-2"
                            data-aos="zoom-out-left" data-aos-delay="1200">
                            <i class="fa-solid fa-fax fs-3 text-primary"></i>
                            <div class="ps-3">
                                <h5 class="text-primary">{{ __('Phone number') }}</h5>
                                <p class="mb-0">
                                    {{ ($setting = \App\Models\Setting::where('name', 'phone')->first()) ? $setting->value : __('The phone is empty') }}
                                </p>
                            </div>
                        </div>
                        <div class="mb-2 bg-white d-flex align-items-center p-2 shadow-sm rounded-2"
                            data-aos="zoom-out-left" data-aos-delay="1400">
                            <i class="fa-solid fa-location-dot fs-3 text-primary"></i>
                            <div class="ps-3">
                                <h5 class="text-primary">{{ __('The address') }}</h5>
                                <p class="mb-0">
                                    {{ ($setting = \App\Models\Setting::where('name', 'address')->first()) ? $setting->value : __('The address is empty') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1" wire:ignore.self>
                    <form class="php-email-form" wire:submit.prevent="store" method="post">
                        <div class="row">
                            <div class="col-md-12 mb-3 form-group">
                                <input type="text" wire:model.defer="contact.name"
                                    class="form-control @error('contact.name') is-invalid @enderror rounded-2 "
                                    placeholder="{{ __('Full name here') }}">
                                @error('contact.name')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <input type="email" wire:model.defer="contact.email"
                                    class="form-control @error('contact.email') is-invalid @enderror rounded-2 "
                                    placeholder="{{ __('E-mail') }}">
                                @error('contact.email')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <input type="text" wire:model.defer="contact.mobile"
                                    class="form-control @error('contact.mobile') is-invalid @enderror rounded-2 "
                                    placeholder="{{ __('Mobile') }}">
                                @error('contact.mobile')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group mb-3">
                            <input type="text" wire:model.defer="contact.subject"
                                class="form-control @error('contact.subject') is-invalid @enderror rounded-2 "
                                placeholder="{{ __('The subject') }}">
                            @error('contact.subject')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <textarea class="form-control @error('contact.message') is-invalid @enderror rounded-2 "
                                wire:model.defer="contact.message" rows="6" placeholder="{{ __('The message') }}"></textarea>
                            @error('contact.message')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary px-md-5 px-3 hover" wire:loading.attr="disabled"
                                type="submit">
                                {{ __('Send') }}
                            </button>
                        </div>
                        <div>
                            <div wire:loading>
                                <i class="fas fa-sync fa-spin"></i>
                                {{ __('Loading please wait') }} ...
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
