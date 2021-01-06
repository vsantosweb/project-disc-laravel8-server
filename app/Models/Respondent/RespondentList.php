<?php

namespace App\Models\Respondent;

use App\Imports\ContactsImport;
use App\Models\Customer\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class RespondentList extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'uuid', 'name', 'description', 'settings'];
    protected $casts = ['settings' => 'object'];

    public function respondents()
    {
        return $this->hasMany(Respondent::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function uploadFile($base64File)
    {
        try{
            $fileBin = base64_decode($base64File);
        $fileName = uniqid() . '.xlsx';
        $filePath = auth()->user()->home_dir . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . $fileName;
        Storage::disk('public')->put($filePath, $fileBin);
        $filePath = Storage::disk('public')->path($filePath);
        Excel::import(new ContactsImport($this), $filePath);

        return 'successs';
        
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
