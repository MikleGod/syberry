<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 21.3.19
 * Time: 13.26
 */

namespace AppBundle\Entity;


class Post
{
    private static $count = 0;

    /**
     * @var int $id
     */
    private $id;


    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $description
     */
    private $description;

    /**
     * Post constructor.
     * @param int $id
     * @param string $title
     * @param string $description
     */
    public function __construct(string $title = "",  string $description = "", int $id = -1)
    {
        if ($id !== -1){
            $this->id = $id;
        } else {
            $this->id = self::$count++;
        }
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }



}