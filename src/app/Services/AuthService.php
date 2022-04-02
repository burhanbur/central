<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Utilities\PayloadJWT;
use App\Interfaces\AuthInterface;

use Exception;

class AuthService implements AuthInterface
{
	use PayloadJWT;

	
}