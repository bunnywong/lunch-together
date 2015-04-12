<?php

class Post extends \Eloquent {
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'event_date',
        'consumer_id',
        'cost',
    ];

    public static $rules = [
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required|exists:categories,id',
        'event_date' => 'required',
        'consumer_id' => 'required',
        'cost' => 'required|numeric',
    ];

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function payer()
    {
        return $this->belongsTo('user', 'payer_id', 'id');
    }
    public function consumer()
    {
        return $this->belongsTo('user', 'consumer_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }


}