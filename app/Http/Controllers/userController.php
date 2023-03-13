<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{

    public function check($email)
    {
        $result = User::where('email', $email)->get();
        if (count($result)>0)
        {
            return $result;
        }
        else
        {
            return [
                'msg' => 'email does not exist'
            ];
        }
    }

    public function retrieve($id)
    {
        // echo Session::get('user_id');
        if( $id == Session::get('user_id'))
        {
            return User::where('id', $id)->get();
        }
        else {
            return [
                'message' => 'you can\'t see another data'
            ];
        }
    }

    public function register()
    {
        request()->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $success = User::create([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')) 
        ]);
        
        return [
            'success' => $success
        ];
    }

    public function update($id)
    {
        
        if ($id == Session::get('user_id'))
        {
            request()->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
            ]);
    
            $success = User::where('id', $id)->update([
                'name' => request('name'),
                'username' => request('username'),
                'email' => request('email')
            ]);
    
            return [
                'msg' => $success
            ];
        }
        else 
        {
            return [
                'msg' => "can\'t update others' data"
            ];
        }
    }
}
