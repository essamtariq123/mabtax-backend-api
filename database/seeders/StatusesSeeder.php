<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'New',
            'In Progress',
            'Completed',
            'Callback',
            'Payment Due',
            'Stage 1',
            'Stage 2',
            'Stage 3'
        ];

        foreach($statuses as $status) {

            $lower = Str::lower($status);

            Status::create([
                'name' => $status,
                'slug' => Str::slug($lower, '-')
            ]);
        }
    }
}
