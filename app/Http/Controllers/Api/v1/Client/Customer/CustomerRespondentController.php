<?php

namespace App\Http\Controllers\Api\v1\Client\Customer;

use App\Http\Controllers\Controller;
use App\Models\Respondent\Respondent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerRespondentController extends Controller
{

    public function __construct(Respondent $respondent)
    {
        $this->respondent = $respondent;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->outputJSON(auth()->user()->respondents()->with('discTests','respondentLists')->get(), '', false);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $newRespondent = auth()->user()->respondents()->firstOrcreate([
                'uuid' => Str::uuid(),
                'name' => $request->name,
                'email' => $request->email,
                'custom_fields' => $request->custom_fields,
            ]);

            $newRespondent->respondentLists()->sync([$request->respondent_list_id]);

            return $this->outputJSON($newRespondent->with('respondentLists')->find($newRespondent->id), '', false);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
