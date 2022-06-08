<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Priority;
use App\Models\UserRole;
use App\Models\Department;
use Illuminate\Http\Request;
use Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.ticket.index',[
            'tickets' => Ticket::latest()->get(),
            'status' => Status::orderBy('name','ASC')->get(),
            'priority' => Priority::all(),
            'roles' => UserRole::all(),
            'department' => Department::all(),
            'users' => User::all(),
        ]);
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
        Ticket::create($request->except('_token') + ['created_at' => Carbon::now()]);

        return redirect()->route('ticket.index')->withSuccess('Created Successfully');
    }
    //create customer ticket method
    public function customer_ticket(Request $request){
        Ticket::create($request->except('_token') + ['created_at' => Carbon::now(), 'customer' => Auth::id()]);
        
        return redirect()->route('ticket.index')->withSuccess('Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        return redirect()->route('ticket.index')->withSuccess('Upddated Successfully');
    }

    public function customer_ticket_update(Request $request, $id){
        Ticket::find($id)->update([
            'subject' => $request->subject,
            'department' => $request->department,
            'ticket_body' => $request->ticket_body,
        ]);

        return redirect()->route('ticket.index')->withSuccess('Upddated Successfully');
    }

    public function customer_ticket_delete(Request $request, $id){
        Ticket::find($id)->delete();
        return redirect()->route('ticket.index')->withSuccess('Delete Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('ticket.index')->withDanger('Deleted Successfully');
    }


    public function get_users(Request $request)
    {
        $show_users = User::where('role_id', $request->role_id)->get(['id', 'name']);

        $view = view('includes.user_dropdown', compact('show_users'));
        $data = $view->render();
        return response()->json(['data' => $data]);

    }

    public function edit_users(Request $request)
    {
        $show_users = User::where('role_id', $request->role_id)->get(['id', 'name']);

        $view = view('includes.user_dropdown', compact('show_users'));
        $data = $view->render();
        return response()->json(['data' => $data]);

    }
}
