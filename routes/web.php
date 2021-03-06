<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);
Auth::loginUsingId("4c793b21-2995-4ae7-8cd8-da525f5bd795");

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name("home");
Route::get('/admin', 'HomeController@admin');
Route::get('/help', 'HomeController@support');
Route::post('/help', 'HomeController@sendMessage');
Route::get('/display/{current_month}', 'HomeController@display');
Route::get('/display/{current_quater}', 'HomeController@display');
Route::get('/display/{current_year}', 'HomeController@display');

//Routing everything about contacts
Route::resource('/contacts', 'ContactsController');

//Routing everything about opportunities
Route::post("/opportunities/{opportunity}/upload", "OpportunitiesController@uploadDocument");
Route::get("/opportunities/{opportunity}/download/{download}", "OpportunitiesController@downloadDocument");
Route::get("/opportunities/{opportunity}/remove/{download}", "OpportunitiesController@removeDocument");
Route::get("/opportunities/data", "OpportunitiesController@getAllOpportunities");
Route::get('/opportunities/{opportunity}/assign/{consultant}', 'OpportunitiesController@assignConsultants')
    ->name('opportunties.assign');
Route::get('/opportunities/{opportunity}/removeconsultant/{consultant}', 'OpportunitiesController@removeConsultants')
    ->name('opportunties.detach');
Route::resource('opportunities', 'OpportunitiesController');
Route::post('/opportunityUser', 'OpportunitiesController@addConsultants')->name('opportunityUser');
Route::delete('/removeConsultant/{id}', 'OpportunitiesController@removeConsultant')->name('removeConsultant');
Route::post('/filterOpportunities', 'OpportunitiesController@filterOpportunities')->name('filterOpportunities');


//Routing everything about projects
Route::resource('/projects', 'ProjectsController');
Route::post('/projects/{project}', 'ProjectsController@update');
Route::post('/createProject', 'ProjectsController@createProject')->name('createProject');
Route::post('/projectUser', 'ProjectsController@addConsultants')->name('projectUser');
Route::post('/projectassociates', 'ProjectsController@addAssociates')->name('addAssociates');
Route::post('/logs', 'ProjectsController@logs')->name('logs');
Route::get('/getproject/{project}', 'ProjectsController@getproject')->name('getproject');
Route::delete('/unassignConsultant/{consultant}', 'ProjectsController@removeConsultant')->name('unassignConsultant');
Route::post('/filterProjects', 'ProjectsController@filterProjects')->name('filterProjects');

//Routing everything about tasks
Route::resource('/tasks', 'TasksController');
Route::post('tasks/{task}', 'TasksController@update');

//Routing everything about timesheets
Route::resource('/timesheets', 'TimesheetsController');
Route::post('/timesheets/{timesheets}', 'TimesheetsController@update');

Route::post('/saveResponses', 'TasksController@saveResponses')->name('saveResponses');

//Routing everything about partner firms
Route::resource('/partners', 'PartnersController');

//Routing evaluations
Route::resource('/evaluations', 'EvaluationsController');
//Routing everything about leaves
Route::resource('/leaves', 'LeavesController');
Route::get('/delLeave/{leave}', 'LeavesController@destroy')->name('delLeave');
Route::get('/leave/request-form/{nofification_id}/{leave}', 'LeavesController@leaveRequestForm')->name('leaveRequest');
Route::post('/leave/request-form', 'LeavesController@updateLeaveRequest')->name('updateLeaveRequest');
Route::resource('/leavesettings', 'LeavesettingsController');
Route::get('/leavesettings', 'LeavesettingsController@create');
Route::post('/leavesettings/{leavesetting}', 'LeavesettingsController@update')->name('targets');
Route::resource('/leaveforwards', 'LeaveforwardsController');

//Routing everything about scores
Route::resource('/scores', 'ScoresController');

