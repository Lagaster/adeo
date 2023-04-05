<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'status',
        'created_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function programAvatar()
    {
        return  $this->image !== "default_program.png" ? asset( 'storage/images/programs/' . $this->image ) : asset('admin_asset/images/default_program.png') ;
    }

}
