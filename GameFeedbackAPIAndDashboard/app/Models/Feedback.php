<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $fillable = [
        'game_id',
        'feedbackState',
        'platform',
        'version',
        'category',
        'content'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
