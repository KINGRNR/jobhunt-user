<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
 
class Comment extends Model
{
    protected $table         = 'comment';
    protected $primaryKey    = 'comment_id';
    protected $useAutoIncrement = false;

    protected $fillable = [
        'comment_text',
        'comment_user_id',
        'comment_blog_id',
        'comment_parent_id'
    ];
    public $timestamps = false;
}
