<?php

namespace App\Policies;


use App\Models\User;
use App\Opportunity;
use Illuminate\Auth\Access\HandlesAuthorization;

class OpportunityPolicy
{
    use HandlesAuthorization;

    /**
     * override all the call if the user is an administrator
     * this method is called before every other method
     */

    //  public function before($user, $ability){
    //      if($user->isAdmin){
    //          return true;
    //      }

    //      return false;
    //  }
    /**
     * Determine whether the user can view any opportunities.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the opportunity.
     *
     * @param  \App\User  $user
     * @param  \App\Opportunity  $opportunity
     * @return mixed
     */
    public function view(User $user, Opportunity $opportunity)
    {
        return true;
    }

    /**
     * Determine whether the user can create opportunities.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return  $user->permission->canCreateOpportunity === true;
    }

    /**
     * Determine whether the user can update the opportunity.
     *
     * @param  \App\User  $user
     * @param  \App\Opportunity  $opportunity
     * @return mixed
     */
    public function update(User $user, Opportunity $opportunity)
    {
        return $user->permission->canEditOpportunity ===  true;
    }

    /**
     * Determine whether the user can delete the opportunity.
     *
     * @param  \App\User  $user
     * @param  \App\Opportunity  $opportunity
     * @return mixed
     */
    public function delete(User $user, Opportunity $opportunity)
    {
        //
    }

    /**
     * Determine whether the user can restore the opportunity.
     *
     * @param  \App\User  $user
     * @param  \App\Opportunity  $opportunity
     * @return mixed
     */
    public function restore(User $user, Opportunity $opportunity)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the opportunity.
     *
     * @param  \App\User  $user
     * @param  \App\Opportunity  $opportunity
     * @return mixed
     */
    public function forceDelete(User $user, Opportunity $opportunity)
    {
        //
    }
}
