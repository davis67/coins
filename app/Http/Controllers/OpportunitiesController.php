<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Http\Requests\OpportunityRequest;
use App\Http\Resources\OpportunitiesResource;
use App\Http\Resources\OpportunitiesCollection;
use App\Models\Team;
use App\User;
use Countries;



class OpportunitiesController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * View all opportunities.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('opportunities.index');
    }

    /**
     * get all the opportunities from the database, order by the latest
     * @return collection
     */

    public function getAllOpportunities()
    {
        return new OpportunitiesCollection(Opportunity::all());
    }


    /**
     * Create a new opportunity.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $teams = Team::all();
        $users = User::all();
        $countries = Countries::all()->pluck('name.common');
        return view('opportunities.create', compact('teams', 'users', 'countries'));
    }

    /**
     * Persist a new opportunity.
     *
     * @return mixed
     */
    public function store(OpportunityRequest $request)
    {
        return auth()->user()
            ->opportunities()
            ->create($request->validated());
    }

    /**
     * attach a document.
     *
     * @return \Illuminate\Http\Response
     */

    public function uploadDocument($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $opportunity->attachFIle(request()->file('file'));
        return 'success';
    }

    /**
     * assign a consultant.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignConsultants($opportunityId, $userId)
    {
        $opportunity = Opportunity::findOrFail($opportunityId);
        $consultant = User::findOrFail($userId);
        $opportunity->assignConsultant($consultant);
        return 'success';
    }

    /**
     * Display the opportunity.
     *
     * @param  Opportunity $opportunity
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $opportunity = new OpportunitiesResource(Opportunity::findOrFail($id));
        return view('opportunities.show', compact('opportunity'));
    }

    /**
     * Edit the opportunity.
     *
     * @param  Opportunity $opportunity
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $opportunity = new OpportunitiesResource(Opportunity::findOrFail($id));
        $countries = Countries::all()->pluck('name.common');
        return view("opportunities.edit", compact("opportunity", "teams", "countries"));
    }

    /**
     * Update the opportunity.
     *
     * @param  Opportunity $opportunity
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function update(OpportunityRequest $request, $id)
    {
        $opportunity  = Opportunity::findOrFail($id);
        $opportunity->update($request->validated());
        return 'success';
    }

    /**
     * Destroy the opportunity.
     *
     * @param  Opportunity $opportunity
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function destroy($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $opportunity->delete();
        return "success";
    }
}
