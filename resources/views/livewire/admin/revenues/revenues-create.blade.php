<form class="modal-body " method="post" wire:submit.prevent="store">
    {{csrf_field()}}


    <div class="row g-2">


        @if (auth()->user()->hasRole('Secretarial'))
            <div class="col-6">
                <div class="form-group">
                    <label class="control-label">{{__("Type of revenue")}}</label>
                    <select wire:model.defer="revenue.revenue_type"
                            class="form-control @error('revenue.revenue_type') is-invalid @enderror">
                        <option value="0">{{__("Select")}} ...</option>
                        @foreach(\App\Models\Revenue::revenue_typeList(false) as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @error('revenue.revenue_type')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        @elseif (auth()->user()->hasRole('Nurse'))

            <div class="col-6">
                <div class="form-group">
                    <label class="control-label">{{__("Type of revenue")}}</label>
                    <select wire:model.defer="revenue.revenue_type"
                            class="form-control @error('revenue.revenue_type') is-invalid @enderror">
                        <option value="0">{{__("Select")}} ...</option>
                        @foreach(\App\Models\Revenue::revenue_type2List(false) as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @error('revenue.revenue_type')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

        @elseif (auth()->user()->hasRole('Admin'))

            <div class="col-6">
                <div class="form-group">
                    <label class="control-label">{{__("Type of revenue")}}</label>
                    <select wire:model.defer="revenue.revenue_type"
                            class="form-control @error('revenue.revenue_type') is-invalid @enderror">
                        <option value="0">{{__("Select")}} ...</option>
                        @foreach(\App\Models\Revenue::revenue_type_allList(false) as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @error('revenue.revenue_type')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

        @endif

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Categories")}}</label>
                <select wire:model.defer="revenue.category_id"
                        class="form-control @error('revenue.category_id') is-invalid @enderror">
                    <option value="0">{{__("Select clinic")}} ...</option>
                    @foreach($categories as $key => $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('revenue.category_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Name Patient")}}</label>
                <select wire:model.defer="revenue.patient_id"
                        class="form-control @error('revenue.patient_id') is-invalid @enderror">
                    <option value="0">{{__("Select Name Patient")}} ...</option>
                    @foreach($patients as $key => $patient)
                        <option value="{{$patient->id}}">{{ $patient->name }}</option>
                    @endforeach
                </select>
                @error('revenue.patient_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Revenue date")}}</label>
                <input wire:model.defer="revenue.date"
                       class="form-control @error('revenue.date') is-invalid @enderror" type="date">
                @error('revenue.date')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Payment method")}}</label>
                <select wire:model="revenue.payment_method"
                        class="form-control @error('revenue.payment_method') is-invalid @enderror">
                    <option value="0">{{__("Select")}} ...</option>
                    @foreach(\App\Models\Revenue::payment_methodList(false) as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                @error('revenue.payment_method')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        @if($revenue['payment_method'] == 2 )
            <div class="col-6">
                <div class="form-group">
                    <label class="control-label">{{__("Check number")}}</label>
                    <input wire:model.defer="revenue.check_number" placeholder="123456..."
                           class="form-control @error('revenue.check_number') is-invalid @enderror" type="number">
                    @error('revenue.check_number')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label class="control-label">{{__("Check date")}}</label>
                    <input wire:model.defer="revenue.check_date"
                           class="form-control @error('revenue.check_date') is-invalid @enderror" type="date">
                    @error('revenue.check_date')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

        @endif

            <div class="row mt-4">
                <div class="col-4">
                    <div class="form-group">
                        <label class="control-label">{{__("The total amount")}} </label>
                        <input wire:model="revenue.total_amount"
                               class="form-control @error('revenue.total_amount') is-invalid @enderror" type="text">
                        @error('revenue.total_amount')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="control-label">{{__("The amount paid")}}</label>
                        <input wire:model="revenue.amount"
                               class="form-control @error('revenue.amount') is-invalid @enderror" type="text">
                        @error('revenue.amount')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="control-label">{{__("Remaining amount")}}</label>
                        <input wire:model="revenue.remainder_amount" disabled
                               class="form-control @error('revenue.remainder_amount') is-invalid @enderror" type="text">
                        @error('revenue.remainder_amount')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

            </div>

        <div class="form-group col-12">
            <label for="form11">{{__("Notes")}} </label>
            <textarea class="form-control @error('revenue.notes') is-invalid @enderror "
                      wire:model.defer="revenue.notes" placeholder="{{__("Add Notes")}}" id="form11"
                      rows="4"></textarea>
            @error('revenue.notes')
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

