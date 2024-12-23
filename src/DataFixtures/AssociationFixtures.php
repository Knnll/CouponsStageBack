<?php

namespace App\DataFixtures;

use App\Entity\Association;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AssociationFixtures extends Fixture
{
    public function  __construct(private readonly UserPasswordHasherInterface $userPasswordHasher) {}

    public function load(ObjectManager $manager): void
    {
        $assoRoller = new Association();
        $assoRoller -> setNom('Roller Derby Rennes');
        $assoRoller -> setEmail('rollerdernnes@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($assoRoller, 'mdprollerderby');
        $assoRoller -> setPassword($password);
        $assoRoller -> setRoles(['ROLE_USER', 'ROLE_ASSOCIATION']);
        $assoRoller -> setAdresse('2 rue du Bosphore');
        $assoRoller -> setVille('Rennes');
        $assoRoller -> setCodePostal('35200');
        $assoRoller -> setSiret('75350777100032');
        $manager -> persist($assoRoller);

        $assoFoot = new Association();
        $assoFoot -> setNom('USBP US Football');
        $assoFoot -> setEmail('foot@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($assoFoot, 'mdpfoot');
        $assoFoot->setPassword($password);
        $assoFoot -> setRoles(['ROLE_USER', 'ROLE_ASSOCIATION']);
        $assoFoot -> setAdresse('2 rue de Rennes');
        $assoFoot -> setVille('Bédée');
        $assoFoot -> setCodePostal('35137');
        $assoFoot -> setSiret('85298638900017');
        $manager -> persist($assoFoot );

        $assoHandi = new Association();
        $assoHandi -> setNom('Handisport Rennes Club');
        $assoHandi -> setEmail('handisport@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($assoHandi, 'mdphandisport');
        $assoHandi ->setPassword($password);
        $assoHandi -> setRoles(['ROLE_USER', 'ROLE_ASSOCIATION']);
        $assoHandi -> setAdresse('12 Allée le Roséno');
        $assoHandi -> setVille('Rennes');
        $assoHandi -> setCodePostal('35200');
        $assoHandi -> setSiret('32342711200020');
        $manager -> persist($assoHandi);

        $assoBadminton = new Association();
        $assoBadminton -> setNom('Rec Badminton');
        $assoBadminton -> setEmail('badminton@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($assoBadminton, 'mdpbadminton');
        $assoBadminton->setPassword($password);
        $assoBadminton->setRoles(['ROLE_USER', 'ROLE_ASSOCIATION']);
        $assoBadminton -> setAdresse('23 Avenue Professeur Charles Foulon');
        $assoBadminton -> setVille('Rennes');
        $assoBadminton -> setCodePostal('35700');
        $assoBadminton -> setSiret('48895734100032');
        $manager -> persist($assoBadminton);

        $assoJudo = new Association();
        $assoJudo -> setNom('Passion Judo 35');
        $assoJudo -> setEmail('judo@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($assoJudo, 'mdpjudo');
        $assoJudo->setPassword($password);
        $assoJudo->setRoles(['ROLE_USER', 'ROLE_ASSOCIATION']);
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
}
