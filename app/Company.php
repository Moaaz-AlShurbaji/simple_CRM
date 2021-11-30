<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
class Company extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','email','website'];

    public function employees()
    {
        return $this -> hasMany(Employee::class);
    }
}
