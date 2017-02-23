<?php
namespace App\Observers;

use App\gallery;

class galleryObserver
{
    
    /**
     * Listen to the gallery creating event.
     *
     * @param  gallery  $gallery
     * @return void
     */
    public function creating(gallery $gallery)
    {
        //code...
    }

     /**
     * Listen to the gallery created event.
     *
     * @param  gallery  $gallery
     * @return void
     */
    public function created(gallery $gallery)
    {
        //code...
    }

    /**
     * Listen to the gallery updating event.
     *
     * @param  gallery  $gallery
     * @return void
     */
    public function updating(gallery $gallery)
    {
        //code...
    }

    /**
     * Listen to the gallery updated event.
     *
     * @param  gallery  $gallery
     * @return void
     */
    public function updated(gallery $gallery)
    {
        //code...
    }

    /**
     * Listen to the gallery saving event.
     *
     * @param  gallery  $gallery
     * @return void
     */
    public function saving(gallery $gallery)
    {
        //code...
    }

    /**
     * Listen to the gallery saved event.
     *
     * @param  gallery  $gallery
     * @return void
     */
    public function saved(gallery $gallery)
    {
        //code...
    }

    /**
     * Listen to the gallery deleting event.
     *
     * @param  gallery  $gallery
     * @return void
     */
    public function deleting(gallery $gallery)
    {
        //code...
    }

    /**
     * Listen to the gallery deleted event.
     *
     * @param  gallery  $gallery
     * @return void
     */
    public function deleted(gallery $gallery)
    {
        //code...
    }

    /**
     * Listen to the gallery restoring event.
     *
     * @param  gallery  $gallery
     * @return void
     */
    public function restoring(gallery $gallery)
    {
        //code...
    }

    /**
     * Listen to the gallery restored event.
     *
     * @param  gallery  $gallery
     * @return void
     */
    public function restored(gallery $gallery)
    {
        //code...
    }
}