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
        $acheteur = new Acheteur();
        $acheteur -> setNom('Hardy');
        $acheteur -> setPrenom('Cannelle');
        $acheteur -> setEmail('cannelle@gmail.com');
        $password = $this->userPasswordHasher->hashPassword($acheteur, 'mdpcannelle');
        $acheteur -> setVille('Rennes');
        $acheteur -> setCodePostal('35000');
        $acheteur -> setDateNaissance(new \DateTimeImmutable('1999-07-02'));
        $manager -> persist($acheteur);

        $acheteur = new Acheteur();
        $acheteur -> setNom('Monssieur');
        $acheteur -> setPrenom('Vincent');
        $acheteur -> setEmail('vincent@gmail.com');
        $password = $this->userPasswordHasher->hashPassword($acheteur, 'mdpvincent');
        $acheteur -> setVille('Rennes');
        $acheteur -> setCodePostal('35000');
        $acheteur -> setDateNaissance(new \DateTimeImmutable('1988-06-23'));
        $manager -> persist($acheteur);

        $acheteur = new Acheteur();
        $acheteur -> setNom('Morin');
        $acheteur -> setPrenom('François');
        $acheteur -> setEmail('françois@gmail.com');
        $password = $this->userPasswordHasher->hashPassword($acheteur, 'mdpfrançois');
        $acheteur -> setVille('Rennes');
        $acheteur -> setCodePostal('35000');
        $acheteur -> setDateNaissance(new \DateTimeImmutable('1971-03-18'));
        $manager -> persist($acheteur);

        $acheteur = new Acheteur();
        $acheteur -> setNom('Thomas');
        $acheteur -> setPrenom('Léa');
        $acheteur -> setEmail('léa@gmail.com');
        $password = $this->userPasswordHasher->hashPassword($acheteur, 'mdpléa');
        $acheteur -> setVille('Rennes');
        $acheteur -> setCodePostal('35000');
        $acheteur -> setDateNaissance(new \DateTimeImmutable('1994-08-29'));
        $manager -> persist($acheteur);

        $acheteur = new Acheteur();
        $acheteur -> setNom('Sanchez');
        $acheteur -> setPrenom('Denis');
        $acheteur -> setEmail('denis@gmail.com');
        $password = $this->userPasswordHasher->hashPassword($acheteur, 'mdpdenis');
        $acheteur -> setVille('Rennes');
        $acheteur -> setCodePostal('35000');
        $acheteur -> setDateNaissance(new \DateTimeImmutable('1981-05-04'));
        $manager -> persist($acheteur);

        $manager->flush();
    }
}
