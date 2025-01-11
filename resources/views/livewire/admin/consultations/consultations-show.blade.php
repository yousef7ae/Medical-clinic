<div class="container-fluid py-3">
    <div class="py-4">
        <h2 class="h4 text-center py-3 ">{{ __('Consultation information') }}</h2>

        <div class="mb-3 container ">
            <form class="modal-body " method="post" wire:submit.prevent="update">
                {{ csrf_field() }}

                <div class="row g-2">
                    <div class="col-12 mb-2">
                        <h4 class="control-label mb-3 mt-4 fw-bold">{{ __('Past medical history :') }}</h4>

                        {{-- Start DIABETES MELLITUS --}}
                        <div class="form-check form-check mb-3">
                            <label class="form-check-label" for="inlineCheckbox1">{{ __('DIABETES MELLITUS') }}</label>
                            <input class="form-check-input" wire:model="consultation.medical_history" type="checkbox"
                                id="inlineCheckbox1" value="1">
                        </div>

                        @if (isset($consultation['medical_history']))
                            @if ($consultation['medical_history'] != 0 and $consultation['medical_history'] == 1)
                                <p class="control-label fw-bold"></p>
                                <div class="col-12 d-flex mb-4">
                                    <div class="col-6 mb-2">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('From') }}</label>
                                            <textarea wire:model.defer="consultation.medical_history_text"
                                                placeholder="{{ __('----------------------------------------------------------------') }}"
                                                class="form-control @error('consultation.medical_history_text') is-invalid @enderror" type="text">
                                        </textarea>
                                            @error('consultation.medical_history_text')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 ms-2 mb-2">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('DRUG') }}</label>
                                            <textarea wire:model.defer="consultation.medical_history_drug"
                                                placeholder="{{ __('----------------------------------------------------------------') }}"
                                                class="form-control @error('consultation.medical_history_drug') is-invalid @enderror" type="text">
                                        </textarea>
                                            @error('consultation.medical_history_drug')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        {{-- End DIABETES MELLITUS --}}

                        <div class="form-check form-check mb-3">
                            <label class="form-check-label" for="inlineCheckbox2">{{ __('HYPERTENSION') }}</label>
                            <input class="form-check-input" wire:model="consultation.medical_history2" type="checkbox"
                                id="inlineCheckbox2" value="1">
                        </div>
                        {{-- Start DIABETES MELLITUS --}}

                        @if (isset($consultation['medical_history2']))
                            @if ($consultation['medical_history2'] != 0 and $consultation['medical_history2'] == 1)
                                <p class="control-label fw-bold"></p>
                                <div class="col-12 d-flex mb-4">
                                    <div class="col-6 mb-2">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('From') }}</label>
                                            <textarea wire:model.defer="consultation.medical_history_text2"
                                                placeholder="{{ __('----------------------------------------------------------------') }}"
                                                class="form-control @error('consultation.medical_history_text2') is-invalid @enderror" type="text">
                                        </textarea>
                                            @error('consultation.medical_history_text2')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 ms-2 mb-2">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('DRUG') }}</label>
                                            <textarea wire:model.defer="consultation.medical_history_drug2"
                                                placeholder="{{ __('----------------------------------------------------------------') }}"
                                                class="form-control @error('consultation.medical_history_drug2') is-invalid @enderror" type="text">
                                        </textarea>
                                            @error('consultation.medical_history_drug2')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        {{-- End DIABETES MELLITUS --}}

                        <div class="form-check form-check mb-3">
                            <label class="form-check-label"
                                for="inlineCheckbox3">{{ __('CARDIOVASCULAR DISEASE') }}</label>
                            <input class="form-check-input" wire:model="consultation.medical_history3" type="checkbox"
                                id="inlineCheckbox3" value="1">
                        </div>

                        @if (isset($consultation['medical_history3']))
                            @if ($consultation['medical_history3'] != 0 and $consultation['medical_history3'] == 1)
                                <p class="control-label fw-bold"></p>
                                <div class="col-12 d-flex mb-4">
                                    <div class="col-6 mb-2">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('From') }}</label>
                                            <textarea wire:model.defer="consultation.medical_history_text3"
                                                placeholder="{{ __('----------------------------------------------------------------') }}"
                                                class="form-control @error('consultation.medical_history_text3') is-invalid @enderror" type="text">
                                        </textarea>
                                            @error('consultation.medical_history_text3')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6 ms-2 mb-2">
                                        <div class="form-group">
                                            <label class="control-label">{{ __('DRUG') }}</label>
                                            <textarea wire:model.defer="consultation.medical_history_drug3"
                                                placeholder="{{ __('----------------------------------------------------------------') }}"
                                                class="form-control @error('consultation.medical_history_drug3') is-invalid @enderror" type="text">
                                        </textarea>
                                            @error('consultation.medical_history_drug3')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label class="control-label">{{ __('Other diagnosis') }}</label>
                            <textarea wire:model.defer="consultation.other_diagnosis"
                                placeholder="{{ __('--------------------------------------------------------------------------------------------------------------------------------') }}"
                                class="form-control @error('consultation.other_diagnosis') is-invalid @enderror" type="text">
                            </textarea>
                            @error('consultation.other_diagnosis')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <h4 class="control-label mb-3 mt-4 fw-bold">{{ __('SURGERY') }}:</h4>
                        <div class="form-check form-check mb-3">
                            <input class="form-check-input" wire:model="consultation.surgery" type="checkbox"
                                id="inlineCheckbox1" value="1">
                            <label class="form-check-label"
                                for="inlineCheckbox1">{{ __('RADICAL PROSTATECTOMY') }}</label>
                        </div>

                        @if ($consultation['surgery'] != 0 and $consultation['surgery'] == 1)
                            <p class="control-label fw-bold"></p>
                            <div class="col-6 mb-2">
                                <div class="form-group">
                                    <label class="control-label">{{ __('Date') }}</label>
                                    <input wire:model.defer="consultation.surgery_date"
                                        class="form-control @error('consultation.surgery_date') is-invalid @enderror"
                                        type="date">
                                    @error('consultation.surgery_date')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-5">
                                <div class="form-group">
                                    <label class="control-label">{{ __('From') }}</label>
                                    <textarea wire:model.defer="consultation.surgery_text"
                                        placeholder="{{ __('----------------------------------------------------------------') }}"
                                        class="form-control @error('consultation.surgery_text') is-invalid @enderror" type="text">
                                </textarea>
                                    @error('consultation.surgery_text')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <div class="form-check form-check mb-3">
                            <input class="form-check-input" wire:model="consultation.surgery2" type="checkbox"
                                id="inlineCheckbox2" value="1">
                            <label class="form-check-label"
                                for="inlineCheckbox2">{{ __('Abdominal Surgery') }}</label>
                        </div>

                        @if (isset($consultation['surgery2']))
                            @if ($consultation['surgery2'] != 0 and $consultation['surgery2'] == 1)
                                <p class="control-label fw-bold"></p>
                                <div class="col-6 ">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Date') }}</label>
                                        <input wire:model.defer="consultation.surgery2_date"
                                            class="form-control @error('consultation.surgery2_date') is-invalid @enderror"
                                            type="date">
                                        @error('consultation.surgery2_date')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('From') }}</label>
                                        <textarea wire:model.defer="consultation.surgery2_text"
                                            placeholder="{{ __('----------------------------------------------------------------') }}"
                                            class="form-control @error('consultation.surgery2_text') is-invalid @enderror" type="text">
                                    </textarea>
                                        @error('consultation.surgery2_text')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        @endif

                        <div class="form-check form-check mb-3">
                            <input class="form-check-input" wire:model="consultation.surgery3" type="checkbox"
                                id="inlineCheckbox3" value="1">
                            <label class="form-check-label" for="inlineCheckbox3">{{ __('Back Surgery') }}</label>
                        </div>

                        @if (isset($consultation['surgery3']))
                            @if ($consultation['surgery3'] != 0 and $consultation['surgery3'] == 1)
                                <p class="control-label fw-bold"></p>
                                <div class="col-6  mb-2">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Date') }}</label>
                                        <input wire:model.defer="consultation.surgery3_date"
                                            class="form-control @error('consultation.surgery3_date') is-invalid @enderror"
                                            type="date">
                                        @error('consultation.surgery3_date')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('From') }}</label>
                                        <textarea wire:model.defer="consultation.surgery3_text"
                                            placeholder="{{ __('----------------------------------------------------------------') }}"
                                            class="form-control @error('consultation.surgery3_text') is-invalid @enderror" type="text">
                                    </textarea>
                                        @error('consultation.surgery3_text')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        @endif

                        <div class="col-12 mb-2 mt-4">
                            <div class="form-group">
                                <label class="control-label">{{ __('Other surgery') }}</label>
                                <textarea wire:model.defer="consultation.other_surgery"
                                    placeholder="{{ __('--------------------------------------------------------------------------------------------------------------------------------') }}"
                                    class="form-control @error('consultation.other_surgery') is-invalid @enderror" type="text">
                            </textarea>
                                @error('consultation.other_surgery')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mb-2 mt-4">
                            <div class="form-group">
                                {{-- ادوية اخرى مزمنة  ++++++++++++++++++++++++ --}}
                                <label class="control-label">{{ __('Other Long Term medication') }}</label>
                                <textarea wire:model.defer="consultation.other_medication"
                                    placeholder="{{ __('--------------------------------------------------------------------------------------------------------------------------------') }}"
                                    class="form-control @error('consultation.other_medication') is-invalid @enderror" type="text">
                            </textarea>
                                @error('consultation.other_medication')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="col-6 mb-2 mt-4">
                                <div class="form-group">
                                    <label class="control-label">{{ __('Allergy :') }}</label>
                                    <select wire:model="consultation.allergy"
                                        class="form-control @error('consultation.allergy') is-invalid @enderror">
                                        <option value="0">{{ __('Select') }} ...</option>
                                        @foreach (\App\Models\User::allergy(false) as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('consultation.allergy')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @if ($consultation['allergy'] == 1)
                            <div class="col-12 d-flex">
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('From') }}</label>
                                        <textarea wire:model.defer="consultation.allergy_text"
                                            placeholder="{{ __('----------------------------------------------------------------') }}"
                                            class="form-control @error('consultation.allergy_text') is-invalid @enderror" type="text">
                                </textarea>
                                        @error('consultation.allergy_text')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 ms-2 mb-2">
                                    <div class="form-group">
                                        <label class="control-label">{{ __('Date') }}</label>
                                        <input wire:model.defer="consultation.allergy_date"
                                        class="form-control @error('consultation.allergy_date') is-invalid @enderror"
                                        type="date">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-6 mb-2"></div>
                        @endif


                        <div class="col-12 mb-2 mt-4">
                            <div class="form-group">
                                <label class="control-label">{{ __('LAB') }}</label>
                                <textarea wire:model.defer="consultation.lab"
                                    placeholder="{{ __('--------------------------------------------------------------------------------------------------------------------------------') }}"
                                    class="form-control @error('consultation.lab') is-invalid @enderror" type="text">
                            </textarea>
                                @error('consultation.lab')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mb-2 mt-4">
                            <div class="form-group">
                                <label
                                    class="control-label">{{ __('the international index of erectile function questionnaire ( IIEF 5 )') }}</label>
                                <textarea wire:model.defer="consultation.international_index"
                                    placeholder="{{ __('--------------------------------------------------------------------------------------------------------------------------------') }}"
                                    class="form-control @error('consultation.international_index') is-invalid @enderror" type="text">
                            </textarea>
                                @error('consultation.international_index')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mb-2 mt-4">
                            <div class="form-group">
                                {{-- الفحص السريري  ++++++++++++++++++++++++++++++++++++++ --}}
                                <label class="control-label">{{ __('examination') }}</label>
                                <textarea wire:model.defer="consultation.examination"
                                    placeholder="{{ __('--------------------------------------------------------------------------------------------------------------------------------') }}"
                                    class="form-control @error('consultation.examination') is-invalid @enderror" type="text">
                            </textarea>
                                @error('consultation.examination')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mb-2 mt-4">
                            <div class="form-group">
                                {{-- الانطباع والتوصيات ++++++++++++++++ --}}
                                <label class="control-label">{{ __('Impression and recommendation') }}</label>
                                <textarea rows="5" value="" wire:model.defer="consultation.impression_recommendation"
                                    placeholder="--------------------------------------------------------------------------------------------------------------------------------"
                                    id="impression_recommendation" name="impression_recommendation"
                                    class="form-control editor @error('consultation.impression_recommendation') is-invalid @enderror"></textarea>
                                @error('consultation.impression_recommendation')
                                    <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Image') }}</label>
                            <input wire:model.defer="consultation.image" name="image"
                                class="form-control @error('consultation.image') is-invalid @enderror"
                                type="file">
                            @error('consultation.image')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Attachments') }}</label>
                            <input wire:model.defer="attachments" name="attachments"
                                class="form-control @error('attachment') is-invalid @enderror" type="file"
                                multiple>
                            @error('attachment')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>


                    @if ($images)
                        <div class="col-12">
                            <div class="row">
                                @foreach ($images as $one)
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <a href="{{ asset('storage/public/' . $one->attachment) }}"
                                                target="_blank">
                                                <img src="{{ asset('storage/public/' . $one->attachment) }}"
                                                    alt="Lights" style="width:100%">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div>
                        <div wire:loading>
                            <i class="fas fa-sync fa-spin"></i>
                            {{ __('Loading please wait') }} ...
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button wire:loading.attr="disabled" class="btn btn-primary w-25"
                            type="submit">{{ __('Update') }}</button>
                    </div>
            </form>
        </div>

    </div>
</div>
