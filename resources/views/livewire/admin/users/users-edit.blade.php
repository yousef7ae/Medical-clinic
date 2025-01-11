<div class="container-fluid py-3">
    <div class="py-4">
        <h2 class="h4 text-center py-3">{{__("Patient Information")}}</h2>

        <div class="mb-3 container ">
            <form class="modal-body " method="post" wire:submit.prevent="update">
                {{csrf_field()}}


                <div class="row g-2">

                    <div class="text-center mb-3">
                        <label for="File1" class="pointer">
                    <span class="img-edit mx-auto">
                        @if($imageTemp)
                            <img class="rounded-circle"
                                 width="105" height="105"
                                 src="{{ $imageTemp->temporaryUrl() }}">
                        @else
                            @if(!empty($user['image']))
                                <img class="rounded-circle"
                                     width="105" height="105" data-holder-rendered="true"
                                     src="{{ $user['image']}}">
                            @endif
                        @endif
                    </span>
                            <span class="d-block po mt-2"> {{__("Click here to modify the image")}}</span>
                            @error('imageTemp')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </label>
                        <input type="file" wire:model.defer="imageTemp" class="d-none @error('imageTemp') is-invalid @enderror "
                               id="File1">
                    </div>

                    <div class="border  row pt-3">

                        <div class="col-6 mb-2">
                            <div class="form-group position-relative">
                                <label class="control-label">{{__("Full Name")}}</label>
                                <input value="" wire:model="user.name" placeholder="{{__("Add Name")}}"
                                       name="name"
                                       class="form-control @error('user.name') is-invalid @enderror" type="text">
                                @error('user.name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                {{--                <select class="form-select mt-n2 felter" multiple aria-label="multiple select example" size="4" >--}}
                                {{--                        <option>حمادة غالب</option>--}}
                                {{--                        <option>كمال العمري</option>--}}
                                {{--                        <option>احمد الاشقر</option>--}}
                                {{--                        <option>احمد ابو غراب</option>--}}
                                {{--                        <option>كمال العمري</option>--}}
                                {{--                        <option>احمد الاشقر</option>--}}
                                {{--                        <option>احمد ابو غراب</option>--}}
                                {{--                </select>--}}
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("Marital State :")}}</label>
                                <select wire:model.defer="user.gender"
                                        class="form-control @error('user.gender') is-invalid @enderror">
                                    <option value="0">Select ...</option>
                                    @foreach(\App\Models\User::gender(false) as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @error('user.gender')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("Birth Date")}}</label>
                                <input value="" wire:model.defer="user.birth_date"
                                       class="form-control @error('user.birth_date') is-invalid @enderror" type="date">

                                @error('user.birth_date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("ID Number")}}</label>
                                <input wire:model.defer="user.id_number" placeholder="ID Number"
                                       class="form-control @error('user.id_number') is-invalid @enderror" type="number">
                                @error('user.id_number')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__('Birth Place')}}</label>
                                <input wire:model.defer="user.birth_place" placeholder="Birth Place"
                                       class="form-control @error('user.birth_place') is-invalid @enderror" type="text">
                                @error('user.birth_place')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__('Occupation')}}</label>
                                <input wire:model.defer="user.occupation" placeholder="Occupation"
                                       class="form-control @error('user.occupation') is-invalid @enderror" type="text">
                                @error('user.occupation')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

{{--                        <div class="col-6 mb-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">{{__("Allergy :")}}</label>--}}
{{--                                <select wire:model="user.allergy"--}}
{{--                                        class="form-control @error('user.allergy') is-invalid @enderror">--}}
{{--                                    <option value="0">Select ...</option>--}}
{{--                                    @foreach(\App\Models\User::allergy(false) as $key => $value)--}}
{{--                                        <option value="{{$key}}">{{$value}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                @error('user.allergy')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        @if($user['allergy'] == 1 )--}}
{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Form</label>--}}
{{--                                    <input wire:model.defer="user.allergy_text"--}}
{{--                                           placeholder="{{__("----------------------------------------------------------------")}}"--}}
{{--                                           class="form-control @error('user.allergy_text') is-invalid @enderror"--}}
{{--                                           type="text">--}}
{{--                                    @error('user.allergy_text')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div class="col-6 mb-2"></div>--}}
{{--                        @endif--}}

