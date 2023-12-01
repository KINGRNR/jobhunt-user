<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        'job_type',
        'job_code',
        'job_requested_date',
        'job_status',
        'job_map_latitude',
        'job_map_longitude',
        'job_detailed_address',
        'job_required_gender',
        'job_work_experience',
        'job_expected_salary_range',
        'job_education_level',
    ];

    public static function generateID(int $length = 16): string
    {
        $job_id = Str::random($length);//Generate random string
        $exists = DB::table('list_job')
            ->where('job_id', '=', $job_id)
            ->get(['job_id']);//Find matches for id = generated id
        if (isset($exists[0]->job_id)) {//id exists in users table
            return self::generateID();//Retry with another generated id
        }

        return $job_id;//Return the generated id as it does not exist in the DB
    }
    public $timestamps = false;
}
