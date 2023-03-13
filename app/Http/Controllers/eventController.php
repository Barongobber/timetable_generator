<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Session;

class eventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function retrieve($id)
    {
        return Event::where('id', $id)->get();
    }

    public function make()
    {
        if(Session::get('user_id'))
        {
            request()->validate([
                'timetable_id' => 'required',
                'content' => 'required',
            ]);
            
            $content = request()->get('content');
            foreach ($content as $value)
            {
                $attribute = explode("-", $value);
                $name = $attribute[0];
                $day = $attribute[1];
                $time = $attribute[2];
                Event::create([
                    'timetable_id' => request('timetable_id'),
                    'name' => $name,
                    'day' => $day,
                    'time' => $time,
                ]);
            }

            return [
                'msg' => 'success'
            ];
        }
        else
        {
            return [
                'msg' => 'fail'
            ];
        }
    }

    public function update()
    {
        $id = request('timetable_id');
        $successDelete = Event::where('timetable_id', $id)->delete();
        return $this->make();
    }

    public function delete($id)
    {
        $success = Event::where('id', $id)->delete();

        return [
            'success' => $success
        ];
    }
}
