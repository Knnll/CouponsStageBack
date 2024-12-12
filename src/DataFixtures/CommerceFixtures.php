<?php

namespace App\DataFixtures;

use App\Entity\Commerce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CommerceFixtures extends Fixture
{
    public function  __construct(private readonly UserPasswordHasherInterface $userPasswordHasher) {}


    public function load(ObjectManager $manager): void
    {
        $commerce1 = new Commerce();
        $commerce1 -> setNom('Décathlon');
        $commerce1 -> setEmail('decathlon@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($commerce1, 'mdpdecathlon');
        $commerce1 -> setAdresse('3 rue du Moulin');
        $commerce1 -> setVille('Chantepie');
        $commerce1 -> setCodePostal('35135');
        $commerce1 -> setSiret('50056940500227');
        $manager -> persist($commerce1);

        $commerce2 = new Commerce();
        $commerce2 -> setNom('Kart Expo');
        $commerce2 -> setEmail('karting@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($commerce2, 'mdpkarting');
        $commerce2 -> setAdresse('11 rue la Haie Gautrais');
        $commerce2 -> setVille('Bruz');
        $commerce2 -> setCodePostal('35170');
        $commerce2 -> setSiret('75211521200017');
        $manager -> persist($commerce2);

        $commerce3 = new Commerce();
        $commerce3 -> setNom('Enfants Terribles Café');
        $commerce3 -> setEmail('enfantsterribles@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($commerce3, 'mdpenfantsterribles');
        $commerce3 -> setAdresse('30 rue d\'Antrain');
        $commerce3 -> setVille('Rennes');
        $commerce3 -> setCodePostal('35000');
        $commerce3 -> setSiret('90121066600011');
        $manager -> persist($commerce3);

        $commerce4 = new Commerce();
        $commerce4 -> setNom('La Fromotte');
        $commerce4 -> setEmail('lafromotte@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($commerce4, 'mdplafromotte');
        $commerce4 -> setAdresse('4 Avenue Jorge Semprun');
        $commerce4 -> setVille('Rennes');
        $commerce4 -> setCodePostal('35000');
        $commerce4 -> setSiret('91897360300023');
        $manager -> persist($commerce4);

        $commerce5 = new Commerce();
        $commerce5 -> setNom('Get OUt !');
        $commerce5 -> setEmail('getout@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($commerce5, 'mdpgetout');
        $commerce5 -> setAdresse('14 QUai Duguay Trouin');
        $commerce5 -> setVille('Rennes');
        $commerce5 -> setCodePostal('35000');
        $commerce5 -> setSiret('82532623400010');
        $manager -> persist($commerce5);

        $commerce6 = new Commerce();
        $commerce6 -> setNom('La Boucherie Rennaise');
        $commerce6 -> setEmail('boucherie@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($commerce6, 'mdpboucherie');
        $commerce6 -> setAdresse('Place Honoré Commereuc');
        $commerce6 -> setVille('Rennes');
        $commerce6 -> setCodePostal('35000');
        $commerce6 -> setSiret('35209904800113');
        $manager -> persist($commerce6);

        $commerce7 = new Commerce();
        $commerce7 -> setNom('Roazhon Park');
        $commerce7 -> setEmail('roazhonpark@gmail.com');
        $password= $this->userPasswordHasher->hashPassword($commerce7, 'mdproazhonpark');
        $commerce7 -> setAdresse('111 rue de Lorient');
        $commerce7 -> setVille('Rennes');
        $commerce7 -> setCodePostal('35000');
        $commerce7 -> setSiret('34436623200041');
        $manager -> persist($commerce7);

        $this -> addReference('Décathlon', $commerce1);
        $this -> addReference('Kart Expo', $commerce2);
        $this -> addReference('Enfants Terribles', $commerce3);
        $this -> addReference('La Fromotte', $commerce4);
        $this -> addReference('Get OUT !', $commerce5);
        $this -> addReference('La Boucherie Rennaise', $commerce6);
        $this -> addReference('Roazhon Park', $commerce7);

        $manager->flush();
    }
}
