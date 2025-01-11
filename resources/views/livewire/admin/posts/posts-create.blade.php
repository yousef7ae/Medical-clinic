<form class="modal-body " method="post" wire:submit.prevent="store">
    {{csrf_field()}}

    <div class="row g-2">

        <div class="col-md-12">
            <div class="form-group">
                <div class="card d-table p-1 m-auto">
                    @if($imageTemp)
                        <img width="150" class="img-fluid rounded"
                             src="{{ $imageTemp->temporaryUrl() }}"
                             data-holder-rendered="true">

                    @else
                        <img width="200" class="img-fluid rounded"
                             src="{{ empty(['image']) ? url(empty(['image'])) : url('dashboard/img/image1.png')}}"
                             data-holder-rendered="true">
                    @endif
                </div>

                <div class="d-table p-1 m-auto uniform-uploader">
                    <input type="file" wire:model.defer="imageTemp"
                           class="form-input-styled form-control submit @error('imageTemp') is-invalid @enderror"
                           data-fouc=""
                    >
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
                <label class="control-label">{{ __('Title') }}</label>
                <input value="" wire:model.defer="post.title" placeholder="{{ __('Add Title') }}"
                       name="title"
                       class="form-control @error('post.title') is-invalid @enderror" type="text">
                @error('post.title')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>


{{--            <div class="form-group">--}}
{{--                <label class="control-label">{{ __('Description') }}</label>--}}
{{--                <textarea rows="5" value="" wire:model.defer="post.description" placeholder="{{ __('Add Description') }}"--}}
{{--                          id="description" data-description="@this"    name="description"--}}
{{--                          class="form-control editor @error('post.description') is-invalid @enderror"--}}
{{--                          ></textarea>--}}
{{--                @error('post.description')--}}
{{--                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                @enderror--}}
{{--            </div>--}}


            <div wire:ignore class="col-md-12">
                <div class="form-group">
                    <label class="control-label">{{ __('Description') }}</label>
                    <textarea id="description" value="" wire:model.defer="post.description"
                              placeholder="{{ __('Add Description') }}"
                              name="description"
                              class="form-control @error('post.description') is-invalid @enderror"
                              rows="5"></textarea id="editor1" value="">
                    @error('post.description')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <script>
                ClassicEditor
                    .create(document.querySelector('#description'),{
                        ckfinder:{
                            {{--uploadUrl:'{{route('ckeditor.upload').'?_token'.csrf_token()}}'--}}
                        },
                    })
                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                        @this.set('post.description', editor.getData());
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            </script>


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

