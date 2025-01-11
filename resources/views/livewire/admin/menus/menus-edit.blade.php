<form class="mt-2" method="post" wire:submit.prevent="update">
    {{csrf_field()}}



    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label class="control-label">{{ __('Title') }}</label>
                <input value="" wire:model.defer="menu.title" placeholder="{{ __('Add Title') }}"
                       name="title"
                       class="form-control @error('menu.title') is-invalid @enderror" type="text">
                @error('menu.title')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

            </div>


            <div class="form-group">
                <label class="control-label">{{ __('Order') }}</label>
                <input value="" wire:model.defer="menu.order" placeholder="{{ __('0') }}"
                       name="order"
                       class="form-control @error('menu.order') is-invalid @enderror" type="text">
                @error('menu.order')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

            </div>



        </div>
    </div>


{{--    <div class="row">--}}

{{--        <div class="col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <div class="card d-table p-1 m-auto">--}}
{{--                    @if($imageTemp)--}}
{{--                        <img width="150" class="img-fluid rounded"--}}
{{--                             src="{{ $imageTemp->temporaryUrl() }}"--}}
{{--                             data-holder-rendered="true">--}}

{{--                    @else--}}
{{--                        @if(!empty($menu['image']))--}}
{{--                        <img width="200" class="img-fluid rounded"--}}
{{--                             src="{{$menu['image']}}"--}}
{{--                             data-holder-rendered="true">--}}
{{--                        @endif--}}
{{--                    @endif--}}
{{--                </div>--}}

{{--                <div class="d-table p-1 m-auto uniform-uploader">--}}
{{--                    <input type="file" wire:model.defer="imageTemp"--}}
{{--                           class="form-input-styled form-control submit2 @error('imageTemp') is-invalid @enderror"--}}
{{--                           data-fouc=""--}}
{{--                    >--}}
{{--                    <span class="filename" >{{__("File Image ")}}</span>--}}
{{--                    @error('imageTemp')--}}
{{--                    <span class="invalid-feedback"--}}
{{--                          role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                    @enderror--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

    <div class="row">

        @foreach($submenus as $key => $submenu)

            <div class="col-md-1">
                <button class="btn btn-danger btn-xs mt-4" type="button" wire:click="removeSubmenu({{$key}})"><i class="fa fa-trash"></i></button>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label class="control-label">{{ __('Name') }} {{$key}}</label>
                    <input placeholder="{{ __('Add Name') }}" wire:model.deffer="submenus.{{$key}}.name"
                           name="name"
                           class="form-control @error('submenus.name') is-invalid @enderror" type="text">
                    @error('submenus.{{$key}}.name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Url') }} {{$key}}</label>
                    <input placeholder="{{ __('Add Url') }}" wire:model.deffer="submenus.{{$key}}.url"
                           name="name"
                           class="form-control @error('submenus.url') is-invalid @enderror" type="text">
                    @error('submenus.{{$key}}.url')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Order ') }} {{$key}}</label>
                    <input placeholder="{{ __('Add Order') }}" wire:model.deffer="submenus.{{$key}}.order"
                           name="name"
                           class="form-control @error('submenus.order') is-invalid @enderror" type="text">
                    @error('submenus.{{$key}}.order')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>


        @endforeach
        <div>
            <button type="button" class="btn btn-warning m-2" wire:click="addSubmenu">+submenu</button>
        </div>
    </div>


    <div>
        <div wire:loading>
            <i class="fas fa-sync fa-spin"></i>
            {{__("Loading please wait")}} ...
        </div>
    </div>
    <div>
        <button wire:loading.attr="disabled" class="btn btn-info submit"
                type="submit">{{__("Update")}}</button>
    </div>
</form>

