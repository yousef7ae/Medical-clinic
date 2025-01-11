<div>
    <div class="bg-white pt-3">
        <div class="container">
            @livewire('admin.layouts.sidebar-header-front-end')
        </div>
    </div>
    <div class="container-fluid py-3">
        @include('layouts.admins.alert')
        <div class="main h-100">
            <h2 class="text-primary">{{__('Subscribes New')}}</h2>
            <div class="row g-0 mb-3">
                <div class="col-md-3 align-self-end">
                    <div class="d-inline">

                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row g-1 justify-content-end" wire:submit.prevent="search">


                        <div class="col-md-4 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Email")}}</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="email"
                                   placeholder="ابحث "
                                   id="PatientName">
                        </div>

                        <div class="col-md-1 col-sm-2 col-2 align-self-end">
                            <button type="submit" wire:loading.attr="disabled" class="btn btn-primary py-2 w-100">
                                <i wire:loading class="fas fa-sync fa-spin"></i>
                                <i class="fa-solid py-1 fa-magnifying-glass"></i>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive pb-3">
                @if($subscribe_news->count() > 0)
                    <table class="table table-borderless mb-md-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">#</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Email")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Date")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Control")}}</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribe_news as $key => $subscribe_new)
                            <tr>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $key + $subscribe_news->firstItem() }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$subscribe_new->email}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$subscribe_new->created_at}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        @if(auth()->user()->can('subscribes delete') )
                                            <a class="btn btn-sm mx-1 btn-danger" href="#"
                                               wire:click.prevent="deleteId({{$subscribe_new->id}})"
                                               data-bs-toggle="modal" data-bs-target="#deleteModalPost">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pt-2">
                        {{$subscribe_news->links()}}
                    </div>
                @else
                    <div class="text-center e404 py-3">
                        <img width="400" class="img-fluid mb-3" src="{{asset('dashboard/img/img404.jpg')}}" alt="">
                        <h4>{{__("Empty list")}}</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>

@if(auth()->user()->can('subscribes delete') )
    <!-- Modal deleteModalPost -->
        <div wire:ignore.self class="modal fade" id="deleteModalPost" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalPostLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalPostLabel">{{__("Delete Confirm")}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__("Are you sure want to delete?")}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn"
                                data-bs-dismiss="modal">{{__("Close")}}</button>
                        <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal"
                                data-bs-dismiss="modal">{{__("Yes, Delete")}}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal deleteModalPost -->
    @endif

</div>
