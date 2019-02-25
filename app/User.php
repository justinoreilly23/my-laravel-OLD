<?php

namespace App;

use App\Events\NewUserEvent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class User extends \TCG\Voyager\Models\User {

    use Notifiable;
    use HasRoleAndPermission;

    protected $dispatchesEvents = [
        'created' => NewUserEvent::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected
        $fillable
        = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected
        $hidden
        = [
        'password',
        'remember_token',
        'id',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'owner_id');
    }
}