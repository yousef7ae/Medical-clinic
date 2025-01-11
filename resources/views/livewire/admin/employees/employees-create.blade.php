<form class="modal-body " method="post" wire:submit.prevent="store">
    {{csrf_field()}}


    <div class="row g-2">

        <div class="col-6">
            <div class="form-group position-relative">
                <label class="control-label">{{ __('Full Name') }}</label>
                <input value="" wire:model="user.name" placeholder="{{ __('Add Name') }}"
                       name="name"
                       class="form-control @error('user.name') is-invalid @enderror" type="text">
                @error('user.name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Role")}}</label>
                <select wire:model.defer="user.role_id"
                        class="form-control @error('user.role_id') is-invalid @enderror">
                    <option value="0">{{__("Select Role")}} ...</option>
                    @foreach(\App\Models\User::employeeRole(false) as $key => $value)
                        <option value="{{$key}}">{{ __($value) }}</option>
                    @endforeach
                </select>
                @error('user.role_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Categories")}}</label>
                <select wire:model.defer="user.category_id"
                        class="form-control @error('user.category_id') is-invalid @enderror">
                    <option value="0">{{__("Select clinic")}} ...</option>
                    @foreach($categories as $key => $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('user.category_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>


        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Add a personal photo")}}</label>
                <input wire:model.defer="user.image"
                       name="image"
                       class="form-control @error('user.image') is-invalid @enderror" type="file">
                @error('user.image')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Mobile")}}</label>
                <input wire:model.defer="user.mobile" placeholder="{{__("Add Mobile")}}"
                       class="form-control @error('user.mobile') is-invalid @enderror" type="number">
                @error('user.mobile')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Email")}}</label>
                <input wire:model.defer="user.email" placeholder="{{__("Add Email")}}"
                       class="form-control @error('user.email') is-invalid @enderror" type="email">
                @error('user.email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("Password")}}</label>
                <input wire:model.defer="user.password" placeholder="{{__("Add Password")}}"
                       class="form-control @error('user.password') is-invalid @enderror" type="password">
                @error('user.password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

            </div>
        </div>


        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("birth_date")}}</label>
                <input value="" wire:model.defer="user.birth_date"
                       class="form-control @error('user.birth_date') is-invalid @enderror" type="date">

                @error('user.birth_date')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("gender")}}</label>
                <select wire:model.defer="user.gender"
                        class="form-control @error('user.gender') is-invalid @enderror">
                    <option value="0">{{__("Select Gender")}} ...</option>
                    @foreach(\App\Models\User::gender_emp(false) as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                @error('user.gender')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>


        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("job")}}</label>
                <input wire:model.defer="user.job" placeholder="{{__("Add job")}}"

                       class="form-control @error('user.job') is-invalid @enderror" type="text">
                @error('user.job')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="control-label">{{__("address")}}</label>
                <input wire:model.defer="user.address" placeholder="{{__("Add address")}}"

                       class="form-control @error('user.address') is-invalid @enderror" type="text">
                @error('user.address')
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
                type="submit">{{__("Store")}}</button>
    </div>
</form>

