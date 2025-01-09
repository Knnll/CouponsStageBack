<?php

namespace App\DataFixtures;

use App\Entity\Commerce;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CommerceFixtures extends Fixture
{
    public function  __construct(private readonly UserPasswordHasherInterface $userPasswordHasher) {}

    public function load(ObjectManager $manager): void
    {
        $decathlon = new Commerce();
        $decathlon -> setEmail('decathlon@gmail.com');
        $decathlon-> setRoles(['ROLE_USER', 'ROLE_COMMERCE']);
        $password = $this -> userPasswordHasher->hashPassword($decathlon, 'mdpdecathlon');
        $decathlon -> setPassword($password);
        $decathlon -> setNom('Decathlon');
        $decathlon -> setAdresse('3 rue du Moulin');
        $decathlon -> setVille('Chantepie');
        $decathlon -> setCodePostal('35135');
        $decathlon -> setSiret('50056940500227');
        $manager -> persist($decathlon);

        $kartExpo = new Commerce();
        $kartExpo -> setEmail('karting@gmail.com');
        $kartExpo -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password = $this -> userPasswordHasher->hashPassword($kartExpo, 'mdpkarting');
        $kartExpo -> setPassword($password);
        $kartExpo -> setNom('Kart Expo');
        $kartExpo -> setAdresse('11 rue la Haie Gautrais');
        $kartExpo -> setVille('Bruz');
        $kartExpo -> setCodePostal('35170');
        $kartExpo -> setSiret('75211521200017');
        $manager -> persist($kartExpo);

        $enfantsTerribles = new Commerce();
        $enfantsTerribles -> setEmail('enfantsterribles@gmail.com');
        $enfantsTerribles -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password = $this -> userPasswordHasher->hashPassword($enfantsTerribles, 'mdpenfantsterribles');
        $enfantsTerribles -> setPassword($password);
        $enfantsTerribles -> setNom('Enfants Terribles Café');
        $enfantsTerribles -> setAdresse('30 rue d\'Antrain');
        $enfantsTerribles -> setVille('Rennes');
        $enfantsTerribles -> setCodePostal('35000');
        $enfantsTerribles -> setSiret('90121066600011');
        $manager -> persist($enfantsTerribles);

        $laFromotte = new Commerce();
        $laFromotte -> setEmail('lafromotte@gmail.com');
        $laFromotte -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password = $this->userPasswordHasher->hashPassword($laFromotte, 'mdplafromotte');
        $laFromotte -> setPassword($password);
        $laFromotte -> setNom('La Fromotte');
        $laFromotte -> setAdresse('4 Avenue Jorge Semprun');
        $laFromotte -> setVille('Rennes');
        $laFromotte -> setCodePostal('35000');
        $laFromotte -> setSiret('91897360300023');
        $manager -> persist($laFromotte);

        $getOut = new Commerce();
        $getOut -> setEmail('getout@gmail.com');
        $getOut -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password = $this -> userPasswordHasher->hashPassword($getOut, 'mdpgetout');
        $getOut -> setPassword($password);
        $getOut -> setNom('Get OUt !');
        $getOut -> setAdresse('14 QUai Duguay Trouin');
        $getOut -> setVille('Rennes');
        $getOut -> setCodePostal('35000');
        $getOut -> setSiret('82532623400010');
        $manager -> persist($getOut);

        $boucherie = new Commerce();
        $boucherie -> setEmail('boucherie@gmail.com');
        $boucherie -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password = $this->userPasswordHasher->hashPassword($boucherie, 'mdpboucherie');
        $boucherie -> setPassword($password);
        $boucherie -> setNom('La Boucherie Rennaise');
        $boucherie -> setAdresse('Place Honoré Commereuc');
        $boucherie -> setVille('Rennes');
        $boucherie -> setCodePostal('35000');
        $boucherie -> setSiret('35209904800113');
        $manager -> persist($boucherie);

        $roazhonPark = new Commerce();
        $roazhonPark -> setEmail('roazhonpark@gmail.com');
        $roazhonPark -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password = $this -> userPasswordHasher->hashPassword($roazhonPark, 'mdproazhonpark');
        $roazhonPark -> setPassword($password);
        $roazhonPark -> setNom('Roazhon Park');
        $roazhonPark -> setAdresse('111 rue de Lorient');
        $roazhonPark -> setVille('Rennes');
        $roazhonPark -> setCodePostal('35000');
        $roazhonPark -> setSiret('34436623200041');
        $manager -> persist($roazhonPark);

        $this -> addReference('Decathlon', $decathlon);
        $this -> addReference('Kart Expo', $kartExpo);
        $this -> addReference('Enfants Terribles', $enfantsTerribles);
        $this -> addReference('La Fromotte', $laFromotte);
        $this -> addReference('Get OUT !', $getOut);
        $this -> addReference('La Boucherie Rennaise', $boucherie);
        $this -> addReference('Roazhon Park', $roazhonPark);

        $manager->flush();
    }
}
