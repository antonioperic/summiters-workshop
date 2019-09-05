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
class Book
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
     * @ORM\Column(type="string", length=13)
     * @Assert\Isbn()
     */
    private $isbn;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $abstract;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $publicationDate;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $averageReviewRate = 0;

    /**
     * @var Author
     * @ORM\ManyToOne(targetEntity="Author")
     * @Assert\NotBlank()
     */
    private $author;

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
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAbstract(): string
    {
        return $this->abstract;
    }

    /**
     * @param string $abstract
     */
    public function setAbstract(string $abstract): void
    {
        $this->abstract = $abstract;
    }

    /**
     * @return \DateTime
     */
    public function getPublicationDate(): \DateTime
    {
        return $this->publicationDate;
    }

    /**
     * @param \DateTime $publicationDate
     */
    public function setPublicationDate(\DateTime $publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }

    /**
     * @return float
     */
    public function getAverageReviewRate(): float
    {
        return $this->averageReviewRate;
    }

    /**
     * @param float $averageReviewRate
     */
    public function setAverageReviewRate(float $averageReviewRate): void
    {
        $this->averageReviewRate = $averageReviewRate;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }
}