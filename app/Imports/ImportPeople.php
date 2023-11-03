<?php

namespace App\Imports;

use App\Models\Person;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;


class ImportPeople implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Person([
            'nombre'=>$row[0],
            'apellido'=>$row[1],
            'dni'=>$row[2],
            'email'=>$row[3],
            'telefono'=>$row[4],
            'domicilio'=>$row[5],
            'localidad'=>$row[6],
            'provincia'=>$row[7]
        ]);
    }
}
