<div>
    <div class="bg-white pt-3">
        <div class="container">
            @livewire('admin.layouts.sidebar-header')
        </div>
    </div>
    <div class="container-fluid py-3">
        @include('layouts.admins.alert')
        <div class="main h-100">
            <h2 class="text-primary">{{__("All patients")}}</h2>
            <div class="row g-0 mb-3">
                <div class="col-md-3 align-self-end">
                    <div class="d-inline">
                        @if(auth()->user()->can('users create') )
                            <a class="btn btn-primary" href="{{ route('admin.users.create') }}">
                                <i class="fa-solid fa-user-plus pe-1"></i>{{__("Add a new patient")}}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row g-1 justify-content-end" wire:submit.prevent="search">
                        <div class="col-md-4 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Name Patient")}}</label>
                            <input type="text" wire:model.defer="name" class="form-control border-primary"
                                   placeholder="{{__("Search by name")}}"
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
            <div class="table-responsive-md pb-3">
                @if($users->count() > 0)
                    <table class="table table-borderless mb-md-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">#</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1"> {{__("Name")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Email")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Mobile")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1"> {{__("Age")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("doctor")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("The Clinic")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Control")}}</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $key + $users->firstItem() }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{$user->name}}
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$user->email ?? __("Nothing")}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$user->mobile ?? __("Nothing")}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{\Carbon\Carbon::parse($user->birth_date)->diff(\Carbon\Carbon::now())->format('%y') }}
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{$user->doctor ? $user->doctor->name :  __("Nothing") }}
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$user->category ? $user->category->name :  __("Nothing") }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">

{{--                                        @if(auth()->user()->can('users show') )--}}
{{--                                            <a href="{{route('admin.users.show',$user->id)}}"--}}
{{--                                               class="btn btn-sm mx-1 btn-primary">--}}
{{--                                                <i class="fa-solid fa-eye"></i>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}

                                        @if(auth()->user()->can('users print') )
                                                <div class="dropdown">
                                                    <a class="btn btn-sm mx-1 btn-warning" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-print"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><a class="dropdown-item d-flex px-1" target="_blank"  href="{{ route('admin.visits.print',[ 'patient_id' => $user->id ]) }}"><img class="d-block mx-1 mb-1" width="22" src="{{ asset('dashboard/img/icon-1.png') }}"> الزيارات</a></li>
                                                        <li><a class="dropdown-item d-flex px-1" target="_blank"  href="{{ route('admin.prescriptions.print',[ 'patient_id' => $user->id ]) }}"><img class="d-block mx-1 mb-1" width="22" src="{{ asset('dashboard/img/icon-4.png') }}"> الروشتات</a></li>
                                                        <li><a class="dropdown-item d-flex px-1" target="_blank"  href="{{ route('admin.analyses.print',[ 'patient_id' => $user->id ]) }}"><img class="d-block mx-1 mb-1" width="22" src="{{ asset('dashboard/img/icon-2.png') }}"> التحاليل</a></li>
                                                        <li><a class="dropdown-item d-flex px-1" target="_blank"  href="{{ route('admin.patient.print',[ 'patient_id' => $user->id ]) }}"><img class="d-block mx-1 mb-1" width="22" src="{{ asset('dashboard/img/icon-3.png') }}"> الجميع</a></li>
                                                        <li><a class="dropdown-item d-flex px-1" target="_blank"  href="{{ route('admin.user.print',[ 'patient_id' => $user->id ]) }}"><img class="d-block mx-1 mb-1" width="22" src="{{ asset('dashboard/img/icon-3.png') }}"> تقرير المريض</a></li>
                                                    </ul>
                                                </div>
                                        @endif

                                        @if(auth()->user()->can('users edit') )
                                            <a href="{{route('admin.users.edit',$user->id)}}"
                                               class="btn btn-sm mx-1 btn-info text-white border-end">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        @endif

                                        @if(auth()->user()->can('users delete') )
                                            <a class="btn btn-sm mx-1 btn-danger" href="#"
                                               wire:click.prevent="deleteId({{$user->id}})"
                                               data-bs-toggle="modal" data-bs-target="#deleteModal">
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
                        {{$users->links()}}
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

{{--@if(auth()->user()->can('users create') )--}}
{{--    <!--  Modal CreateUser -->--}}
{{--        <div class="modal fade" wire:ignore.self id="CreateUser" tabindex="-1" role="dialog"--}}
{{--             aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog modal-xl" role="document">--}}
{{--                <div class="modal-content px-3 bg-light rounded-4">--}}
{{--                    <div class="modal-header border-0 py-0">--}}
{{--                        <span></span>--}}
{{--                        <button type="button" class="close btn ms-0"--}}
{{--                                data-bs-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="text-center text-primary border-bottom">--}}
{{--                        <h5 class="" id="exampleModalLabel">اضافة مريض </h5>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div wire:loading>--}}
{{--                            <i class="fas fa-sync fa-spin"></i>--}}
{{--                            {{__("Loading please wait")}} ...--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @if($create_user)--}}
{{--                        @livewire('admin.users.users-create',[['user_id' => $user_id ,'role_id'=> 6 ]])--}}
{{--                    @endif--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--  Modal CreateUser -->--}}
{{--@endif--}}

@if(auth()->user()->can('users delete') )
    <!-- Modal deleteModal -->
        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">{{__("Delete Confirm")}}</h5>
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
        <!-- Modal deleteModal -->
    @endif

</div>
