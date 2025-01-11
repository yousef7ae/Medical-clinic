<?php

namespace App\Http\Livewire\Admin\Consultations;

use App\Models\Consultation;
use App\Models\Prescription;
use Livewire\Component;
use MohamedHekal\ArabicLaravelMpdf\Facades\ArabicLaravelMpdf;
use PDF;
use Illuminate\Support\Facades\File;


class ConsultationsSinglePrint extends Component
{
    public $consultation, $prescriptions , $consul,$prescr;

    public function mount($id)
    {
        $this->consultation = Consultation::where('id', $id)->first();
        // $this->prescriptions = Prescription::where('consultation_id', $id)->get();
    }

    public function render()
    {
        // Create a new PDF instance
        $pdf = ArabicLaravelMpdf::loadView('livewire.admin.consultations.consultations-single-print', [
            'consultation' => $this->consultation,
            // 'prescriptions' => $this->prescriptions,
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

        return view('livewire.admin.consultations.consultations-single-print')->layout('layouts.admins.app_print')->with('downloadResponse', $downloadResponse);
    }
}
