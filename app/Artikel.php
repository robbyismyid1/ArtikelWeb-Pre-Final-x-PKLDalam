<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = ['judul', 'slug', 'rating', 'durasi', 'embed', 'negara', 'konten', 'foto', 'kategori_id', 'user_id'];
    public $timestamps = true;

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'artikel_tags', 'artikel_id', 'tag_id');
    }

    public function negara()
    {
        return $this->belongsToMany('App\Negara', 'artikel_negaras', 'artikel_id', 'negaras_id');
    }
    
    public function rilis()
    {
        return $this->belongsTo('App\Rilis', 'rilis_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
