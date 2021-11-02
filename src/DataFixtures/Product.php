<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Product extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i<7; $i++) {
            $product = new \App\Entity\Product();
            $product->setId($i);
            $product->setName("Name product $i");
            $product->setDescription("Lorem ipsum $i");
            $product->setPrice(floor(rand(0,100)));
            $product->setImage("https://gravatar.com/avatar/080b1957d684fa6ddd7287ec4bff36f$i?s=400&d=identicon&r=x");
            $manager->persist($product);
        }

        $manager->flush();
    }
}
