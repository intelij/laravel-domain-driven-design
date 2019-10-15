<?php

namespace App\Domain\Post;

interface PostRepositoryInterface
{
	/**
	 * @param Post $post
	 * @throws \Doctrine\ORM\ORMException
	 * @throws \Doctrine\ORM\OptimisticLockException
	 */
	public function create(Post $post): void;

	/**
	 * @param Post $post
	 * @param array $data
	 */
	public function update(Post $post, $data = []): void;

	/**
	 * @param int $id
	 * @return Post|null
	 */
	public function findById(int $id): ?Post;

	/**
	 * @param Post $post
	 * @return mixed
	 */
	public function delete(Post $post);


	/**
	 * @param array $data
	 * @return mixed
	 */
	public function prepareData($data = []): Post;
}