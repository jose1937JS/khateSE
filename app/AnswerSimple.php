<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerSimple extends Model
{
    protected $fillable = [
    	'text','people_id','question_simple_id','test_simple_id','student_id','number'
    ];

    // public function noteselect()
    // {
    //     return $this->hasOne(NoteSelect::class);
    // }

    public function noteselects()
    {
        return $this->hasMany(NoteSelect::class);
    }

    public function testsimple()
    {
    	return $this->belongsTo(TestSimple::class);
    }

    public function questionsimple()
    {
    	return $this->belongsTo(QuestionSimple::class);
    }

    public function people()
    {
    	return $this->belongsTo(People::class);
    }
}
