<?php

namespace App\Http\Livewire\Admin\Prescriptions;

use App\Models\Prescription;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use MohamedHekal\ArabicLaravelMpdf\Facades\ArabicLaravelMpdf;

class PrescriptionsSinglePrint extends Component
{
    public $prescription;

    public function mount($id)
    {
        $this->prescription = Prescription::find($id);
    }

    public function render()
    {
        // Create a new PDF instance
        $pdf = ArabicLaravelMpdf::loadView('livewire.admin.prescriptions.prescriptions-single-print', [
            'prescription' => $this->prescription,
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

        return view('livewire.admin.prescriptions.prescriptions-single-print')->layout('layouts.admins.app_print')->with('downloadResponse', $downloadResponse);
    }
}
