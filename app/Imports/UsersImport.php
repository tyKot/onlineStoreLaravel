<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;


class UsersImport implements ToModel, WithHeadingRow
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'surname' => $row['familiia'],
            'first_name' => $row['imia'],
            'patronymic' => $row['otcestvo'],
            'municipality' => $row['municipalnoe_obrazovanie'],
            'locality' => $row['naselennyi_punkt'],
            'school' => $row['skola'],
            'login' => $row['login'],
            'email' => $row['pocta'],
            'password' => Hash::make($row['parol']),
        ]);
    }

}
