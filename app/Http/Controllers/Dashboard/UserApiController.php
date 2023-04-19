<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = User::create($request->all());

        // return response()->json($user, 201);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create($validatedData);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $users = User::findOrFail($id);
            $users->save();
            return response()->json([
                'success' => true,
                'profile' => $users
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
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
    //     $user->update($request->all());

    // return response()->json($user, 200);
    $users = User::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'sometimes|string|max:255',
        'mobile_number' => 'sometimes|unique:users' . $users->id,
        'password' => 'sometimes|string|min:8',
    ]);


    $users->update($validatedData);

    return response()->json($users, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

    return response()->json(null, 204);
    }
}
