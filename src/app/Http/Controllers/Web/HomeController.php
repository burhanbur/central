<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Application;
use App\Models\Approval;
use App\Models\ApprovalWorkflow;
use App\Models\Employee;
use App\Models\Organization;
use App\Models\Position;
use App\Models\User;

use Auth;

class HomeController extends Controller
{
    public function index()
    {
    	$id = Auth::user()->id;
    	$personId = Auth::user()->person->id;

    	$applications = Application::where('is_active', 1)->orderBy('application', 'ASC')->limit(5)->get();
    	$approvals = ApprovalWorkflow::select('request_code', 'approver_id', 'approval_id', 'status', 'sequence')
    	->whereIn('status', array('SUBMITTED', 'WAITING'))
    	->with('approval.application')
    	->with('employee.person')
    	->groupBy('request_code', 'approver_id', 'status', 'sequence', 'approval_id')
    	->orderBy('created_at', 'DESC')
    	->limit(5)
    	->get();

    	$users = User::where('is_active', 1)->orderBy('created_at', 'DESC')->limit(5)->get();
    	$employees = Employee::orderBy('created_at', 'DESC')->limit(5)->get();
    	$organizations = Organization::orderBy('created_at', 'DESC')->limit(5)->get();
    	$positions = Position::orderBy('created_at', 'DESC')->limit(5)->get();

    	// user
    	$myApplication = Application::where('is_active', 1)->whereHas('userApplication', function($query) use ($id) {
    		$query->where(array('user_id' => $id, 'is_active' => 1));
    	})->orderBy('application', 'ASC')->limit(6)->get();

    	$myApproval = ApprovalWorkflow::whereHas('employee', function($query) use ($personId) {
    		$query->where('person_id', $personId);
    	})->orderBy('created_at', 'DESC')->limit(5)->get();

        return view('contents.dashboard', get_defined_vars());
    }
}
