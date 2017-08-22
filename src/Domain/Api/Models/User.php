<?php namespace Domain\Api\Models;

use Illuminate\Auth\UserInterface;

/**
 * Class User
 * @package Domain\Api\Entities\Users
 */
class User extends BaseModel implements UserInterface
{
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
      'email',
      'username'
    ];

    /**
     * Role model join
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role() {
        return $this->belongsToMany('Domain\Api\Models\User', 'user_roles', 'role_id', 'user_id');
    }

    /**
     * Checks where role exists
     * @param $role
     * @return bool
     */
    public function inRole($role) {
        return (bool) $this->role()->where('name', '=', $role)->count();
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the reminder email
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }
}