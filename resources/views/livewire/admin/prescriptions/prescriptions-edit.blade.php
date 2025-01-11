<form class="modal-body " method="post" wire:submit.prevent="update">
    {{csrf_field()}}


    <div class="row g-2">

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Name Patient")}}</label>
                <select wire:model.defer="prescription.patient_id"
                        class="form-control @error('prescription.patient_id') is-invalid @enderror">
                    <option value="0">{{__("Select Name Patient")}} ...</option>
                    @foreach($patients as $key => $patient)
                        <option value="{{$patient->id}}">{{ $patient->name }}</option>
                    @endforeach
                </select>
                @error('prescription.patient_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

{{--        <div class="col-6">--}}
{{--            <div class="form-group">--}}
{{--                <label class="control-label">{{__("Categories")}}</label>--}}
{{--                <select wire:model.defer="prescription.category_id"--}}
{{--                        class="form-control @error('prescription.category_id') is-invalid @enderror">--}}
{{--                    <option value="0">{{__("Select clinic")}} ...</option>--}}
{{--                    @foreach($categories as $key => $category)--}}
{{--                        <option value="{{$category->id}}">{{ $category->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @error('prescription.category_id')--}}
{{--                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div>--}}

        @if (!auth()->user()->hasRole('Doctor'))
        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("doctor")}}</label>
                <select wire:model.defer="prescription.doctor_id"
                        class="form-control @error('prescription.doctor_id') is-invalid @enderror">
                    <option value="0">{{__("Select doctor")}} ...</option>
                    @foreach($doctors as $key => $doctor)
                        <option value="{{$doctor->id}}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
                @error('prescription.doctor_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        @endif

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{ __('Name Drug') }}</label>
                <input value="" wire:model.defer="prescription.name_drug" placeholder="{{ __('Add Name Drug') }}"
                       name="name_drug"
                       class="form-control @error('prescription.name_drug') is-invalid @enderror" type="text">
                @error('prescription.name_drug')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>


        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Number Drug")}}</label>
                <input wire:model.defer="prescription.number_drug" placeholder="{{__("Add Number Drug")}}"
                       class="form-control @error('prescription.number_drug') is-invalid @enderror" type="text">
                @error('prescription.number_drug')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Medicine Dose")}}</label>
                <input wire:model.defer="prescription.medicine_dose" placeholder="{{__("Add Medicine Dose")}}"
                       class="form-control @error('prescription.medicine_dose') is-invalid @enderror" type="text">
                @error('prescription.medicine_dose')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Medicine Unit")}}</label>
                <input wire:model.defer="prescription.medicine_unit" placeholder="{{__("Add Medicine Unit")}}"
                       class="form-control @error('prescription.medicine_unit') is-invalid @enderror" type="text">
                @error('prescription.medicine_unit')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

    {{--        <div class="col-6">--}}
    {{--            <div class="form-group">--}}
    {{--                <label class="control-label">{{ __('Medicine Take Method') }}</label>--}}
    {{--                <input value="" wire:model.defer="prescription.take_method" placeholder="{{ __('Add Medicine Take Method') }}"--}}
    {{--                       name="take_method"--}}
    {{--                       class="form-control @error('prescription.take_method') is-invalid @enderror" type="text">--}}
    {{--                @error('prescription.take_method')--}}
    {{--                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
    {{--                @enderror--}}
    {{--            </div>--}}
    {{--        </div>--}}



        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Medicine Take Method")}}</label>
                <select wire:model.defer="prescription.take_method"
                        class="form-control @error('prescription.take_method') is-invalid @enderror">
                    <option value="0">{{__("Select Take Method")}} ...</option>
                    @foreach(\App\Models\Prescription::take_methods_list() as  $item)
                        <option value="{{$item}}">{{ $item }}</option>
                    @endforeach
                </select>
                @error('prescription.take_method')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>


        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Dosing Frequency")}}</label>
                <select wire:model.defer="prescription.dosing_frequency"
                        class="form-control @error('prescription.dosing_frequency') is-invalid @enderror">
                    <option value="0">{{__("Select Dosing Frequency")}} ...</option>
                    @foreach(\App\Models\Prescription::dosing_frequencies_list() as  $item)
                        <option value="{{$item}}">{{ $item }}</option>
                    @endforeach
                </select>
                @error('prescription.dosing_frequency')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>




{{--        <div class="col-6">--}}
{{--            <div class="form-group">--}}
{{--                <label class="control-label">{{ __('Dosing Frequency') }}</label>--}}
{{--                <input value="" wire:model.defer="prescription.dosing_frequency" placeholder="{{ __('Add Dosing Frequency') }}"--}}
{{--                       name="dosing_frequency"--}}
{{--                       class="form-control @error('prescription.dosing_frequency') is-invalid @enderror" type="text">--}}
{{--                @error('prescription.dosing_frequency')--}}
{{--                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Digital number")}}</label>
                <select wire:model.defer="prescription.number"
                        class="form-control @error('prescription.number') is-invalid @enderror">
                    <option value="0">{{__("Choose from 1-15")}}</option>
                    @for ($i = 1; $i < 16; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                @error('prescription.number')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{ __('Date') }}</label>
                <input type="date" value="" wire:model.defer="prescription.date" placeholder="{{ __('Add Date') }}"
                       name="date"
                       class="form-control @error('prescription.date') is-invalid @enderror" type="text">
                @error('prescription.date')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{__("Attach (image, pdf file)")}} </label>
                <input wire:model.defer="prescription.file"
                       name="file"
                       class="form-control @error('prescription.file') is-invalid @enderror" type="file">
                @error('prescription.file')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group col-12">
            <label for="form11">{{__("Notes")}} </label>
            <textarea class="form-control @error('prescription.notes') is-invalid @enderror " wire:model.defer="prescription.notes" placeholder="{{__("Add Notes")}}" id="form11" rows="4"></textarea>
            @error('prescription.notes')
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

