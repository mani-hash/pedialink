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
   
 
}