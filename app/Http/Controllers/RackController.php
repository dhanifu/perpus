<?php

namespace App\Http\Controllers;

use App\Repositories\RackRepository;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RackController extends Controller
{
    public function search(Request $request, RackRepository $rack): Object
	{
		return $rack->search($request->name);
	}
}
