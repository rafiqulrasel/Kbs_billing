<?php

namespace Database\Seeders;

use App\Models\Packages;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Packages::create([
            'name'=>"1 MB Package",
            'Status'=>"1",
            'price'=>"500"
        ]);
        Packages::create([
            'name'=>"2 MB Package",
            'price'=>"700",
            'Status'=>"1"
        ]);
        Packages::create([
            'name'=>"3 MB Package",
            'Status'=>"1",
            'price'=>"800"
        ]);
        Packages::create([
            'name'=>"5 MB Package",
            'Status'=>"0",
            'price'=>"1000"
        ]);
    }
}
