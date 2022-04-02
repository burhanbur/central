<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Traits\PayloadJWT;

use App\Models\Role;

use Exception;

class RoleService
{
	use PayloadJWT;

	public function getAllRoles($limit = null, $offset = null)
	{

	}

	public function getRoleById($id)
	{

	}

	public function saveRole($req)
	{

	}

	public function updateRole($req, $id)
	{

	}

	public function deleteRole($id)
	{

	}
}