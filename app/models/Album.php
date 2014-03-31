<?php
class Album extends Eloquent
{
    protected $fillable = array('name', 'description', 'cover_image');

    public function photos()
    {
        return $this->hasMany('Image');
    }
}