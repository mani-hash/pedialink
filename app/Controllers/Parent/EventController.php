<?php

namespace App\Controllers\Parent;
use App\Services\EventService;

class EventController
{

    private $eventService;

    public function __construct()
    {
        $this->eventService = new EventService();
    }

    public function index()
    {
        $events = $this->eventService->getAllEvents();

        return view("parent/events-campaigns", ['events' => $events]);
    }

    public function bookEvent($request,$id)
    {
        $userId = auth()->user()->id;   
        $eventId = $id;
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');

        // $errors = $this->adminUserService
        //     ->validateAdminUser($name, $email, $type);

        // if (count($errors) !== 0) {
        //     return redirect(route("admin.user.admin"))
        //         ->withInput([
        //             "name" => $name,
        //             "email" => $email
        //         ])
        //         ->withErrors($errors)
        //         ->with("create", true);
        // }

        $this->eventService->bookEvent($eventId, $userId, $name, $email, $phone);

        return redirect(route("parent.events.campaigns"))
            ->withMessage(
                "Event was successfully booked",
                "Event Booked",
                "success"
            );
    }
   
 
}