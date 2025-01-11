<div>
    <div class="bg-white pt-3">
        <div class="container">
            @livewire('admin.layouts.sidebar-header-revenue')
        </div>
    </div>
    <div class="container-fluid py-3">
        @include('layouts.admins.alert')
        <div class="main h-100">
            <h2 class="text-primary">{{__("Revenues")}}</h2>
            <div class="row g-0 mb-3">
                <div class="col-md-3 align-self-end">
                    <div class="d-inline">
                        @if(auth()->user()->can('revenues create') )
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#CreateRevenue"
                               wire:click.prevent="CreateRevenue" data-bs-original-title="" title=""><i
                                    class="fa-solid fa-user-plus pe-1"></i>{{__("Add revenue")}}  </a>

                            <a class="btn btn-primary" href="{{route('admin.revenues.print',[ 'patient_id' => $patient_id ])}}" target="_blank">
                                <i class="fa-solid fa-print pe-1"></i> {{__("print")}} </a>

                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row g-1 justify-content-end" wire:submit.prevent="search">

                        <div class="col-md-4 col-sm-7">
                            <label class="text-primary mb-1" for="Description">{{__("Notes")}}</label>
                            <input type="text" wire:model.defer="notes" class="form-control border-primary"
                                   placeholder="{{__("Search by notes")}}"
                                   id="Description">
                        </div>

                        <div class="col-md-4 col-sm-7">
                            <label class="text-primary mb-1" for="Type">{{__("Type")}}</label>
                            <select wire:model.defer="revenue_type"
                                    class="form-control">
                                <option value="0">{{__("Select Type")}} ...</option>
                                @foreach(\App\Models\Revenue::revenue_typeList(false) as $key => $patient)
                                    <option value="{{ $key }}" id="Type">{{ $patient }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Name Patient")}}</label>
                            <select wire:model.defer="patient_id"
                                    class="form-control">
                                <option value="0">{{__("Select Name Patient")}} ...</option>
                                @foreach($patients as $key => $patient)
                                    <option value="{{$patient->id}}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
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
                @if($revenues->count() > 0)
                    <table class="table table-borderless mb-md-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">#</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Name Patient")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("The Clinic")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Type of revenue")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Payment method")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("The total amount")}} </div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("The amount paid")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Remaining amount")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Revenue date")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Control")}}</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($revenues as $key => $revenue)
                            <tr>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $key + $revenues->firstItem() }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div
                                        class="table-os">{{$revenue->patient ? $revenue->patient->name :__("Nothing") }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$revenue->category ? $revenue->category->name : ''}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{\App\Models\Revenue::revenue_typeList($revenue->revenue_type)}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{\App\Models\Revenue::payment_methodList($revenue->payment_method)}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$revenue->total_amount}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$revenue->amount}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$revenue->remainder_amount}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$revenue->date}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">

                                        @if(auth()->user()->can('revenues edit') )
                                            <a class="btn btn-sm mx-1 btn-info text-white border-end" href="#"
                                               wire:click.prevent="EditRevenue({{$revenue->id}})"
                                               data-bs-toggle="modal" data-bs-target="#EditRevenue">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        @endif
                                        @if(auth()->user()->can('revenues delete') )
                                            <a class="btn btn-sm mx-1 btn-danger" href="#"
                                               wire:click.prevent="deleteId({{$revenue->id}})"
                                               data-bs-toggle="modal" data-bs-target="#deleteModalRevenue">
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
                        {{$revenues->links()}}
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

@if(auth()->user()->can('revenues create') )
    <!--  Modal CreateRevenue -->
        <div class="modal fade" wire:ignore.self id="CreateRevenue" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content px-3 bg-light rounded-4">
                    <div class="modal-header border-0 py-0">
                        <span></span>
                        <button type="button" class="close btn ms-0"
                                data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="text-center text-primary border-bottom">
                        <h5 class="" id="exampleModalLabel">{{__("Add revenue")}} </h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>
                    @if($create_revenue)
                        @livewire('admin.revenues.revenues-create',[$revenue_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal CreateRevenue -->
@endif

@if(auth()->user()->can('revenues edit') )
    <!--  Modal EditRevenue -->
        <div class="modal fade" wire:ignore.self id="EditRevenue" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content px-3 bg-light rounded-4">
                    <div class="modal-header border-0 py-0">
                        <span></span>
                        <button type="button" class="close btn ms-0"
                                data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="text-center text-primary border-bottom">
                        <h5 class="" id="exampleModalLabel">{{__("Update revenue")}} </h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{__("Loading please wait")}} ...
                        </div>
                    </div>

                    @if($revenue_id)
                        @livewire('admin.revenues.revenues-edit',[$revenue_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal EditRevenue -->
@endif

@if(auth()->user()->can('revenues delete') )
    <!-- Modal deleteModalRevenue -->
        <div wire:ignore.self class="modal fade" id="deleteModalRevenue" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalRevenueLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalRevenueLabel">{{__("Delete Confirm")}}</h5>
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
        <!-- Modal deleteModalRevenue -->
    @endif

</div>
