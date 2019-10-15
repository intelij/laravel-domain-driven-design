<?php

namespace App\Application\Http\Controllers;

use App\Application\Commands\Post\PostCreateCommand;
use App\Domain\Post\PostCreateException;
use App\Domain\Post\Services\PostCreateServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
	/** @var PostCreateServiceInterface  */
	protected $postCreateService;

	/**
	 * PostController constructor.
	 *
	 * @param PostCreateServiceInterface $postCreateService
	 */
	public function __construct(PostCreateServiceInterface $postCreateService)
	{
		$this->postCreateService = $postCreateService;
	}

	/**
	 *

	 * @param Request $request
	 * @return JsonResponse
	 * @throws PostCreateException
	 */
	public function create(Request $request)
	{
		$command = new PostCreateCommand(
			$request->get('title'),
			$request->get('body')
		);

		$validation = $command->validate();

		if ($validation->fails()) {
			throw new PostCreateException($validation->getMessageBag());
		}

		$res =  $this->postCreateService->execute($command);

		return JsonResponse::create(['state' => $res]);
	}
}