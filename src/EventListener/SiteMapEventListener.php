<?php

namespace App\EventListener;

use App\Repository\BlogPostRepository;
use App\Repository\PostsRepository;
use Presta\SitemapBundle\Event\SitemapPopulateEvent;
use Presta\SitemapBundle\Sitemap\Url\UrlConcrete;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Event listener of the Sitemap bundle.
 * This class is used to populate the sitemap with the blog posts.
 */
#[AsEventListener(event: SitemapPopulateEvent::class, method: 'onSitemapPopulate')]
class SiteMapEventListener
{
    public function __construct(
        public PostsRepository $blogPostRepository
    )
    {
    }

    public function onSitemapPopulate(SitemapPopulateEvent $event)
    {
        $posts = $this->blogPostRepository->findAll();

        $urlContainer = $event->getUrlContainer();
        $urlGenerator = $event->getUrlGenerator();

        foreach ($posts as $post) {
            $url = new UrlConcrete(
                $urlGenerator->generate(
                    'app_blog_post',
                    ['slug' => $post->getSlug()],
                    UrlGeneratorInterface::ABSOLUTE_URL)
            );
            $url->setLastmod($post->getCreatedAt());
            $urlContainer->addUrl(
                $url,
                'blog',
            );
        }
    }
}