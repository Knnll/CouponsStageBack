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
        $association = new Association();
        $association -> setNom('Roller Derby Rennes');
        $association -> setEmail('rollerdernnes@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($association, 'mdprollerderby');
        $association -> setAdresse('2 rue du Bosphore');
        $association -> setVille('Rennes');
        $association -> setCodePostal('35200');
        $association -> setSiret('75350777100032');

        $association = new Association();
        $association -> setNom('USBP US Football');
        $association -> setEmail('foot@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($association, 'mdpfoot');
        $association -> setAdresse('2 rue de Rennes');
        $association -> setVille('Bédée');
        $association -> setCodePostal('35137');
        $association -> setSiret('85298638900017');

        $association = new Association();
        $association -> setNom('Handisport Rennes Club');
        $association -> setEmail('handisport@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($association, 'mdphandisport');
        $association -> setAdresse('12 Allée le Roséno');
        $association -> setVille('Rennes');
        $association -> setCodePostal('35200');
        $association -> setSiret('32342711200020');

        $association = new Association();
        $association -> setNom('Rec Badminton');
        $association -> setEmail('badminton@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($association, 'mdpbadminton');
        $association -> setAdresse('23 Avenue Professeur Charles Foulon');
        $association -> setVille('Rennes');
        $association -> setCodePostal('35700');
        $association -> setSiret('48895734100032');

        $association = new Association();
        $association -> setNom('Passion Judo 35');
        $association -> setEmail('judo@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($association, 'mdpjudo');
        $association -> setAdresse('124 rue Eugène Pottier');
        $association -> setVille('Rennes');
        $association -> setCodePostal('35000');
        $association -> setSiret('95356280800022');

        $manager->flush();
    }
}
