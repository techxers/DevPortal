<?php

namespace App\Http\Controllers;

use App\Organisation;
use App\OrganisationConfig;
use App\Subscription;
use App\User;
use App\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class OrganisationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function viewAll()
    {
        $this->authorize('for-superAdmin', auth()->user());

        $organisations = \App\Organisation::all();
        $user = Auth::user();
        $role = $user->role;
        $organisation = $user->organisation;


        return view('portal.organisations', compact('organisations', 'organisation', 'user', 'role'));
    }

    public function Profile()
    {

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;


        return view('portal.profile-organisation', compact("user", "organisation", "role"));
    }

    public function profileUpdate()
    {
        $this->authorize('for-allAdmins', auth()->user());

        $data = request()->validate([
            'name' => [],
            'email' => [],
            'phone' => [],
            'website' => [],
            'postcode' => [],
            'city' => [],
            'country' => [],
            'industry' => []
        ]);


        if (request('image')) {
            $imagePath = request('image')->store('organisation/logo', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(200, 200);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        Organisation::where('id', '=', auth()->user()->organisation_id)->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect(route('organisation-profile'));
    }


    public function editStaff()
    {


        $this->authorize('for-allAdmins', auth()->user());

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;
        $staffEdit = User::find(request()->id);

        if ($staffEdit->organisation_id != $organisation->id)
            abort(403, 'Unauthorized action.');


        return view('portal.edit-staffs', compact('staffEdit', 'organisation', 'usersOfOrg', 'user', 'role'));


    }

    public function addStaff()
    {
        $this->authorize('for-allAdmins', auth()->user());

        $data = request()->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name' => []
        ]);
        $data['name'] = $data['fname'] . ' ' . $data['lname'];


        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'organisation_id' => Auth::user()->organisation_id,
            'role_id' => 3
        ]);

        return redirect(route('view-staff'));

    }

    public function UpdateStaffInfo()
    {
        $this->authorize('for-allAdmins', auth()->user());

        $data = request()->validate([
            'role_id' => [],
        ]);
        if (!isset($data['role_id']))
            unset($data['role_id']);

        User::where('id', request()['id'])->update($data);

        return 'true';
    }

    public function viewLogs()
    {

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;

        return view('portal.logs', compact("user", "organisation", "role"));
    }


    public function updateOrganisations()
    {
        $this->authorize('for-allAdmins', auth()->user());

        $data = request()->validate([
            'name' => [],
            'email' => [],
            'phone' => [],
            'website' => [],
            'postcode' => [],
            'city' => [],
            'country' => [],
            'industry' => [],
        ]);

        Organisation::where('id', request()['idContainer'])->update($data);

        return redirect(route('organisations'));
    }

    function createOrganisations()
    {
        $this->authorize('for-superAdmin', auth()->user());

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'title' => ['required', 'string', 'max:255'],
            'company_email' => ['required', 'string', 'email', 'max:255'],
            'postcode' => [],
            'tel' => ['required', 'numeric'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'website' => [''],
            'industry' => [],
            'type' => [],


            'regProducts' => [],
            'regPlans' => [],
            'regTotalPayee' => []
        ]);

        $organisation = Organisation::create([
            'name' => $data['title'],
            'email' => $data['company_email'],
            'postcode' => $data['postcode'],
            'phone' => $data['tel'],
            'city' => $data['city'],
            'country' => $data['country'],
            'website' => $data['website'],
            'industry' => $data['industry'],
            'type' => $data['type']
        ]);

        $subscription = Subscription::create([
                "organisation_id" => $organisation->id,
                "products" => $data['regProducts'],
                "plans" => $data['regPlans'],
                "amount_paid" => $data['regTotalPayee'],
                "subscribed_on" => Carbon::now()
            ]
        );


        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'organisation_id' => $organisation->id,
            'role_id' => 2
        ]);
        session()->flash('registered', 'Registered, User should confirm their email address in their email');
        return redirect(route('organisations'));

    }

    public function orgLogs()
    {

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;

        /*
         * This are the Valid methods:
         * $organisation=$user->organisation
         * $users=Organisation::find(1)->users
         */


        return view('portal.orgLog', compact("user", "organisation", "role"));
    }


    public function manageStaffs()
    {
        $this->authorize('for-allAdmins', auth()->user());

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;
        $usersOfOrg = $organisation->users;


        return view('portal.orgStaffs', compact('organisation', 'usersOfOrg', 'user', 'role'));
    }

    public function manageStatus()
    {

        $state = 0;
        if (request()->status == 'true')
            $state = 1;

        $update = Organisation::where('id', '=', request()->id)->update(
            [
                "access_status" => $state,
                "disable_reason" => request()->reason
            ]
        );
        return $update;
    }


