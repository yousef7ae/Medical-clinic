@php use App\Models\Consultation; @endphp
<div>
    <div class="bg-white pt-3">
        <div class="container">
            {{--            @livewire('admin.layouts.sidebar-header') --}}
        </div>
    </div>
    <div class="container-fluid py-3">
        @include('layouts.admins.alert')
        <div class="main h-100">
            <h2 class="text-primary">{{__('Consultation')}}</h2>
            <div class="row g-0 mb-3">
                <div class="col-md-3 align-self-end">
                    <div class="d-inline">
                        @if (auth()->user()->can('consultations create'))
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                               data-bs-target="#CreateConsultation" wire:click.prevent="CreateConsultation"
                               data-bs-original-title="" title=""><i class="fa-solid fa-user-plus pe-1"></i>
                                {{__('Add a consultation')}}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row g-1 justify-content-end" wire:submit.prevent="search">

                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName"> {{__('Name Patient')}}</label>
                            <input type="text" class="form-control border-primary" wire:model.defer="name_patient"
                                   placeholder="{{__('Name Patient')}} " id="PatientName">
                        </div>

                        <div class="col-md-3 col-sm-7">
                            <label class="text-primary mb-1" for="PatientName">{{__('Date')}}</label>
                            <input type="date" class="form-control border-primary" wire:model.defer="date"
                                   placeholder="{{__('Date')}} " id="PatientName">
                        </div>

                        {{--                        <div class="col-md-2 col-sm-3 col-5"> --}}
                        {{--                            <label for="StartDate" class="text-primary mb-1">تاريخ البداية</label> --}}
                        {{--                            <input type="date" class="form-control border-primary pointer" --}}
                        {{--                                   id="StartDate"> --}}
                        {{--                        </div> --}}
                        {{--                        <div class="col-md-2 col-sm-3 col-5"> --}}
                        {{--                            <label for="endDate" class="text-primary mb-1">تاريخ النهاية</label> --}}
                        {{--                            <input type="date" class="form-control border-primary pointer" --}}
                        {{--                                   id="endDate"> --}}
                        {{--                        </div> --}}
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
                @if ($consultations->count() > 0)
                    <table class="table table-borderless mb-md-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">#</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Name Patient')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Consultation number')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Doctors Name')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('clinic')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Consultation Type')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Consultation date')}}</div>
                            </th>
                            <th scope="col" class="text-center p-1">
                                <div class="bg-primary rounded-2 text-white py-2 px-1">{{__('Control')}}</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($consultations as $key => $consultation)
                            <tr>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $key + $consultations->firstItem() }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{ $consultation->patient ? $consultation->patient->name : '' }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $consultation->serial_number }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{ $consultation->doctor ? $consultation->doctor->name : __('Nothing') }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{ $consultation->category ? $consultation->category->name : __('Nothing') }}
                                    </div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{ Consultation::typeList($consultation->type) }}</div>
                                </td>
                                <td class="text-center p-1">
                                    <div class="table-os">{{ $consultation->date }}</div>
                                </td>

                                <td class="text-center p-1">
                                    <div class="table-os">
                                        {{--                                            @if (auth()->user()->can('consultations print')) --}}
                                        <div class="dropdown">
                                            <a class="btn btn-sm mx-1 btn-warning" href="#" role="button"
                                               id="dropdownMenuLink" data-bs-toggle="dropdown"
                                               aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                @if (auth()->user()->can('prescriptions create'))
                                                    <li>
                                                        <a class="dropdown-item d-flex px-1" href="#"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#CreatePrescription"
                                                           wire:click.prevent="CreatePrescription({{ $consultation->id }})"
                                                           data-bs-original-title="" title=""><i></i><img
                                                                    class="d-block mx-1 mb-1" width="22"
                                                                    src="{{ asset('dashboard/img/icon-4.png') }}">
                                                            {{__('Add a patients prescription')}}</a>
                                                    </li>
                                                @endif
                                                {{--    <li><a class="dropdown-item d-flex px-1" target="_blank"  data-bs-toggle="modal"  href="" data-bs-target="#CreateConsultation" wire:click.prevent="CreateConsultation" ><img class="d-block mx-1 mb-1" width="22" src="{{ asset('dashboard/img/icon-4.png') }}"> اضافة روشيتة</a></li>
                                                                                                  <li><a class="dropdown-item d-flex px-1" target="_blank"  href=" --}}{{-- {{ route('admin.visits.print',[ 'patient_id' => $user->id ]) }} --}}{{-- "><img class="d-block mx-1 mb-1" width="22" src="{{ asset('dashboard/img/icon-1.png') }}"> الزيارات</a></li> --}}
                                                {{--                                                        <li><a class="dropdown-item d-flex px-1" target="_blank"  href=" --}}{{-- {{ route('admin.analyses.print',[ 'patient_id' => $user->id ]) }} --}}{{-- "><img class="d-block mx-1 mb-1" width="22" src="{{ asset('dashboard/img/icon-2.png') }}"> التحاليل</a></li> --}}
                                                {{--                                                        <li><a class="dropdown-item d-flex px-1" target="_blank"  href=" --}}{{-- {{ route('admin.patient.print',[ 'patient_id' => $user->id ]) }} --}}{{-- "><img class="d-block mx-1 mb-1" width="22" src="{{ asset('dashboard/img/icon-3.png') }}"> الجميع</a></li> --}}
                                                <li>
                                                    <a class="dropdown-item d-flex px-1" target="_blank"
                                                       href="{{ route('admin.consultations.single.print', $consultation->id) }}"><img
                                                                class="d-block mx-1 mb-1" width="22"
                                                                src="{{ asset('dashboard/img/icon-3.png') }}">
                                                        {{__('Print consultation')}}</a>
                                                </li>
                                            </ul>
                                        </div>

                                        @if (auth()->user()->can('consultations edit'))
                                            <a class="btn btn-sm mx-1 btn-info text-white border-end"
                                               href="#"
                                               wire:click.prevent="EditConsultation({{ $consultation->id }})"
                                               data-bs-toggle="modal" data-bs-target="#EditConsultation">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        @endif

                                        {{-- @role('Doctor') --}}
                                        @if (auth()->user()->can('consultations edit'))
                                            <a href="{{ route('admin.consultations.show-edit', $consultation->id) }}"
                                               class="btn btn-sm mx-1 btn-primary">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        @endif
                                        {{-- @endrole --}}

                                        @if (auth()->user()->can('consultations delete'))
                                            <a class="btn btn-sm mx-1 btn-danger" href="#"
                                               wire:click.prevent="deleteId({{ $consultation->id }})"
                                               data-bs-toggle="modal" data-bs-target="#deleteModalConsultation">
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
                        {{ $consultations->links() }}
                    </div>
                @else
                    <div class="text-center e404 py-3">
                        <img width="400" class="img-fluid mb-3" src="{{ asset('dashboard/img/img404.jpg') }}"
                             alt="">
                        <h4>{{ __('Empty list') }}</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if (auth()->user()->can('consultations create'))
        <!--  Modal CreateConsultation -->
        <div class="modal fade" wire:ignore.self id="CreateConsultation" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content px-3 bg-light rounded-4">
                    <div class="modal-header border-0 py-0">
                        <span></span>
                        <button type="button" class="close btn ms-0" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="text-center text-primary border-bottom">
                        <h5 class="" id="exampleModalLabel">{{__('Add a consultation')}}</h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{ __('Loading please wait') }} ...
                        </div>
                    </div>
                    @if ($create_consultation)
                        @livewire('admin.consultations.consultations-create', [$consultation_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal CreateConsultation -->
    @endif


    @if (auth()->user()->can('prescriptions create'))
        <!--  Modal CreatePrescription -->
        <div class="modal fade" wire:ignore.self id="CreatePrescription" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content px-3 bg-light rounded-4">
                    <div class="modal-header border-0 py-0">
                        <span></span>
                        <button type="button" class="close btn ms-0" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="text-center text-primary border-bottom">
                        <h5 class="" id="exampleModalLabel">{{ __('Add a prescriptions') }} </h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{ __('Loading please wait') }} ...
                        </div>
                    </div>
                    @if ($consultation_id)
                        @livewire('admin.prescriptions.prescriptions-create', [$prescription_id, $consultation_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal CreatePrescription -->
    @endif

    @if (auth()->user()->can('consultations edit'))
        <!--  Modal EditConsultation -->
        <div class="modal fade" wire:ignore.self id="EditConsultation" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content px-3 bg-light rounded-4">
                    <div class="modal-header border-0 py-0">
                        <span></span>
                        <button type="button" class="close btn ms-0" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="text-center text-primary border-bottom">
                        <h5 class="" id="exampleModalLabel">{{ __('Edit Consultation') }}</h5>
                    </div>
                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{ __('Loading please wait') }} ...
                        </div>
                    </div>

                    @if ($consultation_id)
                        @livewire('admin.consultations.consultations-edit', [$consultation_id])
                    @endif

                </div>
            </div>
        </div>
        <!--  Modal EditConsultation -->
    @endif

    @if (auth()->user()->can('consultations delete'))
        <!-- Modal deleteModalConsultation -->
        <div wire:ignore.self class="modal fade" id="deleteModalConsultation" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalConsultationLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalConsultationLabel">{{ __('Delete Confirm') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('Are you sure want to delete?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal"
                                data-bs-dismiss="modal">{{ __('Yes, Delete') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal deleteModalConsultation -->
    @endif
</div>
