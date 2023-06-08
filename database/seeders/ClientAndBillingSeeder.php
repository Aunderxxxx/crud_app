<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Billing;
use Illuminate\Database\Seeder;

class ClientAndBillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 21; $i++) {
            Client::insert([
                [
                    'id' => $i,
                    'name' => 'Aung Myint Myat'. $i,
                    'email' => 'admin@admin'.$i.'.com',
                    'phone' => '09123456'.$i,
                    'address' => 'No 123'
                ],
            ]);

            Billing::insert([
                [
                    'amount' => '100',
                    'due_date' => '2023-06-08',
                    'client_id' => $i,
                    'description' => 'Test'
                ],
            ]);
        }
    }
}
