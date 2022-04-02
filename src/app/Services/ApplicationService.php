<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Traits\PayloadJWT;

use App\Models\Application;

use Exception;

class ApplicationService
{
	use PayloadJWT;

	public function getAllApplications($limit = null, $offset = null)
	{

	}

	public function getApplicationById($id)
	{

	}

	public function saveApplication($req)
	{

	}

	public function updateApplication($req, $id)
	{

	}

	public function deleteApplication($id)
	{

	}
}