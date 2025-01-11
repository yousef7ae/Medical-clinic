<div style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
    <div class="col-md-8 p-6">
        <h5 class="border-bottom text-center text-primary pb-2">{{__('Book a consultation')}}</h5>
        <form class="row g-3" method="post" wire:submit.prevent="store">
            {{csrf_field()}}

            <div class="col-md-12">
                <div class="form-group">
                    <label for="Name-o" class="control-label mb-1">{{ __('Name') }}</label>
                    <input id="Name-o" value="" wire:model.defer="applicant.name"
                           placeholder="{{ __('Add Name') }}"
                           name="name"
                           class="form-control @error('applicant.name') is-invalid @enderror" type="text">
                    @error('applicant.name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label mb-1">{{__("Mobile")}}</label>
                    <input wire:model.defer="applicant.mobile" placeholder="{{__("Add Mobile")}}"

                           class="form-control @error('applicant.mobile') is-invalid @enderror" type="number">
                    @error('applicant.mobile')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label mb-1">{{__("Email")}} ({{ __('Optional') }})</label>
                    <input wire:model.defer="applicant.email" placeholder="{{__("Add Email")}}"
                           class="form-control @error('applicant.email') is-invalid @enderror" type="email">
                    @error('applicant.email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label mb-1">{{__("Categories")}}</label>
                    <select wire:model.defer="applicant.category_id"
                            class="form-control @error('applicant.category_id') is-invalid @enderror">
                        <option value="0">{{__("Select")}} ...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('applicant.category_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label mb-1">{{ __('Notes') }}</label>
                    <textarea rows="5" value="" wire:model.defer="applicant.description"
                              placeholder="{{ __('Add Notes') }}"
                              id="description" data-description="@this" name="description"
                              class="form-control editor @error('applicant.description') is-invalid @enderror"
                    ></textarea>
                    @error('applicant.description')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div>
                <div wire:loading>
                    <i class="fas fa-sync fa-spin"></i>
                    {{__("Loading please wait")}} ...
                </div>
            </div>

            <div class="col-12 text-center">
                <button type="submit" wire:loading.attr="disabled"
                        class="btn px-md-5 btn-primary mb-3">{{ __('Book your appointment') }}</button>
            </div>
        </form>
    </div>
</div>
