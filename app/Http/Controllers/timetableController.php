<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use App\Models\User;
use Facade\FlareClient\Time\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class timetableController extends Controller
{
    public function index()
    {
        if (Session::get('user_id') != null)
        {
            $data =  DB::table('timetables')
                ->where('user_id', Session::get('user_id'))
                ->get();
            if (count($data) == 0)
            {
                return [
                    'msg' => 'you don\'t have a data yet'
                ];
            }
            else
            {
                return $data;
            }
        }
        else
        {
            return [
                'msg' => 'you are not allowed to see data'
            ];
        }
    }

    public function retrieve(Timetable $timetable)
    {
        if ($timetable->user_id == Session::get('user_id'))
        {
            return DB::table('timetables')
                ->Join('events','timetables.id','=','events.timetable_id')
                ->where('events.timetable_id', $timetable->id)
                ->get();
        }
        else
        {
            return [
                'msg' => 'this is not your data'
            ];
        }
    }

    public function create()
    {
        if (Session::get('user_id') != null)
        {
            request()->validate([
                'title' => 'required',
                'semester' => 'required'
            ]);
            
            return Timetable::create([
                'user_id' => Session::get('user_id'),
                'title' => request('title'),
                'semester' => request('semester')
            ]);

        }
        else
        {
            return [
                'msg' => 'failed to create'
            ];
        }
    }
    
    public function update(Timetable $timetable)
    {
        if ($timetable->user_id == Session::get('user_id'))
        {
            request()->validate([
                'title' => 'required',
                'semester' => 'required'
            ]);
    
            $success =  Timetable::where('id', $timetable->id)->update([
                'title' => request('title'),
                'semester' => request('semester'),
            ]);
            return [
                'success' => $success
            ];
        }
        else
        {
            return [
                'msg' => 'this is not your data'
            ];
        }
    }

    public function delete(Timetable $timetable)
    {
        
        if ($timetable->user_id == Session::get('user_id'))
        {
            $success = Timetable::where('id', $timetable->id)->delete();
            return [
                'msg' => $success
            ];
        }
        else
        {
            return [
                'msg' => 'failed'
            ];
        }
    }
}
