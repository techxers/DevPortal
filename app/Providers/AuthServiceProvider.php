<?php

namespace App\Providers;

use App\Organisation;
use App\Policies\OrganisationPolicy;
use App\Subscription;
use function foo\func;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Organisation::class=>OrganisationPolicy::class,
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('for-superAdmin', function ($user) {
            return $user->role_id ===1;
        });
        Gate::define('for-admin', function ($user) {
            return $user->role_id === 2;
        });

        Gate::define('for-allAdmins', function ($user) {
            return $user->role_id <=2;
        });
        Gate::define('for-client', function ($user) {
            return $user->role_id >2;
        });
        Gate::define('', function ($user) {
            return true;
        });


        Gate::define('product-smart-reception', function ($user) {
            foreach (Subscription::where("organisation_id",$user->organisation->id)->get() as $subscription){
                foreach (explode("%", trim($subscription->products)) as $sub){
                    if(is_numeric($sub) && $sub==1){
                        return true;
                    }
                }


            }
            return false;
        });
        Gate::define('product-smart-security', function ($user) {
            foreach (Subscription::where("organisation_id",$user->organisation->id)->get() as $subscription){
                foreach (explode("%", trim($subscription->products)) as $sub){
                    if(is_numeric($sub) && $sub==2){
                        return true;
                    }
                }

            }
            return false;
        });

    }
}
