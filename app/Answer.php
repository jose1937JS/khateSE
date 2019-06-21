<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
    	'text','people_id','question_id','test_id'
    ];

    public function test()
    {
    	return $this->belongsTo(Test::class);
    }

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }

    public function people()
    {
    	return $this->belongsTo(People::class);
    }
}
