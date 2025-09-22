<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Christian Cassas',
            'email' => 'chris_ccc68@yahoo.com.pe',
            'password' => bcrypt('123456789*'),
            'dni'=> '7205869',
            'phone' => '964868233',
            'address'=> 'calle falsa 123'
        ])->assignRole('Doctor');
    }
}
