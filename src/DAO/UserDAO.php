<?php
namespace  Flexauto\DAO;
/**
 * Created by Lapi Emo: lapigerard@yahoo.fr
 * Date: 20-12-16
 * Time: 07:33
 */
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Doctrine\DBAL\Connection;
class UserDAO extends DAO implements UserProviderInterface
{
    public function loadUserByUsername($username)
    {
        $sql = "SELECT * FROM t_user WHERE username = ?";

        $row = $this->getDb()->fetchAssoc($sql, array($username));
        if ($row) {
            return $this->buildDomainObject($row);
        } else {
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
        }
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'Symfony\Component\Security\Core\User\User';
    }

    /**
     * Builds a domain object from a DB row.
     * Must be overridden by child classes.
     */
    protected function buildDomainObject($row)
    {
        $user = new \flexauto\Domain\User();

        $user->setId($row['user_id']);
        $user->setEmail($row['email']);
        $user->setPwd($row['password']);
        $user->setPrenom($row['prenom']);
        $user->setSalt($row['salt']);
        $user->setRole($row['role']);

        return $user;
    }
}