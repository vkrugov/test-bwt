<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class CompanyUser
 * @package App
 */
class CompanyUser extends Pivot
{
    protected $table = 'company_user';
    public $incrementing = true;
}
