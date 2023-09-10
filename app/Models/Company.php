<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    public $timestamps = false;
    protected $fillable = [
        'company_name',
        'company_website',
        'company_linkedin',
        'company_since',
        'company_description',
        'company_number',
        'company_position',
        'company_logo',
        'company_role_id',
        'company_active',
        // 'company_password',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastEmployee = static::latest('company_id')->first();
            $model->company_id = $lastEmployee ? $lastEmployee->company_id + 1 : 1;
        });

        static::saving(function ($model) {
            if (static::where('company_name', $model->company_name)->exists()) {
                throw new \Exception('Company name already exists.');
            }
        });
    }
}
