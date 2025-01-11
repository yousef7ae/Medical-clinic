<form class="modal-body " method="post" wire:submit.prevent="store">
    {{csrf_field()}}

    <div class="row g-2">

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Name Patient")}}</label>
                <select wire:model.defer="reservation.patient_id"
                        class="form-control @error('reservation.patient_id') is-invalid @enderror">
                    <option value="0">{{__("Select Name Patient")}} ...</option>
                    @foreach($patients as $key => $patient)
                        <option value="{{$patient->id}}">{{ $patient->name }}</option>
                    @endforeach
                </select>
                @error('reservation.patient_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        @if (!auth()->user()->hasRole('Doctor'))
            <div class="col-6">
                <div class="form-group">
                    <label class="control-label">{{__("Categories")}}</label>
                    <select wire:model="reservation.category_id"
                            class="form-control @error('reservation.category_id') is-invalid @enderror">
                        <option value="0">{{__("Select clinic")}} ...</option>
                        @foreach($categories as $key => $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('reservation.category_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        @endif

        @if (!auth()->user()->hasRole('Doctor'))
            <div class="col-6">
                <div class="form-group">
                    <label class="control-label">{{__("doctor")}}</label>
                    <select wire:model="reservation.doctor_id"
                            class="form-control @error('reservation.doctor_id') is-invalid @enderror">
                        <option value="0">{{__("Select doctor")}} ...</option>
                        @foreach($doctors as $key => $doctor)
                            <option value="{{$doctor->id}}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                    @error('reservation.doctor_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        @endif

        {{--        <div class="col-6">--}}
        {{--            <div class="form-group">--}}
        {{--                <label class="control-label">{{__("Number Reservation")}}</label>--}}
        {{--                <input wire:model.defer="reservation.number" placeholder="{{__("Add Number Reservation")}}"--}}
        {{--                       class="form-control @error('reservation.number') is-invalid @enderror" type="number">--}}
        {{--                @error('reservation.number')--}}
        {{--                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
        {{--                @enderror--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Reservation type")}}</label>
                <select wire:model.defer="reservation.reservation_type_id"
                        class="form-control @error('reservation.reservation_type_id') is-invalid @enderror">
                    <option value="0">{{ __("Select") }} ...</option>
                    @foreach(\App\Models\ReservationType::all() as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('reservation.reservation_type_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        {{--        <div class="col-6">--}}
        {{--            <div class="form-group">--}}
        {{--                <label class="control-label">القائم بالحجز</label>--}}
        {{--                <input wire:model.defer="reservation.booking_list" placeholder="اضافة القائم بالحجز"--}}
        {{--                       class="form-control @error('reservation.booking_list') is-invalid @enderror" type="text">--}}
        {{--                @error('reservation.booking_list')--}}
        {{--                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
        {{--                @enderror--}}
        {{--            </div>--}}
        {{--        </div>--}}

        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{ __("Booking Date") }}</label>
                <input wire:model.defer="reservation.date"
                       class="form-control @error('reservation.date') is-invalid @enderror" type="date">
                @error('reservation.date')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{ __("From") }}</label>
                <input wire:model.defer="reservation.time_from"
                       class="form-control @error('reservation.time_from') is-invalid @enderror" type="time">
                @error('reservation.time_from')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{ __("To") }}</label>
                <input wire:model.defer="reservation.time_to"
                       class="form-control @error('reservation.time_to') is-invalid @enderror" type="time">
                @error('reservation.time_to')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{ __("The amount to be paid") }}</label>
                <input wire:model.defer="reservation.amount" placeholder="{{ __("Add the amount to be paid") }}"
                       class="form-control @error('reservation.amount') is-invalid @enderror" type="number">
                @error('reservation.amount')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form-group col-12">
            <label for="form11">{{__("Notes")}} </label>
            <textarea class="form-control @error('reservation.notes') is-invalid @enderror "
                      wire:model.defer="reservation.notes" placeholder="{{__("Add Notes")}}" id="form11"
                      rows="4"></textarea>
            @error('reservation.notes')
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
                type="submit">{{__("Store")}}</button>
    </div>
</form>

