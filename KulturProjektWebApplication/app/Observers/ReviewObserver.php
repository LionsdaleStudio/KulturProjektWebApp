<?php

namespace App\Observers;

use App\Models\Review;

class ReviewObserver
{
    /**
     * Handle the Review "created" event.
     */
    public function creating(Review $review): void
    {
        $review->created_by = auth()->user()->id;
    }

    /**
     * Handle the Review "updated" event.
     */
    public function updating(Review $review): void
    {
        $review->updated_by = auth()->user()->id;

    }

    /**
     * Handle the Review "deleted" event.
     */
    public function deleted(Review $review): void
    {
        $review->deleted_by = auth()->user()->id;
        $review->update();
    }

    /**
     * Handle the Review "restored" event.
     */
    public function restored(Review $review): void
    {
        $review->updated_by = auth()->user()->id;
        $review->deleted_by = null;
        $review->update();
    }

    /**
     * Handle the Review "force deleted" event.
     */
    public function forceDeleted(Review $review): void
    {
        $review->deleted_by = auth()->user()->id;
        $review->update();
    }
}
