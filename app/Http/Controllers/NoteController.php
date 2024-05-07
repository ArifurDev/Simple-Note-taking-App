<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends BaseController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        // Create note
        $note = new Note();
        $note->user_id = Auth::user()->id;
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->save();

        return $this->returnMessage('Note Create successfully', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('Note Managemen.edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        // update note
        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->save();

        return $this->returnMessage('Note Update successfully', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return $this->returnMessage('Note Delete successfully', 'success');
    }


    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $data = $request->input('search');
            $notes = Note::whereAny(
                [
                    'title',
                    'content',
                ],
                'LIKE',
                "%$data%"
            )->get();

        if ($notes->isNotEmpty()) {
             return view('Note Managemen.search_result',compact('notes'));

        }else{
             return $this->returnMessage('No Data Found', 'error');
        }

    }
}
