<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'description', 'image', 'user_id'];

    // Otras relaciones o métodos del modelo...

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
