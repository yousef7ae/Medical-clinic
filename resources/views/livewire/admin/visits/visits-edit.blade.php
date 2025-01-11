<form class="modal-body " method="post" wire:submit.prevent="update">
    {{csrf_field()}}

    <div class="row g-2">

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Name Patient")}}</label>
                <select wire:model.defer="visit.patient_id"
                        class="form-control @error('visit.patient_id') is-invalid @enderror">
                    <option value="0">{{__("Select Name Patient")}} ...</option>
                    @foreach($patients as $key => $patient)
                        <option value="{{$patient->id}}">{{ $patient->name }}</option>
                    @endforeach
                </select>
                @error('visit.patient_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

{{--        <div class="col-6">--}}
{{--            <div class="form-group">--}}
{{--                <label class="control-label">{{__("Categories")}}</label>--}}
{{--                <select wire:model.defer="visit.category_id"--}}
{{--                        class="form-control @error('visit.category_id') is-invalid @enderror">--}}
{{--                    <option value="0">{{__("Select clinic")}} ...</option>--}}
{{--                    @foreach($categories as $key => $category)--}}
{{--                        <option value="{{$category->id}}">{{ $category->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @error('visit.category_id')--}}
{{--                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div>--}}

        @if (!auth()->user()->hasRole('Doctor'))
            <div class="col-6">
                <div class="form-group">
                    <label class="control-label">{{__("doctor")}}</label>
                    <select wire:model.defer="visit.doctor_id"
                            class="form-control @error('visit.doctor_id') is-invalid @enderror">
                        <option value="0">{{__("Select doctor")}} ...</option>
                        @foreach($doctors as $key => $doctor)
                            <option value="{{$doctor->id}}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                    @error('visit.doctor_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        @endif

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Detection Date")}}</label>
                <input value="" wire:model.defer="visit.detection_date"
                       class="form-control @error('visit.detection_date') is-invalid @enderror" type="date">
                @error('visit.detection_date')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Blood Pressure")}}</label>
                <input wire:model.defer="visit.blood_pressure" placeholder="{{__("80/120")}}"
                       class="form-control @error('visit.blood_pressure') is-invalid @enderror" type="text">
                @error('visit.blood_pressure')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Temperature")}}</label>
                <input wire:model.defer="visit.temperature" placeholder="{{__("Add Temperature")}}"
                       class="form-control @error('visit.temperature') is-invalid @enderror" type="text">
                @error('visit.temperature')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Sugar")}}</label>
                <input wire:model.defer="visit.sugar" placeholder="{{__("Add Sugar")}}"
                       class="form-control @error('visit.sugar') is-invalid @enderror" type="text">
                @error('visit.sugar')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Type of visit")}}</label>
                <select wire:model.defer="visit.visit_type_id"
                        class="form-control @error('visit.visit_type_id') is-invalid @enderror">
                    <option value="0">{{__("Choose the type of visit")}} ...</option>
                    @foreach(\App\Models\Visit::visit_type_idList(false) as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                @error('visit.visit_type_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Number Sessions")}}</label>
                <input wire:model.defer="visit.number_sessions" placeholder="{{__("Add Number Sessions")}}"
                       class="form-control @error('visit.number_sessions') is-invalid @enderror" type="text">
                @error('visit.number_sessions')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Waiting List")}}</label>
                <input wire:model.defer="visit.waiting_list" placeholder="{{__("Add Waiting List")}}"
                       class="form-control @error('visit.waiting_list') is-invalid @enderror" type="text">
                @error('visit.waiting_list')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group col-12">
            <label for="form11">{{__("Diagnosis")}} </label>
            <textarea class="form-control @error('visit.diagnosis') is-invalid @enderror " wire:model.defer="visit.diagnosis" placeholder="{{__("Add Diagnosis")}}" id="form11" rows="4"></textarea>
            @error('visit.diagnosis')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="form-group col-12">
            <label for="form11">{{__("Notes")}} </label>
            <textarea class="form-control @error('visit.notes') is-invalid @enderror " wire:model.defer="visit.notes" placeholder="{{__("Add Notes")}}" id="form11" rows="4"></textarea>
            @error('visit.notes')
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

