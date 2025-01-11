<form class="mt-2" method="post" wire:submit.prevent="update">
    {{csrf_field()}}


    <div class="row g-2">

        <div class="col-md-12">
            <div class="form-group">
                <div class="card d-table p-1 m-auto">
                    @if($imageTemp)
                        <img width="150" class="img-fluid rounded"
                             src="{{ $imageTemp->temporaryUrl() }}"
                             data-holder-rendered="true">

                    @else
                        @if(!empty($service['image']))
                            <img width="200" class="img-fluid rounded"
                                 src="{{ $service['image']}}"
                                 data-holder-rendered="true">
                        @endif

                    @endif
                </div>

                <div class="d-table p-1 m-auto uniform-uploader">
                    <input type="file" wire:model.defer="imageTemp"
                           class="form-input-styled form-control submit2 @error('imageTemp ') is-invalid @enderror"
                           data-fouc=""
                    >
                    <span class="filename" >{{__("File Image ")}}</span>
                    @error('imageTemp')
                    <span class="invalid-feedback"
                          role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                </div>
            </div>
        </div>

    </div>

    <div class="row g-2">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">{{ __('Title') }}</label>
                <input value="" wire:model.defer="service.title" placeholder="{{ __('Add Title') }}"
                       name="title"
                       class="form-control @error('service.title') is-invalid @enderror" type="text">
                @error('service.title')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

            </div>


{{--            <div class="form-group">--}}
{{--                <label class="control-label">{{ __('Slug') }}</label>--}}
{{--                <input value="" wire:model.defer="service.slug" placeholder="{{ __('Add Slug') }}" name="slug"--}}
{{--                       class="form-control @error('service.slug') is-invalid @enderror" type="text">--}}
{{--                @error('service.slug')--}}
{{--                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                @enderror--}}
{{--            </div>--}}


            <div class="form-group" wire:ignore>
                <label class="control-label">{{ __('Description') }}</label>
                <textarea rows="5" value="" wire:model.defer="service.description" placeholder="{{ __('Add Description') }}"
                          id="description2" data-description2="@this"    name="description2"
                          class="form-control editor @error('service.description') is-invalid @enderror"
                          ></textarea>
                @error('service.description')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

            </div>



        </div>
    </div>

    <div>
        <div wire:loading>
            <i class="fas fa-sync fa-spin"></i>
            {{__("Loading please wait")}} ...
        </div>
    </div>
    <div class="text-center mt-3 mb-3">
        <button wire:loading.attr="disabled" class="btn btn-primary w-25"
                type="submit">{{__("Update")}}</button>
    </div>
</form>

