<?php

namespace App\Http\Controllers\API;

use App\Helpers\Formatter;
use App\Http\Controllers\Controller;
use App\Models\Letter;
use Exception;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Letter::all();

        if ($data) {
            return Formatter::createAPI(200, 'Success', $data);
        } else {
            return Formatter::createAPI(400, 'Failed');
        }
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
            $request->validate([
                'user_id' => 'required',
                'letter_category_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'effective_date' => 'required',
                'end_date' => 'required'
            ]);

            $letter = Letter::create([
                'user_id' => $request->user_id,
                'letter_category_id' => $request->letter_category_id,
                'name' => $request->name,
                'description' => $request->description,
                'effective_date' => $request->effective_date,
                'end_date' => $request->end_date
            ]);

            $data = Letter::where('id', '=', $letter->id)->get();

            if ($data) {
                return Formatter::createAPI(200, 'Success', $data);
            } else {
                return Formatter::createAPI(400, 'Failed');
            }
        } catch (Exception $e) {
            return Formatter::createAPI(400, 'Failed', $e);
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
        $data = Letter::where('id', '=', $id)->get();
        if ($data) {
            return Formatter::createAPI(200, 'Success', $data);
        } else {
            return Formatter::createAPI(400, 'Failed');
        }
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
        try {
            $request->validate([
                'user_id' => 'required',
                'letter_category_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'effective_date' => 'required',
                'end_date' => 'required'
            ]);

            $letter = Letter::findOrFail($id);

            $letter->update([
                'user_id' => $request->user_id,
                'letter_category_id' => $request->letter_category_id,
                'name' => $request->name,
                'description' => $request->description,
                'effective_date' => $request->effective_date,
                'end_date' => $request->end_date
            ]);

            $data = Letter::where('id', '=', $letter->id)->get();

            if ($data) {
                return Formatter::createAPI(200, 'Success', $data);
            } else {
                return Formatter::createAPI(400, 'Failed');
            }
        } catch (Exception $e) {
            return Formatter::createAPI(400, 'Failed', $e);
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
        try {
            $letter = Letter::findOrFail($id);
            $data = $letter->delete();
            if ($data) {
                return Formatter::createAPI(200, 'Success Delete Data');
            } else {
                return Formatter::createAPI(400, 'Failed');
            }
        } catch (Exception $e) {
            return Formatter::createAPI(400, 'Failed', $e);
        }
    }
}
