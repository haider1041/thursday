<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\User;
use App\Area;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        
        $paginate = ($request->get('show')) ? $request->get('show') : 10;
        $schedules = Schedule::orderBy('date', 'DESC')->paginate($paginate);

        $users=User::all();
        foreach($schedules as $schedule)
        {
            foreach($users as $user)
            {
            if($schedule->user_id==$user->id)
            {
            $schedule->user_id=$user->name;
            }
        }
        }
        $areas=Area::all();
        foreach($schedules as $schedule)
        {
            foreach($areas as $area)
            {
            if($schedule->area_id==$area->id)
            {
            $schedule->area_id=$area->name;
            }
        }
        }

        return view('schedules.index',['schedules'=>$schedules,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $areas=Area::all();

        return view('schedules.create',['users'=>$users,'areas'=>$areas, ]);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        


        $schedule=new Schedule();
        $schedule->area_id=request('area');
        $schedule->user_id=request('user');
        $schedule->date=request('date');
        error_log(request('date'));
         $schedule->save();
         emotify('success', 'Your schedule has been saved.');
        return redirect()->route('schedules.index');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(schedule $schedule)
    {
        $users=User::all();
        $areas=Area::all();
               return view('schedules.edit',['schedules'=>$schedule,'users'=>$users,'areas'=>$areas]);

    }

        public function update(Request $request, Schedule $schedule)
    {
        

        error_log($request->name);

        $schedules=Brand::find($schedule->id);
        $schedules->name=$request->name;
        $schedules->name=$request->area;
        $schedules->name=$request->user;

        $schedules->save();
        
        error_log('accccccccccc');

        emotify('success', 'Your neenenenenenebrand has been saved.');
        return redirect()->route('brands.index');
    }

    public function destroy($id)
    {
        error_log($id);
        $schedule = Schedule::find($id);
        $schedule->delete();
        emotify('success', 'Your schedule has been deleted.');


        return redirect('/schedules');
    }
}