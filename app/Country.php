<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @package App
 * @property int $id
 * @property string $name
 *
 * @property Company[] $companies
 * @property User[] $users
 */
class Country extends Model
{
    protected $table = 'country';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany('App\Company')->with('users');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function users()
    {
        return $this->hasManyThrough('App\CompanyUser', 'App\Company')
            ->leftJoin('user', 'company_user.user_id', '=', 'user.id')
            ->select(['user.email', 'company.name', 'company_user.connected_at']);
    }
}
