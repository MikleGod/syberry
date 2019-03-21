<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 21.3.19
 * Time: 0.04
 */

namespace AppBundle\Entity;


class User
{

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * User constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id = 0, string $name = "")
    {
        $this->id = $id;
        $this->name = $name;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return "user id: $this->id, user name: $this->name";
    }


}