{{--                        <div class="col-12 mb-2">--}}
{{--                            <p class="control-label">{{__("Past medical history :")}}</p>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" wire:model="user.medical_history" type="checkbox" id="inlineCheckbox1" value="1">--}}
{{--                                <label class="form-check-label" for="inlineCheckbox1">DIABETES MELLITUS</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" wire:model="user.medical_history2" type="checkbox" id="inlineCheckbox2" value="1">--}}
{{--                                <label class="form-check-label" for="inlineCheckbox2">HYPERTENSION</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" wire:model="user.medical_history3" type="checkbox" id="inlineCheckbox3" value="1">--}}
{{--                                <label class="form-check-label" for="inlineCheckbox3">CARDIOVASCULAR DISEASE</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        @if( $user['medical_history'] != 0 and $user['medical_history'] == 1 )--}}
{{--                            <p class="control-label fw-bold">{{__("DIABETES MELLITUS")}}</p>--}}
{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Form</label>--}}
{{--                                    <input wire:model.defer="user.medical_history_text"--}}
{{--                                           placeholder="{{__("----------------------------------------------------------------")}}"--}}
{{--                                           class="form-control @error('user.medical_history_text') is-invalid @enderror"--}}
{{--                                           type="text">--}}
{{--                                    @error('user.medical_history_text')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">{{__("DRUG")}}</label>--}}
{{--                                    <input wire:model.defer="user.medical_history_drug"--}}
{{--                                           placeholder="{{__("----------------------------------------------------------------")}}"--}}
{{--                                           class="form-control @error('user.medical_history_drug') is-invalid @enderror"--}}
{{--                                           type="text">--}}
{{--                                    @error('user.medical_history_drug')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        @if ($user['medical_history2'] != 0 and $user['medical_history2'] == 1)--}}
{{--                            <p class="control-label fw-bold">{{__("HYPERTENSION")}}</p>--}}
{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Form</label>--}}
{{--                                    <input wire:model.defer="user.medical_history_text2"--}}
{{--                                           placeholder="{{__("----------------------------------------------------------------")}}"--}}
{{--                                           class="form-control @error('user.medical_history_text2') is-invalid @enderror"--}}
{{--                                           type="text">--}}
{{--                                    @error('user.medical_history_text2')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">{{__("DRUG")}}</label>--}}
{{--                                    <input wire:model.defer="user.medical_history_drug2"--}}
{{--                                           placeholder="{{__("----------------------------------------------------------------")}}"--}}
{{--                                           class="form-control @error('user.medical_history_drug2') is-invalid @enderror"--}}
{{--                                           type="text">--}}
{{--                                    @error('user.medical_history_drug2')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        @if ($user['medical_history3'] != 0 and $user['medical_history3'] == 1)--}}
{{--                            <p class="control-label fw-bold">{{__("CARDIOVASCULAR DISEASE")}}</p>--}}
{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Form</label>--}}
{{--                                    <input wire:model.defer="user.medical_history_text3"--}}
{{--                                           placeholder="{{__("----------------------------------------------------------------")}}"--}}
{{--                                           class="form-control @error('user.medical_history_text3') is-invalid @enderror"--}}
{{--                                           type="text">--}}
{{--                                    @error('user.medical_history_text3')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">{{__("DRUG")}}</label>--}}
{{--                                    <input wire:model.defer="user.medical_history_drug3"--}}
{{--                                           placeholder="{{__("----------------------------------------------------------------")}}"--}}
{{--                                           class="form-control @error('user.medical_history_drug3') is-invalid @enderror"--}}
{{--                                           type="text">--}}
{{--                                    @error('user.medical_history_drug3')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        @endif--}}


{{--                        <div class="col-12 mb-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">{{__("Other diagnosis")}}</label>--}}
{{--                                <input wire:model.defer="user.other_diagnosis"--}}
{{--                                       placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"--}}
{{--                                       class="form-control @error('user.other_diagnosis') is-invalid @enderror"--}}
{{--                                       type="text">--}}
{{--                                @error('user.other_diagnosis')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-12 mb-2">--}}
{{--                            <p class="control-label">{{__("SURGERY")}}</p>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" wire:model="user.surgery" type="checkbox" id="inlineCheckbox1" value="1">--}}
{{--                                <label class="form-check-label" for="inlineCheckbox1">RADICAL PROSTATECTOMY</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" wire:model="user.surgery2" type="checkbox" id="inlineCheckbox2" value="1">--}}
{{--                                <label class="form-check-label" for="inlineCheckbox2">Abdominal Surgery</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" wire:model="user.surgery3" type="checkbox" id="inlineCheckbox3" value="1">--}}
{{--                                <label class="form-check-label" for="inlineCheckbox3">Back Surgery</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        @if( $user['surgery'] != 0 and $user['surgery'] == 1 )--}}
{{--                            <p class="control-label fw-bold">{{__("RADICAL PROSTATECTOMY")}}</p>--}}
{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">From</label>--}}
{{--                                    <input wire:model.defer="user.surgery_text"--}}
{{--                                           placeholder="{{__("----------------------------------------------------------------")}}"--}}
{{--                                           class="form-control @error('user.surgery_text') is-invalid @enderror"--}}
{{--                                           type="text">--}}
{{--                                    @error('user.surgery_text')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Date</label>--}}
{{--                                    <input wire:model.defer="user.surgery_date"--}}
{{--                                           class="form-control @error('user.surgery_date') is-invalid @enderror"--}}
{{--                                           type="date">--}}
{{--                                    @error('user.surgery_date')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        @if( $user['surgery2'] != 0 and $user['surgery2'] == 1 )--}}
{{--                            <p class="control-label fw-bold">{{__("Abdominal Surgery")}}</p>--}}
{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">From</label>--}}
{{--                                    <input wire:model.defer="user.surgery2_text"--}}
{{--                                           placeholder="{{__("----------------------------------------------------------------")}}"--}}
{{--                                           class="form-control @error('user.surgery2_text') is-invalid @enderror"--}}
{{--                                           type="text">--}}
{{--                                    @error('user.surgery2_text')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Date</label>--}}
{{--                                    <input wire:model.defer="user.surgery2_date"--}}
{{--                                           class="form-control @error('user.surgery2_date') is-invalid @enderror"--}}
{{--                                           type="date">--}}
{{--                                    @error('user.surgery2_date')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        @if( $user['surgery3'] != 0 and $user['surgery3'] == 1 )--}}
{{--                            <p class="control-label fw-bold">{{__("Back Surgery")}}</p>--}}
{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">From</label>--}}
{{--                                    <input wire:model.defer="user.surgery3_text"--}}
{{--                                           placeholder="{{__("----------------------------------------------------------------")}}"--}}
{{--                                           class="form-control @error('user.surgery3_text') is-invalid @enderror"--}}
{{--                                           type="text">--}}
{{--                                    @error('user.surgery3_text')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-6 mb-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">Date</label>--}}
{{--                                    <input wire:model.defer="user.surgery3_date"--}}
{{--                                           class="form-control @error('user.surgery3_date') is-invalid @enderror"--}}
{{--                                           type="date">--}}
{{--                                    @error('user.surgery3_date')--}}
{{--                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        <div class="col-12 mb-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">{{__("Other surgery")}}</label>--}}
{{--                                <input wire:model.defer="user.other_surgery"--}}
{{--                                       placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"--}}
{{--                                       class="form-control @error('user.other_surgery') is-invalid @enderror"--}}
{{--                                       type="text">--}}
{{--                                @error('user.other_surgery')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-12 mb-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">{{__("Other Long Term medication")}}</label>--}}
{{--                                <input wire:model.defer="user.other_medication"--}}
{{--                                       placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"--}}
{{--                                       class="form-control @error('user.other_medication') is-invalid @enderror"--}}
{{--                                       type="text">--}}
{{--                                @error('user.other_medication')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-12 mb-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">{{__("LAB")}}</label>--}}
{{--                                <input wire:model.defer="user.lab"--}}
{{--                                       placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"--}}
{{--                                       class="form-control @error('user.lab') is-invalid @enderror" type="text">--}}
{{--                                @error('user.lab')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-12 mb-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label--}}
{{--                                    class="control-label">{{__("the international index of erectile function questionnaire ( IIEF 5 )")}}</label>--}}
{{--                                <input wire:model.defer="user.international_index"--}}
{{--                                       placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"--}}
{{--                                       class="form-control @error('user.international_index') is-invalid @enderror"--}}
{{--                                       type="text">--}}
{{--                                @error('user.international_index')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-12 mb-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">{{__("examination")}}</label>--}}
{{--                                <input wire:model.defer="user.examination"--}}
{{--                                       placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"--}}
{{--                                       class="form-control @error('user.examination') is-invalid @enderror" type="text">--}}
{{--                                @error('user.examination')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-12 mb-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">{{__("Impression and recommendation")}}</label>--}}
{{--                                <textarea rows="5" value="" wire:model.defer="user.impression_recommendation"--}}
{{--                                          placeholder="--------------------------------------------------------------------------------------------------------------------------------"--}}
{{--                                          id="impression_recommendation" name="impression_recommendation"--}}
{{--                                          class="form-control editor @error('user.impression_recommendation') is-invalid @enderror"--}}
{{--                                          ></textarea>--}}
{{--                                @error('user.impression_recommendation')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                    </div>--}}


{{--                    <div class="col-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">Image</label>--}}
{{--                            <input wire:model.defer="user.image"--}}
{{--                                   name="image"--}}
{{--                                   class="form-control @error('user.image') is-invalid @enderror" type="file">--}}
{{--                            @error('user.image')--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="col-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">Mobile</label>--}}
{{--                            <input wire:model.defer="user.mobile" placeholder="Add Mobile"--}}
{{--                                   class="form-control @error('user.mobile') is-invalid @enderror" type="number">--}}
{{--                            @error('user.mobile')--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">Email</label>--}}
{{--                            <input wire:model.defer="user.email" placeholder="Add Email"--}}
{{--                                   class="form-control @error('user.email') is-invalid @enderror" type="email">--}}
{{--                            @error('user.email')--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                            @enderror--}}

{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="col-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">job</label>--}}
{{--                            <input wire:model.defer="user.job" placeholder="Add job"--}}

{{--                                   class="form-control @error('user.job') is-invalid @enderror" type="text">--}}
{{--                            @error('user.job')--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="col-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">insurance</label>--}}
{{--                            <select wire:model.defer="user.insurance_id"--}}
{{--                                    class="form-control @error('user.insurance_id') is-invalid @enderror">--}}
{{--                                <option value="0">Select ...</option>--}}
{{--                                @foreach($insurances as $key => $insurance)--}}
{{--                                    <option value="{{$insurance->id}}">{{ $insurance->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('user.insurance_id')--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    @if (auth()->user()->hasRole('Admin') or auth()->user()->hasRole('Secretarial') )--}}
{{--                        <div class="col-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="control-label">doctor</label>--}}
{{--                                <select wire:model.defer="user.doctor_id"--}}
{{--                                        class="form-control @error('user.doctor_id') is-invalid @enderror">--}}
{{--                                    <option value="0">Select ...</option>--}}
{{--                                    @foreach($doctors as $key => $doctor)--}}
{{--                                        <option value="{{$doctor->id}}">{{ $doctor->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                @error('user.doctor_id')--}}
{{--                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <div class="col-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">Clinic departments</label>--}}
{{--                            <select wire:model.defer="user.category_id"--}}
{{--                                    class="form-control @error('user.category_id') is-invalid @enderror">--}}
{{--                                <option value="0">Select ...</option>--}}
{{--                                @foreach($categories as $key => $category)--}}
{{--                                    <option value="{{$category->id}}">{{ $category->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('user.category_id')--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">weight</label>--}}
{{--                            <input wire:model.defer="user.weight" placeholder="Add weight"--}}

{{--                                   class="form-control @error('user.weight') is-invalid @enderror" type="text">--}}
{{--                            @error('user.weight')--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">height</label>--}}
{{--                            <input wire:model.defer="user.height" placeholder="Add height"--}}

{{--                                   class="form-control @error('user.height') is-invalid @enderror" type="text">--}}
{{--                            @error('user.height')--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">previous operations</label>--}}
{{--                            <input wire:model.defer="user.previous_operations"--}}
{{--                                   placeholder="Add previous operations"--}}
{{--                                   class="form-control @error('user.previous_operations') is-invalid @enderror"--}}
{{--                                   type="text">--}}
{{--                            @error('user.previous_operations')--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">address</label>--}}
{{--                            <input wire:model.defer="user.address" placeholder="address"--}}

{{--                                   class="form-control @error('user.address') is-invalid @enderror" type="text">--}}
{{--                            @error('user.address')--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('Mobile')}}</label>
                                <input wire:model.defer="user.mobile" placeholder="{{__('Add Mobile')}}"
                                       class="form-control @error('user.mobile') is-invalid @enderror" type="number">
                                @error('user.mobile')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('Email')}}</label>
                                <input wire:model.defer="user.email" placeholder="Add Email"
                                       class="form-control @error('user.email') is-invalid @enderror" type="email">
                                @error('user.email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('job')}}</label>
                                <input wire:model.defer="user.job" placeholder="{{__('Add job')}}"

                                       class="form-control @error('user.job') is-invalid @enderror" type="text">
                                @error('user.job')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>



                        @if (auth()->user()->hasRole('Admin') or auth()->user()->hasRole('Secretarial') )
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">{{__('doctor')}}</label>
                                    <select wire:model.defer="user.doctor_id"
                                            class="form-control @error('user.doctor_id') is-invalid @enderror">
                                        <option value="0">{{__('Select')}} ...</option>
                                        @foreach($doctors as $key => $doctor)
                                            <option value="{{$doctor->id}}">{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user.doctor_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('Clinic departments')}}</label>
                                <select wire:model.defer="user.category_id"
                                        class="form-control @error('user.category_id') is-invalid @enderror">
                                    <option value="0">Select ...</option>
                                    @foreach($categories as $key => $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('user.category_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('weight')}}</label>
                                <input wire:model.defer="user.weight" placeholder="{{__('Add weight')}}"

                                       class="form-control @error('user.weight') is-invalid @enderror" type="text">
                                @error('user.weight')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('height')}}</label>
                                <input wire:model.defer="user.height" placeholder="{{__('Add height')}}"

                                       class="form-control @error('user.height') is-invalid @enderror" type="text">
                                @error('user.height')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('previous operations')}}</label>
                                <input wire:model.defer="user.previous_operations"
                                       placeholder="{{__('Add previous operations')}}"
                                       class="form-control @error('user.previous_operations') is-invalid @enderror"
                                       type="text">
                                @error('user.previous_operations')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('address')}}</label>
                                <input wire:model.defer="user.address" placeholder="{{__('address')}}"

                                       class="form-control @error('user.address') is-invalid @enderror" type="text">
                                @error('user.address')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <br/>
                    </div>
                </div>

                <div>
                    <div wire:loading>
                        <i class="fas fa-sync fa-spin"></i>
                        {{__("Loading please wait")}} ...
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button wire:loading.attr="disabled" class="btn btn-primary w-25"
                            type="submit">{{__("Update")}}</button>
                </div>
            </form>
        </div>

    </div>
</div>


