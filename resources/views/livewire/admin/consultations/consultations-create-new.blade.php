@php use App\Models\Consultation; @endphp
<div class="container-fluid py-3">
    <div class="py-4">

        <h2 class="h4 text-center py-3">{{__("Add a consultation")}}</h2>
        <div class="mb-3 container ">
            <form class="modal-body " method="post" wire:submit.prevent="store">
                {{csrf_field()}}

                <div class="row g-2">

                    <div class="col-12">
                        <div class="form-group">
                            <label class="control-label">{{__("Name Patient")}}</label>
                            <select wire:model.defer="consultation.patient_id"
                                    class="form-control @error('consultation.patient_id') is-invalid @enderror">
                                <option value="0">{{__("Select Name Patient")}} ...</option>
                                @foreach($patients as $key => $patient)
                                    <option value="{{$patient->id}}">{{ $patient->name }}</option>
                                @endforeach
                            </select>
                            @error('consultation.patient_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">{{__("Categories")}}</label>
                            <select wire:model.defer="consultation.category_id"
                                    class="form-control @error('consultation.category_id') is-invalid @enderror">
                                <option value="0">{{__("Select clinic")}} ...</option>
                                @foreach($categories as $key => $category)
                                    <option value="{{$category->id}}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('consultation.category_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    @if (!auth()->user()->hasRole('Doctor'))
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">{{__("doctor")}}</label>
                                <select wire:model.defer="consultation.doctor_id"
                                        class="form-control @error('consultation.doctor_id') is-invalid @enderror">
                                    <option value="0">{{__("Select doctor")}} ...</option>
                                    @foreach($doctors as $key => $doctor)
                                        <option value="{{$doctor->id}}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                                @error('consultation.doctor_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    @endif

                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">{{__("Consultation Type")}}</label>
                            <select wire:model.defer="consultation.type"
                                    class="form-control @error('consultation.type') is-invalid @enderror">
                                <option value="0">{{__("Select")}} ...</option>
                                @foreach(Consultation::typeList(false) as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            @error('consultation.type')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">{{ __('Disease') }}</label>
                            <input value="" wire:model.defer="consultation.disease"
                                   placeholder="{{ __('Add Disease') }}"
                                   name="disease"
                                   class="form-control @error('consultation.disease') is-invalid @enderror" type="text">
                            @error('consultation.disease')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">{{__("Booking Date")}}</label>
                            <input wire:model.defer="consultation.date"
                                   class="form-control @error('consultation.date') is-invalid @enderror" type="date">
                            @error('consultation.date')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="control-label">{{ __('Amount') }}</label>
                            <input value="" wire:model.defer="consultation.amount"
                                   placeholder="{{ __('Add Amount') }}"
                                   name="amount"
                                   class="form-control @error('consultation.amount') is-invalid @enderror"
                                   type="number">
                            @error('consultation.amount')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label for="form11">{{__("Notes")}} </label>
                        <textarea class="form-control @error('consultation.notes') is-invalid @enderror "
                                  wire:model.defer="consultation.notes" placeholder="{{__("Add Notes")}}" id="form11"
                                  rows="4"></textarea>
                        @error('consultation.notes')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>


                    <div class="col-12 mb-2">
                        <p class="control-label">{{__("Past medical history :")}}</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" wire:model="consultation.medical_history" type="checkbox"
                                   id="inlineCheckbox1" value="1">
                            <label class="form-check-label" for="inlineCheckbox1">{{__("DIABETES MELLITUS")}}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" wire:model="consultation.medical_history2" type="checkbox"
                                   id="inlineCheckbox2" value="1">
                            <label class="form-check-label" for="inlineCheckbox2">{{__("HYPERTENSION")}}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" wire:model="consultation.medical_history3" type="checkbox"
                                   id="inlineCheckbox3" value="1">
                            <label class="form-check-label"
                                   for="inlineCheckbox3">{{__("CARDIOVASCULAR DISEASE")}}</label>
                        </div>
                    </div>
                    @if( $consultation['medical_history'] != 0 and $consultation['medical_history'] == 1 )
                        <p class="control-label fw-bold">{{__("DIABETES MELLITUS")}}</p>
                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("From")}}</label>
                                <input wire:model.defer="consultation.medical_history_text"
                                       placeholder="{{__("----------------------------------------------------------------")}}"
                                       class="form-control @error('consultation.medical_history_text') is-invalid @enderror"
                                       type="text">
                                @error('consultation.medical_history_text')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("DRUG")}}</label>
                                <input wire:model.defer="consultation.medical_history_drug"
                                       placeholder="{{__("----------------------------------------------------------------")}}"
                                       class="form-control @error('consultation.medical_history_drug') is-invalid @enderror"
                                       type="text">
                                @error('consultation.medical_history_drug')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    @endif
                    @if ($consultation['medical_history2'] != 0 and $consultation['medical_history2'] == 1)
                        <p class="control-label fw-bold">{{__("HYPERTENSION")}}</p>
                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("From")}}</label>
                                <input wire:model.defer="consultation.medical_history_text2"
                                       placeholder="{{__("----------------------------------------------------------------")}}"
                                       class="form-control @error('consultation.medical_history_text2') is-invalid @enderror"
                                       type="text">
                                @error('consultation.medical_history_text2')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("DRUG")}}</label>
                                <input wire:model.defer="consultation.medical_history_drug2"
                                       placeholder="{{__("----------------------------------------------------------------")}}"
                                       class="form-control @error('consultation.medical_history_drug2') is-invalid @enderror"
                                       type="text">
                                @error('consultation.medical_history_drug2')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    @endif
                    @if ($consultation['medical_history3'] != 0 and $consultation['medical_history3'] == 1)
                        <p class="control-label fw-bold">{{__("CARDIOVASCULAR DISEASE")}}</p>
                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("From")}}</label>
                                <input wire:model.defer="consultation.medical_history_text3"
                                       placeholder="{{__("----------------------------------------------------------------")}}"
                                       class="form-control @error('consultation.medical_history_text3') is-invalid @enderror"
                                       type="text">
                                @error('consultation.medical_history_text3')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("DRUG")}}</label>
                                <input wire:model.defer="consultation.medical_history_drug3"
                                       placeholder="{{__("----------------------------------------------------------------")}}"
                                       class="form-control @error('consultation.medical_history_drug3') is-invalid @enderror"
                                       type="text">
                                @error('consultation.medical_history_drug3')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                    @endif


                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label class="control-label">{{__("Other diagnosis")}}</label>
                            <input wire:model.defer="consultation.other_diagnosis"
                                   placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"
                                   class="form-control @error('consultation.other_diagnosis') is-invalid @enderror"
                                   type="text">
                            @error('consultation.other_diagnosis')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-12 mb-2">
                        <p class="control-label">{{__("SURGERY")}}</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" wire:model="consultation.surgery" type="checkbox"
                                   id="inlineCheckbox1" value="1">
                            <label class="form-check-label"
                                   for="inlineCheckbox1">{{__("RADICAL PROSTATECTOMY")}}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" wire:model="consultation.surgery2" type="checkbox"
                                   id="inlineCheckbox2" value="1">
                            <label class="form-check-label" for="inlineCheckbox2">{{__("Abdominal Surgery")}}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" wire:model="consultation.surgery3" type="checkbox"
                                   id="inlineCheckbox3" value="1">
                            <label class="form-check-label" for="inlineCheckbox3">{{__("Back Surgery")}}</label>
                        </div>
                    </div>

                    @if( $consultation['surgery'] != 0 and $consultation['surgery'] == 1 )
                        <p class="control-label fw-bold">{{__("RADICAL PROSTATECTOMY")}}</p>
                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("From")}}</label>
                                <input wire:model.defer="consultation.surgery_text"
                                       placeholder="{{__("----------------------------------------------------------------")}}"
                                       class="form-control @error('consultation.surgery_text') is-invalid @enderror"
                                       type="text">
                                @error('consultation.surgery_text')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("Date")}}</label>
                                <input wire:model.defer="consultation.surgery_date"
                                       class="form-control @error('consultation.surgery_date') is-invalid @enderror"
                                       type="date">
                                @error('consultation.surgery_date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    @endif

                    @if( $consultation['surgery2'] != 0 and $consultation['surgery2'] == 1 )
                        <p class="control-label fw-bold">{{__("Abdominal Surgery")}}</p>
                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("From")}}</label>
                                <input wire:model.defer="consultation.surgery2_text"
                                       placeholder="{{__("----------------------------------------------------------------")}}"
                                       class="form-control @error('consultation.surgery2_text') is-invalid @enderror"
                                       type="text">
                                @error('consultation.surgery2_text')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("Date")}}</label>
                                <input wire:model.defer="consultation.surgery2_date"
                                       class="form-control @error('consultation.surgery2_date') is-invalid @enderror"
                                       type="date">
                                @error('consultation.surgery2_date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    @endif

                    @if( $consultation['surgery3'] != 0 and $consultation['surgery3'] == 1 )
                        <p class="control-label fw-bold">{{__("Back Surgery")}}</p>
                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("From")}}</label>
                                <input wire:model.defer="consultation.surgery3_text"
                                       placeholder="{{__("----------------------------------------------------------------")}}"
                                       class="form-control @error('consultation.surgery3_text') is-invalid @enderror"
                                       type="text">
                                @error('consultation.surgery3_text')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <label class="control-label">{{__("Date")}}</label>
                                <input wire:model.defer="consultation.surgery3_date"
                                       class="form-control @error('consultation.surgery3_date') is-invalid @enderror"
                                       type="date">
                                @error('consultation.surgery3_date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    @endif


                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label class="control-label">{{__("Other surgery")}}</label>
                            <input wire:model.defer="consultation.other_surgery"
                                   placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"
                                   class="form-control @error('consultation.other_surgery') is-invalid @enderror"
                                   type="text">
                            @error('consultation.other_surgery')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label class="control-label">{{__("Other Long Term medication")}}</label>
                            <input wire:model.defer="consultation.other_medication"
                                   placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"
                                   class="form-control @error('consultation.other_medication') is-invalid @enderror"
                                   type="text">
                            @error('consultation.other_medication')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label class="control-label">{{__("LAB")}}</label>
                            <input wire:model.defer="consultation.lab"
                                   placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"
                                   class="form-control @error('consultation.lab') is-invalid @enderror" type="text">
                            @error('consultation.lab')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label
                                    class="control-label">{{__("the international index of erectile function questionnaire ( IIEF 5 )")}}</label>
                            <input wire:model.defer="consultation.international_index"
                                   placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"
                                   class="form-control @error('consultation.international_index') is-invalid @enderror"
                                   type="text">
                            @error('consultation.international_index')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label class="control-label">{{__("examination")}}</label>
                            <input wire:model.defer="consultation.examination"
                                   placeholder="{{__("--------------------------------------------------------------------------------------------------------------------------------")}}"
                                   class="form-control @error('consultation.examination') is-invalid @enderror"
                                   type="text">
                            @error('consultation.examination')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label class="control-label">{{__("Impression and recommendation")}}</label>
                            <textarea rows="5" value="" wire:model.defer="consultation.impression_recommendation"
                                      placeholder="--------------------------------------------------------------------------------------------------------------------------------"
                                      id="impression_recommendation" name="impression_recommendation"
                                      class="form-control editor @error('consultation.impression_recommendation') is-invalid @enderror"
                            ></textarea>
                            @error('consultation.impression_recommendation')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">{{__("Image")}}</label>
                        <input wire:model.defer="consultation.image"
                               name="image"
                               class="form-control @error('consultation.image') is-invalid @enderror" type="file">
                        @error('consultation.image')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">{{__("Mobile")}}</label>
                        <input wire:model.defer="consultation.mobile" placeholder="{{__("Add Mobile")}}"
                               class="form-control @error('consultation.mobile') is-invalid @enderror" type="number">
                        @error('consultation.mobile')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">{{__("Email")}}</label>
                        <input wire:model.defer="consultation.email" placeholder="{{__("Add Email")}}"
                               class="form-control @error('consultation.email') is-invalid @enderror" type="email">
                        @error('consultation.email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">{{__("job")}}</label>
                        <input wire:model.defer="consultation.job" placeholder="{{__("Add job")}}"

                               class="form-control @error('consultation.job') is-invalid @enderror" type="text">
                        @error('consultation.job')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">{{__("insurance")}}</label>
                        <select wire:model.defer="consultation.insurance_id"
                                class="form-control @error('consultation.insurance_id') is-invalid @enderror">
                            <option value="0">{{__("Select")}} ...</option>
                            @foreach($insurances as $key => $insurance)
                                <option value="{{$insurance->id}}">{{ $insurance->name }}</option>
                            @endforeach
                        </select>
                        @error('consultation.insurance_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                @if (auth()->user()->hasRole('Admin') or auth()->user()->hasRole('Secretarial') )
                    <div class="col-12">
                        <div class="form-group">
                            <label class="control-label">{{__("doctor")}}</label>
                            <select wire:model.defer="consultation.doctor_id"
                                    class="form-control @error('consultation.doctor_id') is-invalid @enderror">
                                <option value="0">Select ...</option>
                                @foreach($doctors as $key => $doctor)
                                    <option value="{{$doctor->id}}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                            @error('consultation.doctor_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                @endif

                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">{{__("Clinic departments")}}</label>
                        <select wire:model.defer="consultation.category_id"
                                class="form-control @error('consultation.category_id') is-invalid @enderror">
                            <option value="0">Select ...</option>
                            @foreach($categories as $key => $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('consultation.category_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">{{__("weight")}}</label>
                        <input wire:model.defer="consultation.weight" placeholder="{{__("Add weight")}}"

                               class="form-control @error('consultation.weight') is-invalid @enderror" type="text">
                        @error('consultation.weight')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">{{__("height")}}</label>
                        <input wire:model.defer="consultation.height" placeholder="{{__("Add height")}}"

                               class="form-control @error('consultation.height') is-invalid @enderror" type="text">
                        @error('consultation.height')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">{{__("previous operations")}}</label>
                        <input wire:model.defer="consultation.previous_operations"
                               placeholder="{{__("Add previous operations")}}"
                               class="form-control @error('consultation.previous_operations') is-invalid @enderror"
                               type="text">
                        @error('consultation.previous_operations')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="control-label">{{__("address")}}</label>
                        <input wire:model.defer="consultation.address" placeholder="{{__("address")}}"

                               class="form-control @error('consultation.address') is-invalid @enderror" type="text">
                        @error('consultation.address')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
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
                            type="submit">{{__("Store")}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
