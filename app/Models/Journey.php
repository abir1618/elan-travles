<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Journey extends Model
{
    protected $fillable=['title','slug','country','days','style','description','image_url','status','price','accent','featured'];
    protected $casts = ['price'=>'decimal:2','featured'=>'boolean'];
}