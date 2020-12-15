<?php

namespace App\Imports;

use App\Models\Respondent\Respondent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

class ContactsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){

           $respondent = Respondent::firstOrCreate([
                'name'=> $row[0],
                'customer_id' => 1,
                'respondent_list_id' => 3,
                'uuid' => Str::uuid(),
                'email' => $row[1]
            ]);

            echo  $respondent->email;
            echo count( $respondent->all()). ' Importados';
        }
    }
}
