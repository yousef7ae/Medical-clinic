<?php

namespace App\Http\Livewire\Admin\Revenues;

use App\Models\Revenue;
use Livewire\Component;
use MohamedHekal\ArabicLaravelMpdf\Facades\ArabicLaravelMpdf;
use Illuminate\Support\Facades\File;

class RevenuesPrint extends Component
{
    public $patient_id, $revenues;

    function mount()
    {
        if (!empty(request('patient_id'))) {
            $this->patient_id = request('patient_id');
        }

        $this->revenues = Revenue::query();

        $array_admin = [1, 2, 3, 4];
        $array_secretarial = [1, 2];
        $array_nurse = [3, 4];

        if ($this->patient_id) {
            $this->revenues = $this->revenues->where('patient_id', $this->patient_id);
        }

        if (auth()->user()->hasRole('Admin')) {
            $this->revenues = $this->revenues->whereIn('revenue_type', $array_admin);
        } elseif (auth()->user()->hasRole('Secretarial')) {
            $this->revenues = $this->revenues->whereIn('revenue_type', $array_secretarial);
        } elseif (auth()->user()->hasRole('Nurse')) {
            $this->revenues = $this->revenues->whereIn('revenue_type', $array_nurse);
        }


        $this->revenues = $this->revenues->orderBy('created_at', 'DESC')->get();
    }

    public function render()
    {

        // Create a new PDF instance
        $pdf = ArabicLaravelMpdf::loadView('livewire.admin.revenues.revenues-print', [
            'patient_id' => $this->patient_id,
            'revenues' => $this->revenues,
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


        return view('livewire.admin.revenues.revenues-print', compact('revenues'))->layout('layouts.admins.app_print')->with('downloadResponse', $downloadResponse);
    }

}
