<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 21.3.19
 * Time: 0.04
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User extends BaseEntity implements UserInterface
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
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\\$%\\^&\\*])(?=.{8,})/")
     * @Assert\NotBlank()
     */
    private $password;


    /**
     * @var Role $role
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Role")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $role;

    /**
     * User constructor.
     * @param string $firstName
     * @param string $surname
     * @param string $email
     * @param string $nickname
     * @param string $password
     * @param Role|null $role
     */
    public function __construct(
        string $firstName = "",
        string $surname = "",
        string $email = "",
        string $nickname = "",
        string $password = "",
        Role $role = null
    ) {
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->email = $email;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->role = $role;
    }

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * @param Role $role
     */
    public function setRole(Role $role): void
    {
        $this->role = $role;
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


    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return [$this->role != null ? $this->role->getName() : "ROLE_ADMIN"];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->nickname;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}