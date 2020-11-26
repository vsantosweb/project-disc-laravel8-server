<?php

namespace App\Imports;

use App\Models\Disc\DiscCategory;
use App\Models\Disc\DiscCombination;
use App\Models\Disc\DiscProfile;
use App\Models\Disc\DiscReport;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class DiscProfilesImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {


        foreach ($rows as $row => $value) {

            $discProfiles = $rows[$row][4];
            $discCategory = $rows[$row][5];

            if (!is_null($discProfiles)) {

                $profile = DiscProfile::firstOrCreate([
                    'name' => $discProfiles,
                    'slug' => Str::slug($discCategory)
                ]);
            }

            if (!is_null($discCategory)) {
                $category = DiscCategory::firstOrCreate([
                    'name' => $discCategory,
                    'slug' => Str::slug($discCategory)
                ]);
            }

            DiscCombination::firstOrCreate([
                'code' => $value[0] . $value[1] . $value[2] . $value[3],
                'disc_profile_id' => $profile->id,
                'disc_category_id' => $category->id
            ]);

            $slugName = Str::slug($profile->name . ' ' .  $category->name);
            $relatoryFile = public_path() . DIRECTORY_SEPARATOR . 'relatorios' . DIRECTORY_SEPARATOR . $slugName . '.json';

            if (file_exists($relatoryFile)) {

                $report = json_decode(file_get_contents($relatoryFile), true);

                DiscReport::firstOrCreate(
                ['name' => $profile->name . ' ' .  $category->name],
                [
                    'code' => $value[0] . $value[1] . $value[2] . $value[3],
                    'slug' => $slugName,
                    'disc_profile_id' => $profile->id,
                    'disc_category_id' => $category->id,
                    'metadata' => $report
                ]);
            }
        }
    }
}
