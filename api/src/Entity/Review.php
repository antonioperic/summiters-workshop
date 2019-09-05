<?php
/**
 * Copyright (C) 2019 Cape Morris Sp. z o.o. - All Rights Reserved
 */


namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @author Hubert Sosiński <h.sosinski@361.sh>
 */
class Review
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $author;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $review;

    /**
     * @var int
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank()
     */
    private $rate;

    /**
     * @var Book
     * @ORM\ManyToOne(targetEntity="Book")
     * @Assert\NotBlank()
     */
    private $book;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    private $createdAt;

    /**
     * Review constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getReview(): string
    {
        return $this->review;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @return Book
     */
    public function getBook(): Book
    {
        return $this->book;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

}