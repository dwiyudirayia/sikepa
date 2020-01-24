<?php

namespace App\Http\Requests;

use App\AdendumGuest;
use App\ExtensionGuest;
use App\SubmissionProposalGuest;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
class StoreSubmissionProposalGuestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_cooperation' => 'required',
            'agency_profile' => 'required|mimes:pdf,jpeg,png',
            'ktp' => 'required|mimes:pdf,jpeg,png',
            'proposal' => 'required|mimes:pdf,jpeg,png,mp4',
            'npwp' => 'mimes:pdf,jpeg,png',
            'siup' => 'mimes:pdf,jpeg,png',
        ];
    }
    public function generateBarcodeNumber() {
        $number = mt_rand(1000000000, 9999999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($number)) {
            return $this->generateBarcodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    public function barcodeNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        if(ExtensionGuest::where('mailing_number', $number)->exists() === true && AdendumGuest::where('mailing_number', $number)->exists() === true && SubmissionProposalGuest::where('mailing_number', $number)->exists() === true) {
            return true;
        } else {
            return false;
        }
    }
    public function storeMOU() {
        if($this->hasFile('agency_profile')) {
            $extention = $this->agency_profile->getClientOriginalExtension();
            $fileName = 'agency-profile'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathAgency = $this->agency_profile->storeAs(strtotime("now"), $fileName, 'agency_profile_cooperation_guest');
        }

        if($this->hasFile('proposal')) {
            $extention = $this->proposal->getClientOriginalExtension();
            $fileName = 'proposal-cooperation'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathProposal = $this->proposal->storeAs(strtotime("now"), $fileName, 'proposal_cooperation_guest');
        }

        if($this->hasFile('ktp')) {
            $extention = $this->ktp->getClientOriginalExtension();
            $fileName = 'ktp-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathKTP = $this->ktp->storeAs(strtotime("now"), $fileName, 'ktp_guest');
        }

        if($this->hasFile('npwp')) {
            $extention = $this->npwp->getClientOriginalExtension();
            $fileName = 'npwp-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathNPWP = $this->npwp->storeAs(strtotime("now"), $fileName, 'npwp_guest');
        } else {
            $pathNPWP = '';
        }

        if($this->hasFile('siup')) {
            $extention = $this->siup->getClientOriginalExtension();
            $fileName = 'siup-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathSIUP = $this->siup->storeAs(strtotime("now"), $fileName, 'siup_guest');
        } else {
            $pathSIUP = '';
        }

        return [
            'mailing_number' => $this->generateBarcodeNumber(),
            'title_cooperation' => $this->title_cooperation,
            'type_of_cooperation_one_derivative_id' => $this->type_of_cooperation_one_derivative_id,
            'type_of_cooperation_two_derivative_id' => $this->type_of_cooperation_two_derivative_id,
            'agencies_id' => $this->agencies_id,
            'countries_id' => $this->countries_id,
            'province_id' => $this->province_id,
            'regency_id' => $this->regency_id,
            'postal_code' => $this->postal_code,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            // 'nominal' => (int) Str::replaceArray('.', [''], $this->nominal),
            'department' => $this->department,
            'ktp' => $pathKTP,
            'npwp' => $pathNPWP,
            'siup' => $pathSIUP,
            'no_telp' => $this->no_telp,
            'agency_name' => $this->agency_name,
            'address' => $this->address,
            'email' => $this->email,
            'name' => $this->name,
            'background' => $this->background,
            'status_proposal' => 1,
            'status_disposition' => 2,
            'time_period' => 1,
            'agency_profile' => $pathAgency,
            'proposal' => $pathProposal,
            'expired_at' => Carbon::now()->addYears($this->time_period),
        ];

    }
    public function storeAdendum() {
        if($this->hasFile('agency_profile')) {
            $extention = $this->agency_profile->getClientOriginalExtension();
            $fileName = 'agency-profile'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathAgency = $this->agency_profile->storeAs(strtotime("now"), $fileName, 'agency_profile_cooperation_guest_adendum');
        }

        if($this->hasFile('proposal')) {
            $extention = $this->proposal->getClientOriginalExtension();
            $fileName = 'proposal-cooperation'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathProposal = $this->proposal->storeAs(strtotime("now"), $fileName, 'proposal_cooperation_guest_adendum');
        }

        if($this->hasFile('ktp')) {
            $extention = $this->ktp->getClientOriginalExtension();
            $fileName = 'ktp-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathKTP = $this->ktp->storeAs(strtotime("now"), $fileName, 'ktp_guest_adendum');
        }

        if($this->hasFile('npwp')) {
            $extention = $this->npwp->getClientOriginalExtension();
            $fileName = 'npwp-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathNPWP = $this->npwp->storeAs(strtotime("now"), $fileName, 'npwp_guest_adendum');
        } else {
            $pathNPWP = '';
        }

        if($this->hasFile('siup')) {
            $extention = $this->siup->getClientOriginalExtension();
            $fileName = 'siup-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathSIUP = $this->siup->storeAs(strtotime("now"), $fileName, 'siup_guest_adendum');
        } else {
            $pathSIUP = '';
        }

        return [
            'mailing_number' => $this->generateBarcodeNumber(),
            'submission_proposal_guest_id' => $this->submission_proposal_guest_id,
            'title_cooperation' => $this->title_cooperation,
            'type_of_cooperation_one_derivative_id' => $this->type_of_cooperation_one_derivative_id,
            'type_of_cooperation_two_derivative_id' => $this->type_of_cooperation_two_derivative_id,
            'agencies_id' => $this->agencies_id,
            'countries_id' => $this->countries_id,
            'province_id' => $this->province_id,
            'regency_id' => $this->regency_id,
            'postal_code' => $this->postal_code,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            // 'nominal' => (int) Str::replaceArray('.', [''], $this->nominal),
            'department' => $this->department,
            'ktp' => $pathKTP,
            'npwp' => $pathNPWP,
            'siup' => $pathSIUP,
            'no_telp' => $this->no_telp,
            'agency_name' => $this->agency_name,
            'address' => $this->address,
            'email' => $this->email,
            'name' => $this->name,
            'background' => $this->background,
            'status_proposal' => 1,
            'status_disposition' => 2,
            'time_period' => 1,
            'agency_profile' => $pathAgency,
            'proposal' => $pathProposal,
            'expired_at' => Carbon::now()->addYears($this->time_period),
        ];

    }
    public function storeExtension() {
        if($this->hasFile('agency_profile')) {
            $extention = $this->agency_profile->getClientOriginalExtension();
            $fileName = 'agency-profile'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathAgency = $this->agency_profile->storeAs(strtotime("now"), $fileName, 'agency_profile_cooperation_guest_extension');
        }

        if($this->hasFile('proposal')) {
            $extention = $this->proposal->getClientOriginalExtension();
            $fileName = 'proposal-cooperation'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathProposal = $this->proposal->storeAs(strtotime("now"), $fileName, 'proposal_cooperation_guest_extension');
        }

        if($this->hasFile('ktp')) {
            $extention = $this->ktp->getClientOriginalExtension();
            $fileName = 'ktp-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathKTP = $this->ktp->storeAs(strtotime("now"), $fileName, 'ktp_guest_extension');
        }

        if($this->hasFile('npwp')) {
            $extention = $this->npwp->getClientOriginalExtension();
            $fileName = 'npwp-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathNPWP = $this->npwp->storeAs(strtotime("now"), $fileName, 'npwp_guest_extension');
        } else {
            $pathNPWP = '';
        }

        if($this->hasFile('siup')) {
            $extention = $this->siup->getClientOriginalExtension();
            $fileName = 'siup-guest'.'-'.date('Y-m-d').'-'.time().'.'.$extention;
            $pathSIUP = $this->siup->storeAs(strtotime("now"), $fileName, 'siup_guest_extension');
        } else {
            $pathSIUP = '';
        }

        return [
            'mailing_number' => $this->generateBarcodeNumber(),
            'submission_proposal_guest_id' => $this->submission_proposal_guest_id,
            'title_cooperation' => $this->title_cooperation,
            'type_of_cooperation_one_derivative_id' => $this->type_of_cooperation_one_derivative_id,
            'type_of_cooperation_two_derivative_id' => $this->type_of_cooperation_two_derivative_id,
            'agencies_id' => $this->agencies_id,
            'countries_id' => $this->countries_id,
            'province_id' => $this->province_id,
            'regency_id' => $this->regency_id,
            'postal_code' => $this->postal_code,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            // 'nominal' => (int) Str::replaceArray('.', [''], $this->nominal),
            'department' => $this->department,
            'ktp' => $pathKTP,
            'npwp' => $pathNPWP,
            'siup' => $pathSIUP,
            'no_telp' => $this->no_telp,
            'agency_name' => $this->agency_name,
            'address' => $this->address,
            'email' => $this->email,
            'name' => $this->name,
            'background' => $this->background,
            'status_proposal' => 1,
            'status_disposition' => 2,
            'time_period' => 1,
            'agency_profile' => $pathAgency,
            'proposal' => $pathProposal,
            'expired_at' => Carbon::now()->addYears($this->time_period),
        ];

    }
}
