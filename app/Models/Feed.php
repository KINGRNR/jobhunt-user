<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Malico\LaravelNanoid\Eloquent\InteractsWithNanoid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Feed extends Model
{
    use HasFactory;
    //use InteractsWithNanoid;
    protected $table = 'feed_content';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = [
        'title_feed',
        'description_feed',
        'pic_name',
        'feed_user_id'
        // 'comment_parent_id'
    ];
    protected $primaryKey = 'id_feed';

    const CREATED_AT = 'feed_created_at';
    const UPDATED_AT = 'feed_created_at';

}