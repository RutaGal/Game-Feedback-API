<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;
    protected $table = 'game';
    protected $fillable = ['name'];

    public function feedback(): HasMany
    {
        return $this->hasMany(Feedback::class, 'game_id');
    }
}
