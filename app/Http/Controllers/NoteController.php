<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {

        $notes = Note::all();
        return view("note.index",[
            'notes'=> $notes
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "titulo" => "required|max:255",
            "descripcion"=> "required"
        ]);

        Note::create([
            "titulo"=> $request->titulo,
            "descripcion" => $request->descripcion
        ]);

        return redirect()->route("notas");
    }

    public function delete($id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect()->route('notas');
    }
}