//Routing everything about teams
Route::get("/teams/data", "TeamsController@getAllTeams");
Route::resource('/teams', 'TeamsController');
Route::get('/myteam', 'TeamsController@myteam');
Route::get('/getteamleader/{team}', 'TeamsController@getteamleader');
Route::post('/teams/{team}', 'TeamsController@update');

//Routing everything about titles
Route::resource('/titles', 'TitlesController');
Route::post('/titles/{title}', 'TitlesController@update');

//Routing everything about roles
// Route::resource('/roles', 'RolesController');
// Route::post('/roles/{roles}', 'RolesController@update');

//Routing everything about holidays
Route::resource('/holidays', 'HolidaysController');
Route::get('/holidays', 'HolidaysController@create');
Route::post('/holidays/{holiday}', 'HolidaysController@update');

//Routing everything about servicelines
Route::resource('/servicelines', 'ServicelinesController');
Route::post('/servicelines/{serviceline}', 'ServicelinesController@update');
Route::post('/getServicelines', 'ServicelinesController@getServicelines')->name('getServicelines');

//Routing everything about documents
Route::resource('/documents', 'DocumentsController');

//Routing everything about deliverables
Route::resource('/deliverables', 'DeliverablesController');
Route::post('/deliverables/{deliverable}', 'DeliverablesController@update');
Route::post('/pickdeliverables', 'DeliverablesController@pickdeliverables');
Route::post('/deliverableopportunities', 'DeliverablesController@deriverableOpportunities');
Route::post('/deliverableopportunities/{deliverableopportunity}', 'DeliverablesController@deriverablesUpdate');
Route::post('/deliverableprojects', 'DeliverablesController@deriverableProjects');


//Routing everything about expertise
Route::resource('/expertise', 'ExpertiseController');
Route::post('/expertise/{expertise}', 'ExpertiseController@update');

//Routing everything about associate specializations
Route::resource('/specialization', 'SpecializationsController');
Route::post('/specialization/{specialization}', 'SpecializationsController@update');
Route::post('/getSpecilization', 'SpecializationsController@getSpecilization')->name('getSpecilization');

//Routing everything about users
Route::get("/users/data", "UsersController@getAllUsers");
Route::resource('users', 'UsersController');

// Route::post('/users/{user}', 'UsersController@update');
Route::get('/teamusers/{team_id}', 'UsersController@search');

//about restoring and deleting users

Route::get('/users/index/accounts-are-frozen', 'UsersController@deletedUsers')->name('users.frozen');
Route::get('/users/restore/{id}', 'UsersController@restoreUser')->name('users.restore');
// change password
Route::post('user/change-password', 'UsersController@changePassword')->name('user.change_password');
// softdelete a user
Route::delete('/users/destroy/{id}', 'UsersController@destroy')->name('users.destroy');
Route::delete('/users/permanentdestroy/{id}', 'UsersController@permanentDestroy')->name('users.permanentdestroy');

Route::resource('/associates', 'AssociatesController');
Route::get('getassociates', 'AssociatesController@getassociates')->name('getassociates');
Route::get('/getAssociate/{associate}', 'AssociatesController@getAssociate')->name('getAssociate');

//Routing everything about comments
Route::resource('/comments', 'CommentsController');
Route::post('/comments/{comment}', 'CommentsController@update');

//Routing everything about targets
Route::resource('/targets', 'TargetsController');
Route::post('/targets/{target}', 'TargetsController@update');

//Routing everything about assessments
Route::resource('/assessments', 'AssessmentsController');

Route::get('/send/send_feedback', 'HomeController@sendFeedback');


//permissions
Route::resource("/permissions", "PermissionController");

/*meat*/
Route::post("users/{id}/partone/{partone}/{dimension}", "MeatpartoneController@store")->name("partone.store");
Route::get("users/{id}/partone", "MeatpartoneController@index")->name("partone.index");
// Route::resource("users.partone", "MeatpartoneController");
Route::resource("assessment", "PartoneassessmentController");
