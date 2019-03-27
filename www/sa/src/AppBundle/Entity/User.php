<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 21.3.19
 * Time: 0.04
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User extends BaseEntity
{

    /**
     * @var string $firstName
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $firstName;


    /**
     * @var string $surname
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $surname;

    /**
     * @var string $email
     * @ORM\Column(type="string", length=50)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string $nickname
     * @ORM\Column(type="string", length=50)
     * @Assert\Regex(pattern="/^(?!.*(.).*\\1)[a-z]+$/")
     * @Assert\NotBlank()
     */
    private $nickname;

    /**
     * @var string $password
     * @ORM\Column(type="string", length=50)
     * @Assert\Regex(pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\\$%\\^&\\*])(?=.{8,})/")
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * User constructor.
     * @param string $firstName
     * @param string $surname
     * @param string $email
     * @param string $nickname
     * @param string $password
     */
    public function __construct(string $firstName = "", string $surname = "", string $email = "", string $nickname = "", string $password = "")
    {
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->email = $email;
        $this->nickname = $nickname;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }




}