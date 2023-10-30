<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Malico\LaravelNanoid\Eloquent\InteractsWithNanoid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Resume extends Model
{
    use HasFactory;
    //use InteractsWithNanoid;
    protected $table = 'resume';
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $primaryKey = 'resume_id';

    protected $fillable = ['resume_id','resume_user_id', 'resume_fullname', 'resume_second_email', 'resume_professional_title', 'resume_address', 'resume_expected_salary', 'resume_experience', 'resume_category', 'resume_official_photo', 'resume_skill', 'resume_gender', 'resume_candidate_age', 'resume_file', 'resume_link', 'resume_content', 'resume_portofolio_link', 'resume_active', 'resume_created_at', 'resume_education_level', 'resume_link'];
    const CREATED_AT = 'resume_created_at';
    const UPDATED_AT = 'resume_created_at';

}