<?php

namespace Database\Seeders;

use App\Imports\BeneficiairePnsImport;
use App\Models\User;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = public_path('file_user.xlsx');
        $data = Excel::toArray(new BeneficiairePnsImport, $file);

        foreach ($data[0] as $item) {

            $defaultEmail = strtolower(str_replace(' ', '', $item[1])) . '@example.com';

            User::create([
                'name' => strtoupper($item[1]),
                'telephone' => Str::length($item[3]) == 9 ? '0'.$item[3] : $item[3],
                'email' => $defaultEmail,
                'password' => Hash::make('password')
            ]);
        }


    }
}
