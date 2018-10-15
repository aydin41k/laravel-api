<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\ConversationMessage;
use Illuminate\Http\Request;

class ConversationMessageController extends Controller
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
        $msg = ConversationMessage::create([
            'human_id' => $request->human_id,
            'conversation_id' => $request->convo_id,
            'body' => $request->msg,
            'guid' => substr(md5(rand()), 0, 15)
        ]);

        return $msg;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConversationMessage  $conversationMessage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Conversation::select('subject')->where('id',$id)->get();
        $messages = ConversationMessage::where('conversation_id',$id)->get(); 
        return ['subject'=>$subject[0]->subject,'messages' => $messages];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConversationMessage  $conversationMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(ConversationMessage $conversationMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConversationMessage  $conversationMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConversationMessage $conversationMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConversationMessage  $conversationMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConversationMessage $conversationMessage)
    {
        //
    }
}
