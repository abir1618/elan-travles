<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Journal extends Model
{
    protected $fillable=['title','slug','excerpt','body','published_at','status','image_url'];
    protected $casts = ['published_at'=>'date'];
}