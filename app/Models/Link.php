<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    public function transformer()
    {
        return LinkTransformer::class;
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visits()
    {
        return $this->hasMany(LinkVisit::class);
    }


    public function getLink()
    {
        return url($this->code);
    }

}
