<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['arabic_name','english_name', 'email', 'password', 'phone', 'country', 'work', 'birth_date','profile_image'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * return user events that he attended or welling to attend
     */
    public function events(){
        return $this->belongsToMany("App\Events","event-attenders","user_id","event_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * return user articles he wrote
     */
    public function articles(){
        return $this->hasMany("App\Article","user_id");
    }
	public static function save_user($arabic_name,$english_name,$email,$password,$phone,$country,$work,$birth_date,$role,$remember_token){
		$user = new User;
		$user->arabic_name = $arabic_name;
		$user->english_name = $english_name;
		$user->email = $email;
		$user->password = $password;
		$user->phone = $phone;
		$user->country = $country;
		$user->work = $work;
		$user->birth_date = $birth_date;
		$user->role = $role;
		$user->remember_token = $remember_token;
		$user->save();
	}
	public static function update_user($id,$english_name,$email,$phone,$country,$work){
		$user =  User::find($id);

		$user->english_name = $english_name;
		$user->email = $email;
		$user->phone = $phone;
		$user->country = $country;
		$user->work = $work;
		$user->save();
	}

}
