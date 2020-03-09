<?php

namespace App\Http\Controllers;


use App\Appointment;
use App\Asset;
use App\Config;
use App\Feature;
use App\Organisation;
use App\Plan;
use App\Product;
use App\Service;
use App\Subscription;
use App\Todo;
use App\User;
use App\Visitor;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function viewDashboard()
    {
        $user = auth()->user();
        $organisation = $user->organisation;
        $role = $user->role;

        $view = 'portal.dashboard-staffs';
        if ($role->id == 1)
            $view = 'portal.dashboard-superAdmin';

        elseif ($role->id == 2)
            $view = 'portal.dashboard-admin';

        return view($view, compact("user", "organisation", "role"));

    }


    public function viewAllVisitors()
    {
        $this->authorize('for-superAdmin', auth()->user());
        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;

        /*
         * This are the Valid methods:
         * $organisation=$user->organisation
         * $users=Organisation::find(1)->users
         */


        return view('portal.allVisitors', compact("user", "organisation", "role"));

    }

    public function viewVisitorsOrg()
    {
        $org_id = Crypt::decrypt(request()->organisation_id);
        $user = Auth::user();
        $organisation = Organisation::find($org_id);
        $role = $user->role;
        $visitors = Visitor::where('organisation_id', $org_id)->get();

        return view('portal.visitors', compact("user", "organisation", "role", "visitors"));

    }

    public function viewVisitors()
    {
        $user = Auth::user();
        $organisation = $user->organisation;
        $org_id = $organisation->id;
        $role = $user->role;
        $visitors = Visitor::where('organisation_id', $org_id)->filterDates()->orderBy('created_at')->get();


        return view('portal.visitors', compact("user", "organisation", "role", "visitors"));

    }

    public function openRegisterVisitor()
    {
        $this->authorize('for-client', auth()->user());

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;
        $visitors = Visitor::where('organisation_id', $organisation->id)->get();


        return view('portal.register-visitor', compact("user", "organisation", "role", "visitors"));

    }

    public function showAppointments()
    {
        // $this->authorize(['for-client', 'for-admin'], auth()->user());

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;
        $visitors = Visitor::where('organisation_id', $organisation->id)->get();
        $appointments = Appointment::where('organisation_id', $organisation->id)->filterDates()->orderBy('created_at')->get();

        return view('portal.appointments', compact("user", "organisation", "role", "visitors", "appointments"));

    }

    public function createAppointment()
    {

        $this->authorize('for-client', auth()->user());

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;
        $visitors = Visitor::where('organisation_id', $organisation->id)->get();


        return view('portal.create-appointments', compact("user", "organisation", "role", "visitors"));

    }


    public function Profile()
    {

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;

        return view('portal.profile-user', compact("user", "organisation", "role"));
    }


    public function Settings()
    {
        // $this->authorize('for-allAdmins', auth()->user());

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;
        $visitors = Visitor::where('organisation_id', $organisation->id)->get();

        /*
         * This are the Valid methods:
         * $organisation=$user->organisation
         * $users=Organisation::find(1)->users
         */


        return view('portal.settings', compact("user", "organisation", "role", "visitors"));
    }


    public function findVisitor($id)
    {
        $count = Visitor::where("national_id", $id)->count();

        if ($count > 0)
            return array(Visitor::where("national_id", $id)->get(), Appointment::where("national_id", $id)->get());

        return null;
    }


    public function addTodo()
    {
        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;

        $data = request()->validate([
            'title' => [],
            'description' => [],
            'date' => [],
            'time' => [],
            'category' => [],

            'dateTime' => []
        ]);

        if (!isset($data['category']))
            $data['category'] = 'Others';
        elseif (!isset($data['title']))
            $data['title'] = 'none';
        elseif (!isset($data['time']))
            $data['time'] = time();


        $data['dateTime'] = $data['date'] . " " . $data['time'];
        unset($data['date']);
        unset($data['time']);

        Todo::create(
            array_merge(
                $data, ['organisation_id' => $organisation->id, 'user_id' => $user->id]
            )
        );

        return redirect(route('dashboard'));
    }

    public function removeTodo()
    {
        Todo::where("id", request()->id)->delete();

        return 'true';
    }


    public function summary()
    {
        $user = auth()->user();

        $organisation = $user->organisation;
        $role = $user->role;

        /*
         * This are the Valid methods:
         * $organisation=$user->organisation
         * $users=Organisation::find(1)->users
         */


        $view = 'portal.summary3';
        if ($role->id == 1)
            $view = 'portal.summary1';

        elseif ($role->id == 2)
            $view = 'portal.summary2';

        return view($view, compact("user", "organisation", "role"));

    }

    public function userProfile()
    {

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;

        /*
         * This are the Valid methods:
         * $organisation=$user->organisation
         * $users=Organisation::find(1)->users
         */


        return view('portal.userProfile', compact("user", "organisation", "role"));
    }

    public function billingAdd()
    {
        $this->authorize('for-superAdmin', auth()->user());

        $data = request()->validate([
            'title' => [],
            'description' => [],
            'functionality' => []
        ]);
        $product = Product::create($data);


        for ($i = 0; $i < request()['plan_count']; $i++) {
            $plan = Plan::create(
                array(
                    "product_id" => $product->id,
                    "title" => request()['plan_title' . ($i + 1) . ''],
                    "pricing" => request()['plan_price' . ($i + 1) . ''],
                    "period" => request()['plan_period' . ($i + 1) . ''],
                    "note" => request()['plan_note' . ($i + 1) . ''],
                    "functionality" => request()['plan_functionality' . ($i + 1) . '']
                )
            );
            Feature::create(
                array(
                    "plan_id" => $plan->id,
                    "product_id" => $product->id,
                    "func_no_accounts" => request()['func_no_accounts' . ($i + 1) . ''],
                    "func_no_sms" => request()['func_no_sms' . ($i + 1) . ''],
                    "func_no_records" => request()['func_no_records' . ($i + 1) . ''],
                    "func_no_modules" => request()['func_no_modules' . ($i + 1) . '']
                )
            );

        }
        session()->flash('status', 'Billing Info added successfully');
        return redirect()->route('billing-modify');
    }

    public function billingModify()
    {
        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;
        $visitors = Visitor::where('organisation_id', $organisation->id)->get();

        return view('portal.billing-add', compact("user", "organisation", "role", "visitors"));

    }

    public function billingDelete()
    {
        Plan::where("product_id", request()["id"])->delete();
        Product::where("id", request()["id"])->delete();
        session()->flash('status', 'Billing Deleted Successfully');

        return $this->billingModify();
    }

    public function billingPost()
    {
        $this->authorize('for-superAdmin', auth()->user());

        $data = request()->validate([
            'title' => [],
            'pricing' => [],
            'details' => [],
            'isUpdate' => []
        ]);


        if ($data['isUpdate'] < 1) {
            Service::create([
                'title' => $data['title'],
                'pricing' => $data['pricing'],
                'details' => $data['details']
            ]);
        } else {
            Service::update([
                'title' => $data['title'],
                'pricing' => $data['pricing'],
                'details' => $data['details']
            ]);
        }

        //return redirect(route('billing-add'));
    }

    public function billingFetch()
    {
        $service = Service::all();

        dd($service->toJson());
    }


    public function billingList()
    {
        $this->authorize('for-superAdmin', auth()->user());

        $organisations = \App\Organisation::all();
        $user = Auth::user();
        $role = $user->role;
        $organisation = $user->organisation;


        return view('portal.billing-list', compact('organisations', 'organisation', 'user', 'role'));

    }

    public function configUpdate()
    {
        $data = request()->validate([
            'theme' => [],
            'notify_message' => [],
            'api_key' => [],
            'short_code' => [],
            'partner_id' => []
        ]);

        foreach ($data as $key => $value) {
            if (!isset($data[$key]))
                unset($data[$key]);
        }


        $update = Config::where('user_id', '=', Auth::user()->id)->update(
            $data
        );
        return $update;
    }

    public function calendarSystem()
    {
        // $this->authorize('for-superAdmin', auth()->user());

        $organisations = \App\Organisation::all();
        $user = Auth::user();
        $role = $user->role;
        $organisation = $user->organisation;


        return view('portal.calendar-system', compact('organisations', 'organisation', 'user', 'role'));
    }

    public function updateAppointment()
    {
        $data = request()->validate([
            'status' => [],
            'comments' => []
        ]);


        if ($data['status'] == 'completed') {
            //fetch a existing visitor
            $visitor = Visitor::find(request()->id);

            //Clone a attribute of existing row into a new copy
            $duplicateVisitor = $visitor->replicate();

            //Change a date of the copy visitor by appending id of the existing post to make the name of duplicate post unique
            //$duplicateVisitor=$visitor->first_name ."".$visitor->id;

            //Now create a duplicate visitor
            //$duplicateVisitor->save();

        }
        if (!isset($data['comments']))
            unset($data['comments']);

        $update = Appointment::where([['organisation_id', Auth::user()->organisation_id], ["id", request()->id]])->update(
            $data
        );
        return $update;
    }

    public function updateVisitorStatus()
    {
        $update = Visitor::where("id", request()->id)->update(
            ["visitor_state" => 3,
                "time_out" => Carbon::now()
            ]
        );

        return $update;

    }

    public function notifyVisitors()
    {
        $data = request()->validate([
            // 'status' => [],
        ]);
        $id = request()->id;
        $visitorNotify = Visitor::find($id);
        $user = Auth::user();
        $organisation = $user->organisation;
        $configNotify = $organisation->organisation_config;

        $messageNotify = request()->sms;

        return $this->sendMessage($organisation, $visitorNotify->phone, $messageNotify);
    }

    public function notifyAppointment()
    {
        $data = request()->validate([
            // 'status' => [],
        ]);
        $id = request()->id;
        $appointNotify = Appointment::find($id);
        $visitorNotify = $appointNotify->visitor;
        $user = Auth::user();
        $organisation = $user->organisation;
        $configNotify = $organisation->organisation_config;

        $messageNotify = str_replace(["%name", "%company", "%date", "%time"], [$visitorNotify->last_name, $organisation->name, date_format(date_create($appointNotify->dateTime), 'l jS F Y'), date_format(date_create($appointNotify->dateTime), 'g:i A')], request()->sms);

        Appointment::where('id', $id)->update(["notified" => true]);

        return $this->sendMessage($organisation, $visitorNotify->phone, $messageNotify);
    }

    public function sendMessage($organisation, $phone, $sms)
    {
        $partnerID = $organisation->organisation_config->partner_id;
        $apikey = $organisation->organisation_config->api_key;
        $shortcode = $organisation->organisation_config->short_code;

        $mobile = $phone; //254711180014 Bulk messages can be comma separated
        $message = $sms;
        //   dd($partnerID." , ".$apikey." , ".$shortcode." , ".$mobile." , ".$message);
        $finalURL = "https://bulksms.afrinettelecom.co.ke/api/services/sendsms/?apikey=" . urlencode($apikey) . "&partnerID=" . urlencode($partnerID) . "&message=" . urlencode($message) . "&shortcode=$shortcode&mobile=$mobile";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $finalURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);


        return $message;

    }


    /*****************changes final******************************/
    public function profileUpdate()
    {
        $data = request()->validate([
            'phone' => [],
            'password' => [],
            'image' => [],
            'status' => [],
            'name' => [],
            'role_id' => [],
            'email' => []
        ]);


        foreach ($data as $key => $value) {
            if (!isset($data[$key]))
                unset($data[$key]);
        }

        /*$data['name'] = $data['fname'] . ' ' . $data['lname'];*/
        if (request('image')) {
            $imagePath = request('image')->store('user/profiles', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400, 400);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        if (request('id')) {
            User::where('id', request()->id)->update(array_merge(
                $data,
                $imageArray ?? []
            ));
            return redirect(route('view-staff'));

        }
        auth()->user()->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect(route('user-profile'));

    }

    /*****smart security adding visitor*****/
    public function addVisitor()
    {
        $this->authorize('for-client', auth()->user());

        $data = request()->validate([
            'visIdNumber' => [],
            'visFirName' => [],
            'visLasName' => [],
            'visPhoneNo' => [],
            'visEmailAddr' => [],
            'visComment' => [],
            'visHost' => [],
            'visOffice' => [],
            'visState' => [],
            'visAssets' => [],

            'appointDate' => [],
            'appointTime' => [],

        ]);

        $organisation_id=Auth::user()->organisation->id;
        $dov=Carbon::now();

        $visRef = Visitor::create([
            'organisation_id' => $organisation_id,
            'national_id' => $data['visIdNumber'],
            'first_name' => $data['visFirName'],
            'last_name' => $data['visLasName'],
            'phone' => $data['visPhoneNo'],
            'email' => $data['visEmailAddr'],
            'comments' => $data['visComment'],
            'office' => $data['visOffice'],
            'visitor_state' => $data['visState'],
            'host' => $data['visHost'],
            'date_of_visit' => $dov,
            'time_in' => $dov
        ]);
        foreach (explode(",",$data['visAssets']) as $name_serial){
            if(strlen($name_serial)<2){
                continue;
            }
            $asset=explode("=",$name_serial);
            Asset::create([
                    'organisation_id' => $organisation_id,
                    'visitor_id'=>$visRef->id,
                    'date_of_visit' => $dov,
                    'name'=>$asset[0],
                    'serial'=>$asset[1]

                ]
            );
        }


        if ($data['visState'] == '1' && isset($data['appointTime'])) {

            if ($data['appointDate'] == null || $data['appointDate'] == "") {
                $data['appointDate'] = Carbon::now()->format('d-m-Y');
            }
            $data['appointTime'] = str_replace(' ', '', $data['appointTime']);
            Appointment::create([
                'organisation_id' => Auth::user()->organisation->id,
                'visitor_id' => $visRef->id,

                'dateTime' => new DateTime($data['appointDate'] . " " . $data['appointTime']),
                'national_id' => $data['visIdNumber'],
            ]);
            return route('show-appointments');

        }
        return route('visitors-view');
    }


    /*********************************reports dealings***********************/
    public function Reports()
    {
        $user = auth()->user();
        $organisation = $user->organisation;
        $role = $user->role;


        return view("portal.reports", compact("user", "organisation", "role"));
    }
    public function loadReport(){
        $user = auth()->user();
        $organisation = $user->organisation;
        $role = $user->role;

        $report_id = Crypt::decrypt(request()->report_id);

        $subscriptions=Subscription::where('id',">",1)->filterDates()->orderBy('created_at')->get();
        $organisation_users=User::where('id',">",0)->filterDates()->orderBy('created_at')->get();
        $organisation_visitors=Visitor::where('id',">",0)->filterDates()->orderBy('date_of_visit')->get();
        $organisation_appoints=Visitor::where('id',">",0)->filterDates()->orderBy('date_of_visit')->get();

        $view="";
        if($report_id==1001){
            //billing reports
            $view="reports.all-billing";
        }
        elseif ($report_id==1002){
            $view="reports.all-users";
        }
        elseif ($report_id==1003){
            $view="reports.all-visitors";
        }
        elseif ($report_id==1004){
            $view="reports.vis-checkins";
        }
        elseif ($report_id==1005){
            $view="reports.vis-checkout";
        }
        elseif ($report_id==1006){
            $view="reports.vis-appointments";
        }
        return view($view, compact("user", "organisation", "role","subscriptions","organisation_users","organisation_visitors","organisation_appoints"));


    }
    public function messageOrganisation()
    {
        $id = request()->id;
        $organisationToMessage= Organisation::find($id);
        $user = Auth::user();
        $organisation = $user->organisation;

        $messageNotify = request()->sms;

        return $this->sendMessage($organisation, $organisationToMessage->phone, $messageNotify);
    }
}
