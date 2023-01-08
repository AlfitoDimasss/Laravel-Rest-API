<?php

namespace App\Http\Controllers\API;

use App\Helpers\Formatter;
use App\Http\Controllers\Controller;
use App\Models\LetterCategory;
use Exception;
use Illuminate\Http\Request;

class LetterCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LetterCategory::all();

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
                'letter_category' => 'required'
            ]);

            $letterCategory = LetterCategory::create([
                'letter_category' => $request->letter_category
            ]);

            $data = LetterCategory::where('id', '=', $letterCategory->id)->get();

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
        $data = LetterCategory::where('id', '=', $id)->get();

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
                'letter_category' => 'required'
            ]);

            $letterCategory = LetterCategory::findOrFail($id);

            $letterCategory->update([
                'letter_category' => $request->letter_category
            ]);

            $data = LetterCategory::where('id', '=', $letterCategory->id)->get();

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
            $letterCategory = LetterCategory::findOrFail($id);
            $data = $letterCategory->delete();
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
