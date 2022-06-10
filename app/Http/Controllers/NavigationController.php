<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Navigation;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_navigation_data = Navigation::all();
        return view('admin.navigation.index', compact('all_navigation_data'));
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
            'name' => 'required|unique:navigations',
            'icon' => 'required',
            'route' => 'required|unique:navigations',
        ]);

        Navigation::create($request->except('_token') + ['created_at' => Carbon::now()]);

        return redirect()->route('navigation.index')->with('success', 'Data upload successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function show(Navigation $navigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function edit(Navigation $navigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Navigation $navigation)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'route' => 'required',
        ]);

        $navigation->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        return redirect()->route('navigation.index')->with('success', 'Data update successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Navigation $navigation)
    {
        $users = User::all();

        foreach($users as $user)
        {
            $permissions = [];
            foreach(json_decode($user->permission, true) as $permission)
            {
                if($permission != $navigation->id)
                {
                    $permissions[] = $permission;
                }
            }
            $user->permission = json_encode($permissions);
            $user->save();
       }

       foreach(UserRole::all() as $role)
       {

        $array = json_decode($role->permission);
        $perm = [];
        if($navigation->id == 1)
                                 {
            unset($array[0]);
         }
         else
         {
            $number = $navigation->id - 1;
            unset($array[$number]);
         }
            foreach($array as $key => $value)
            {
                $perm[] = $value;
            }

            $role->permission = $perm;
            // $user->save();
            $role->save();
        }

        $navigation->delete();

        return back()->with('danger', 'data delete successfully');
    }
}
