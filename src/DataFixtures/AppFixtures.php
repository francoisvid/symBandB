<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create("FR-fr");

        for($i = 1; $i <= 30; $i++) {

             $ad = new Ad();

             $title        = $faker->sentence();
//             $caption      = $faker->sentence();
//             $coverImage   = $faker->imageUrl(1000, 350);
             $image   = "https://i.picsum.photos/id/$i/200/300.jpg";
             $introduction = $faker->paragraph(2);
             $content      = '<p>' . join('</p><p>', $faker->paragraphs(5)) . '</p>';

             $ad->setTitle($title)
                ->setCoverImage($image)
                ->setIntroduction($introduction)
                ->setContent($content)
                ->setPrice(mt_rand(40,200))
                ->setRooms(mt_rand(1,5));

             for ($j = 1; $j < mt_rand(2,5); $j++) {

                 $img = new Image();
                 $imag   = "https://i.picsum.photos/id/$j/300/300.jpg";
                 $img->setUrl($imag)
                     ->setCaption($faker->sentence())
                     ->setAd($ad);

                 $manager->persist($img);

             }

             $manager->persist($ad);

        }

        $manager->flush();
    }
}
