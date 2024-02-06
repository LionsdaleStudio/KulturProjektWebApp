<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Http\Request;
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
        $this->authorize('create', Event::class);


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

        toastr()->success('Event has been saved successfully!', 'Congrats');

        return back()->with('message', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $this->authorize('view', Event::class);

        return view('events.show', ['esemeny' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $this->authorize('update', Event::class);

        return view('events.edit', ['esemeny' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $this->authorize('update', Event::class);

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
        $this->authorize('delete', Event::class);

        $event->delete();
        return back()->with('message', $event->name . ' was deleted Successfully');
    }

    /* Saját metódusok */

    public function showDeleted()
    {
        $this->authorize('restore', Event::class);

        $events = Event::onlyTrashed()->get();
        $events = Event::withTrashed()->get();
        return view('events.show_deleted', ['esemenyek' => $events]);
    }

    public function restore(Event $event)
    {
        $this->authorize('restore', Event::class);

        $event->restore();
        return back()->with('message', 'Event was restored successfully.');
    }

    public function retrieveSuggestion() {
        $inputValue = $_POST['inputValue'];

        $events = [
            'Az operaház fantomja',
            'Rómeó és Júlia',
            'Macskák',
            'Padlás',
            'Micsoda nő',
            'Jézus Krisztus Szupersztár',
            'Diótörő',
            'Spamelot'
        ];

        $hint = "";
        $found = false; //bool

        if ($inputValue !== "") {
            $inputValue = strtolower($inputValue);
            $len=strlen($inputValue);
            foreach($events as $name) {
              if (stristr($inputValue, substr($name, 0, $len))) {
                if ($hint === "") {
                  $hint = $name;
                  $found = true;
                } else {
                  $hint .= ", $name";
                }
              }
            }
          }

          if (!$found) {
            $hint = "No suggestion";
          }

        return response()->json(array('msg'=> $hint), 200);
    }
}
