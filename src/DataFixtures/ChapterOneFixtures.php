<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\ChapterOne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ChapterOneFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $chapterOne = new ChapterOne();
            $chapterOne->setTitle("Control");
            $chapterOne->setContent("À quel point la musique influence-t-elle nos vies ?");
            $chapterOne->setMusic('Pour une meilleure expérience, montez le son ou mettez votre casque');
            $chapterOne->setImageBackground('n');
            $chapterOne->setFilename('/public/images/bla');
            $chapterOne->setUpdated((new \DateTime()));
            $manager->persist($chapterOne);

            $manager->flush();
    }
}