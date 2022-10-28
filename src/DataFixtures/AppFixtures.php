<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fruitsCategory = new Category();
        $fruitsCategory->setName('Fruits');
        $fruitsCategory->setDisplayOrder(4);
        $manager->persist($fruitsCategory);

        $vegetablesCategory = new Category();
        $vegetablesCategory->setName('Légumes');
        $vegetablesCategory->setDisplayOrder(5);
        $manager->persist($vegetablesCategory);

        $meatsCategory = new Category();
        $meatsCategory->setName('Viandes');
        $meatsCategory->setDisplayOrder(2);
        $manager->persist($meatsCategory);

        $drinksCategory = new Category();
        $drinksCategory->setName('Boissons');
        $drinksCategory->setDisplayOrder(1);
        $manager->persist($drinksCategory);

        $pastaCategory = new Category();
        $pastaCategory->setName('Pâtes');
        $pastaCategory->setDisplayOrder(3);
        $manager->persist($pastaCategory);

        $productChicken1 = new Product();
        $productChicken1->setName("Ailes de poulet");
        $productChicken1->setCreationDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2021-04-23 08:23:17'));
        $productChicken1->setCategory($meatsCategory);
        $productChicken1->setReference('M122210');
        $productChicken1->setQuantity(0);
        $manager->persist($productChicken1);

        $productBanana = new Product();
        $productBanana->setName("Carton de bananes");
        $productBanana->setCreationDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2021-11-16 14:28:05'));
        $productBanana->setCategory($fruitsCategory);
        $productBanana->setReference('F405001');
        $productBanana->setQuantity(12);
        $manager->persist($productBanana);

        $productApple = new Product();
        $productApple->setName("Carton de pommes");
        $productApple->setCreationDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2021-11-09 12:17:03'));
        $productApple->setCategory($fruitsCategory);
        $productApple->setReference('F405000');
        $productApple->setQuantity(17);
        $manager->persist($productApple);

        $productChicken2 = new Product();
        $productChicken2->setName("Blancs de poulet");
        $productChicken2->setCreationDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2021-04-23 08:22:44'));
        $productChicken2->setCategory($meatsCategory);
        $productChicken2->setReference('M122211');
        $productChicken2->setQuantity(0);
        $manager->persist($productChicken2);

        $productTomato = new Product();
        $productTomato->setName("Carton de carottes");
        $productTomato->setCreationDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2021-11-08 17:13:22'));
        $productTomato->setCategory($vegetablesCategory);
        $productTomato->setReference('V442384');
        $productTomato->setQuantity(0);
        $manager->persist($productTomato);

        $productWatermelon = new Product();
        $productWatermelon->setName("Pastèque");
        $productWatermelon->setCreationDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2021-08-30 10:52:27'));
        $productWatermelon->setCategory($fruitsCategory);
        $productWatermelon->setReference('F605000');
        $productWatermelon->setQuantity(1);
        $manager->persist($productWatermelon);

        $productPotatoJuice = new Product();
        $productPotatoJuice->setName("Jus de patate");
        $productPotatoJuice->setCreationDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2016-05-13 16:01:24'));
        $productPotatoJuice->setCategory($drinksCategory);
        $productPotatoJuice->setReference('D829301');
        $productPotatoJuice->setQuantity(1200);
        $manager->persist($productPotatoJuice);

        $productChicken3 = new Product();
        $productChicken3->setName("Cuisses de poulet bio");
        $productChicken3->setCreationDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2021-11-08 17:10:55'));
        $productChicken3->setCategory($meatsCategory);
        $productChicken3->setReference('M122212');
        $productChicken3->setQuantity(72);
        $manager->persist($productChicken3);

        $manager->flush();
    }
}
