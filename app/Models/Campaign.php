<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['utm_campaign', 'name'];

    /**
     * Get stats relationships.
     */
    public function stats()
    {
        return $this->hasMany(Stat::class);
    }
}
