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

            Respondent::firstOrCreate([
                'name'=> $row[1],
                'customer_id' => 1,
                'respondent_list_id' => 1,
                'uuid' => Str::uuid(),
                'email' => $row[3]
            ]);
        }
    }
}
