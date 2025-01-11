<form class="modal-body " method="post" wire:submit.prevent="update">
    {{csrf_field()}}


    <div class="row g-2">

        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{__("Name Patient")}}</label>
                <select wire:model.defer="consultation.patient_id"
                        class="form-control @error('consultation.patient_id') is-invalid @enderror">
                    <option value="0">{{__("Select Name Patient")}} ...</option>
                    @foreach($patients as $key => $patient)
                        <option value="{{$patient->id}}">{{ $patient->name }}</option>
                    @endforeach
                </select>
                @error('consultation.patient_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Categories")}}</label>
                <select wire:model.defer="consultation.category_id"
                        class="form-control @error('consultation.category_id') is-invalid @enderror">
                    <option value="0">{{__("Select clinic")}} ...</option>
                    @foreach($categories as $key => $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('consultation.category_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        @if (!auth()->user()->hasRole('Doctor'))
        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("doctor")}}</label>
                <select wire:model.defer="consultation.doctor_id"
                        class="form-control @error('consultation.doctor_id') is-invalid @enderror">
                    <option value="0">{{__("Select doctor")}} ...</option>
                    @foreach($doctors as $key => $doctor)
                        <option value="{{$doctor->id}}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
                @error('consultation.doctor_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        @endif

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Consultation Type")}}</label>
                <select wire:model.defer="consultation.type"
                        class="form-control @error('consultation.type') is-invalid @enderror">
                    <option value="0">{{__("Select")}} ...</option>
                    @foreach(\App\Models\Consultation::typeList(false) as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                @error('consultation.type')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{ __('Disease') }}</label>
                <input value="" wire:model.defer="consultation.disease" placeholder="{{ __('Add Disease') }}"
                       name="disease"
                       class="form-control @error('consultation.disease') is-invalid @enderror" type="text">
                @error('consultation.disease')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{ __('Other Medication') }}</label>
                <input value="" wire:model.defer="consultation.other_medication" placeholder="{{ __('Add Other Medication') }}"
                       name="disease"
                       class="form-control @error('consultation.other_medication') is-invalid @enderror" type="text">
                @error('consultation.other_medication')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Drug Allergies")}}</label>
                <select wire:model.defer="consultation.drug_allergies"
                        class="form-control @error('consultation.drug_allergies') is-invalid @enderror">
                    <option value=>{{__("Select")}}</option>
                    <option value="1">{{__("Yes")}}</option>
                    <option value="0">{{__("No")}}</option>
                </select>
                @error('consultation.drug_allergies')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Booking Date")}}</label>
                <input wire:model.defer="consultation.date"
                       class="form-control @error('consultation.date') is-invalid @enderror" type="date">
                @error('consultation.date')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{ __('Amount') }}</label>
                <input value="" wire:model.defer="consultation.amount"
                       placeholder="{{ __('Add Amount') }}"
                       name="amount"
                       class="form-control @error('consultation.amount') is-invalid @enderror" type="number">
                @error('consultation.amount')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group col-12">
            <label for="form11">{{__("Notes")}} </label>
            <textarea class="form-control @error('consultation.notes') is-invalid @enderror "
                      wire:model.defer="consultation.notes" placeholder="{{__("Add Notes")}}" id="form11"
                      rows="4"></textarea>
            @error('consultation.notes')
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

