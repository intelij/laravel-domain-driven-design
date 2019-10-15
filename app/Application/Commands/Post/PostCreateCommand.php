<?php

namespace App\Application\Commands\Post;

use Illuminate\Support\Facades\Validator;

class PostCreateCommand
{
	protected $title;

	protected $body;

	/**
	 * PostCreateCommand constructor.
	 *
	 * @param $title
	 * @param $body
	 */
	public function __construct($title, $body)
	{
		$this->title = $title;
		$this->body = $body;
	}

	public function getBody()
	{
		return $this->body;
	}

	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validate()
	{
		return Validator::make([
			'title' => $this->title,
			'body' => $this->body
		], [
			'title' => ['required', 'string', 'max:255'],
			'body' => ['required', 'string', 'max:1024'],
		]);
	}
}