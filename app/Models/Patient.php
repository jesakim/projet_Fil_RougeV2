<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Patient extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name',
        'phone',
        'assurance_id',
        'iswaiting',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
