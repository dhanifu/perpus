<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'code', 'writer', 'publisher', 'year', 'photo', 'rack_id'];

    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }

    public function getPhotoSrcAttribute(): String
    {
        return image($this->photo);
    }

    public function getStatusBadgeAttribute()
    {
        $replace = $this->status ? ['success', 'Dipinjam'] : ['primary', 'Tersedia'];

        return badge($replace);
    }
}
