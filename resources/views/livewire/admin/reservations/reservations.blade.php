<div>
    <div class="bg-white pt-3">
        <div class="container">

        </div>
    </div>
    <div class="container-fluid py-3">
        @include('layouts.admins.alert')
        <div class="main h-100">
            <h2 class="text-primary">{{__('Reservations')}}</h2>
            <div class="row g-0 mb-3">
                <div class="col-md-3 align-self-end">
                    <div class="d-inline">
                        @if(auth()->user()->can('reservations create') )
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                               data-bs-target="#CreateReservation"
                               wire:click.prevent="CreateReservation" data-bs-original-title="" title=""><i
                                    class="fa-solid fa-user-plus pe-1"></i>{{__('Add a reservation')}}  </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row g-1 justify-content-end" wire:submit.prevent="search">

                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__('Patient name')}}</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="name"
                                   placeholder="ابحث "
                                   id="PatientName">
                        </div>

                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__('Notes')}}</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="notes"
                                   placeholder="ابحث "
                                   id="PatientName">
                        </div>

                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__('Date')}}</label>
                            <input type="date" class="form-control border-primary" wire:model.defer="date"
                                   placeholder="ابحث "
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
                @if($reservations->count() > 0)
                    <table class="table table-borderless mb-md-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">#</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Doctors Name')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Number Reservation')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Booking clinic')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Name Patient')}} </div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Reservation type')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Booker')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Booking date')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Control')}}</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservations as $key => $reservation)
                            <tr>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $key + $reservations->firstItem() }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div
                                        class="table-os">{{$reservation->doctor ? $reservation->doctor->name : __('Nothing')}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$reservation->number}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div
                                        class="table-os">{{$reservation->category ? $reservation->category->name : ''}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div
                                        class="table-os">{{$reservation->patient ? $reservation->patient->name : ''}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{__('Control')}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$reservation->user ? $reservation->user->name : ''}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $reservation->date }}<br/>{{ $reservation->time_from }}
                                        - {{ $reservation->time_to }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">

                                        {{--   @if(auth()->user()->can('reservations show') )--}}
                                        {{-- <a href="{{route('admin.reservations.show',$reservation->id)}}"--}}
                                        {{--       class="btn btn-sm mx-1 btn-primary">--}}
                                        {{--         <i class="fa-solid fa-eye"></i>--}}
                                        {{--           </a>--}}
                                        {{--          @endif--}}

                                        @if(auth()->user()->can('reservations edit') )
                                            <a class="btn btn-sm mx-1 btn-info text-white border-end" href="#"
                                               wire:click.prevent="EditReservation({{$reservation->id}})"
                                               data-bs-toggle="modal" data-bs-target="#EditReservation">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        @endif
                                        @if(auth()->user()->can('reservations delete') )
                                            <a class="btn btn-sm mx-1 btn-danger" href="#"
                                               wire:click.prevent="deleteId({{$reservation->id}})"
                                               data-bs-toggle="modal" data-bs-target="#deleteModalReservation">
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
                        {{$reservations->links()}}
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

@if(auth()->user()->can('reservations create') )
    <!--  Modal CreateReservation -->
        <div class="modal fade" wire:ignore.self id="CreateReservation" tabindex="-1" role="dialog"
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
                        <h5 class="" id="exampleModalLabel">{{__('Add a reservation')}} </h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>
                    @if($create_reservation)
                        @livewire('admin.reservations.reservations-create',[$reservation_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal CreateReservation -->
@endif

@if(auth()->user()->can('reservations edit') )
    <!--  Modal EditReservation -->
        <div class="modal fade" wire:ignore.self id="EditReservation" tabindex="-1" role="dialog"
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
                        <h5 class="" id="exampleModalLabel">{{__('Update reservation')}}</h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>

                    @if($reservation_id)
                        @livewire('admin.reservations.reservations-edit',[$reservation_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal EditReservation -->
@endif

@if(auth()->user()->can('reservations delete') )
    <!-- Modal deleteModalReservation -->
        <div wire:ignore.self class="modal fade" id="deleteModalReservation" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalReservationLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalReservationLabel">{{__("Delete Confirm")}}</h5>
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
        <!-- Modal deleteModalReservation -->
    @endif

</div>
