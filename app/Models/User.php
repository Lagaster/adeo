<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\PreviousWork;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function programs()
    {
        return $this->hasMany(Program::class, 'created_by', 'id');
    }
    public function previousWorks()
    {
        return $this->hasMany(PreviousWork::class, 'created_by', 'id');
    }
    public function avatarView()
    {
        return $this->image !== 'default_user.png' ? asset('storage/images/users/'.$this->image) : asset('admin_asset/images/default_user.png');
    }
    public function blogs(){
        return $this->hasMany(Blog::class, 'user_id', 'id');
    }
}