//Deleting user or staff member by the id specification
    public function userDelete()
    {
        $this->authorize('for-allAdmins', auth()->user());

        $status = User::where('id', request()->id)->delete();
        return $status;
    }

    //lists all the staffs
    public function staffView()
    {
        $this->authorize('for-allAdmins', auth()->user());

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;
        $usersOfOrg = $organisation->users;


        return view('portal.view-staffs', compact('organisation', 'usersOfOrg', 'user', 'role'));
    }

    public function staffFetch()
    {

        $this->authorize('for-allAdmins', auth()->user());

        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;
        $usersOfOrg = $organisation->users;

        $staffJson = "[";

        foreach ($usersOfOrg as $usr) {
            if ($usr->id == $user->id)
                continue;

            $role_name = "Super Admin";
            if ($usr->role_id == 2)
                $role_name = "Admin";
            elseif ($usr->role_id == 3)
                $role_name = "Reception";
            elseif ($usr->role_id == 4)
                $role_name = "Security";

            $user_status = $usr->status ? "active" : "blocked";


            $isVerified = $usr->email_verified_at ? 1 : 0;
            $staffJson .= '{
            "name": "' . $usr->name . '",
            "email": "' . $usr->email . '",
            "avatar": "' . asset(config('app.file_path') . ($usr->image ?? 'user/profiles/user_default.svg')) . '",
            "is_verified": "' . $isVerified . '",
            "password": "' . $usr->password . '",
            "role": "' . $role_name . '",
            "phone": "' . $usr->phone . '",
            "status": "' . $user_status . '",
            "id": ' . $usr->id . '},';
        }
        $staffJson = rtrim($staffJson, ",");
        $staffJson .= "]";
        return $staffJson;

    }


    public function organisationConfigUpdate()
    {
        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;

        $data = request()->validate([
            'notify_message' => [],
            'api_key' => [],
            'short_code' => [],
            'partner_id' => [],
            'departments' => [],
            'defaultNote' => [],
            'note_email' => [],
            'note_email_cc' => [],
            'note_phone' => [],
            'assets' => [],
        ]);


        foreach ($data as $key => $value) {
            if (!isset($data[$key]))
                unset($data[$key]);
        }

        if (isset($data['departments'])) {
            $data['departments'] .= "," . $organisation->organisation_config->departments . ",";

        } elseif (isset($data['notify_message'])) {
            $data['notify_message'] = ltrim($data['notify_message'], 'b');
        } elseif (isset($data['assets'])) {
            $data['assets'] .= "," . $organisation->organisation_config->assets . ",";

        }

        $update = OrganisationConfig::where('organisation_id', '=', $organisation->id)->update(
            $data
        );
        return $update;
    }

    public function organisationConfigDelete()
    {
        $user = Auth::user();
        $organisation = $user->organisation;
        $role = $user->role;

        $data = request()->validate([
            'notify_message' => [],
            'api_key' => [],
            'short_code' => [],
            'partner_id' => [],
            'departments' => [],
            'assets' => []
        ]);


        foreach ($data as $key => $value) {
            if (!isset($data[$key]))
                unset($data[$key]);
        }
        if (isset($data['departments']))
            $data['departments'] = str_replace($data['departments'], "", $organisation->organisation_config->departments);
        if (isset($data['assets']))
            $data['assets'] = str_replace($data['assets'], "", $organisation->organisation_config->assets);

        $update = OrganisationConfig::where('organisation_id', '=', $organisation->id)->update(
            $data
        );
        return route('settings');
    }

    public function calcVisitorRetention()
    {
        $user = Auth::user();
        $organisation = $user->organisation;

        $visitors_distinct = array();
        $visitors_all = array();

        $visitors_months_all = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $visitors_months_distinct = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        /*
         * all visitors
         */
        foreach (Visitor::where("organisation_id", $organisation->id)->get() as $visit) {
            array_push($visitors_all, (date_format(date_create($visit->date_of_visit), 'm')));
        }
        $sortedAll = array_count_values($visitors_all);//count values|keys
        ksort($sortedAll);
        /*
         * end of all
         */

        /*
       * distinct visitors 
       */
        foreach (Visitor::where("organisation_id", ">", 0)->select('national_id', 'date_of_visit')->distinct()->groupBy('national_id')->get() as $visit) {
            array_push($visitors_distinct, (date_format(date_create($visit->date_of_visit), 'm')));
        }
        $sortedDistinct = array_count_values($visitors_distinct);//count values|keys
        ksort($sortedDistinct);
        /*
         * end of distinct
         */

        foreach (array_keys($sortedAll) as $key) {
            $visitors_months_all [intval($key)] = -1 * $sortedAll[$key];
        }
        foreach (array_keys($sortedDistinct) as $key) {
            $visitors_months_distinct [intval($key)] = $sortedDistinct[$key];
        }
        array_shift($visitors_months_distinct);
        array_shift($visitors_months_all);

        $finalArray = [$visitors_months_distinct, $visitors_months_all];
        return json_encode(array("CALC" => $finalArray));

    }

}




