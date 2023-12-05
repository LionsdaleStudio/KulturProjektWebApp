<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Ha GATE-t használsz engedélyezésre
        /* Gate::allows('eventHandler', auth()->user()) ? '' : abort(403); */

        //Ha policyt használsz (as you should)
        $this->authorize('viewAny', Event::class);


        $events = Event::all();
        return view('events.index', ['esemenyek' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Event::class);

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
            'Event_Img_' . $request->name,
            'public'
        );

        $fileName = 'Event_Img_' . $request->name;

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
        return view('events.show', ['esemeny' => $event]);
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

        if ($request->thumbnail != null) {
            //Fájlnév kimentése
            $fileName = 'Event_Img_' . $request->name;
            $event->thumbnail = $fileName;

            //A fájl feltöltése
            $request->thumbnail->storeAs(
                'event_thumbnails',
                'Event_Img_' . $request->name,
                'public'
            );
            $event->update();
        }

        return redirect()->route('events.index')->with('message', 'Event Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return back()->with('message', $event->name . ' was deleted Successfully');
    }

    /* Saját metódusok */

    public function showDeleted()
    {
        $events = Event::onlyTrashed()->get();
        $events = Event::withTrashed()->get();
        return view('events.show_deleted', ['esemenyek' => $events]);
    }

    public function restore(Event $event)
    {
        $event->restore();
        return back()->with('message', 'Event was restored successfully.');
    }
}
