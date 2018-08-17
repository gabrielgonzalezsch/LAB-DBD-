<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Hotel;
class eventoHotel
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    Hotel $hotel;
    Hotel $hotelModificado;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Hotel $hotelEvento)
    {
        $this->hotel = $hotelEvento;
    }


   public function __construct(Hotel $hotelAntiguo, Hotel $hotelNuevo)
   {
       $this->hotel = $hotelAntiguo;
       $this->$hotelModificado = $hotelNuevo;
   }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
