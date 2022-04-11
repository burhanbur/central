<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Application;
use Auth;

class ApplicationController extends Controller
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

    public function myApplication()
    {
        $id = Auth::user()->id;
        
        $myApplication = Application::where('is_active', 1)->whereHas('userApplication', function($query) use ($id) {
            $query->where(array('user_id' => $id, 'is_active' => 1));
        })->orderBy('application', 'ASC')->get();

    	return view('contents.applications.user_application', get_defined_vars());
    }
}
