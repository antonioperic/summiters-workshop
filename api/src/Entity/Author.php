<?php
/**
 * Copyright (C) 2019 Cape Morris Sp. z o.o. - All Rights Reserved
 */


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @author Hubert Sosiński <h.sosinski@361.sh>
 */
class Author
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
     * @Groups({"book_read", "book_all"})
     */
    private $firstname;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @Groups({"book_read", "book_all"})
     */
    private $lastname;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     * @Groups({"book_all"})
     */
    private $birthday;

    /**
     * @var Book[]
     * @ORM\OneToMany(targetEntity="Book", mappedBy="author")
     */
    private $books;

    /**
     * Author constructor.
     */
    public function __construct()
    {
        $this->books = new ArrayCollection();
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
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return \DateTime
     */
    public function getBirthday(): \DateTime
    {
        return $this->birthday;
    }

    /**
     * @param \DateTime $birthday
     */
    public function setBirthday(\DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return Book[]
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @param Book[] $books
     */
    public function setBooks(array $books): void
    {
        $this->books = $books;
    }

}