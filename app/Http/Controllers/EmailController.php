<?php


namespace App\Http\Controllers;

use App\Appointment;
use App\Mail\DefaultMail;
use App\Organisation;
use App\Visitor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function sendAppointNote()
    {

        $reqData = request()->validate([
            'subject' => [],
            'message' => []
        ]);
        $appointee = Appointment::find(request()->id);
        $visitor = $appointee->visitor;
        $user = Auth::user();
        $organisation = $user->organisation;


        $data = [
            'company' => $organisation->name,
            'company_name' => $organisation->name,
            'visitor_name' => $visitor->first_name . "." . $visitor->last_name,
            'message' => $reqData['message'],
            'subject' => $reqData['subject'],
            'from' => $organisation->organisation_config->note_email ?? $organisation->email,
            'from_name' => $organisation->name,
            'dateTime' => $appointee->dateTime,
            'phone' => $organisation->organisation_config->note_phone ?? $organisation->phone,
            /* 'logo' =>asset(config('app.file_path').($organisation->image??'organisation/logo/org_default.svg'))*/
        ];

        //  return ( new \App\Mail\NotificationEmail($data))->render();
        Mail::to($visitor->email)
            ->cc($organisation->organisation_config->note_email_cc)
            /* ->bcc("dulkhuns@gmail.com")*/
            ->send(new \App\Mail\NotificationEmail($data));


        return "sent";
    }


    public function emailOrganisation()
    {
        $user = Auth::user();

        $reqData = request()->validate([
            'subject' => [],
            'message' => [],
        ]);

        $personToEmail = Organisation::find(request()->id);
        $senderOrganisation = $user->organisation;

        $data = [
            'from' => $senderOrganisation->organisation_config->note_email ?? $senderOrganisation->email,
            'phone' => $senderOrganisation->organisation_config->note_phone ?? $senderOrganisation->phone
        ];
        Mail::to($personToEmail->email)
            ->cc($senderOrganisation->organisation_config->note_email_cc ?? $senderOrganisation->email)
            ->send(new DefaultMail($user, array_merge($reqData, $data)));

        return 1;
    }

    public function emailVisitor()
    {
        $user = Auth::user();

        $reqData = request()->validate([
            'subject' => [],
            'message' => [],
        ]);

        $personToEmail = Visitor::find(request()->id);
        $senderOrganisation = $user->organisation;

        $data = [
            'from' => $senderOrganisation->organisation_config->note_email ?? $senderOrganisation->email,
            'phone' => $senderOrganisation->organisation_config->note_phone ?? $senderOrganisation->phone
        ];
        Mail::to($personToEmail->email)
            ->cc($senderOrganisation->organisation_config->note_email_cc ?? $senderOrganisation->email)
            ->send(new DefaultMail($user, array_merge($reqData, $data)));

        return 1;
    }

    public function emailUser()
    {
        $user = Auth::user();

        $reqData = request()->validate([
            'subject' => [],
            'message' => [],
        ]);

        $personToEmail = Visitor::find(request()->id);
        $senderOrganisation = $user->organisation;

        $data = [
            'from' => $senderOrganisation->organisation_config->note_email ?? $senderOrganisation->email,
            'phone' => $senderOrganisation->organisation_config->note_phone ?? $senderOrganisation->phone
        ];
        Mail::to($personToEmail->email)
            ->cc($senderOrganisation->organisation_config->note_email_cc ?? $senderOrganisation->email)
            ->send(new DefaultMail($user, array_merge($reqData, $data)));

        return 1;
    }

}