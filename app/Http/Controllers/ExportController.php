<?php

namespace App\Http\Controllers;

use App\Exports\OldMOUExport;
use Illuminate\Http\Request;
use Excel;

class ExportController extends Controller
{
    public function formatOldMOU() {
        return Excel::download(new OldMOUExport, 'Format-MOU-Lama.xlsx');
    }
}
