<?php

namespace App\Http\Controllers;

use App\ApprovalOldSubmissionCooperation;
use App\Exports\OldMOUExport;
use Illuminate\Http\Request;
use Excel;
use PDF;
class ExportController extends Controller
{
    public function formatOldMOU() {
        return Excel::download(new OldMOUExport, 'Format-MOU-Lama.xlsx');
    }
    public function downloadDataMonevPDF() {
        $data = ApprovalOldSubmissionCooperation::get();
        $pdf = PDF::loadView('export.data-old-mou', compact('data'));
        return $pdf->download('Data MOU Lama '.date('Y-m-d_H-i-s').'.pdf');
    }
    public function downloadDataDetailPDF($id)
    {
        $data = ApprovalOldSubmissionCooperation::with('activities', 'activities.documentation', 'nomor', 'parties')->findOrFail($id);
        $pdf = PDF::loadView('export.data-detail-old-mou', compact('data'));
        return $pdf->download('Data Detail '.$data->title_of_cooperation.' MOU Lama '.date('Y-m-d_H-i-s').'.pdf');
    }
}
