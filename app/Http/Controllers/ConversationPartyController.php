<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\ConversationParty;
use Illuminate\Http\Request;

class ConversationPartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConversationParty  $conversationParty
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = Conversation::whereHas('parties',function($q) use ($id) {
            $q->where('human_id','like',$id);
        })->with('messages','parties')->get();
//        $messages = Conversation::with(['parties' => function($query) use ($id) {
//           $query->where('human_id','like',$id);
//        }],'messages')->get();
        return $messages;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConversationParty  $conversationParty
     * @return \Illuminate\Http\Response
     */
    public function edit(ConversationParty $conversationParty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConversationParty  $conversationParty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConversationParty $conversationParty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConversationParty  $conversationParty
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConversationParty $conversationParty)
    {
        //
    }
}
