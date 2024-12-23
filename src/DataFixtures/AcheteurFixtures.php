<?php

namespace App\DataFixtures;

use App\Entity\Acheteur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AcheteurFixtures extends Fixture
{
    public function  __construct(private readonly UserPasswordHasherInterface $userPasswordHasher) {}

    public function load(ObjectManager $manager): void
    {
        $cannelle = new Acheteur();
        $cannelle -> setNom('Hardy');
        $cannelle -> setPrenom('Cannelle');
        $cannelle -> setEmail('cannelle@gmail.com');
        $password = $this->userPasswordHasher->hashPassword($cannelle, 'mdpcannelle');
        $cannelle -> setPassword($password);
        $cannelle -> setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $cannelle -> setVille('Rennes');
        $cannelle -> setCodePostal('35000');
        $cannelle -> setDateNaissance(new \DateTimeImmutable('1999-07-02'));
        $manager -> persist($cannelle);

        $vincent = new Acheteur();
        $vincent -> setNom('Monssieur');
        $vincent -> setPrenom('Vincent');
        $vincent -> setEmail('vincent@gmail.com');
        $password = $this->userPasswordHasher->hashPassword($vincent, 'mdpvincent');
        $vincent ->setPassword($password);
        $vincent ->setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $vincent -> setVille('Rennes');
        $vincent -> setCodePostal('35000');
        $vincent -> setDateNaissance(new \DateTimeImmutable('1988-06-23'));
        $manager -> persist($vincent);

        $francois = new Acheteur();
        $francois -> setNom('Morin');
        $francois -> setPrenom('Francois');
        $francois -> setEmail('françois@gmail.com');
        $password = $this->userPasswordHasher->hashPassword($francois, 'mdpfrançois');
        $francois ->setPassword($password);
        $francois ->setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $francois -> setVille('Rennes');
        $francois -> setCodePostal('35000');
        $francois -> setDateNaissance(new \DateTimeImmutable('1971-03-18'));
        $manager -> persist($francois);

        $lea = new Acheteur();
        $lea -> setNom('Thomas');
        $lea -> setPrenom('Lea');
        $lea -> setEmail('léa@gmail.com');
        $password = $this->userPasswordHasher->hashPassword($lea, 'mdpléa');
        $lea ->setPassword($password);
        $lea ->setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $lea -> setVille('Rennes');
        $lea -> setCodePostal('35000');
        $lea -> setDateNaissance(new \DateTimeImmutable('1994-08-29'));
        $manager -> persist($lea);

        $denis = new Acheteur();
        $denis -> setNom('Sanchez');
        $denis -> setPrenom('Denis');
        $denis -> setEmail('denis@gmail.com');
        $password = $this->userPasswordHasher->hashPassword($denis, 'mdpdenis');
        $denis ->setPassword($password);
        $denis ->setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $denis -> setVille('Rennes');
        $denis -> setCodePostal('35000');
        $denis -> setDateNaissance(new \DateTimeImmutable('1981-05-04'));
        $manager -> persist($denis);

        $this -> addReference('Cannelle', $cannelle);
        $this -> addReference('Vincent', $vincent);
        $this -> addReference('Francois', $francois);
        $this -> addReference('Lea', $lea);
        $this -> addReference('Denis', $denis);

        $manager->flush();
    }
}
