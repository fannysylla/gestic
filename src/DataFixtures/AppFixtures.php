<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    
   // ...
private $encoder;

public function __construct(UserPasswordEncoderInterface $encoder)
{
    $this->encoder = $encoder;
}

// ...
public function load(ObjectManager $manager)
{
    $user = new User();
    $user->setNom('admin');
    $user->setLogin('admin');
    $user->setPrenom('admin');
    $password = $this->encoder->encodePassword($user, 'passer');
    $user->setPassword($password);
    $user->setRoles(['ROLE_ASSISTANTE_DIRECTION']);
    $manager->persist($user);
    $manager->flush();
}
}
