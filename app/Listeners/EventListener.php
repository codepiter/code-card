<?php

namespace App\Listeners;

use App\Notifications\EventNotification;
use App\User;
use App\PersonalInformation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;

class EventListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
		$pi=$event->event->personal_information_id;
		
		$user = PersonalInformation::where('id', $pi)->first();
			$id_user=$user->user_id;
		
        //User::all()
        User::where('id', $id_user)->get()
		//->except($event->event->user_id)
		->each(function(User $user)use($event){
			Notification::send($user, new EventNotification($event->event));
		});
    }
}
