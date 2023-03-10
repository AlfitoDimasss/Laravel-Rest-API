<?php

namespace App\Http\Controllers\API;

use App\Helpers\Formatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

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
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required'

            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            $data = User::where('id', '=', $user->id)->get();

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
        $data = User::where('id', '=', $id)->get();
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
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required'
            ]);

            $user = User::findOrFail($id);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            $data = User::where('id', '=', $user->id)->get();

            if ($data) {
                return Formatter::createAPI(200, 'Success Update', $data);
            } else {
                return Formatter::createAPI(400, 'Failed Update');
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
            $user = User::findOrFail($id);
            $data = $user->delete();
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
