<?php
/**
 * Copyright (C) 2019 Cape Morris Sp. z o.o. - All Rights Reserved
 */


namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

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
     */
    private $author;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $review;

    /**
     * @var int
     * @ORM\Column(type="smallint")
     */
    private $rate;

    /**
     * @var Book
     * @ORM\ManyToOne(targetEntity="Book")
     */
    private $book;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
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
}