<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', ['esemenyek' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {

        
        /* 
            Ha nincsen fájl és minden adatot menteni akarok a requestből úgy ahogy van
            akkor röviden elég ennyi, a validálás után.
            Event::create($request->all())->save(); 
        */

        /* Ha fájlt is akarok feltölteni, akkor előbb feltöltöm
            Majd utána megcsinálom a példányt és elmentem. */
        $request->thumbnail->storeAs(
            'event_thumbnails',
            'Event_Img_' .$request->name,
            'public'
        );

        $fileName = 'Event_Img_' .$request->name;

        $event = Event::create($request->all());
        $event->thumbnail = $fileName;
        $event->save();

        return back()->with('message', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', ['esemeny' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
