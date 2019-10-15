<?php

namespace App\Domain\Post;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 * @ORM\HasLifecycleCallbacks()
 */

class Post
{
	/**
	 * @var integer $id
	 * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string")
	 */
	private $title;

	/**
	 * @ORM\Column(type="text")
	 */
	private $body;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $createdAt;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $updatedAt;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\User\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
	private $user;

	public function __construct(string  $title, string $body,
	                            ?\DateTime $createdAt, ?\DateTime $updatedAt
	)
	{
		$this->setTitle($title);
		$this->setBody($body);
		$this->setCreatedDate($createdAt);
		$this->setUpdatedDate($updatedAt);
	}

	/**
	 * @param \DateTime $dateTime
	 */
	public function setCreatedDate(\DateTime $dateTime)
	{
		$this->createdAt = $dateTime;
	}

	/**
	 * @param \DateTime $dateTime
	 */
	public function setUpdatedDate(\DateTime $dateTime)
	{
		$this->updatedAt = $dateTime;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return mixed
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * @param $body
	 */
	public function setBody($body)
	{
		$this->body = $body;
	}
}