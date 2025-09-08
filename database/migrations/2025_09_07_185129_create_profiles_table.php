<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        foreach (['ADMIN', 'CLIENT'] as $name) {
            DB::table('profiles')->insert([
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('profile_id')->after('id');
            $table->foreign('profile_id')->references('id')->on('profiles');
        });

        $adminProfile = DB::table('profiles')->where('name', 'ADMIN')->first();
        DB::table('users')->insert([
            'name' => 'Admin',
            'profile_id' => $adminProfile->id,
            'email' => 'admin@system.com',
            'password' => Hash::make(config('app.user_admin_password')),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
