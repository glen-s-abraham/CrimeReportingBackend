<?php

namespace App\Providers;

use App\Models\Complaint;
use App\Models\District;
use App\Models\FeedBack;
use App\Models\Query;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\UserRole;
use App\Policies\ComplaintPolicy;
use App\Policies\DistrictPolicy;
use App\Policies\FeedBackPolicy;
use App\Policies\QueryPolicy;
use App\Policies\UserPolicy;
use App\Policies\UserRolePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        UserRole::class=>UserRolePolicy::class,
        District::class=>DistrictPolicy::class,
        User::class=>UserPolicy::class,
        Complaint::class=>ComplaintPolicy::class,
        FeedBack::class=>FeedBackPolicy::class,
        Query::class=>QueryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
