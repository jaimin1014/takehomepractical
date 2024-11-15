<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['campaign_id', 'term_id', 'date', 'hour', 'revenue'];

    /**
     * Get campaign relationships.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Get term relationships.
     */
    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}
