<?php

namespace App\Listeners;

use App\Events\eventoHotel;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Controllers\ControllerAuditoria;

class ListenerAuditoria
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  eventoHotel  $event
     * @return void
     */
    public function handle(eventoHotel $event)
    {
        if(isset($event->hotelModificado)){
          ControllerAuditoria::auditHotelModificado($event->hotel, $event->hotelModificado);
        }else{
          $hotel = $event->hotel;
        }
    }
}
