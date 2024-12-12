<?php

namespace App\DataFixtures;

use App\Entity\Coupon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CouponFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $commerce1 = $this->getReference('Décathlon');

        $coupon = new Coupon();
        $coupon -> setTitre('10€ de réduction sur les protections de rollers ');
        $coupon -> setCommerce($commerce1);

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
