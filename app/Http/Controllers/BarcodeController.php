<?php

namespace App\Http\Controllers;

use App\SubmissionProposal;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use QrCode;

class BarcodeController extends Controller
{
    public function generate($id) {
        try {
            $data = SubmissionProposal::findOrFail($id);
            $data->status_barcode = 1;
            $data->save();

            $mailingNumber = $data->mailing_number;
            $result = QrCode::format('png')->size(200)->errorCorrection('H')->generate($mailingNumber);
            $outputFile = "/$data->id/barcode-$mailingNumber.png";
            Storage::disk('barcode')->put("$outputFile", $result);
            return response()->json([
                'data' => $data,
                'messages' => 'Barcode Berhasil di Generate'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => $th->getMessage()
            ]);
        }
    }
}
