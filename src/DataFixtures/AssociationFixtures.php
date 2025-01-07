<?php

namespace App\DataFixtures;

use App\Entity\Association;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AssociationFixtures extends Fixture implements DependentFixtureInterface
{
    public function  __construct() {}

    public function load(ObjectManager $manager): void
    {
        $assoRoller = new Association();
        $assoRoller -> setNom('Roller Derby Rennes');
        $assoRoller -> setUser($this->getReference('userAssoRoller', User::class));
        $assoRoller -> setAdresse('2 rue du Bosphore');
        $assoRoller -> setVille('Rennes');
        $assoRoller -> setCodePostal('35200');
        $assoRoller -> setSiret('75350777100032');
        $manager -> persist($assoRoller);

        $assoFoot = new Association();
        $assoFoot -> setNom('USBP US Football');
        $assoFoot -> setUser($this->getReference('userFoot', User::class));
        $assoFoot -> setAdresse('2 rue de Rennes');
        $assoFoot -> setVille('Bédée');
        $assoFoot -> setCodePostal('35137');
        $assoFoot -> setSiret('85298638900017');
        $manager -> persist($assoFoot );

        $assoHandi = new Association();
        $assoHandi -> setNom('Handisport Rennes Club');
        $assoHandi -> setUser($this->getReference('userHandi', User::class));
        $assoHandi -> setAdresse('12 Allée le Roséno');
        $assoHandi -> setVille('Rennes');
        $assoHandi -> setCodePostal('35200');
        $assoHandi -> setSiret('32342711200020');
        $manager -> persist($assoHandi);

        $assoBadminton = new Association();
        $assoBadminton -> setNom('Rec Badminton');
        $assoBadminton -> setUser($this->getReference('userBadminton', User::class));
        $assoBadminton -> setAdresse('23 Avenue Professeur Charles Foulon');
        $assoBadminton -> setVille('Rennes');
        $assoBadminton -> setCodePostal('35700');
        $assoBadminton -> setSiret('48895734100032');
        $manager -> persist($assoBadminton);

        $assoJudo = new Association();
        $assoJudo -> setNom('Passion Judo 35');
        $assoJudo -> setUser($this->getReference('userJudo', User::class));
        $assoJudo -> setAdresse('124 rue Eugène Pottier');
        $assoJudo -> setVille('Rennes');
        $assoJudo -> setCodePostal('35000');
        $assoJudo -> setSiret('95356280800022');
        $manager -> persist($assoJudo);

        $this -> addReference('Roller Derby Rennes', $assoRoller);
        $this -> addReference('USBP US Football', $assoFoot);
        $this -> addReference('Handisport Rennes Club', $assoHandi);
        $this -> addReference('Rec Badminton', $assoBadminton);
        $this -> addReference('Passion Judo 35', $assoJudo);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [UserFixtures::class];
    }
}
