<?php

namespace App\DataFixtures;

use App\Entity\Acheteur;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AcheteurFixtures extends Fixture
{
    public function  __construct(private readonly UserPasswordHasherInterface $userPasswordHasher) {}

    public function load(ObjectManager $manager): void
    {
        $cannelle = new Acheteur();
        $cannelle -> setEmail('cannelle@gmail.com');
        $cannelle -> setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $password = $this->userPasswordHasher->hashPassword($cannelle, 'mdpcannelle');
        $cannelle -> setPassword($password);
        $cannelle -> setNom('Hardy');
        $cannelle -> setPrenom('Cannelle');
        $cannelle -> setVille('Rennes');
        $cannelle -> setCodePostal('35000');
        $cannelle -> setDateNaissance(new \DateTimeImmutable('1999-07-02'));
        $manager -> persist($cannelle);

        $vincent = new Acheteur();
        $vincent -> setEmail('vincent@gmail.com');
        $vincent -> setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $password = $this->userPasswordHasher->hashPassword($vincent, 'mdpvincent');
        $vincent -> setPassword($password);
        $vincent -> setNom('Monssieur');
        $vincent -> setPrenom('Vincent');
        $vincent -> setVille('Rennes');
        $vincent -> setCodePostal('35000');
        $vincent -> setDateNaissance(new \DateTimeImmutable('1988-06-23'));
        $manager -> persist($vincent);

        $francois = new Acheteur();
        $francois -> setEmail('francois@gmail.com');
        $francois -> setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $password = $this->userPasswordHasher->hashPassword($francois, 'mdpfrancois');
        $francois ->setPassword($password);
        $francois -> setNom('Morin');
        $francois -> setPrenom('Francois');
        $francois -> setVille('Rennes');
        $francois -> setCodePostal('35000');
        $francois -> setDateNaissance(new \DateTimeImmutable('1971-03-18'));
        $manager -> persist($francois);

        $lea = new Acheteur();
        $lea -> setEmail('lea@gmail.com');
        $lea -> setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $password = $this->userPasswordHasher->hashPassword($lea, 'mdplea');
        $lea ->setPassword($password);
        $lea -> setNom('Thomas');
        $lea -> setPrenom('Lea');
        $lea -> setVille('Rennes');
        $lea -> setCodePostal('35000');
        $lea -> setDateNaissance(new \DateTimeImmutable('1994-08-29'));
        $manager -> persist($lea);


        $this -> addReference('Cannelle', $cannelle);
        $this -> addReference('Vincent', $vincent);
        $this -> addReference('Francois', $francois);
        $this -> addReference('Lea', $lea);

        $manager->flush();
    }
}
