<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();
        return view('home', ['events' => $events]);
    }

    public function redirectToEventCreateForm() {
        return view('events.create');
    }

    public function store(Request $request) {
        $event = new Event;

        $event->title = $request->title;
//        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
//        $event->items = $request->items;
        // $user = auth()->user();
        // $event->user_id = $user->id;

        // Image Upload
        if( $request->hasFile('image') && $request->file('image')->isValid() ) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $event->save();


        return redirect('/')->with('message', 'Evento criado com sucesso!');
    }
}
