<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Ticket;
use App\Models\Ticket_reply;
use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\User;
use Carbon\Carbon;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_role_data = UserRole::all();
        $all_user_data = User::all();
        return view('admin.user.index', compact('user_role_data', 'all_user_data'));
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
      $request->validate([
            'name' => 'required',
            'phone' => 'numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_id' => 'required',
            // 'permission' => 'required',
        ]);

        User::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'permission' => UserRole::find($request->role_id)->permission,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('users.index')->with('success', 'Data upload successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $all_user_data = User::find($id);
        return view('admin.user.show', compact('all_user_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $request->validate([
            'name' => 'required',
            'phone' => 'numeric',
            'email' => 'required|email',
            'role_id' => 'required',
            'permission' => 'required',
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'permission' => json_encode($request->permission),
            'email' => $request->email,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('users.index')->with('success', 'Data update successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::where('customer', $id)->delete();
        Ticket_reply::where('user_id', $id)->delete();

        foreach(Department::all() as $dept){
            $users = [];
            foreach(json_decode($dept->user_id) as $user){
                if($user != $id)
                {
                    $users[] = $user;
                }
            }
            $dept->user_id = json_encode($users);
            $dept->save();
        }

        foreach(Ticket::all() as $ticket){
            $users = [];
            foreach(json_decode($ticket->agent_id) as $user){
                if($user != $id)
                {
                    $users[] = $user;
                }
            }
            $ticket->user_id = json_encode($users);
            $ticket->save();
        }

        User::find($id)->delete();
        return back()->with('danger', "Data Delete Succcess");
    }

    // show role permission area
    public function get_role_permission_area(Request $request){

        $role_id  =  $request->role_id;

        $view = view('includes.role_permission', compact('role_id'));
        $data  = $view->render();
        return response()->json(['data' => $data]);
    }
}
