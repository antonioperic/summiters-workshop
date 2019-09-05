<?php
/**
 * Copyright (C) 2019 Cape Morris Sp. z o.o. - All Rights Reserved
 */


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Review;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class CreateReviewSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => [
                ['calculateAverageReview',  EventPriorities::POST_VALIDATE]
            ]
        ];
    }

    public function calculateAverageReview(ViewEvent $event)
    {
        /** @var Review $review */
        $review = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if ($method !== 'POST') {
            return;
        }

        $book = $review->getBook();

        $reviews = $book->getReviews();

        $count = count($reviews);

        $sum = 0;

        foreach ($reviews as $review) {
            $sum += $review->getRate();
        }

        $book->setAverageReviewRate($sum/$count);
    }
}