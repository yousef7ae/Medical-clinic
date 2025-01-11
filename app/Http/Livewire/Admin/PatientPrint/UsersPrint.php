<?php

namespace App\Http\Livewire\Admin\PatientPrint;

use App\Models\User;
use Livewire\Component;
use MohamedHekal\ArabicLaravelMpdf\Facades\ArabicLaravelMpdf;
use PDF;
use Illuminate\Support\Facades\File;


class UsersPrint extends Component
{
    public $patient_name, $patient_id, $id_number, $birth_date, $gender,
        $other_diagnosis,
        $medical_history, $medical_history_text, $medical_history_drug,
        $medical_history2, $medical_history_text2, $medical_history_drug2,
        $medical_history3, $medical_history_text3, $medical_history_drug3,
        $surgery, $surgery_text, $surgery_date,
        $surgery2, $surgery2_text, $surgery2_date,
        $surgery3, $surgery3_text, $surgery3_date,
        $impression_recommendation,
        $other_surgery,
        $international_index,
        $examination,
        $email,
        $mobile,
        $lab, $occupation , $birth_place , $consultations;

    public function mount()
    {
        if (!empty(request('patient_id'))) {

            $this->patient_id = request('patient_id');
            $patient = User::role('Patient')->where('id', $this->patient_id)->first();

            if ($patient) {
            $this->consultations = $patient->consultations;
            }

            $this->patient_name = $patient->name;
            $this->id_number = $patient->id_number;
            $this->birth_date = $patient->birth_date;
            $this->birth_place = $patient->birth_place;
            $this->occupation = $patient->occupation;
            $this->mobile = $patient->mobile;
            $this->gender = $patient->gender;
        }
    }

    public function render()
    {
          // Create a new PDF instance
        $pdf = ArabicLaravelMpdf::loadView('livewire.admin.patient-print.users-print', [
            'patient_name' => $this->patient_name,
            'patient_id' => $this->patient_id,
            'id_number' => $this->id_number,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'other_diagnosis' => $this->other_diagnosis,
            'medical_history' => $this->medical_history,
            'medical_history_text' => $this->medical_history_text,
            'medical_history_drug' => $this->medical_history_drug,
            'medical_history2' => $this->medical_history2,
            'medical_history_text2' => $this->medical_history_text2,
            'medical_history_drug2' => $this->medical_history_drug2,
            'medical_history3' => $this->medical_history3,
            'medical_history_text3' => $this->medical_history_text3,
            'medical_history_drug3' => $this->medical_history_drug3,
            'surgery' => $this->surgery,
            'surgery_text' => $this->surgery_text,
            'surgery_date' => $this->surgery_date,
            'surgery2' => $this->surgery2,
            'surgery2_text' => $this->surgery2_text,
            'surgery2_date' => $this->surgery2_date,
            'surgery3' => $this->surgery3,
            'surgery3_text' => $this->surgery3_text,
            'surgery3_date' => $this->surgery3_date,
            'impression_recommendation' => $this->impression_recommendation,
            'other_surgery' => $this->other_surgery,
            'international_index' => $this->international_index,
            'examination' => $this->examination,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'lab' => $this->lab,
            'occupation' => $this->occupation,
            'birth_place' => $this->birth_place,
            'consultations' => $this->consultations,
        ]);

        // Define the directory where you want to save the PDF files
        $directory = public_path('pdf');

        // Check if the directory exists, and create it if it doesn't
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

            // Save the PDF to a file
            $pdfFileName = 'patient_report_' . date('YmdHis') . '.pdf';
            $pdfFilePath = public_path('pdf/' . $pdfFileName);
            $pdf->save($pdfFilePath);

        // Generate a download response and return it
            $downloadResponse = response()->stream(
                function () use ($pdfFilePath) {
                    readfile($pdfFilePath);
                },
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="' . $pdfFileName . '"',
                ]
            );

            $pdf->stream($pdfFileName.'.pdf');

            // Render the view and layout
            return view('livewire.admin.patient-print.users-print')
                ->layout('layouts.admins.app_print')
                ->with('downloadResponse', $downloadResponse);
    }
}
