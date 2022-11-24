<?php

namespace Event\Controllers\Api;

use Event\Models\Event;
use Event\Resources\EventResource;

class EventController
{
    /**
     * @var Event
     */
    private $model;

    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return EventResource::collection(Event::all());
    }

    public function userEvents($id)
    {
        return EventResource::collection(Event::where('created_by',$id)->get());
    }
}
