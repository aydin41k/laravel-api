<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\ConversationMessage;
use App\ConversationParty;
use Illuminate\Http\Request;

class ConversationController extends Controller
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
        $convo = Conversation::create([
            'centre_id' => $request->centre,
            'subject' => $request->subject,
            'source' => $request->source
        ]);

        $msg = ConversationMessage::create([
            'human_id' => $request->human_id,
            'conversation_id' => $convo->id,
            'body' => $request->msg,
            'guid' => substr(md5(rand()), 0, 15)
        ]);

        $owner = ConversationParty::create([
            'conversation_id' => $convo->id,
            'human_id' => $request->human_id,
            'role' => 1
        ]);

        $participants = explode(',',$request->parties);
        foreach( $participants as $human ) {
            $party = ConversationParty::create([
                'conversation_id' => $convo->id,
                'human_id' => $human,
                'role' => 3
            ]);
        }

        return $convo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show(Conversation $conversation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        //
    }

    /* Will retrieve the ID’s of conversations belonging to a centre.
    Then will query kh_conversation_parties to populate the list of 
    conversations with the names of the parties. Further filtering 
    will happen on the front-end.*/
    public function centre($id)
    {
        $convos = Conversation::where('centre_id',$id)->with('parties','messages')->get();
        return $convos;
    }
}
