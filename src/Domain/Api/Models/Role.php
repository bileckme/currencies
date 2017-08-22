<?php namespace Domain\Api\Models;

/**
 * Class Role
 * @package Domain\Api\Entities\Users
 */
class Role extends BaseModel
{

    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('Domain\Api\Models\Role', 'user_roles', 'user_id', 'role_id');
    }
}