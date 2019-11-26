<?php

namespace App\Http\Controllers;

use App\ApprovalOldSubmissionCooperation;
use App\Imports\OldMOUImport;
use Illuminate\Http\Request;
use Excel;

class ImportController extends Controller
{
    public function importOldMOU() {
        try {
            Excel::import(new OldMOUImport, request()->file('file'));
            $data = ApprovalOldSubmissionCooperation::all();

            return response()->json([
                'message' => 'Import Data Berhasil',
                'status' => 200,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => $th->getCode()
            ]);
        }
    }
}
