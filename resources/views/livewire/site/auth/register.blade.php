<div>
    <div class="login vh-100">
        <div class="row g-0 h-100 justify-content-center">
            <form class="col-xl-4 col-lg-5 col-md-6 col-10 align-self-center" wire:submit.prevent="register" method="post">
                <div class="card card-body bg-light rounded-4">
                    <div class="text-center py-3">
                        <img class="img-fluid" width="180" src="{{asset('dashboard/img/logo.png')}}" alt="logo">
                    </div>


                    <div class="mb-3">
                        <label class="mb-2" for="Email">{{__('Name')}}</label>
                        <input type="text" wire:model.defer="user.name" class="form-control text-start py-2 text-primary @error('user.name') is-invalid @enderror " id="Name" placeholder="{{__('Add Name')}}">
                        @error('user.name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="Email">{{__('Mobile')}}</label>
                        <input type="text" wire:model.defer="user.mobile" class="form-control text-start py-2 text-primary @error('user.mobile') is-invalid @enderror " id="Mobil" placeholder="{{__('Phone number')}}">
                        @error('user.mobile')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label class="control-label">{{__('The service')}}</label>
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

                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label class="control-label">{{__('City')}}</label>
                            <select wire:model.defer="user.city_id"
                                    class="form-control @error('user.city_id') is-invalid @enderror">
                                <option value="0">{{__("Select")}} ...</option>
                                @foreach(\App\Models\User::city_idList(false) as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            @error('user.city_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn w-50 btn-success">{{__('Register with us')}}</button>
                    </div>
                    {{--                    <div class="text-primary text-center py-3 my-2">--}}
                    {{--                        <h5><a class="text-decoration-none text-primary" href="#">هل نسيت كلمة السر ؟</a></h5>--}}
                    {{--                    </div>--}}
                </div>
            </form>
        </div>
    </div>
</div>

