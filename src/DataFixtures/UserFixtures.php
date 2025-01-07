<?php

namespace App\DataFixtures;

use App\Entity\Acheteur;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function  __construct(private readonly UserPasswordHasherInterface $userPasswordHasher) {}

    public function load(ObjectManager $manager): void
    {
        $userCannelle = new User();
        $userCannelle -> setEmail('cannelle@gmail.com');
        $userCannelle -> setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $password = $this->userPasswordHasher->hashPassword($userCannelle, 'mdpcannelle');
        $userCannelle -> setPassword($password);
        //$manager -> persist($userCannelle);

        $userVincent = new User();
        $userVincent -> setEmail('vincent@gmail.com');
        $userVincent -> setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $password = $this->userPasswordHasher->hashPassword($userVincent, 'mdpvincent');
        $userVincent ->setPassword($password);
        //$manager -> persist($userVincent);

        $userFrancois = new User();
        $userFrancois -> setEmail('françois@gmail.com');
        $userFrancois -> setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $password = $this->userPasswordHasher->hashPassword($userFrancois, 'mdpfrançois');
        $userFrancois ->setPassword($password);
        //$manager -> persist($userFrancois);

        $userLea = new User();
        $userLea -> setEmail('léa@gmail.com');
        $userLea -> setRoles(['ROLE_USER', 'ROLE_ACHETEUR']);
        $password = $this->userPasswordHasher->hashPassword($userLea, 'mdpléa');
        $userLea ->setPassword($password);
        //$manager -> persist($userLea);

        $userAssoRoller = new User();
        $userAssoRoller -> setEmail('rollerdernnes@gmail.com');
        $userAssoRoller -> setRoles(['ROLE_USER', 'ROLE_ASSOCIATION']);
        $password= $this->userPasswordHasher->hashPassword($userAssoRoller, 'mdprollerderby');
        $userAssoRoller -> setPassword($password);
        //$manager -> persist($userAssoRoller);

        $userAssoFoot  = new User();
        $userAssoFoot -> setEmail('foot@gmail.com');
        $userAssoFoot -> setRoles(['ROLE_USER', 'ROLE_ASSOCIATION']);
        $password= $this->userPasswordHasher->hashPassword($userAssoFoot, 'mdpfoot');
        $userAssoFoot->setPassword($password);
        //$manager -> persist($userAssoFoot);

        $userAssoHandi = new User();
        $userAssoHandi -> setEmail('handisport@gmail.com');
        $userAssoHandi -> setRoles(['ROLE_USER', 'ROLE_ASSOCIATION']);
        $password= $this->userPasswordHasher->hashPassword($userAssoHandi, 'mdphandisport');
        $userAssoHandi ->setPassword($password);
        //$manager -> persist($userAssoHandi);

        $userAssoBadminton = new User();
        $userAssoBadminton -> setEmail('badminton@gmail.com');
        $userAssoBadminton -> setRoles(['ROLE_USER', 'ROLE_ASSOCIATION']);
        $password= $this->userPasswordHasher->hashPassword($userAssoBadminton, 'mdpbadminton');
        $userAssoBadminton->setPassword($password);
        //$manager -> persist($userAssoBadminton);

        $userAssoJudo = new User();
        $userAssoJudo -> setEmail('judo@gmail.com');
        $userAssoJudo -> setRoles(['ROLE_USER', 'ROLE_ASSOCIATION']);
        $password= $this->userPasswordHasher->hashPassword($userAssoJudo, 'mdpjudo');
        $userAssoJudo->setPassword($password);
        //$manager -> persist($userAssoJudo);

        $userCommerceDecathlon = new User();
        $userCommerceDecathlon -> setEmail('decathlon@gmail.com');
        $userCommerceDecathlon-> setRoles(['ROLE_USER', 'ROLE_COMMERCE']);
        $password= $this->userPasswordHasher->hashPassword($userCommerceDecathlon, 'mdpdecathlon');
        $userCommerceDecathlon->setPassword($password);
        //$manager -> persist($userCommerceDecathlon);

        $userCommerceKart = new User();
        $userCommerceKart -> setEmail('karting@gmail.com');
        $userCommerceKart -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password= $this->userPasswordHasher->hashPassword($userCommerceKart, 'mdpkarting');
        $userCommerceKart->setPassword($password);
        //$manager -> persist($userCommerceKart);

        $userCommerceEnfantsTerribles = new User();
        $userCommerceEnfantsTerribles -> setEmail('enfantsterribles@gmail.com');
        $userCommerceEnfantsTerribles -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password= $this->userPasswordHasher->hashPassword($userCommerceEnfantsTerribles, 'mdpenfantsterribles');
        $userCommerceEnfantsTerribles->setPassword($password);
        //$manager -> persist($userCommerceEnfantsTerribles);

        $userCommerceLaFromotte = new User();
        $userCommerceLaFromotte -> setEmail('lafromotte@gmail.com');
        $userCommerceLaFromotte -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password= $this->userPasswordHasher->hashPassword($userCommerceLaFromotte, 'mdplafromotte');
        $userCommerceLaFromotte->setPassword($password);
        //$manager -> persist($userCommerceLaFromotte);

        $userCommerceGetOut = new User();
        $userCommerceGetOut -> setEmail('getout@gmail.com');
        $userCommerceGetOut -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password= $this->userPasswordHasher->hashPassword($userCommerceGetOut, 'mdpgetout');
        $userCommerceGetOut->setPassword($password);
        //$manager -> persist($userCommerceGetOut);

        $userCommerceBoucherie = new User();
        $userCommerceBoucherie -> setEmail('boucherie@gmail.com');
        $userCommerceBoucherie -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password= $this->userPasswordHasher->hashPassword($userCommerceBoucherie, 'mdpboucherie');
        $userCommerceBoucherie->setPassword($password);
        //$manager -> persist($userCommerceBoucherie);

        $userCommerceRoazhonPark = new User();
        $userCommerceRoazhonPark -> setEmail('roazhonpark@gmail.com');
        $userCommerceRoazhonPark -> setRoles(['ROLE_USER','ROLE_COMMERCE']);
        $password= $this->userPasswordHasher->hashPassword($userCommerceRoazhonPark, 'mdproazhonpark');
        $userCommerceRoazhonPark->setPassword($password);
        //$manager -> persist($userCommerceRoazhonPark);


        $this->addReference('userCannelle', $userCannelle);
        $this->addReference('userVincent', $userVincent);
        $this->addReference('userFrancois', $userFrancois);
        $this->addReference('userLea', $userLea);
        $this->addReference('userAssoRoller', $userAssoRoller);
        $this->addReference('userFoot', $userAssoFoot );
        $this->addReference('userHandi', $userAssoHandi);
        $this->addReference('userBadminton', $userAssoBadminton);
        $this->addReference('userJudo', $userAssoJudo);
        $this->addReference('commerceDecathlon', $userCommerceDecathlon);
        $this->addReference('karting', $userCommerceKart);
        $this->addReference('enfantsterribles', $userCommerceEnfantsTerribles);
        $this->addReference('lafromotte', $userCommerceLaFromotte);
        $this->addReference('getout', $userCommerceGetOut);
        $this->addReference('boucherie', $userCommerceBoucherie);
        $this->addReference('roazhonpark', $userCommerceRoazhonPark);

        $manager -> flush();

    }
}
