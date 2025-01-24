<?php

namespace App\DataFixtures;

use App\Entity\Acheteur;
use App\Entity\Association;
use App\Entity\Commerce;
use App\Entity\User;
use App\Entity\Coupon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CouponFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $decathlon = $this->getReference('Decathlon', Commerce::class);
        $kartExpo = $this->getReference('Kart Expo', Commerce::class);
        $enfantsTerribles = $this->getReference('Enfants Terribles', Commerce::class);
        $laFromotte = $this->getReference('La Fromotte', Commerce::class);
        /*$getOut = $this->getReference('Get OUT !', Commerce::class);
        $boucherie = $this->getReference('La Boucherie Rennaise', Commerce::class);
        $roazhonPark = $this->getReference('Roazhon Park', Commerce::class);*/
        $assoRoller = $this->getReference('Roller Derby Rennes', Association::class);
        $assoFoot = $this->getReference('USBP US Football', Association::class);
        $assoHandi = $this->getReference('Handisport Rennes Club', Association::class);
        //$assoBadminton = $this->getReference('Rec Badminton', Association::class);
        $assoJudo = $this->getReference('Passion Judo 35', Association::class);
        /*$cannelle = $this->getReference('Cannelle', Acheteur::class);
        $vincent = $this->getReference('Vincent', Acheteur::class);
        $francois = $this->getReference('Francois', Acheteur::class);
        $lea = $this->getReference('Lea', Acheteur::class);*/

        /*
        $decathlon = $this->getReference('commerceDecathlon', User::class);
        $kartExpo = $this->getReference('karting', User::class);
        $enfantsTerribles = $this->getReference('enfantsterribles', User::class);
        $laFromotte = $this->getReference('lafromotte', User::class);
        $getOut = $this->getReference('getout', User::class);
        $boucherie = $this->getReference('boucherie', User::class);
        $roazhonPark = $this->getReference('roazhonpark', User::class);
        $assoRoller = $this->getReference('userAssoRoller', User::class);
        $assoFoot = $this->getReference('userFoot', User::class);
        $assoHandi = $this->getReference('userHandi', User::class);
        $assoBadminton = $this->getReference('userBadminton', User::class);
        $assoJudo = $this->getReference('userJudo', User::class);
        $cannelle = $this->getReference('userCannelle', User::class);
        $vincent = $this->getReference('userVincent', User::class);
        $francois = $this->getReference('userFrancois', User::class);
        $lea = $this->getReference('userLea', User::class);
        */

        $couponDecathlon = new Coupon();
        $couponDecathlon -> setTitre('10€ de réduction sur les protections de rollers ');
        $couponDecathlon -> setCommerce($decathlon);
        $couponDecathlon -> setAssociation($assoRoller);
        $couponDecathlon -> setVille('Chantepie');
        $couponDecathlon -> setAdresse('3 rue du Moulin');
        $couponDecathlon -> setCodePostal('35135');
        $couponDecathlon -> setConditions('Sous conditions de 40€ d\'achats');
        $couponDecathlon -> setDateCreation(new \DateTimeImmutable('2024-11-05'));
        $couponDecathlon -> setFinValidite(new \DateTimeImmutable('2025-04-10'));
        $couponDecathlon -> setPrix(2.50);
        $manager -> persist($couponDecathlon);

        $couponKart = new Coupon();
        $couponKart -> setTitre('1 partie offerte !');
        $couponKart -> setCommerce($kartExpo);
        $couponKart -> setAssociation($assoFoot);
        $couponKart -> setVille('Bruz');
        $couponKart -> setAdresse('11 rue la Haie Gautrais');
        $couponKart -> setCodePostal('35170');
        $couponKart -> setConditions('Pour 2 parties achetées');
        $couponKart -> setDateCreation(new \DateTimeImmutable('2024-10-15'));
        $couponKart -> setFinValidite(new \DateTimeImmutable('2025-02-25'));
        $couponKart -> setPrix(5);
        $manager -> persist($couponKart);

        $couponCafe = new Coupon();
        $couponCafe -> setTitre('1 boisson et une pâtisserie en plus');
        $couponCafe -> setCommerce($enfantsTerribles);
        $couponCafe -> setAssociation($assoHandi);
        $couponCafe -> setVille('Rennes');
        $couponCafe -> setAdresse('30 rue d\'Antrain');
        $couponCafe -> setCodePostal('35000');
        $couponCafe -> setConditions('Pour la réservation d\'un brunch');
        $couponCafe -> setDateCreation(new \DateTimeImmutable('2025-02-01'));
        $couponCafe -> setFinValidite(new \DateTimeImmutable('2025-05-01'));
        $couponCafe -> setPrix(2.50);
        $manager -> persist($couponCafe);

        $couponFromage = new Coupon();
        $couponFromage -> setTitre('1 fromage offert');
        $couponFromage -> setCommerce($laFromotte);
        $couponFromage -> setAssociation($assoJudo);
        $couponFromage -> setVille('Rennes');
        $couponFromage -> setAdresse('4 Avenue Jorge Semprun');
        $couponFromage -> setCodePostal('35000');
        $couponFromage -> setConditions('Pour l\'achat d\'un plateau de fromages à composer');
        $couponFromage -> setDateCreation(new \DateTimeImmutable('2024-12-10'));
        $couponFromage -> setFinValidite(new \DateTimeImmutable('2025-03-15'));
        $couponFromage -> setPrix(3);
        $manager -> persist($couponFromage);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CommerceFixtures::class,
            AssociationFixtures::class,
            AcheteurFixtures::class,
        ];
    }
}
