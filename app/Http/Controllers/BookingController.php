<?php
namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BookingController extends Controller
{
    public function index(Request $request){
        $q=Booking::with('journey')->latest();
        if($request->filled('status')) $q->where('status',$request->status);
        if($request->filled('search')) $q->where(fn($x)=>$x->where('name','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('reference','like','%'.$request->search.'%'));
        return $q->paginate($request->integer('per_page',30));
    }
    public function store(Request $request){
        $data=$request->validate(['name'=>'required|string|max:120','email'=>'required|email|max:180','destination'=>'nullable|string|max:180','journey_id'=>'nullable|exists:journeys,id','notes'=>'nullable|string|max:5000','travel_date'=>'nullable|date','guests'=>'nullable|integer|min:1|max:20']);
        do { $ref='BK-'.strtoupper(Str::random(5)); } while(Booking::where('reference',$ref)->exists());
        $data['reference']=$ref; $data['status']='Pending'; $data['guests']=$data['guests']??1;
        return response()->json(Booking::create($data)->load('journey'),201);
    }
    public function update(Request $request, Booking $booking){ $data=$request->validate(['status'=>'sometimes|in:Pending,Confirmed,Completed,Cancelled','notes'=>'nullable|string|max:5000','travel_date'=>'nullable|date','guests'=>'nullable|integer|min:1|max:20']); $booking->update($data); return $booking->fresh('journey'); }
    public function destroy(Booking $booking){ $booking->delete(); return response()->json(['message'=>'Booking deleted']); }
    public function dashboard(){
        return ['total_bookings'=>Booking::count(),'pending'=>Booking::where('status','Pending')->count(),'confirmed'=>Booking::where('status','Confirmed')->count(),'completed'=>Booking::where('status','Completed')->count(),'cancelled'=>Booking::where('status','Cancelled')->count(),'active_journeys'=>\App\Models\Journey::where('status','Published')->count(),'enquiries'=>Booking::whereIn('status',['Pending','Confirmed'])->count(),'revenue_pipeline'=>(float) Booking::whereIn('status',['Confirmed','Completed'])->join('journeys','journeys.id','=','bookings.journey_id')->sum('journeys.price')];
    }
}