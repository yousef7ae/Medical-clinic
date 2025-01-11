<?php

namespace App\Http\Livewire\Admin\PatientPrint;

use App\Models\Analyse;
use App\Models\Prescription;
use App\Models\User;
use App\Models\Visit;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use MohamedHekal\ArabicLaravelMpdf\Facades\ArabicLaravelMpdf;

class PatientPrint extends Component
{

    public $patient_id, $name_patient, $visits, $prescriptions, $analyses, $id_number, $birth_date, $occupation, $mobile, $birth_place;

    function mount()
    {

        if (!empty(request('patient_id'))) {
            $this->patient_id = request('patient_id');
        }
        $this->name_patient = User::role('Patient')->where('id', $this->patient_id)->value('name');
        $this->id_number = User::role('Patient')->where('id', $this->patient_id)->value('id_number');
        $this->birth_date = User::role('Patient')->where('id', $this->patient_id)->value('birth_date');
        $this->occupation = User::role('Patient')->where('id', $this->patient_id)->value('occupation');
        $this->mobile = User::role('Patient')->where('id', $this->patient_id)->value('mobile');
        $this->birth_place = User::role('Patient')->where('id', $this->patient_id)->value('birth_place');

        if ($this->patient_id) {
            $this->visits = Visit::where('patient_id', $this->patient_id);
        }

        if ($this->patient_id) {
            $this->prescriptions = Prescription::where('patient_id', $this->patient_id);
        }

        if ($this->patient_id) {
            $this->analyses = Analyse::where('patient_id', $this->patient_id);
        }

        $this->visits = $this->visits->orderBy('created_at', 'DESC')->get();
        $this->prescriptions = $this->prescriptions->orderBy('created_at', 'DESC')->get();
        $this->analyses =  $this->analyses->orderBy('created_at', 'DESC')->get();


    }

    public function render()
    {

        // Create a new PDF instance
        $pdf = ArabicLaravelMpdf::loadView('livewire.admin.patient-print.patient-print', [
            'name_patient' => $this->name_patient,
            'id_number' => $this->id_number,
            'birth_date' => $this->birth_date,
            'occupation' => $this->occupation,
            'mobile' => $this->mobile,
            'birth_place' => $this->birth_place,
            'visits' => $this->visits,
            'prescriptions' => $this->prescriptions,
            'analyses' => $this->analyses,
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

        $pdf->stream($pdfFileName . '.pdf');


        return view('livewire.admin.patient-print.patient-print')->layout('layouts.admins.app_print')->with('downloadResponse', $downloadResponse);
    }
}
