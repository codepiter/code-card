<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//class User extends Authenticatable
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $fillable = [
        
		 'status_id', 'type_user_id', 'email', 'email_verified_at', 'username', 'password', 'is_admin', 'active', 'activation_token'

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
	
	
	public function personalInformation()
    {
        return $this->hasOne('App\PersonalInformation');
    }

	          public function getRouteKeyName()
				{
					//return parent::getRouteKeyName(); //\laravel\framework\src\Illuminate\Database\Eloquent\Model.php (1555)
				return 'username';

				}

	          public function payment()
				{
					return $this->hasOne('App\Payment');
				}
}
