<?php

namespace App\Application\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
	/**
	 * @SWG\Swagger(
	 *   @SWG\Info(
	 *     title="Simple blog",
	 *     version="1.0",
	 *     description="Blog in DDD arhitecture",
	 *     @SWG\Contact(
	 *         email="orine90@gmail.com"
	 *     )
	 *   )
	 * )
	 */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
