<?php

namespace App\DataFixtures;

use App\Entity\PostCategories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostCategoriesFixtures extends Fixture
{
    public const CATEGORY_REFERENCE = 'category_reference';

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $category = new PostCategories();
            $category->setName('Category'. $i);

            $manager->persist($category);
        }

        $manager->flush();

        $this->addReference(self::CATEGORY_REFERENCE, $category);
    }
}
