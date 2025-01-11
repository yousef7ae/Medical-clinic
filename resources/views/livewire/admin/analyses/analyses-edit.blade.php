<form class="modal-body " method="post" wire:submit.prevent="update">
    {{csrf_field()}}


    <div class="row g-2">

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Name Patient")}}</label>
                <select wire:model.defer="analyse.patient_id"
                        class="form-control @error('analyse.patient_id') is-invalid @enderror">
                    <option value="0">{{__("Select Name Patient")}} ...</option>
                    @foreach($patients as $key => $patient)
                        <option value="{{$patient->id}}">{{ $patient->name }}</option>
                    @endforeach
                </select>
                @error('analyse.patient_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

{{--        <div class="col-6">--}}
{{--            <div class="form-group">--}}
{{--                <label class="control-label">{{__("Categories")}}</label>--}}
{{--                <select wire:model.defer="analyse.category_id"--}}
{{--                        class="form-control @error('analyse.category_id') is-invalid @enderror">--}}
{{--                    <option value="0">{{__("Select clinic")}} ...</option>--}}
{{--                    @foreach($categories as $key => $category)--}}
{{--                        <option value="{{$category->id}}">{{ $category->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @error('analyse.category_id')--}}
{{--                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div>--}}

        @if (!auth()->user()->hasRole('Doctor'))
        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("doctor")}}</label>
                <select wire:model.defer="analyse.doctor_id"
                        class="form-control @error('analyse.doctor_id') is-invalid @enderror">
                    <option value="0">{{__("Select doctor")}} ...</option>
                    @foreach($doctors as $key => $doctor)
                        <option value="{{$doctor->id}}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
                @error('analyse.doctor_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        @endif

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{ __('Name Analyse') }}</label>
                <input value="" wire:model.defer="analyse.name" placeholder="{{ __('Add Name Analyse') }}"
                       name="name"
                       class="form-control @error('analyse.name') is-invalid @enderror" type="text">
                @error('analyse.name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{ __('Number Analyse') }}</label>
                <input value="" wire:model.defer="analyse.analyse_number" placeholder="{{ __('Add Number Analyse') }}"
                       name="name"
                       class="form-control @error('analyse.analyse_number') is-invalid @enderror" type="text">
                @error('analyse.analyse_number')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Analyse Date")}}</label>
                <input wire:model.defer="analyse.analyse_date"
                       class="form-control @error('analyse.analyse_date') is-invalid @enderror" type="date">
                @error('analyse.analyse_date')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Attach (image or pdf file)') }}</label>
                <input wire:model.defer="analyse.file"
                       name="file"
                       class="form-control @error('analyse.file') is-invalid @enderror" type="file">
                @error('analyse.file')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Analyse Result') }}</label>
                <input value="" wire:model.defer="analyse.analyse_result" placeholder="{{ __('Add Analyse Result') }}"
                       name="name"
                       class="form-control @error('analyse.analyse_result') is-invalid @enderror" type="text">
                @error('analyse.analyse_result')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group col-12">
            <label for="form11">{{__("Notes")}} </label>
            <textarea class="form-control @error('analyse.notes') is-invalid @enderror " wire:model.defer="analyse.notes" placeholder="{{__("Add Notes")}}" id="form11" rows="4"></textarea>
            @error('analyse.notes')
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
    <div class="text-center mt-3">
        <button wire:loading.attr="disabled" class="btn btn-primary w-25"
                type="submit">{{__("Update")}}</button>
    </div>
</form>

