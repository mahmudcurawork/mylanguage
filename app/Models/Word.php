<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Word extends Model
{
    use HasFactory;

    protected $table = 'words';

    protected $fillable = [
        'user_id',
        'word',
        'definition',
        'no_of_read',
        'learned',
        'deleted'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
