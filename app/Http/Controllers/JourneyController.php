<?php
namespace App\Http\Controllers;
use App\Models\Journey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class JourneyController extends Controller
{
    public function index(Request $request){
        $q=Journey::query()->orderByDesc('featured')->latest();
        if($request->boolean('public')) $q->where('status','Published');
        if($request->filled('search')) $q->where(fn($x)=>$x->where('title','like','%'.$request->search.'%')->orWhere('country','like','%'.$request->search.'%'));
        return $q->paginate($request->integer('per_page',20));
    }
    public function show(Journey $journey){ return $journey; }
    public function store(Request $request){
        $data=$request->validate(['title'=>'required|string|max:120','country'=>'required|string|max:80','days'=>'required|integer|min:1|max:90','style'=>'nullable|string|max:80','description'=>'nullable|string','image_url'=>'nullable|url|max:2048','status'=>'nullable|in:Published,Draft','price'=>'nullable|numeric|min:0','accent'=>'nullable|string|max:32','featured'=>'boolean']);
        $data['slug']=Str::slug($data['title']);
        return response()->json(Journey::create($data),201);
    }
    public function update(Request $request, Journey $journey){
        $data=$request->validate(['title'=>'sometimes|required|string|max:120','country'=>'sometimes|required|string|max:80','days'=>'sometimes|integer|min:1|max:90','style'=>'nullable|string|max:80','description'=>'nullable|string','image_url'=>'nullable|url|max:2048','status'=>'nullable|in:Published,Draft','price'=>'nullable|numeric|min:0','accent'=>'nullable|string|max:32','featured'=>'boolean']);
        if(isset($data['title'])) $data['slug']=Str::slug($data['title']);
        $journey->update($data); return $journey->fresh();
    }
    public function destroy(Journey $journey){ $journey->delete(); return response()->json(['message'=>'Journey deleted']); }
}