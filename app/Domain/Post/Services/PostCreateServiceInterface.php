<?php

namespace App\Domain\Post\Services;

use App\Application\Commands\Post\PostCreateCommand;

interface PostCreateServiceInterface
{
	/**
	 * @param PostCreateCommand $command
	 * @return mixed
	 */
	public function execute(PostCreateCommand $command);
}