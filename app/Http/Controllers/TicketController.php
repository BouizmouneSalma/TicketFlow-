<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class TicketController extends Controller
{
    public function addTicket(Request $request){

        $validator = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'ticket_priority' => 'required',
            'Logiciel' => 'required',
            'os' => 'required',
             'atached_file' => 'file|mimes:jpeg,png,jpg,pdf|max:10240',
        ]);
    
        $ticket = new Ticket();
        $ticket->title = $validator['title'];
        $ticket->description = $validator['description'];
        $ticket->status = "En cours";
        $ticket->user_id = Auth::user()->id;  
        $ticket->software_id = 1;  
        $ticket->priority = $validator['ticket_priority'];
        $ticket->system = $validator['os'];

        if ($request->hasFile('atached_file')) {
            $ticket->screenshot = $request->file('atached_file')->store('files', 'public');
        }

        $ticket->issue_steps = "ff";
        $ticket->scenario_description = "ff";
        $ticket->save();
        return back()->with('success', 'Votre ticket a été soumis avec succès !');

    }

    public function show(Request $request)
{
    


    $filter = $request->query('filter');

    if ($filter == 'resolved'){
        $tickets = Ticket::where('status', 'Résolu')->orderBy('created_at', 'desc')->get();

    }elseif($filter == 'encours'){
        $tickets = Ticket::where('status', 'En cours')->orderBy('created_at', 'desc')->get();
    }elseif($filter == 'ferme'){

    $tickets = Ticket::where('status', 'Fermé')->orderBy('created_at', 'desc')->get();

    }else{
        $tickets = Ticket::orderBy('created_at', 'desc')->get();
    }

    foreach ($tickets as $ticket) {
        $ticket->published_at = Carbon::parse($ticket->published_at)->format('F j, Y');  
    }
        $ticketEncour = Ticket::where('status', 'En cours')->count();
        $ticketResolu = Ticket::where('status', 'Résolu')->count();
        $ticketFerme = Ticket::where('status', 'Fermé')->count();
        $allTickets = Ticket::count();

    return view('client.support', compact('tickets','ticketEncour','ticketResolu','allTickets','ticketFerme'));
}


    
}
    