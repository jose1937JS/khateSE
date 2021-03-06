<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
    	'topic_id','note','people_id','section_id','time'
    ];

    public function people()
    {
    	return $this->belongsTo(People::class);
    }

    public function section()
    {
    	return $this->belongsTo(Section::class);
    }

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

}
