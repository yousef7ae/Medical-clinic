<div>
    <div class="bg-white pt-3">
        <div class="container">
            @livewire('admin.layouts.sidebar-header-front-end')
        </div>
    </div>
    <div class="container-fluid py-3">
        @include('layouts.admins.alert')
        <div class="main h-100">
            <h2 class="text-primary mt-4">{{__("Applicants")}}</h2>
            <div class="row g-0 mb-3">
                <div class="col-md-3 align-self-end">
                    <div class="d-inline">
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row g-1 justify-content-end" wire:submit.prevent="search">

                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Name")}}</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="name"
                                   placeholder="{{__("Name")}} "
                                   id="PatientName">
                        </div>

                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Email")}}</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="email"
                                   placeholder="{{__("Email")}} "
                                   id="PatientName">
                        </div>

                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__("Mobile")}}</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="mobile"
                                   placeholder="{{__("Mobile")}} "
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
                @if($applicants->count() > 0)
                    <table class="table table-borderless mb-md-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">#</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Name")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Mobile")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Email")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Category")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Ad")}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__("Notes")}}</div>
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
                        @foreach($applicants as $key => $applicant)
                            <tr>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $key + $applicants->firstItem() }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$applicant->name}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$applicant->mobile}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$applicant->email}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$applicant->category ? $applicant->category->name : ''}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{$applicant->ad ? $applicant->ad->title : ''}}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ Str::limit($applicant->description,20) }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{date('d-m-Y', strtotime($applicant->created_at)) }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">

                                        @if(auth()->user()->can('applicants delete') )
                                            <a class="btn btn-sm mx-1 btn-danger" href="#"
                                               wire:click.prevent="deleteId({{$applicant->id}})"
                                               data-bs-toggle="modal" data-bs-target="#deleteModalApplicant">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        @endif
                                            <a class="btn btn-sm mx-1 btn-info" href="#"
                                               wire:click.prevent="showNote({{$applicant->id}})"
                                               data-bs-toggle="modal" data-bs-target="#showNote">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pt-2">
                        {{$applicants->links()}}
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

@if(auth()->user()->can('applicants delete') )
    <!-- Modal deleteModalApplicant -->
        <div wire:ignore.self class="modal fade" id="deleteModalApplicant" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalApplicantLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalApplicantLabel">{{__("Delete Confirm")}}</h5>
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
        <!-- Modal deleteModalApplicant -->
    @endif
    <div wire:ignore.self class="modal fade" id="showNote" tabindex="-1" role="dialog"
         aria-labelledby="deleteModalApplicantLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalApplicantLabel">{{__("Notes")}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{$applicant->description}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn"
                            data-bs-dismiss="modal">{{__("Close")}}</button>
                </div>
            </div>
        </div>
    </div>

</div>
