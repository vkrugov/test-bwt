<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $created_at
 *
 * @property Company[] $companies
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */
    protected $table = 'user';

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
        'password',
    ];

    /**
     * @param string $country
     * @return Collection
     */
    public static function getAllByCountryName(string $country): Collection
    {
        return static::whereHas('companies.country', function ($query) use ($country) {
            $query->where(['name' => $country]);
        })->with(['companies' => function ($query) use ($country) {
            $query->whereHas('country', function ($query) use ($country) {
                $query->where(['name' => $country]);
            });
        }])->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function companies()
    {
        return $this->belongsToMany('App\Company', 'company_user')->using('App\CompanyUser')->withPivot('connected_at');
    }
}
