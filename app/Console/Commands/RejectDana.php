<?php

namespace App\Console\Commands;

use App\Mail\RejectDanaGuest;
use App\SubmissionProposalGuest;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class RejectDana extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reject:dana';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk Menonaktifkan Proposal Ketika Pengajuan Dana';

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
        $proposal = SubmissionProposalGuest::where('type_of_cooperation_id', 1)->where('status_proposal', 1)->whereNotNull('reject_dana')->get();
        if($proposal->count() == 0) {
            return true;
        } else {
            foreach ($proposal as $key => $value) {
                if(Carbon::now()->format('H:i') == $value->reject_dana) {
                    SubmissionProposalGuest::where('id', $value->id)->update([
                        'status_proposal' => 0
                    ]);

                    Mail::to($value->email)->send(new RejectDanaGuest);
                }
            }
        }
    }
}
