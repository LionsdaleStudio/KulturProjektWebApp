<?php

namespace App\Observers;

use App\Models\Event;

class EventObserver
{
    /**
     * Handle the Event "created" event.
     */
    public function creating(Event $event): void
    {
        $creator = auth()->hasUser() ? auth()->user()->id : 11;
        $event->created_by = $creator;
    }

    /**
     * Handle the Event "updatING" event.
     */
    public function updating(Event $event): void
    {
        $creator = auth()->user()->id;
        $event->updated_by = $creator;
    }

    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        $creator = auth()->user()->id;
        $event->deleted_by = $creator;
        $event->update();
    }

    /**
     * Handle the Event "restored" event.
     */
    public function restored(Event $event): void
    {
        $creator = auth()->user()->id;
        
        $event->deleted_by = null;
        $event->updated_by = $creator;
        $event->update();
    }

    /**
     * Handle the Event "force deleted" event.
     */
    public function forceDeleted(Event $event): void
    {
        $creator = auth()->user()->id;
        
        $event->deleted_by = $creator;
        $event->update();
    }
}
