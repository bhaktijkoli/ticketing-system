<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Ticket;
use App\Message;

class NewMessage implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $ticket;
  public $message;

  /**
  * Create a new event instance.
  *
  * @return void
  */
  public function __construct(Ticket $ticket, Message $message)
  {
    $this->ticket = $ticket;
    $this->message = $message;
  }

  /**
  * Get the channels the event should broadcast on.
  *
  * @return \Illuminate\Broadcasting\Channel|array
  */
  public function broadcastOn()
  {
    return new Channel('channel-name');
  }

  public function broadcastWith()
{
    return ['message' => $this->message->format()];
}


}
