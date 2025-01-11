<form class="modal-body " method="post" wire:submit.prevent="update">
    {{csrf_field()}}


    <div class="row g-2">


        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Name")}}</label>
                <input wire:model.defer="expense.name" placeholder="{{__("Add Name")}}"

                       class="form-control @error('expense.name') is-invalid @enderror" type="text">
                @error('expense.name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Expense date")}}</label>
                <input wire:model.defer="expense.date"
                       class="form-control @error('expense.date') is-invalid @enderror" type="date">
                @error('expense.date')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-4">
                <div class="form-group">
                    <label class="control-label"> {{__("The total amount")}}</label>
                    <input wire:model="expense.total_amount"
                           class="form-control @error('expense.total_amount') is-invalid @enderror" type="text">
                    @error('expense.total_amount')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label class="control-label">{{__("The amount paid")}}</label>
                    <input wire:model="expense.amount"
                           class="form-control @error('expense.amount') is-invalid @enderror" type="text">
                    @error('expense.amount')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label class="control-label">{{__("Remaining amount")}}</label>
                    <input wire:model="expense.remainder_amount" disabled
                           class="form-control @error('expense.remainder_amount') is-invalid @enderror" type="text">
                    @error('expense.remainder_amount')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

        </div>



        <div class="form-group col-12">
            <label for="form11">{{__("Notes")}} </label>
            <textarea class="form-control @error('expense.notes') is-invalid @enderror "
                      wire:model.defer="expense.notes" placeholder="{{__("Add Notes")}}" id="form11"
                      rows="4"></textarea>
            @error('expense.notes')
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

