<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\queue;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $clients = User::where('role', 'client')->get();
            $categories = Category::latest('id')->get();
            // dd($categories);
            $queues = queue::where('status', 'open')->whereDate('created_at', Carbon::today())
                ->orderBy('id')->get();
            // dd($queues);


            return view('dashboard', compact('clients', 'categories', 'queues'));
        } else {
            $categories = Category::all();

            return view('home', compact('categories'));
        }
    }





    public function update(Request $request)
    {
        # code...

        $user = User::find(Auth::id());

        $request->validate([
            'name' => [
                'required',
                'string',
                'between:2,255',
            ],
            'email' => 'email|unique:users,email,' . $user->id,

        ]);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        return redirect('/');
    }
    public function destroy($id)
    {
        # code...
        $user = User::findorfail($id)->delete();
        // dd($user);

        // $user->delete();
        return redirect('/');
    }

    public function queues()
    {
        # code...
        $queues = queue::all();

        return view('queues', compact('queues'));
    }
}
