<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 21.3.19
 * Time: 13.26
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Post
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @ORM\Table(name="post")
 */
class Post extends BaseEntity
{


    /**
     * @var string $title
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(min="10")
     */
    private $title;

    /**
     * @var ?string $description
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min="0")
     */
    private $description;


    /**
     * @var string $slug
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/[a-z0-9\\-]+/")
     */
    private $slug;


    /**
     * @var \DateTime $postAt
     * @ORM\Column(type="datetime", length=100, nullable=true)
     * @Assert\DateTime()/**
     * @Assert\GreaterThan("today")
     */
    private $postAt;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $category;


    /**
     * Post constructor.
     * @param string $title
     * @param string $slug
     * @param User $author
     * @param string $description
     * @param \DateTime $postAt
     */
    public function __construct(string $title = "", string $slug = "", User $author = null, string $description = "", ?\DateTime $postAt = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->slug = $slug;
        $this->postAt = $postAt;
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
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
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }



    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return \DateTime
     */
    public function getPostAt(): ?\DateTime
    {
        return $this->postAt;
    }

    /**
     * @param \DateTime $postAt
     */
    public function setPostAt(?\DateTime $postAt): void
    {
        $this->postAt = $postAt;
    }




}