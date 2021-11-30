<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
class Employee extends Model
{
    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name','company_id', 'email'];

    public function company()
    {
        return $this -> belongsTo(Company::class);
    }
}

