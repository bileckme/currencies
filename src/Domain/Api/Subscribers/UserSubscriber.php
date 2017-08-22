<?php namespace Domain\Api\Subscribers;

use Domain\Api\Models\User;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class UserSubscriber
 * @package Domain\Api\Subscribers
 */
class UserSubscriber
{
    /**
     * @param User $user
     */
    public function onCreate(User $user)
    {
        // TODO: perform actions that should occur when user is created
    }

    /**
     * @param User $user
     */
    public function onArchive(User $user)
    {
        // TODO: perform actions that should occur when user is archived
    }

    /**
     * @param User $user
     */
    public function onExpire(User $user)
    {
        // TODO: perform actions that should occur when user expires
    }

    /**
     * @param User $user
     */
    public function onDelete(User $user)
    {
        // TODO: perform actions that should occur when user is deleted
    }

    /**
     * Subscribe to events
     * @param Event $event
     */
    public function subscribe(Event $event)
    {
        $event->listen([
          'user.archived',
          'user.deleted',
          'user.deactivated'
        ], 'Domain\Api\Subscriber\UserSubscriber@onDelete');

        $event->listen(['user.expired',], 'Domain\Api\Subscribers\UserSubscriber@onExpire');
        $event->listen(['user.created','user.activated',], 'Domain\Api\Subscribers\UserSubscriber@onCreate');
    }
}