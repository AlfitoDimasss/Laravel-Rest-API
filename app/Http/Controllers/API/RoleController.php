<?php

namespace App\Http\Controllers\API;

use App\Helpers\Formatter;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();

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
                'role' => 'required'
            ]);

            $role = Role::create([
                'role' => $request->role
            ]);

            $data = Role::where('id', '=', $role->id)->get();

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
        $data = Role::where('id', '=', $id)->get();

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
                'role' => 'required'
            ]);

            $role = Role::findOrFail($id);

            $role->update([
                'role' => $request->role
            ]);

            $data = Role::where('id', '=', $role->id)->get();

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
            $role = Role::findOrFail($id);
            $data = $role->delete();
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
