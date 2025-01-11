<form class="modal-body " method="post" wire:submit.prevent="update">
    {{csrf_field()}}


    <div class="row g-2">

        <div class="col-12">

            <div class="form-group">
                <label class="control-label">{{ __('Name') }}</label>
                <input value="" wire:model.defer="insurance.name" placeholder="{{ __('Add Name') }}"
                       name="name"
                       class="form-control @error('insurance.name') is-invalid @enderror" type="text">
                @error('insurance.name')
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

