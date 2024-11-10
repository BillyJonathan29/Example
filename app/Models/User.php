<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'role',
        'avatar'
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


    const ROLE_ADMIN = 'Admin';
    const ROLE_USER = 'User';


    public function Admin()
    {
        return $this->role == self::ROLE_ADMIN;
    }

    public function User()
    {
        return $this->role == self::ROLE_USER;
    }

    public function isHasAvatar()
	{
		if(empty($this->avatar)) return false;
		return \File::exists($this->avatarPath());
	}

	public function avatarPath()
	{
		return storage_path('app/public/avatars/'.$this->avatar);
	}

	public function avatarLink()
	{
		if($this->isHasAvatar()) {
			return url('storage/avatars/'.$this->avatar);
		}

		return url('img/default-avatar.jpg');
	}

	public function setAvatar($request)
	{
		if(!empty($request->upload_avatar)) {
			$this->removeAvatar();
			$file = $request->file('upload_avatar');
			$filename = date('YmdHis_').$file->getClientOriginalName();
			$file->move(storage_path('app/public/avatars'), $filename);
			$this->update([
				'avatar' => $filename,
			]);
		}

		return $this;
	}

	public function removeAvatar()
	{
		if($this->isHasAvatar()) {
			\File::delete($this->avatarPath());
			$this->update([
				'avatar' => null,
			]);
		}

		return $this;
	}
}
