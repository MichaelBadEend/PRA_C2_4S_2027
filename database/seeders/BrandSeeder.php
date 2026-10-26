<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            1 => 'BenQ',
            2 => 'Garmin',
            3 => 'TPI Corporation',
            4 => 'Land Pride',
            5 => 'Humminbird',
            6 => 'IOGear',
            7 => 'Kohler',
            8 => 'ProForm',
            9 => 'Grizzly',
            10 => 'Furuno',
            11 => 'DigiTech',
            12 => 'Yamaha',
            13 => 'Samson',
            14 => 'JBL',
            15 => 'Crown Audio',
            16 => 'MTX Audio',
            17 => 'Musica',
            18 => 'DCM Speakers',
            19 => 'AOC',
            20 => 'ALCATEL Mobile Phones',
            21 => 'Huawei',
            22 => 'ZTE',
            23 => 'Motorola',
            24 => 'Palm',
            25 => 'LG Electronics',
            26 => 'Samsung',
            27 => 'Sony',
            28 => 'Pantech',
            29 => 'Citizen',
            30 => 'Aastra Telecom',
            31 => 'RCA',
            32 => 'VTech',
            33 => 'Uniden',
            34 => 'AT&T',
            35 => 'GE',
            36 => 'Toshiba',
            37 => 'Dell',
            38 => 'Fujitsu',
            39 => 'Lenovo',
            40 => 'Apple',
            41 => 'Carl Zeiss',
            42 => 'Kowa',
            43 => 'Pioneer',
        ];

        foreach ($brands as $name) {
            Brand::firstOrCreate(['name' => $name]);
        }
    }
}
