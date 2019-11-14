<?php

namespace App\Console\Commands;

use App\TrackingSubmissionProposal;
use Illuminate\Console\Command;

class DispositionDeputiProposal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dispositiondeptutiproposal:fiveminutes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk disposisi ketika role disposisi sudah mengirimkan nilai';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = TrackingSubmissionProposal::query();
        $data->whereNotNull('deputi_bidang_partisipasi_masyarakat')->whereNotNull('deputi_bidang_kesetaraan_gender')->whereNotNull('deputi_bidang_perlindungan_anak')->whereNotNull('deputi_bidang_perlindungan_hak_perempuan')->whereNotNull('deputi_bidang_tumbuh_kembang_anak')->get();

        dd($data->count());
    }
}
