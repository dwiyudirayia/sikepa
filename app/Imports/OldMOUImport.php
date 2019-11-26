<?php

namespace App\Imports;

use App\ApprovalOldSubmissionCooperation;
use App\NomorApprovalOldSubmissionCooperation;
use App\ThePartiesApprovalOldSubmissionCooperation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OldMOUImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            DB::beginTransaction();

            $approvalOld = ApprovalOldSubmissionCooperation::create([
                'role_id' => auth()->user()->roles[0]->id,
                'created_by' => auth()->user()->id,
                'title_of_cooperation' => $value['judul_mou'],
                'tanggal_ttd' => date('Y-m-d', strtotime($value['tanggal_ttd'])),
                'background' => $value['latar_belakang'],
                'end_date' => date('Y-m-d', strtotime($value['tanggal_berakhir'])),
                'status' => (int) $value['status'],
                'description' => $value['keterangan']
            ]);

            $splitNomor = explode("|", $value['nomor']);
            foreach ($splitNomor as $key => $valueSplitNomor) {
                NomorApprovalOldSubmissionCooperation::create([
                    'created_by' => auth()->user()->id,
                    'approval_old_submission_cooperation_id' => $approvalOld->id,
                    'nomor' => $valueSplitNomor,
                ]);
            }

            $splitParaPihak = explode("|", $value['para_pihak']);
            foreach ($splitParaPihak as $key => $valueSplitParaPihak) {
                ThePartiesApprovalOldSubmissionCooperation::create([
                    'created_by' => auth()->user()->id,
                    'approval_old_submission_cooperation_id' => $approvalOld->id,
                    'name' => $valueSplitParaPihak
                ]);
            }
            DB::commit();
        }
    }
}
