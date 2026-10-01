<?php
namespace App\Http\Controllers;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class JournalController extends Controller
{
    public function index(Request $request){ $q=Journal::query()->latest('published_at')->latest(); if($request->boolean('public')) $q->where('status','Published'); if($request->filled('search')) $q->where('title','like','%'.$request->search.'%'); return $q->paginate($request->integer('per_page',20)); }
    public function store(Request $request){ $data=$request->validate(['title'=>'required|string|max:180','excerpt'=>'nullable|string|max:320','body'=>'nullable|string','published_at'=>'nullable|date','status'=>'nullable|in:Published,Draft','image_url'=>'nullable|url|max:2048']); $data['slug']=Str::slug($data['title']); return response()->json(Journal::create($data),201); }
    public function update(Request $request, Journal $journal){ $data=$request->validate(['title'=>'sometimes|required|string|max:180','excerpt'=>'nullable|string|max:320','body'=>'nullable|string','published_at'=>'nullable|date','status'=>'nullable|in:Published,Draft','image_url'=>'nullable|url|max:2048']); if(isset($data['title'])) $data['slug']=Str::slug($data['title']); $journal->update($data); return $journal->fresh(); }
    public function destroy(Journal $journal){ $journal->delete(); return response()->json(['message'=>'Journal deleted']); }
}