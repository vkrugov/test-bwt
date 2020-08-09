<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class CompanyUser
 * @package App
 */
class CompanyUser extends Pivot
{
    /**
     * @var string
     */
    protected $table = 'company_user';
    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'company_id',
    ];
}
