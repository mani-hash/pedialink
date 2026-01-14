<?php

namespace App\Controllers\Admin;
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

        return view('admin/event', ['events' => $events]);
    }
}