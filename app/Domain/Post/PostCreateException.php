<?php

namespace App\Domain\Post;

class PostCreateException extends \Exception
{
	protected $code = 400;

	protected $message = 'Something wrong with create blog post!';
}