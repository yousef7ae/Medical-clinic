<form class="modal-body" method="post" wire:submit.prevent="store">
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
                        <img width="200" class="img-fluid rounded"
                             src="{{ empty(['image']) ? url(empty(['image'])) : url('dashboard/img/image1.png')}}"
                             data-holder-rendered="true">
                    @endif
                </div>

                <div class="d-table p-1 m-auto uniform-uploader">
                    <input type="file" wire:model.defer="imageTemp"
                           class="form-input-styled form-control submit @error('imageTemp ') is-invalid @enderror"
                           data-fouc=""
                    >
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
                <input value="" wire:model.defer="ad.title" placeholder="{{ __('Add Title') }}"
                       name="title"
                       class="form-control @error('ad.title') is-invalid @enderror" type="text">
                @error('ad.title')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

            </div>

            <div class="form-group" wire:ignore>
                <label class="control-label">{{ __('Description') }}</label>
                <textarea rows="5" value="" wire:model.defer="ad.description" placeholder="{{ __('Add Description') }}"
                          id="description" data-description="@this"    name="description"
                          class="form-control editor @error('ad.description') is-invalid @enderror"
                          ></textarea>
                @error('ad.description')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

            </div>

                <div class="form-group">
                    <label class="control-label">{{__("Date")}}</label>
                    <input value="" wire:model.defer="ad.date" class="form-control @error('ad.date') is-invalid @enderror" type="date">

                    @error('ad.date')
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
    <div class="text-center mt-3">
        <button wire:loading.attr="disabled" class="btn btn-primary w-25"
                type="submit">{{__("Store")}}</button>
    </div>
</form>

