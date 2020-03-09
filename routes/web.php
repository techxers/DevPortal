<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
})->name('landing');
Route::get('/contact', function () {
    return view('panels.landing-contact');
})->name('contact');

Route::get('/location', function () {
    return view('panels.landing-siting');
})->name('site');

Route::get('/about', function () {
    return view('panels.landing-about');
})->name('about');
Route::get('/o', function () {
    return view('landing.0index');
});
//first
Auth::routes();

//after
Auth::routes(['verify' => true]);


Route::get('/portal/dashboard', 'DashboardController@viewDashboard')->middleware('verified');;
Route::get('/portal/', 'DashboardController@viewDashboard')->name('dashboard')->middleware('verified');;


Route::get('/portal/organisations', 'OrganisationsController@viewAll')->name('organisations');
Route::post('/portal/organisations/update', 'OrganisationsController@UpdateOrganisations')->name('update-organisations');
Route::post('portal/organisations/create', 'OrganisationsController@createOrganisations')->name('create-organisations');

Route::get('/portal/visitors','DashboardController@viewVisitors')->name('visitors-view');
Route::get('/portal/visitors-all','DashboardController@viewAllVisitors')->name('visitors-all');
Route::get('/portal/visitors-org',['uses'=>'DashboardController@viewVisitorsOrg','as'=>'visitors-org']);
Route::get('/portal/registerVisitor','DashboardController@openRegisterVisitor')->name('visitor-register');

Route::get('/portal/visitor/add','DashboardController@addVisitor')->name('add-visitor');

Route::get('/portal/staffs','OrganisationsController@staffView')->name('view-staff');

Route::get('/portal/staffs/update',['uses'=>'OrganisationsController@updateStaffInfo','as'=>'update-staff']);

Route::get('portal/organisation-profile', 'OrganisationsController@Profile')->name('organisation-profile');
Route::patch('portal/organisation-profile/update', 'OrganisationsController@profileUpdate')->name('org-profile-update');

Route::get('portal/logs', 'OrganisationsController@viewLogs')->name('view-logs');

Route::get('portal/user-profile', 'DashboardController@Profile')->name('user-profile');
Route::patch('portal/user-profile/update', 'DashboardController@profileUpdate')->name('user-profile-update');


Route::get('portal/Settings', 'DashboardController@settings')->name('settings');

Route::get('portal/appointment/create', 'DashboardController@createAppointment')->name('create-appointment');


Route::post('portal/todo/add', 'DashboardController@addTodo')->name('add-todo');
Route::get('portal/todo/remove', 'DashboardController@removeTodo')->name('add-remove');

Route::post('portal/billing-add', 'DashboardController@billingAdd')->name('billing-add');
Route::get('portal/billing-modify', 'DashboardController@billingModify')->name('billing-modify');
Route::get('portal/billing-fetch', 'DashboardController@billingFetch')->name('billing-fetch');
Route::get('portal/billing-list', 'DashboardController@billingList')->name('billing-list');
Route::post('portal/billing-post', 'DashboardController@billingPost')->name('billing-post');
Route::get('portal/billing-delete', 'DashboardController@billingDelete')->name('billing-delete');

Route::get('portal/appointments', 'DashboardController@showAppointments')->name('show-appointments');


Route::get('/portal/organisations/manage-status','OrganisationsController@manageStatus');

Route::get('/portal/recover-account',function (){
    $user = auth()->user();
     $organisation = $user->organisation;
      $role = $user->role;

    $view = 'portal.recover-account';
      if($role->id>2)
          $view = 'portal.account-blocked';

    return view($view, compact("user", "organisation", "role"));
})->name('recover-account');


Route::get('/portal/config/update','DashboardController@configUpdate');

Route::get('portal/calendar', 'DashboardController@calendarSystem')->name('calendar-system');
Route::get('/portal/appointment/update','DashboardController@updateAppointment');

Route::get('/portal/visitor/update','DashboardController@updateVisitorStatus')->name('update-visitor');
Route::get('/portal/visitor/{id}','DashboardController@findVisitor');

Route::get('/portal/appointment/notify','DashboardController@notifyAppointment');

Route::get('/portal/visitors/notify','DashboardController@notifyVisitors');



Route::get('/portal/editStaff','OrganisationsController@editStaff');



Route::get('/portal/staff/delete','OrganisationsController@userDelete');
Route::get('/portal/staff/fetch','OrganisationsController@staffFetch')->name('fetch-staffs');
Route::post('/portal/staffs/add', 'OrganisationsController@addStaff')->name('add-staff');


Route::get('/portal/org_config/update','OrganisationsController@organisationConfigUpdate');
Route::get('/portal/org_config/delete','OrganisationsController@organisationConfigDelete');






Route::post('mail-appointment-note', 'EmailController@sendAppointNote')->name("send-notify-mail");

Route::get('/portal/Reports','DashboardController@Reports')->name('reports');
//Route::get('/portal/view-report','DashboardController@loadReport')->name('load-reports');
Route::get('/portal/view-report',['uses'=>'DashboardController@loadReport','as'=>'load-reports']);



/*
 * Dealing with messaging routes
 */
Route::get('/portal/message/organisation','DashboardController@messageOrganisation')->name("message-organisation");
Route::get('/portal/message/visitor','DashboardController@messageVisitor')->name("message-visitor");
Route::get('/portal/message/user','DashboardController@messageUser')->name("message-user");
/*
 * End of messaging
 */

/*
 * Dealing with emailing routes
 */
Route::post('/portal/email/organisation','EmailController@emailOrganisation')->name("email-organisation");
Route::post('/portal/email/visitor','EmailController@emailVisitor')->name("email-visitor");
Route::post('/portal/email/user','EmailController@emailUser')->name("email-user");
/*
 * End of emailing
 */

/*
 * Handling visitor/client retention calculation
 */
Route::get('/portal/organisation/visitor-retention','OrganisationsController@calcVisitorRetention')->name("visitor-retention");
/*
 * End of retention
 */