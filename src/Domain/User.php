<?php
/**
 * Created by Lapi Emo
 * Date: 19-12-16
 * Time: 14:37
 */
namespace Flexauto\Domain;

use \Symfony\Component\Security\Core\User\UserInterface;
class User implements UserInterface
{
    /**
     * id du de l'utilisateur.
     *
     * @var integer
     */
    private $id;

    /**
     * role occupé par l'utilisateur
     * values : ROLE_USR or ROLE_ADMIN.
     *
     * @var string
     */
    private $role;

    /**
     * prénom de l'utilisateur.
     *
     * @var string
     */
    private $prenom;

    /**
     * email de l'utilisateur.
     *
     * @var string
     */
    private $email;

    /**
     * mot de passe de l'utilisateur.
     *
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    function getPassword() {
        return $this->pwd;
    }

    /**
     * {@inheritDoc}
     */
    function getSalt() {
        return $this->salt;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles() {
        return array($this->getRole());
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername() {
        $this->getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function eraseCredentials() {

    }
}