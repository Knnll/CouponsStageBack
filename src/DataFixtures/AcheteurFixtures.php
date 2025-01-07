<?php

namespace App\DataFixtures;

use App\Entity\Acheteur;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AcheteurFixtures extends Fixture implements DependentFixtureInterface
{
    public function  __construct() {}

    public function load(ObjectManager $manager): void
    {
        $cannelle = new Acheteur();
        $cannelle->setUser($this->getReference('userCannelle', User::class));
        $cannelle -> setNom('Hardy');
        $cannelle -> setPrenom('Cannelle');
        $cannelle -> setVille('Rennes');
        $cannelle -> setCodePostal('35000');
        $cannelle -> setDateNaissance(new \DateTimeImmutable('1999-07-02'));
        $manager -> persist($cannelle);

        $vincent = new Acheteur();
        $vincent -> setNom('Monssieur');
        $vincent -> setUser($this->getReference('userVincent', User::class));
        $vincent -> setPrenom('Vincent');
        $vincent -> setVille('Rennes');
        $vincent -> setCodePostal('35000');
        $vincent -> setDateNaissance(new \DateTimeImmutable('1988-06-23'));
        $manager -> persist($vincent);

        $francois = new Acheteur();
        $francois -> setNom('Morin');
        $francois -> setUser($this->getReference('userFrancois', User::class));
        $francois -> setPrenom('Francois');
        $francois -> setVille('Rennes');
        $francois -> setCodePostal('35000');
        $francois -> setDateNaissance(new \DateTimeImmutable('1971-03-18'));
        $manager -> persist($francois);

        $lea = new Acheteur();
        $lea -> setNom('Thomas');
        $lea -> setUser($this->getReference('userLea', User::class));
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

    public function getDependencies(): array
    {
        return [UserFixtures::class];
    }
}
