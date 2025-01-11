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
                        @if(!empty($statistic['image']))
                            <img width="200" class="img-fluid rounded"
                                 src="{{ $statistic['image']}}"
                                 data-holder-rendered="true">
                        @endif

                    @endif
                </div>

                <div class="d-table p-1 m-auto uniform-uploader">
                    <input type="file" wire:model.defer="imageTemp"
                           class="form-input-styled form-control @error('imageTemp ') is-invalid @enderror"
                           data-fouc=""
                    >
                    <span class="filename">{{__("File Image ")}}</span>
                    @error('imageTemp')
                    <span class="invalid-feedback"
                          role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                </div>
            </div>
        </div>

    </div>

    <div class="row g-2">

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ __('Name') }}</label>
                <input value="" wire:model.defer="statistic.name" placeholder="{{ __('Add Name') }}"
                       name="name"
                       class="form-control @error('statistic.name') is-invalid @enderror" type="text">
                @error('statistic.name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">{{ __('Value') }}</label>
                <input value="" wire:model.defer="statistic.value" placeholder="{{ __('Add Value') }}"
                       name="value"
                       class="form-control @error('statistic.value') is-invalid @enderror" type="number">
                @error('statistic.value')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">{{ __('Description') }}</label>
                <textarea rows="5" value="" wire:model.defer="statistic.description"
                          placeholder="{{ __('Add Description') }}"
                          id="description" data-description="@this" name="description"
                          class="form-control editor @error('statistic.description') is-invalid @enderror"
                          ></textarea>
                @error('statistic.description')
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
                type="submit">{{__("Update")}}</button>
    </div>
</form>

