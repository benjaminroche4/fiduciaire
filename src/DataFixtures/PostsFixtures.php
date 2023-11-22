<?php

namespace App\DataFixtures;

use App\Entity\Posts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class PostsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $post = new Posts();
            $post->setTitle($faker->text(70));
            $post->setContent($faker->paragraph);
            $post->setCreatedAt(new \DateTimeImmutable());
            $post->setUpdatedAt(new \DateTimeImmutable());
            $post->setStatus($faker->boolean(50));
            $post->setSummary($faker->text(200));
            $post->setSlug($faker->slug);
            $post->setCategory($this->getReference(PostCategoriesFixtures::CATEGORY_REFERENCE));

            $manager->persist($post);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PostCategoriesFixtures::class,
        ];
    }
}
