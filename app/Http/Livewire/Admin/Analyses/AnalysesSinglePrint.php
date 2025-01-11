<?php

namespace App\Http\Livewire\Admin\Analyses;

use App\Models\Analyse;
use Livewire\Component;
use MohamedHekal\ArabicLaravelMpdf\Facades\ArabicLaravelMpdf;
use Illuminate\Support\Facades\File;
class AnalysesSinglePrint extends Component
{
    public $analysis;

    public function mount($id)
    {
        $this->analysis = Analyse::where('id', $id)->first();
    }

    public function render()
    {
        // Create a new PDF instance
        $pdf = ArabicLaravelMpdf::loadView('livewire.admin.analyses.analyses-single-print', [
            'analysis' => $this->analysis,
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

        return view('livewire.admin.analyses.analyses-single-print')->layout('layouts.admins.app_print')->with('downloadResponse', $downloadResponse);
    }
}
