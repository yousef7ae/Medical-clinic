<div>

    <!--slider-->
    @livewire('site.sliders')

    <!-- About -->
    @livewire('site.about')

    <!--statistics-->
{{--@livewire('site.statistics.statistics')--}}

<!--services-->
    @livewire('site.services.services')

    <!--categories-->
    @livewire('site.categories.categories')

    <!--doctors -->
    {{-- @livewire('site.doctors.doctors') --}}

    <!--news-->
    @livewire('site.news.news')

    <!--newsletter-->
    @livewire('site.subscribe-newsletter')

    <!-- Contact Section -->
    @livewire('site.contacts')

    @if($ad)
        <div class="modal modal-lg fade" wire:ignore.self id="CreateAD" tabindex="-1" aria-labelledby="CreateADLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="row g-0">
                            @livewire('site.ads')
                            <div class="col-md-8 p-3">
                                <button type="button" class="btn-close-o btn float-end" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="fa-solid fa-xmark"></i>
                                </button>
                                <h5 class="border-bottom text-center text-primary pb-2">{{__('Book a consultation')}}</h5>
                                @livewire('site.ads-create', ['ad_id' => $ad->id])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

{{--@section('js_code')--}}

{{--    <script type="text/javascript">--}}
{{--        $(window).on('load', function () {--}}
{{--            $('#CreateAD').modal('show');--}}
{{--        });--}}
{{--    </script>--}}

{{--@endsection--}}
