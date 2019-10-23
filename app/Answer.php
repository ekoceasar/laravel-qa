<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['body', 'user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }
    
    public static function boot(){
        parent::boot();
        //To use Eloquent and update the answers_count in question table once a
        //answer is created
        static::created(function ($answer){
            $answer->question->increment('answers_count');
            $answer->question->save();
        });
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
}
