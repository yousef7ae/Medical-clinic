<section class="container">
    <div class="row max-w970 mx-auto mt-md-5 mt-3">
        <div class="col-12"><h1 class="text-primary h-3 text-center mb-5">{{__("Control panel home page")}}</h1></div>

        @if (auth()->user()->hasRole('Nurse') or auth()->user()->hasRole('Secretarial') )

            <div class="col-md-4 col-6 mb-4">
                <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                    <div class="row h-100 align-items-center g-md-2 g-1">
                        <div class="col-sm-5 text-center">
                            <img width="90" class="img-fluid" src="{{asset('dashboard/img/img-2.png')}}" alt="">
                        </div>
                        <div class="col-sm-7 text-sm-start text-center">
                            <h5 class="fw-bold mb-0">{{__("Number of patients")}}  </h5>
                            <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{$patients}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-6 mb-4">
                <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                    <div class="row h-100 align-items-center g-md-2 g-1">
                        <div class="col-sm-5 text-center">
                            <img width="90" class="img-fluid" src="{{asset('dashboard/img/img-8.png')}}" alt="">
                        </div>
                        <div class="col-sm-7 text-sm-start text-center">
                            <h5 class="fw-bold mb-0"> {{__("Categories")}} </h5>
                            <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{$categories}}</h2>
                        </div>
                    </div>
                </div>
            </div>

        @elseif (auth()->user()->hasRole('Admin'))

            <div class="col-md-4 col-6 mb-4">
                <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                    <div class="row h-100 align-items-center g-md-2 g-1">
                        <div class="col-sm-5 text-center">
                            <img width="90" class="img-fluid" src="{{asset('dashboard/img/img-2.png')}}" alt="">
                        </div>
                        <div class="col-sm-7 text-sm-start text-center">
                            <h5 class="fw-bold mb-0"> {{__("Number of patients")}} </h5>
                            <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{$patients}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-6 mb-4">
                <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                    <div class="row h-100 align-items-center g-md-2 g-1">
                        <div class="col-sm-5 text-center">
                            <img width="90" class="img-fluid" src="{{asset('dashboard/img/img-8.png')}}" alt="">
                        </div>
                        <div class="col-sm-7 text-sm-start text-center">
                            <h5 class="fw-bold mb-0">{{__("Categories")}}  </h5>
                            <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{$categories}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-6 mb-4">
                <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                    <div class="row h-100 align-items-center g-md-2 g-1">
                        <div class="col-sm-5 text-center">
                            <img width="90" class="img-fluid" src="{{asset('dashboard/img/img-3.png')}}" alt="">
                        </div>
                        <div class="col-sm-7 text-sm-start text-center">
                            <h5 class="fw-bold mb-0">{{__("All reservations")}}   </h5>
                            <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{$reservations}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-6 mb-4">
                <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                    <div class="row h-100 align-items-center g-md-2 g-1">
                        <div class="col-sm-5 text-center">
                            <img width="90" class="img-fluid" src="{{asset('dashboard/img/img-4.png')}}" alt="">
                        </div>
                        <div class="col-sm-7 text-sm-start text-center">
                            <h5 class="fw-bold mb-0"> {{__("Free consultations")}} </h5>
                            <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{$free_consultation}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6 mb-4">
                <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                    <div class="row h-100 align-items-center g-md-2 g-1">
                        <div class="col-sm-5 text-center">
                            <img width="90" class="img-fluid" src="{{asset('dashboard/img/img-5.png')}}" alt="">
                        </div>
                        <div class="col-sm-7 text-sm-start text-center">
                            <h5 class="fw-bold mb-0"> {{__("Paid consultations")}}</h5>
                            <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{$paid_consultation}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-6 mb-4">
                <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                    <div class="row h-100 align-items-center g-md-2 g-1">
                        <div class="col-sm-5 text-center">
                            <img width="90" class="img-fluid" src="{{asset('dashboard/img/img-6.png')}}" alt="">
                        </div>
                        <div class="col-sm-7 text-sm-start text-center">
                            <h5 class="fw-bold mb-0"> {{__("Number of Employees")}} </h5>
                            <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{$employees}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-6 mb-4">
                <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                    <div class="row h-100 align-items-center g-md-2 g-1">
                        <div class="col-sm-5 text-center">
                            <img width="90" class="img-fluid" src="{{asset('dashboard/img/img-9.png')}}" alt="">
                        </div>
                        <div class="col-sm-7 text-sm-start text-center">
                            <h5 class="fw-bold mb-0"> {{__("Number of news added")}}</h5>
                            <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{$posts}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
