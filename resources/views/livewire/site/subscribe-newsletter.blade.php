<section class="py-0">
    <div class="footer-newsletter">
        <div class="container" wire:ignore>
            <div class="row">
                <div class="col-md-6 mx-auto" wire:ignore.self >
                    <div data-aos="flip-down">
                        <h4>{{ $page ? $page->title : __('Best Clinic for Medical Services')  }}</h4>
                        <p class="text-white">{{ $page ? $page->description : __('Subscribe now') }}</p>
                        <form class="py-3" method="post" wire:submit.prevent="store" >

                            <input type="email" wire:model.defer="user.email" class="bg-transparent @error('user.email') is-invalid @enderror" name="email"
                                   placeholder="{{__('Enter your e-mail address')}}">

                            <div wire:loading class="text-dark mt-2">
                                <i class="fas fa-sync fa-spin text-danger"></i>
                                {{__("Loading please wait")}} ...
                            </div>

                            @error('user.email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <button type="submit" class="subscribe"
                                    wire:loading.attr="disabled" value="{{__('Subscription')}}">{{__('Subscription')}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
