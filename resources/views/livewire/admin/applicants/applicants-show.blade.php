<div style="display: contents">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="fa fa-arrow-right6 mr-2"></i> <span class="font-weight-semibold">{{__("Home")}}</span> -
                    {{__("Dashboard")}}</h4>
                <a href="{{route('admin.home')}}" class="header-elements-toggle text-default d-md-none"><i
                        class="fa fa-more"></i></a>
            </div>

        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb ml-2">
                    <a href="{{route('admin.home')}}" class="breadcrumb-item"><i
                            class="fa fa-home2 mr-2"></i> {{__("Home")}}</a>
                    <span class="breadcrumb-item active">{{__("Dashboard")}}</span>
                </div>
                <a href="{{route('admin.home')}}" class="header-elements-toggle text-default d-md-none"><i
                        class="fa fa-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <div class="col-md-6 text-end">
        <div class="form-group ">
            <a href="{{ $applicant->file ? $applicant->file : url('dashboard/images/1.png')}}"
               data-fancybox="gallery-{{$applicant->id}}"
               data-caption="{{$applicant->first_name.' '.$applicant->last_name}}">
                <img width="150" src="{{ $applicant->file ? $applicant->file : url('dashboard/images/1.png')}}"
                     alt="user-avatar"
                     class="img-thumbnail rounded-circle">
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header h4 text-success font-weight-bold">{{ __('Applicant Details') }}</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label text-success font-weight-bold">{{__("Name")}}: </label>
                        <b>{{$applicant->name}}</b>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label text-success font-weight-bold">{{__("Email")}}: </label>
                        <b>{{$applicant->email}}</b>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label text-success font-weight-bold">{{__("Mobile")}}: </label>
                        <b>{{$applicant->mobile}}</b>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label text-success font-weight-bold">{{__("Status")}}: </label>
                        <b>{{ \App\Models\Applicant::statusList($applicant->status) ? \App\Models\Applicant::statusList($applicant->status) : '' }}</b>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label text-success font-weight-bold">{{__("created_at")}}: </label>
                        <b>{{date('d-m-Y', strtotime($applicant->created_at)) }}</b>
                    </div>
                </div>

            </div>

        </div>
    </div>



    @if ( $applicant->service_id != null)


        <div class="card">
            <div class="card-header h4 text-success font-weight-bold">{{ __('Service request details') }}</div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-success font-weight-bold">{{ __('Service name') }}:</label>
                            <b>{{ $applicant->service ? $applicant->service->title : '' }}</b>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-success font-weight-bold">{{ __('Payment method') }} :</label>
                            <b>{{ \App\Models\Applicant::payment_methodList($applicant->payment_method) ? \App\Models\Applicant::payment_methodList($applicant->payment_method) : '' }}</b>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label text-success font-weight-bold">{{ __('Country') }} : </label>
                            <b>{{ $applicant->country ? $applicant->country->name : '' }}</b>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    @endif

    <div class="card">
        <div class="card-header h4 text-success font-weight-bold">{{ __('Description') }}</div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        @if (!empty($applicant->description))
                            <b>{!! nl2br($applicant->description) !!}</b>
                        @else
                            <b>فارغ</b>
                        @endif
                    </div>
                </div>

                @if (!empty($applicant->file) and $applicant->package_id != null)
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{$applicant->file}}" class="btn btn-success mb-2">  {{__("Download file")}} <i
                                    class="fa fa-arrow-down"></i> </a>
                        </div>
                    </div>
                @endif

            </div>

        </div>
    </div>


</div>

