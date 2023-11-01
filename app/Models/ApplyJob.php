<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class ApplyJob extends Model
{
    protected $table         = 'job_apply';
    protected $primaryKey    = 'job_apply_id';
    protected $useAutoIncrement = false;

    protected $fillable = [
        'job_apply_id',
        'job_apply_job_id',
        'job_apply_resume_user_id',
        'job_apply_status',
        'job_apply_resume_id'
    ];
    public $timestamps = false;
}
