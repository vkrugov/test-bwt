<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App
 * @property int $id
 * @property string $name
 * @property int $country_id
 *
 * @property Country $country
 * @property User[] $users
 */
class Company extends Model
{
    protected $table = 'company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'country_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'company_user')->using('App\CompanyUser')->withPivot('connected_at');
    }
}
