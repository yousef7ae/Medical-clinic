<div>
    <div class="bg-white pt-3">
        <div class="container">
            @livewire('admin.layouts.sidebar-header')
        </div>
    </div>
    <div class="container-fluid py-3">
        @include('layouts.admins.alert')
        <div class="main h-100">
            <h2 class="text-primary">{{__("Patient visits")}}</h2>
            <div class="row g-0 mb-3">
                <div class="col-md-3 align-self-end">
                    <div class="d-inline">
                        @if(auth()->user()->can('visits create') )
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#CreateVisit"
                               wire:click.prevent="CreateVisit" data-bs-original-title="" title=""><i
                                    class="fa-solid fa-user-plus pe-1"></i>{{__("Add a patient visit")}}  </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row g-1 justify-content-end" wire:submit.prevent="search">
                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Name Patient")}}</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="name"
                                   placeholder="{{__("Search by name")}}"
                                   id="PatientName">
                        </div>

                        <div class="col-md-3 col-sm-3 col-6">
                            <label class="text-primary mb-1" for="PatientName">{{__("Notes")}}</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="notes"
                                   placeholder="{{__("Search by notes")}}"
                                   id="PatientName">
                        </div>

                        {{--                        <div class="col-md-2 col-sm-3 col-5">--}}
                        {{--                            <label for="StartDate" class="text-primary mb-1">تاريخ البداية</label>--}}
                        {{--                            <input type="date" class="form-control border-primary pointer"--}}
                        {{--                                   id="StartDate">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-md-2 col-sm-3 col-5">--}}
                        {{--                            <label for="endDate" class="text-primary mb-1">تاريخ النهاية</label>--}}
                        {{--                            <input type="date" class="form-control border-primary pointer"--}}
                        {{--                                   id="endDate">--}}
                        {{--                        </div>--}}

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
                @if($visits->count() > 0)
                    <table class="table table-borderless mb-md-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">#</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Diagnosis")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Detection Date")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("The Clinic")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1"> {{__("Dr. Name :")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Waiting list")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Temperature")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Blood Pressure")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Type of visit")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Number of sessions")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Control")}}</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($visits as $key => $visit)
                            <tr>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $key + $visits->firstItem() }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{$visit->diagnosis}}
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$visit->detection_date}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div
                                        class="table-os">{{$visit->category ? $visit->category->name : __("Nothing") }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$visit->doctor ? $visit->doctor->name : __("Nothing")  }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{$visit->waiting_list}}
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{$visit->temperature}}
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{$visit->blood_pressure}}
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{\App\Models\Visit::visit_type_idList($visit->visit_type_id)}}
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{$visit->number_sessions}}
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{--   @if(auth()->user()->can('visits show') )--}}
                                        {{-- <a href="{{route('admin.visits.show',$visit->id)}}"--}}
                                        {{--       class="btn btn-sm mx-1 btn-primary">--}}
                                        {{--         <i class="fa-solid fa-eye"></i>--}}
                                        {{--           </a>--}}
                                        {{--          @endif--}}

                                        <a class="btn btn-sm mx-1 btn-warning text-black border-end"
                                           href="{{ route('admin.visits.single.print', [ 'id' => $visit->id ]) }}"
                                           target="_blank">
                                            <i class="fa-solid fa-print"></i>
                                        </a>
                                        @if(auth()->user()->can('visits edit'))
                                            <a class="btn btn-sm mx-1 btn-info text-white border-end" href="#"
                                               wire:click.prevent="EditVisit({{$visit->id}})"
                                               data-bs-toggle="modal" data-bs-target="#EditVisit">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        @endif
                                        @if(auth()->user()->can('visits delete'))
                                            <a class="btn btn-sm mx-1 btn-danger" href="#"
                                               wire:click.prevent="deleteId({{$visit->id}})"
                                               data-bs-toggle="modal" data-bs-target="#deleteModalVisit">
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
                        {{$visits->links()}}
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

@if(auth()->user()->can('visits create'))
    <!--  Modal CreateVisit -->
        <div class="modal fade" wire:ignore.self id="CreateVisit" tabindex="-1" role="dialog"
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
                        <h5 class="" id="exampleModalLabel">{{__("Add a patient visit")}} </h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>
                    @if($create_visit)
                        @livewire('admin.visits.visits-create',[$visit_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal CreateVisit -->
@endif

@if(auth()->user()->can('visits edit'))
    <!--  Modal EditVisit -->
        <div class="modal fade" wire:ignore.self id="EditVisit" tabindex="-1" role="dialog"
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
                        <h5 class="" id="exampleModalLabel">{{__("Modifying a patient visit")}}</h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>

                    @if($visit_id)
                        @livewire('admin.visits.visits-edit',[$visit_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal EditVisit -->
@endif

@if(auth()->user()->can('visits delete') )
    <!-- Modal deleteModalVisit -->
        <div wire:ignore.self class="modal fade" id="deleteModalVisit" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalVisitLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalVisitLabel">{{__("Delete Confirm")}}</h5>
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
        <!-- Modal deleteModalVisit -->
    @endif

</div>
