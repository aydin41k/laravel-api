<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['centre_id','subject','source','status'];

    public function messages()
    {
    	return $this->hasMany('App\ConversationMessage');
    }

    public function parties()
    {
    	return $this->hasMany('App\ConversationParty');
    }
}
