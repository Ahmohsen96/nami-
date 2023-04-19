<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfileController extends Controller
{
    public function index($id)
    {
        try {
            $profile = User::findOrFail($id);
            // $posts->views = $posts->views + 1;
            $profile->save();
            return response()->json([
                'success' => true,
                'profile' => $profile
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

}
