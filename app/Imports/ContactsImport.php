<?php

namespace App\Imports;

use App\Models\Respondent\Respondent;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

class ContactsImport implements ToCollection
{
    /**
     * @param Collection $collection
     */

    public function __construct($respondentList)
    {
        $this->respondentList = $respondentList;
    }

    public function collection(Collection $rows)
    {
        $defaultFields = [];
        $customFields = [];

        $columFields = $rows[0];

        for ($i = 0; $i < count($columFields); $i++) {

            $field = str_replace(['-', '_'], '', strtolower($columFields[$i]));
            if (Schema::hasColumn('respondents', $field)) {
                $defaultFields[] =  $field;
            } else {
                $customFields[] = $field;
            }
        }

        foreach ($rows as $row => $value) {

            $test = $value;
            if ($row == 0) continue;
            $defaultInserts = [];

            for ($i = 0; $i < count($defaultFields); $i++) {
                $defaultInserts[$defaultFields[$i]] =  $value[$i];
            }

            $newRespondent = Respondent::firstOrCreate(
                [
                    'uuid' => Str::uuid(),
                    'customer_id' =>  $this->respondentList->customer_id,
                    'respondent_list_id' =>  $this->respondentList->id,
                ],
                $defaultInserts,
            );

            $customValues = array_slice($value->toArray(), count($defaultInserts));
            $newCustomFields = [];
            for ($i = 0; $i < count($customFields); $i++) {
                
                $newCustomFields[$i]['name'] = $customFields[$i];
                $newCustomFields[$i]['key'] = Str::snake( $customFields[$i] );

                if (is_numeric($customValues[$i])) {

                    if ($this->isDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($customValues[$i]))) {
                        $newCustomFields[$i]['type'] = 'date';
                        $newCustomFields[$i]['value'] = $this->isDate(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($customValues[$i]));
                    }
                } else {
                    $newCustomFields[$i]['type'] = 'text';
                    $newCustomFields[$i]['value'] = $customValues[$i];
                }
            }
            $newRespondent->custom_fields = $newCustomFields;
            $newRespondent->save();
        }

    }

    public function isDate($date, $format = 'd-m-Y')
    {
        $d = DateTime::createFromFormat($format, $date->format('d-m-Y'));

        if ($d && $d->format($format) !=  $date->format('d-m-Y')) {
            return false;
        }

        return $d->format('Y-m-d');
    }
}
