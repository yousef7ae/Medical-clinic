<div>
    <div class="bg-white pt-3">
        <div class="container">
            @livewire('admin.layouts.sidebar-header-front-end')
        </div>
    </div>
    <div class="container-fluid py-3">
        @include('layouts.admins.alert')
        <div class="main h-100">
            <h2 class="text-primary">{{__("Statistics")}}</h2>
            <div class="row g-0 mb-3">
                <div class="col-md-3 align-self-end">
                    <div class="d-inline">
                        @if(auth()->user()->can('statistics create') )
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#CreateStatistic"
                               wire:click.prevent="CreateStatistic" data-bs-original-title="" title=""><i
                                    class="fa-solid fa-user-plus pe-1"></i> {{__("Create Statistic")}} </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row g-1 justify-content-end" wire:submit.prevent="search">

                        <div class="col-md-4 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Name")}}</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="name"
                                   placeholder="{{__("Search")}} "
                                   id="PatientName">
                        </div>

                        <div class="col-md-4 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Description")}}</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="description"
                                   placeholder="{{__("Search")}} "
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
                @if($statistics->count() > 0)
                    <table class="table table-borderless mb-md-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">#</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Image")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Name")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Value")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Description")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Control")}}</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($statistics as $key => $statistic)
                            <tr>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $key + $statistics->firstItem() }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        <img width="50" class="img-fluid rounded"
                                             src="{{ $statistic->image ? $statistic->image : url('dashboard/img/image1.png')}}"
                                             data-holder-rendered="true">
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$statistic->name}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$statistic->value}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ Str::limit($statistic->description,50) }}</div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">

                                        @if(auth()->user()->can('statistics edit') )
                                            <a class="btn btn-sm mx-1 btn-info text-white border-end" href="#"
                                               wire:click.prevent="EditStatistic({{$statistic->id}})"
                                               data-bs-toggle="modal" data-bs-target="#EditStatistic">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                        @endif
                                        @if(auth()->user()->can('statistics delete') )
                                            <a class="btn btn-sm mx-1 btn-danger" href="#"
                                               wire:click.prevent="deleteId({{$statistic->id}})"
                                               data-bs-toggle="modal" data-bs-target="#deleteModalStatistic">
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
                        {{$statistics->links()}}
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

@if(auth()->user()->can('statistics create') )
    <!--  Modal CreateStatistic -->
        <div class="modal fade" wire:ignore.self id="CreateStatistic" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content px-3 bg-light rounded-4">
                    <div class="modal-header border-0 py-0">
                        <span></span>
                        <button type="button" class="close btn ms-0"
                                data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="text-center text-primary border-bottom">
                        <h5 class="" id="exampleModalLabel">{{__("Create Statistic")}}</h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>
                    @if($create_statistic)
                        @livewire('admin.statistics.statistics-create',[$statistic_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal CreateStatistic -->
@endif

@if(auth()->user()->can('statistics edit') )
    <!--  Modal EditStatistic -->
        <div class="modal fade" wire:ignore.self id="EditStatistic" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content px-3 bg-light rounded-4">
                    <div class="modal-header border-0 py-0">
                        <span></span>
                        <button type="button" class="close btn ms-0"
                                data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="text-center text-primary border-bottom">
                        <h5 class="" id="exampleModalLabel">{{__("Edit Statistic")}}</h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>

                    @if($statistic_id)
                        @livewire('admin.statistics.statistics-edit',[$statistic_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal EditStatistic -->
@endif

@if(auth()->user()->can('statistics delete') )
    <!-- Modal deleteModalStatistic -->
        <div wire:ignore.self class="modal fade" id="deleteModalStatistic" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalStatisticLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalStatisticLabel">{{__("Delete Confirm")}}</h5>
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
        <!-- Modal deleteModalStatistic -->
    @endif

</div>
