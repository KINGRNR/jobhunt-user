<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'company_id',
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
}
