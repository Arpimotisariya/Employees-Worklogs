<?php

namespace App\Models;

use App\Models\user;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkLog extends Model
{
    use HasFactory;

    protected $table = 'work_logs'; 
    protected $fillable = ['name', 'date', 'hour', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
