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
    public function index($request)
    {
        $search = $request->input('search');
        $filters = $request->input('filters');
        $events = $this->eventService->getAllEvents($search, $filters);

        return view('admin/event', ['events' => $events]);
    }
}