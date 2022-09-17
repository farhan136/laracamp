<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        //input camps
        $camps = array(
            [
                'title'=>'Laravel 9 Beginner',
                'slug'=>'laravel-9-beginner',
                'price'=>150000,
                'created_at'=>date('Y-m-d H:i:s')
            ],
            [
                'title'=>'Node JS Beginner',
                'slug'=>'node-js-beginner',
                'price'=>150000,
                'created_at'=>date('Y-m-d H:i:s')
            ],
            [
                'title'=>'Laravel 9 Intermediate',
                'slug'=>'laravel-9-intermediate',
                'price'=>250000,
                'created_at'=>date('Y-m-d H:i:s')
            ],
        );

        foreach($camps as $camp){
            DB::table('camps')->insert([
                'title' => $camp['title'],
                'slug' => $camp['slug'],
                'price' => $camp['price'],
                'created_at'=>$camp['created_at']
            ]);
        }
        //end input camps

        //input benefit
        $benefits = array(
            [
                'camp_id'=>1,
                'name'=>'Mudah dipelajari',
                'created_at'=>date('Y-m-d H:i:s')
            ],
            [
                'camp_id'=>1,
                'name'=>'Akses seumur hidup',
                'created_at'=>date('Y-m-d H:i:s')
            ],
            [
                'camp_id'=>1,
                'name'=>'Portofolio keren',
                'created_at'=>date('Y-m-d H:i:s')
            ],
            [
                'camp_id'=>2,
                'name'=>'Mudah dipelajari',
                'created_at'=>date('Y-m-d H:i:s')
            ],
            [
                'camp_id'=>2,
                'name'=>'Akses seumur hidup',
                'created_at'=>date('Y-m-d H:i:s')
            ],
            [
                'camp_id'=>2,
                'name'=>'Portofolio keren',
                'created_at'=>date('Y-m-d H:i:s')
            ],
            [
                'camp_id'=>3,
                'name'=>'Cocok untuk yang sudah berpengalaman',
                'created_at'=>date('Y-m-d H:i:s')
            ],
            [
                'camp_id'=>3,
                'name'=>'Akses seumur hidup',
                'created_at'=>date('Y-m-d H:i:s')
            ],
            [
                'camp_id'=>3,
                'name'=>'Portofolio keren',
                'created_at'=>date('Y-m-d H:i:s')
            ],
        );

        foreach($benefits as $benefit){
            DB::table('camp_benefits')->insert([
                'id_camps' => $benefit['camp_id'],
                'name' => $benefit['name'],
                'created_at'=>$benefit['created_at']
            ]);
        }
        //end input benefit

        //input user
        DB::table('users')->insert([
            'name' => "anshari",
            'email'=>"anshari@yahoo.com",
            'is_admin'=>1,
            'password'=>Hash::make('password'),
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        //end input user
    }
}
