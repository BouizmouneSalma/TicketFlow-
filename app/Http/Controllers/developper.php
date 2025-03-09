<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;


class developper extends Controller
{
    public function assign(Request $request)
    {

        Assignment::create([
            'user_id' => $request->developer_id,
            'ticket_id' => $request->ticket_id,
        ]);

        return back();
    }

    public function index()
    {
        $developer = Auth::user();
        
        $assignedTickets = Ticket::from('ticket')
            ->join('assignment', 'ticket.id', '=', 'assignment.ticket_id')
            ->where('assignment.user_id', $developer->id)
            ->select('ticket.*', 'assignment.created_at as assigned_at')
            ->get();
        
        $ticketEncours = $assignedTickets->where('status', 'En cours')->count();
        $ticketResolu = $assignedTickets->where('status', 'Résolu')->count();
        $ticketFerme = $assignedTickets->where('status', 'Fermé')->count();
        $allTickets = $assignedTickets->count();

        return view('developper.developper', compact(
            'assignedTickets',
            'ticketEncours',
            'ticketResolu',
            'ticketFerme',
            'allTickets'
        ));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:ticket,id',
            'status' => 'required|in:En cours,Résolu,Fermé'
        ]);

        $isAssigned = Assignment::where('ticket_id', $request->ticket_id)
            ->where('user_id', Auth::id())
            ->exists();

        if (!$isAssigned) {
            return redirect()->back()->with('error', 'Non autorisé à modifier ce ticket');
        }

        $ticket = Ticket::find($request->ticket_id);
        $ticket->status = $request->status;
        $ticket->save();

        return redirect()->back()->with('success', 'Statut du ticket mis à jour avec succès');
    }
}
