<?php

namespace App\Http\Controllers\Api\v1\Client\Customer;

use App\Http\Controllers\Controller;
use App\Models\Respondent\RespondentList;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerRespondentListController extends Controller
{

    public function __construct(RespondentList $respondentList)
    {
        $this->respondentList = $respondentList;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->outputJSON(auth()->user()->respondentLists()->with('respondents')->get(), '', false);
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

            $newRespondentList = auth()->user()->respondentLists()->firstOrcreate([
                'uuid' => Str::uuid(),
                'name' => $request->name,
                'description' => $request->description,
                'settings' => $request->settings
            ]);

            return $this->outputJSON($newRespondentList, '', false);
        } catch (\Exception $e) {

            return $this->outputJSON('', $e->getMessage(), false);
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
        $respondentList = $this->respondentList->findOrFail($id)->with('respondents')->first();
        return $this->outputJSON($respondentList, 'Success', false);
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
        $respondentList = $this->respondentList->findOrFail($id);

        try {
            $respondentList->update($request->all());

            return $this->outputJSON($respondentList, 'Success', false);
        } catch (\Exception $e) {
            return $this->outputJSON('', $e->getMessage(), true, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $respondentList = $this->respondentList->findOrFail($id);

        try {
            $respondentList->delete();

            return $this->outputJSON($respondentList, 'Success', false);
        } catch (\Exception $e) {
            return $this->outputJSON('', $e->getMessage(), true, 500);
        }
    }
}
