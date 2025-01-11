<form class="modal-body" method="post" wire:submit.prevent="update">
    {{csrf_field()}}

    <div class="row g-2 mb-2">
        <div class="col-md-12">
            <div class="form-group">
                <div class="card d-table p-1 m-auto">
                    @if($imageTemp)
                        <img width="150" class="img-fluid rounded"
                             src="{{ $imageTemp->temporaryUrl() }}"
                             data-holder-rendered="true">
                    @else
                        @if(!empty($category['image']))
                            <img width="200" class="rounded-circle img-thumbnail"
                                 src="{{ $category['image'] }}"
                                 data-holder-rendered="true">
                        @endif
                    @endif
                </div>

                <div class="d-table p-1 m-auto uniform-uploader">
                    <input type="file" wire:model.defer="imageTemp"
                           class="form-input-styled form-control submit2 @error('imageTemp ') is-invalid @enderror"
                           data-fouc=""
                    >
                    <span class="filename">{{__("File Image ")}}</span>
                    @error('imageTemp')
                    <span class="invalid-feedback"
                          role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row g-2">

        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{__("Clinic Name")}}</label>
                <input wire:model.defer="category.name" placeholder="{{__("Add Clinic Name")}}"
                       class="form-control @error('category.name') is-invalid @enderror" type="text">
                @error('category.name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{__("Mobile Category")}}</label>
                <input wire:model.defer="category.mobile" placeholder="{{__("Add Mobile Category")}}"
                       class="form-control @error('category.mobile') is-invalid @enderror" type="text">
                @error('category.mobile')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{__("Section Manager")}}</label>
                <select wire:model="category.user_id"
                        class="form-control @error('category.user_id') is-invalid @enderror" type="text">
                    <option value="0">{{__("Select")}}</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('category.user_id')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="form11">{{__("Description")}} </label>
                <textarea class="form-control @error('category.description') is-invalid @enderror "
                          wire:model.defer="category.description" placeholder="{{__("Add Description")}}" id="form11"
                          rows="4"></textarea>
                @error('category.description')
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
                type="submit">{{__("Update")}}</button>
    </div>
</form>
