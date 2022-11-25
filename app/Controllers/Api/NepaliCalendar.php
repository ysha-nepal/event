<?php

namespace Event\Controllers\Api;

use App\Http\Controllers\Controller;
use Core\Services\DateService;
use Event\Models\Event;
use Illuminate\Http\Request;


class NepaliCalendar extends Controller
{
    private DateService $service;

    public function index(Request $request)
    {
        $calendarService = new DateService();
        $events = Event::get();
        $colors = [
            'Events' => '#B66D0D',
        ];
        $calendarService = $calendarService->addColors($colors);
        foreach ($events as $event) {
            $calendarService = $calendarService->event(
                $event->title, $event->started_date_ad, $event->end_date_ad,'#',
                $colors['Events']
            );
        }
        $params = $request->all();
        $calendar = $calendarService->getNepaliCalendar($params);
        return response()->json($calendar, 200);
    }
}
