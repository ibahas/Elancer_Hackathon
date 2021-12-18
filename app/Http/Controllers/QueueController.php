<?php

namespace App\Http\Controllers;

use App\Models\queue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("DD");
        //
        $newQueue = [
            'user_id' => Auth::id(),
            'status' => 'open',
            'category_id' => $request->category_id,
            'no' => queue::whereDate('created_at', Carbon::today())
                ->orderBy('no')->count() +  1,
        ];
        // dd();
        $queues = queue::where('status', 'open')
            ->whereDate('created_at', Carbon::today())
            ->orderBy('id')->with('category')->get();
        $var = 0;
        // dd($queues);
        foreach ($queues as $key => $queue) {
            # code...
            $var += $queue->category->time;
        }
        // dd($var);

        queue::create($newQueue);

        
        return redirect()->route('/')->with(['success' => trans('site.queue_no') . ' ' .
            $newQueue['no'] . ' ' .
            trans('site.remaining_time') . ' ' .
            $var . ' ' . trans('site.minute\s')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function show(queue $queue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function edit(queue $queue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, queue $queue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function destroy(queue $queue)
    {
        //
    }
}
