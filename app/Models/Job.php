<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Job extends Model
{
    protected $table         = 'list_job';
    protected $primaryKey    = 'job_id';
    protected $useAutoIncrement = false;

    protected $fillable = [
        'job_id',
        'job_name',
        'job_company_id',
        'job_description',
        'job_image',
        'job_category',
        'job_type'
    ];
    public $timestamps = false;
}
