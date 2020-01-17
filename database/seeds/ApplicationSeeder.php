<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // South Korea
        $mapId = DB::table('maps')->insertGetId([
            'url'            => 'https://www.google.com/maps/d/u/0/embed?mid=1ad3FuHMsh7eKsfVUcCZoUBT4XBJt0ZKb',
            'name'           => 'South Korea',
            'suggested_days' => 12.0,
            'details'        => 'Rich text details about a trip in South Korea',
            'created_by'     => env('ADMIN_NAME'),
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        $asiaId = DB::table('tags')->insertGetId([
            'name'       => 'Asia',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $asiaId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $southKoreaId = DB::table('tags')->insertGetId([
            'name'       => 'South Korea',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $southKoreaId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $seoulId = DB::table('tags')->insertGetId([
            'name'       => 'Seoul',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $seoulId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $busanId = DB::table('tags')->insertGetId([
            'name'       => 'Busan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $busanId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $gyeongjuId = DB::table('tags')->insertGetId([
            'name'       => 'Gyeongju',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $gyeongjuId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // -------------------------------------------------------
        // Taiwan
        $mapId = DB::table('maps')->insertGetId([
            'url'            => 'https://www.google.com/maps/d/u/0/embed?mid=1db9p887Z_zarX4rUcs6B1i2yllZ771Iv',
            'name'           => 'Taiwan',
            'suggested_days' => 10.0,
            'details'        => 'Rich text details about a trip in Taiwan',
            'created_by'     => env('ADMIN_NAME'),
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $asiaId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $taipeiId = DB::table('tags')->insertGetId([
            'name'       => 'Taipei',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $taipeiId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $tarokoId = DB::table('tags')->insertGetId([
            'name'       => 'Taroko Gorge',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $tarokoId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $kaohsiungId = DB::table('tags')->insertGetId([
            'name'       => 'Kaohsiung',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $kaohsiungId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        //-----------------------------------------------
        // Egypt
        $mapId = DB::table('maps')->insertGetId([
            'url'            => 'https://www.google.com/maps/d/u/0/embed?mid=1N7jIH0BcM7kVnPlCl-uZw982zTTL0C_j',
            'name'           => 'Egypt',
            'suggested_days' => 12.0,
            'details'        => 'Rich text details about a trip in Egypt',
            'created_by'     => env('ADMIN_NAME'),
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        $africaId = DB::table('tags')->insertGetId([
            'name'       => 'Africa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $africaId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $id = DB::table('tags')->insertGetId([
            'name'       => 'Cairo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $id = DB::table('tags')->insertGetId([
            'name'       => 'Luxor',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $id = DB::table('tags')->insertGetId([
            'name'       => 'Aswan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $id = DB::table('tags')->insertGetId([
            'name'       => 'Abu Simbel',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('map_tag')->insert([
            'map_id'     => $mapId,
            'tag_id'     => $id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
