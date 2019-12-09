<?php

namespace App\Http\Controllers;

use App\ApprovalOldSubmissionCooperation;
use App\Exports\OldMOUExport;
use App\SubmissionProposal;
use App\SubmissionProposalGuest;
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
    public function downloadDataMonevDetailPDF($id)
    {
        $data = ApprovalOldSubmissionCooperation::with('activities', 'activities.documentation', 'nomor', 'parties')->findOrFail($id);
        $pdf = PDF::loadView('export.data-detail-old-mou', compact('data'));
        return $pdf->download('Data Detail '.$data->title_of_cooperation.' MOU Lama '.date('Y-m-d_H-i-s').'.pdf');
    }
    public function downloadFormatMOUWord($id)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $proposal = SubmissionProposal::find($id);
        $getIdProposal = $proposal->id;
        $getMailingNumber = $proposal->mailing_number;
        $getAgencyName = $proposal->agency_name;
        $section = $phpWord->addSection();
        // Create a new table style
        $tableStyleTop = new \PhpOffice\PhpWord\Style\Table;
        $tableStyleTop->setUnit(\PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT);
        $tableStyleTop->setWidth(100 * 50);
        $wrappingStyles = array('inline', 'behind', 'infront', 'square', 'tight');
        $phpWord->addFontStyle('headerFontStyle', array('size'=>12, 'name' => 'Bookman Old Style'));
        $phpWord->addParagraphStyle('headerParagraphStyle', array('align'=>'center', 'spaceAfter'=>200));
        $section->addImage(storage_path("app/public/barcode/$getIdProposal/barcode-$getMailingNumber.png"),['positioning' => 'absolute', 'width' => 60, 'height' => 60]);
        $section->addText("KESEPAKATAN BERSAMA","headerFontStyle","headerParagraphStyle");
        $section->addText("ANTARA","headerFontStyle","headerParagraphStyle");
        $section->addText("$getAgencyName","headerFontStyle","headerParagraphStyle");
        $section->addText("DENGAN","headerFontStyle","headerParagraphStyle");
        $section->addText("Kementerian Pemberdayaan Perempuan Dan Perlindungan Anak","headerFontStyle","headerParagraphStyle");
        $section->addTextBreak(4);
        $section->addText("TENTANG","headerFontStyle","headerParagraphStyle");
        $section->addText("$proposal->title_cooperation","headerFontStyle","headerParagraphStyle");

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objectWriter->save(public_path("/format_word/Format Word - ".$proposal->mailing_number.".docx"));

            return response()->download(public_path("/format_word/Format Word - ".$proposal->mailing_number.".docx"));
        } catch (\Throwable $e)
        {
            return response()->json([
                'status' => $e->getCode(),
                'messages' => $e->getMessage()
            ]);
        }
    }
    public function downloadFormatMOUWordGuest($id)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $proposal = SubmissionProposalGuest::find($id);
        $getIdProposal = $proposal->id;
        $getMailingNumber = $proposal->mailing_number;
        $getAgencyName = $proposal->agency_name;
        $section = $phpWord->addSection();
        // Create a new table style
        $tableStyleTop = new \PhpOffice\PhpWord\Style\Table;
        $tableStyleTop->setUnit(\PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT);
        $tableStyleTop->setWidth(100 * 50);
        $wrappingStyles = array('inline', 'behind', 'infront', 'square', 'tight');
        $phpWord->addFontStyle('headerFontStyle', array('size'=>12, 'name' => 'Bookman Old Style'));
        $phpWord->addParagraphStyle('headerParagraphStyle', array('align'=>'center', 'spaceAfter'=>200));
        $section->addImage(storage_path("app/public/barcode_guest/$getIdProposal/barcode-$getMailingNumber.png"),['positioning' => 'absolute', 'width' => 60, 'height' => 60]);
        $section->addText("KESEPAKATAN BERSAMA","headerFontStyle","headerParagraphStyle");
        $section->addText("ANTARA","headerFontStyle","headerParagraphStyle");
        $section->addText("$getAgencyName","headerFontStyle","headerParagraphStyle");
        $section->addText("DENGAN","headerFontStyle","headerParagraphStyle");
        $section->addText("Kementerian Pemberdayaan Perempuan Dan Perlindungan Anak","headerFontStyle","headerParagraphStyle");
        $section->addTextBreak(4);
        $section->addText("TENTANG","headerFontStyle","headerParagraphStyle");
        $section->addText("$proposal->title_cooperation","headerFontStyle","headerParagraphStyle");

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objectWriter->save(public_path("/format_word/Format Word - ".$proposal->mailing_number.".docx"));

            return response()->download(public_path("/format_word/Format Word - ".$proposal->mailing_number.".docx"));
        } catch (\Throwable $e)
        {
            return response()->json([
                'status' => $e->getCode(),
                'messages' => $e->getMessage()
            ]);
        }
    }
    public function downloadSummary($id) {
        $data = SubmissionProposal::with('deputi.role', 'reason.user', 'country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->findOrFail($id);
        $pdf = PDF::loadView('export.summary-proposal', compact('data'));
        return $pdf->download('Rangkuman Jenis Kerjasama '.date('Y-m-d_H-i-s').'.pdf');
    }
    public function downloadSummaryGuest($id) {
        $data = SubmissionProposalGuest::with('deputi.role', 'reason.user', 'country','agencies','typeOfCooperation', 'typeOfCooperationOne', 'typeOfCooperationTwo')->findOrFail($id);
        $pdf = PDF::loadView('export.summary-proposal-guest', compact('data'));
        return $pdf->download('Rangkuman Jenis Kerjasama '.date('Y-m-d_H-i-s').'.pdf');
    }
}
