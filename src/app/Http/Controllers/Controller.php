<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	const DEFAULT_LIMIT_SIZE = 100;
	const MIN_LIMIT_SIZE = 1;
	const DEFAULT_OFFSET_START = 0;

	const SUCCESS = 200;
	const BAD_REQUEST = 400;
	const UNAUTHORIZED = 401;
	const NOT_FOUND = 404;
	const METHOD_NOT_ALLOWED = 405;
	const INTERNAL_SERVER_ERROR = 500;
	const BAD_GATEWAY = 502;
	const SERVICE_UNAVAILABLE = 503;
	const GATEWAY_TIMEOUT = 504;
}
