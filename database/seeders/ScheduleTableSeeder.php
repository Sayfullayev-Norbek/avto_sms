<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Har daqiqada bajariladi',
                'frequency' => 'everyMinute',
            ],
            [
                'name' => 'Har besh daqiqada bajariladi',
                'frequency' => 'everyFiveMinutes'
            ],
            [
                'name' => 'Har o\'n daqiqada bajariladi',
                'frequency' => 'everyTenMinutes'
            ],
            [
                'name' => 'Har o\'ttiz daqiqada bajariladi',
                'frequency' => 'everyThirtyMinutes'
            ],
            [
                'name' => 'Har soatda bajariladi',
                'frequency' => 'hourly'
            ],
            [
                'name' => 'Har soatning ma\'lum bir daqiqasida bajariladi. Masalan: har soatning 15-daqiqasida bajariladi',
                'frequency' => 'hourlyAt',
                'params' => '17'
            ],
            [
                'name' => 'Har kuni bajariladi',
                'frequency' => 'daily'
            ],
            [
                'name' => "Har kuni ma'lum bir vaqtda bajariladi. Masalan: har kuni 13:00 da bajariladi",
                'frequency' => 'hourlyAt',
                'params' => '13:00'
            ],
            [
                'name' => 'Har haftada bajariladi',
                'frequency' => 'weekly'
            ],
            [
                'name' => "Har haftaning ma'lum bir kunida va vaqtda bajariladi. Masalan: har dushanba kuni 8:00 da bajariladi",
                'frequency' => 'weeklyOn',
                'params' => "1, 8:00"
            ],
            [
                'name' => 'Har oyda bajariladi',
                'frequency' => 'monthly'
            ],
            [
                'name' => "Har oyning ma'lum bir kunida va vaqtda bajariladi. Masalan: har oyning 4-kunida 15:00 da bajariladi",
                'frequency' => 'monthlyOn',
                'params' => "4, 15:00"
            ],
            [
                'name' => 'Har yilda bajariladi',
                'frequency' => 'yearly',
            ]
        ];

        foreach ($data as $key => $value) {
            Schedule::create($value);
        }
    }
}
