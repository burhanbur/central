<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ApprovalWorkflow;
use Auth;

class ApprovalController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function show()
    {

    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    public function listApproval()
    {
        $approvals = ApprovalWorkflow::where('approver_id', Auth::user()->person->id)->get();

    	return view('contents.approvals.user_approval', get_defined_vars());
    }

    public function approval(Request $request)
    {

    }
}
