<?php

namespace App\Infrastructure\Services\Post;

use App\Application\Commands\Post\PostCreateCommand;
use App\Domain\Post\PostCreateException;
use App\Domain\Post\PostRepositoryInterface;
use App\Domain\Post\Services\PostCreateServiceInterface;

class PostCreateService implements PostCreateServiceInterface
{
	/**
	 * @var PostRepositoryInterface
	 */
	private $postRepository;

	/**
	 * PostCreateService constructor.
	 *
	 * @param PostRepositoryInterface $postRepository
	 */
	public function __construct(PostRepositoryInterface $postRepository)
	{
		$this->postRepository = $postRepository;
	}

	/**
	 * @param PostCreateCommand $command
	 * @return bool
	 * @throws PostCreateException
	 */
	public function execute(PostCreateCommand $command)
	{
		$post = $this->postRepository->prepareData([
			'title' => $command->getTitle(),
			'body' => $command->getBody()
		]);

		try {
			$this->postRepository->create($post);
		} catch (\Exception $exception) {
			throw new PostCreateException($exception->getMessage());
		}

		return true;
	}
}