<?php

namespace App\User\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements JWTSubject
{
  use Notifiable;
  protected $table = 'admins';
//   protected $connection='mysql2';
  protected $guard = 'admin';
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  /**
   * Get the identifier that will be stored in the subject claim of the JWT.
   *
   * @return mixed
   */
  public function getJWTIdentifier()
  {
      return $this->getKey();
  }

  /**
   * Return a key value array, containing any custom claims to be added to the JWT.
   *
   * @return array
   */
  public function getJWTCustomClaims()
  {
      return [];
  }

  public function adminAuditions()
  {
      return $this->hasMany(AdminAudition::class);
  }

  /**
   * Return the sluggable configuration array for this model.
   *
   * @return array
   */
  // public function sluggable()
  // {
  //     return [
  //         'slug' => [
  //             'source' => 'name'
  //         ]
  //     ];
  // }
}