<?php

namespace App\Http\Controllers;

use App\Model\Babies\Baby;
use App\Model\BabyConfig\BabyConfig;
use App\Model\Logs\DrinkLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BabyLogsController extends Controller
{
    protected $STCODE  ="LRA052223";

    public function create()
    {
        $baby_code =  $this->STCODE;

        $all_feeds =  DrinkLog::where('baby_code',$baby_code)->orderBy('id','desc')->limit(5)->get();
        $last_feed =  DrinkLog::where('baby_code',$baby_code)->orderBy('id','desc')->first();
        $baby_info = Baby::where('baby_code',$baby_code)->orderBy('id','desc')->first();

        $baby_config = BabyConfig::where('baby_code',$baby_code)->first();


        return view('logs.create',compact('all_feeds','last_feed','baby_info','baby_config'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DrinkLog::create(['date_time'=>Carbon::now(),'baby_code'=>$this->STCODE]);

        return redirect()->back()->with('with_success', "Log Successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($logId)
    {
        $drink_log = DrinkLog::findorfail($logId);
        $drink_log->delete();
        return redirect()->back()->with('with_success', "Deleted Successfully!");
    }
}
