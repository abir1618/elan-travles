<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Journey;
use App\Models\Journal;
use App\Models\Booking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email'=>'admin@elantravel.test'], ['name'=>'Studio Admin','password'=>Hash::make('Admin@2026!'),'is_admin'=>true]);
        $journeys=[
            ['title'=>'Fire & Silence','country'=>'Iceland','days'=>10,'style'=>'Private / Arctic','description'=>'Black beaches, geothermal rooms and long blue-hour drives across the edge of the map.','image_url'=>'https://images.unsplash.com/photo-1504893524553-b855bce32c67?auto=format&fit=crop&w=1600&q=88','status'=>'Published','price'=>8900,'accent'=>'#d9ff5a','featured'=>true],
            ['title'=>'After the Rain','country'=>'Japan','days'=>12,'style'=>'Private / Slow','description'=>'Temple mornings, hidden ryokans and a softer route through Kyoto, Koyasan and the coast.','image_url'=>'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?auto=format&fit=crop&w=1600&q=88','status'=>'Published','price'=>11200,'accent'=>'#d7c7ff','featured'=>true],
            ['title'=>'Red Horizon','country'=>'Morocco','days'=>8,'style'=>'Private / Desert','description'=>'From the Atlas foothills to a silent desert camp, paced around light, food and craft.','image_url'=>'https://images.unsplash.com/photo-1548013146-72479768bada?auto=format&fit=crop&w=1600&q=88','status'=>'Published','price'=>6900,'accent'=>'#ffb29c','featured'=>true],
            ['title'=>'Islands After Dark','country'=>'Indonesia','days'=>9,'style'=>'Private / Ocean','description'=>'Volcanic mornings, jungle stays and a boat-only stretch of the Flores archipelago.','image_url'=>'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1600&q=88','status'=>'Published','price'=>7600,'accent'=>'#a9e7ff','featured'=>false],
            ['title'=>'Atlas to Ocean','country'=>'Portugal','days'=>7,'style'=>'Private / Coast','description'=>'Lisbon to the Atlantic edge via vineyards, empty beaches and design-led stays.','image_url'=>'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1600&q=88','status'=>'Draft','price'=>5400,'accent'=>'#f2efe7','featured'=>false],
        ];
        foreach($journeys as $j){ $j['slug']=Str::slug($j['title']); Journey::updateOrCreate(['slug'=>$j['slug']],$j); }
        $journals=[
            ['title'=>'Why northern light feels different when nobody is watching.','excerpt'=>'A quiet field note from winter roads in the far north.','body'=>'There is a different quality to darkness when the nearest light is fifty kilometres away. The landscape slows, then the sky takes over.','published_at'=>'2026-09-18','status'=>'Published','image_url'=>'https://images.unsplash.com/photo-1531366936337-7c912a4589a7?auto=format&fit=crop&w=1200&q=85'],
            ['title'=>'A field guide to sleeping in the desert.','excerpt'=>'What makes a desert camp feel considered instead of staged.','body'=>'Wind, shade, linen and a long table under a clean sky. The best camps disappear into the landscape.','published_at'=>'2026-08-04','status'=>'Published','image_url'=>'https://images.unsplash.com/photo-1509316785289-025f5b846b35?auto=format&fit=crop&w=1200&q=85'],
            ['title'=>'Three quiet mornings in Kyoto.','excerpt'=>'Notes on rain, tea and arriving before the city wakes.','body'=>'Start with the alleys, not the landmarks. Kyoto rewards a slow first hour.','published_at'=>'2026-06-22','status'=>'Published','image_url'=>'https://images.unsplash.com/photo-1492571350019-22de08371fd3?auto=format&fit=crop&w=1200&q=85'],
            ['title'=>'The architecture of an empty road.','excerpt'=>'Why some routes are worth taking simply because they are there.','body'=>'The route itself can become the memory. We design journeys with enough negative space for that to happen.','published_at'=>null,'status'=>'Draft','image_url'=>'https://images.unsplash.com/photo-1510414842594-a61c69b5ae57?auto=format&fit=crop&w=1200&q=85'],
        ];
        foreach($journals as $p){ $p['slug']=Str::slug($p['title']); Journal::updateOrCreate(['slug'=>$p['slug']],$p); }
        if(Booking::count()===0){
            Booking::create(['reference'=>'BK-1042','name'=>'Maya Chen','email'=>'maya@example.com','destination'=>'Japan','journey_id'=>Journey::where('slug','after-the-rain')->value('id'),'status'=>'Pending','travel_date'=>'2026-10-04','guests'=>2]);
            Booking::create(['reference'=>'BK-1039','name'=>'Daniel Ross','email'=>'daniel@example.com','destination'=>'Iceland','journey_id'=>Journey::where('slug','fire-silence')->value('id'),'status'=>'Confirmed','travel_date'=>'2026-10-02','guests'=>4]);
            Booking::create(['reference'=>'BK-1035','name'=>'Aarav Shah','email'=>'aarav@example.com','destination'=>'Morocco','journey_id'=>Journey::where('slug','red-horizon')->value('id'),'status'=>'Confirmed','travel_date'=>'2026-10-06','guests'=>2]);
        }
    }
}