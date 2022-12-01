<?php 

namespace App\Security;

// ...
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

class UserProvider implements UserProviderInterface, PasswordUpgraderInterface
{
    // ...

    public function upgradePassword(UserInterface $user, string $newHashedPassword): void
    {
        // set the new hashed password on the User object
        $user->setPassword($newHashedPassword);

        // ... store the new password
    }
}