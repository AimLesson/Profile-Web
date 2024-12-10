<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institusi;

class InstitusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example data for institusi
        Institusi::create([
            'picture' => 'institusi/stikom.jpeg', // Adjust with your actual image path
            'name' => 'STIKOM Yos Sudarso',
            'address' => 'Jl. Example No.123, Kota Yos',
            'phone' => '08123456789',
        ]);

        Institusi::create([
            'picture' => 'institusi/stikom.jpeg', // Adjust with your actual image path
            'name' => 'Another Institution',
            'address' => 'Jl. Another St. No.456, Kota Another',
            'phone' => '08234567890',
        ]);
        
        Institusi::create([
            'picture' => 'institusi/stikom.jpeg', // Adjust with your actual image path
            'name' => 'Another Institution',
            'address' => 'Jl. Another St. No.456, Kota Another',
            'phone' => '08234567890',
        ]);

        Institusi::create([
            'picture' => 'institusi/stikom.jpeg', // Adjust with your actual image path
            'name' => 'Another Institution',
            'address' => 'Jl. Another St. No.456, Kota Another',
            'phone' => '08234567890',
        ]);

        Institusi::create([
            'picture' => 'institusi/stikom.jpeg', // Adjust with your actual image path
            'name' => 'Another Institution',
            'address' => 'Jl. Another St. No.456, Kota Another',
            'phone' => '08234567890',
        ]);
    }
}
