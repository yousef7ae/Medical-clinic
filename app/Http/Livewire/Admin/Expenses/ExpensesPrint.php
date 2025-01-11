<?php

namespace App\Http\Livewire\Admin\Expenses;

use App\Models\Expense;
use Livewire\Component;
use MohamedHekal\ArabicLaravelMpdf\Facades\ArabicLaravelMpdf;
use PDF;
use Illuminate\Support\Facades\File;

class ExpensesPrint extends Component
{
    public $from, $to;

    function mount()
    {
        if (request('from')) {
            $this->from = request('from');
        }
        if (request('to')) {
            $this->to = request('to');
        }

    }

    public function render()
    {

        // Create a new PDF instance
        $pdf = ArabicLaravelMpdf::loadView('livewire.admin.expenses.expenses-print', [
            'from' => $this->from,
            'to' => $this->to,
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




        $expenses = Expense::query();

        if ($this->from && $this->to) {

            $expenses = $expenses->whereBetween('date', [$this->from . " 00:00:00", $this->to . " 23:59:59"]);
        }

        $expenses = $expenses->orderBy('created_at', 'DESC')->get();

        return view('livewire.admin.expenses.expenses-print', compact('expenses'))->layout('layouts.admins.app_print')->with('downloadResponse', $downloadResponse);
    }

}
