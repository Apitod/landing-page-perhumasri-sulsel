<?php

namespace App\Http\Controllers;

use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::published()
            ->orderBy('tanggal')
            ->paginate(10);

        return view('pages.agenda', compact('agendas'));
    }

    public function show(int $id)
    {
        $agenda = Agenda::published()->findOrFail($id);
        return view('pages.agenda-detail', compact('agenda'));
    }
}
