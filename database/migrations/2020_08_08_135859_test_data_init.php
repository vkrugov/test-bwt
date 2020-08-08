<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TestDataInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('user')->insert([
            ['id' => 1, 'name' => 'test', 'email' => 'test1@example.com', 'password' => '$2y$10$UR9I0mbSCOjT4YaTh/bLX.feVy7oLJslWEpbzdiR0Z0KyKSKGUyCC', 'created_at' => Carbon::parse(time())->format('Y-m-d H:i:s')],
            ['id' => 2, 'name' => 'test', 'email' => 'test2@example.com', 'password' => '$2y$10$UR9I0mbSCOjT4YaTh/bLX.feVy7oLJslWEpbzdiR0Z0KyKSKGUyCC', 'created_at' => Carbon::parse(time())->format('Y-m-d H:i:s')],
            ['id' => 3, 'name' => 'test', 'email' => 'test3@example.com', 'password' => '$2y$10$UR9I0mbSCOjT4YaTh/bLX.feVy7oLJslWEpbzdiR0Z0KyKSKGUyCC', 'created_at' => Carbon::parse(time())->format('Y-m-d H:i:s')],
            ['id' => 4, 'name' => 'test', 'email' => 'test4@example.com', 'password' => '$2y$10$UR9I0mbSCOjT4YaTh/bLX.feVy7oLJslWEpbzdiR0Z0KyKSKGUyCC', 'created_at' => Carbon::parse(time())->format('Y-m-d H:i:s')],
        ]);

        DB::table('country')->insert([
           ['id' => 1, 'name' => 'Canada'],
           ['id' => 2, 'name' => 'USA']
        ]);

        DB::table('company')->insert([
            ['id' => 1, 'name' => 'Google', 'country_id' => 1],
            ['id' => 2, 'name' => 'Apple', 'country_id' => 1],
            ['id' => 3, 'name' => 'Amazon', 'country_id' => 2]
        ]);

        DB::table('company_user')->insert([
            ['user_id' => 1, 'company_id' => 1, 'connected_at' => Carbon::parse(time())->format('Y-m-d H:i:s')],
            ['user_id' => 2, 'company_id' => 1, 'connected_at' => Carbon::parse(time())->format('Y-m-d H:i:s')],
            ['user_id' => 2, 'company_id' => 2, 'connected_at' => Carbon::parse(time())->format('Y-m-d H:i:s')],
            ['user_id' => 3, 'company_id' => 3, 'connected_at' => Carbon::parse(time())->format('Y-m-d H:i:s')],
            ['user_id' => 4, 'company_id' => 3, 'connected_at' => Carbon::parse(time())->format('Y-m-d H:i:s')],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('company_user')->delete();
        DB::table('company')->delete();
        DB::table('country')->delete();
        DB::table('user')->delete();
    }
}
