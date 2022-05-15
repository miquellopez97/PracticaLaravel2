<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Tickets::orderBy('created_at', 'DESC')->get();

        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $ticketToCreatate = $request->all();
        if($request->hasFile('photo')){
            $photo_name = $request->file('photo')->store('photos');
            $ticketToCreatate['photo'] = $photo_name;
        }

        $ticket = Tickets::create($ticketToCreatate);

        return view('tickets.show', compact('ticket'));
    }

    public function show(Tickets $ticket)
    {
        $ticket['photo'] = Storage::url($ticket['photo']);
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Tickets $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Tickets $ticket)
    {
        $ticket['photo'] = Storage::url($ticket['photo']);
        $ticket->update($request->all());

        return view('tickets.show', compact('ticket'));
    }

    public function destroy(Tickets $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Product deleted successfully');
    }
}
