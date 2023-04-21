<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'file',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Unknown',
        ]   )->select('id','name');
    }
    public function gallery_image(){
        return  asset('storage/'.$this->file) ;
    }
}
