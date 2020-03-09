<?php

namespace App\Http\Controllers;

use App\Organisation;
use App\User;
use App\Visitor;
use Illuminate\Support\Facades\Auth;

class MessagingController extends Controller
{
    public function messageOrganisation()
    {
        $user = Auth::user();

        $personToMessage= Organisation::find(request()->id);
        $senderOrganisation = $user->organisation;

        $message = request()->sms;
        return $this->sendMessage($senderOrganisation, $personToMessage->phone, $message);

    }

    public function messageVisitor()
    {
        $user = Auth::user();

        $personToMessage= Visitor::find(request()->id);
        $senderOrganisation = $user->organisation;

        $message = request()->sms;
        return $this->sendMessage($senderOrganisation, $personToMessage->phone, $message);
    }

    public function messageUser()
    {
        $user = Auth::user();

        $personToMessage= User::find(request()->id);
        $senderOrganisation = $user->organisation;

        $message = request()->sms;
        return $this->sendMessage($senderOrganisation, $personToMessage->phone, $message);
    }
    public function sendMessage($organisation, $mobile, $message)
    {
        $partnerID = $organisation->organisation_config->partner_id;
        $apikey = $organisation->organisation_config->api_key;
        $shortcode = $organisation->organisation_config->short_code;


        $finalURL = "https://bulksms.afrinettelecom.co.ke/api/services/sendsms/?apikey=" . urlencode($apikey) . "&partnerID=" . urlencode($partnerID) . "&message=" . urlencode($message) . "&shortcode=$shortcode&mobile=$mobile";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $finalURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        return $message;

    }
}
