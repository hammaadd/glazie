<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
   
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
   
    public function companies()
    {
        return $this->hasOne(InstallerCompany::class,'installer_id','id');
    }
    public function installinfo()
    {
        return $this->hasOne(InstallInfo::class,'installer_id','id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'customer_id','id');
    }
    
    public function requesthires()
    {
        return $this->hasMany(RequestHiring::class, 'installer_id');
    }
   
    public function testmonial()
    {
        return $this->hasmany(Testmonial::class, 'installer_id');
    }

    

}
