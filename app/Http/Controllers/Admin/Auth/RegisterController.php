<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = new User();
        $data->name = $request->get('name');
        $data->role_id = $request->get('role_id');
        $data->email = $request->get('email');
        $data->password = Hash::make($request->get('password'));
        $data->created_at = date("Y-m-d H:i:s");
        $data->save();

        $update = [
            'created_by' => $data->id,
        ];

        User::where('id', $data->id)->update($update);

        return redirect()->route('admin.login')->with('message', 'You are Register Sucessfully.');
    }
}
