<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ApplicationService;

use Exception;

class ApplicationController extends Controller
{
    private $applicationService;

	function __construct(ApplicationService $applicationService)
	{
		$this->applicationService = $applicationService;
	}

	public function index(Request $req)
	{
		$limit = self::DEFAULT_LIMIT_SIZE;
		$offset = self::DEFAULT_OFFSET_START;

		if ($req->get('limit')) {
			$limit = $req->get('limit');
		}

		if ($req->get('offset')) {
			$offset = $req->get('offset');
		}

		
	}

	public function show($id)
	{

	}

	public function store(Request $req)
	{

	}

	public function update(Request $req, $id)
	{

	}

	public function destroy($id)
	{

	}
}