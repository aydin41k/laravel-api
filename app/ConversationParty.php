<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConversationParty extends Model
{
    protected $fillable = ['conversation_id','human_id','role'];
}
