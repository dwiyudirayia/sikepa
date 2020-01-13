<?php

namespace App\Http\Controllers;

use App\Adendum;
use App\AdendumGuest;
use App\SubmissionProposal;
use App\SubmissionProposalGuest;
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
                'messages' => 'Gagal Generate Barcode',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function generateGuest($id) {
        try {
            $data = SubmissionProposalGuest::findOrFail($id);
            $data->status_barcode = 1;
            $data->save();

            $mailingNumber = $data->mailing_number;
            $result = QrCode::format('png')->size(200)->errorCorrection('H')->generate($mailingNumber);
            $outputFile = "/guest/$data->id/barcode-$mailingNumber.png";
            Storage::disk('barcode_guest')->put("$outputFile", $result);
            return response()->json([
                'data' => $data,
                'messages' => 'Barcode Berhasil di Generate'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Gagal Generate Barcode',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function generateAdendum($id) {
        try {
            $data = Adendum::findOrFail($id);
            $data->status_barcode = 1;
            $data->save();

            $mailingNumber = $data->mailing_number;
            $result = QrCode::format('png')->size(200)->errorCorrection('H')->generate($mailingNumber);
            $outputFile = "/$data->id/barcode-$mailingNumber.png";
            Storage::disk('barcode_adendum')->put("$outputFile", $result);
            return response()->json([
                'data' => $data,
                'messages' => 'Barcode Berhasil di Generate'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Gagal Generate Barcode',
                'status' => $th->getCode(),
            ]);
        }
    }
    public function generateGuestAdendum($id) {
        try {
            $data = AdendumGuest::findOrFail($id);
            $data->status_barcode = 1;
            $data->save();

            $mailingNumber = $data->mailing_number;
            $result = QrCode::format('png')->size(200)->errorCorrection('H')->generate($mailingNumber);
            $outputFile = "/$data->id/barcode-$mailingNumber.png";
            Storage::disk('barcode_guest_adendum')->put("$outputFile", $result);
            return response()->json([
                'data' => $data,
                'messages' => 'Barcode Berhasil di Generate'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'messages' => 'Gagal Generate Barcode',
                'status' => $th->getCode(),
            ]);
        }
    }
}
