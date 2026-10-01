<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Booking extends Model
{
    protected $fillable=['reference','name','email','destination','journey_id','status','notes','travel_date','guests'];
    protected $casts = ['travel_date'=>'date','guests'=>'integer'];
    public function journey(){ return $this->belongsTo(Journey::class); }
}