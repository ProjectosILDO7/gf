<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class AlterarPasswordController extends Controller
{
    public function sendResetLink(Request $request){
        $request->validate(['email'=>'required|email']);
        $status = Password::sendResetLink($request->email);
        return $status === Password::PASSWORD_RESET
                            ? response()->json(['status' => __($status)])
                            : response()->json(['email'=> __($status)], 422);
    }
}
