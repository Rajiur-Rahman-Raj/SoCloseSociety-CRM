<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Priority;
use App\Models\UserRole;
use App\Models\Department;
use App\Models\Ticket_reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AgentMailSend;
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

        // $loged_in_user_id = Auth::user()->role_id;
        
        // if($loged_in_user_id == 1){
        //     $tickets = Ticket::latest()->get();
        // }else{
        //     $tickets = Ticket::where('customer', Auth::id())->latest()->get();
        // }
        
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
        return view('admin.ticket.admin_ticket_show', compact('ticket'));
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
        $ticket_id = $request->customer;
        $status = $request->status;
        $priority = $request->priority;
        $department = $request->department;
        $ticket_subject = $request->subject;
        $agent_id = $request->agent_id;

        foreach ($request->agent_email as $email) {
            Mail::to($email)->send(new AgentMailSend($ticket_id, $status, $priority, $department, $ticket_subject, $agent_id));
        }

        $ticket->update($request->except('_token') + ['updated_at' => Carbon::now(), 'agent_id' => json_encode($request->agent_id)]);

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

    public function customer_ticket_show($id){
        $single_ticket_details = Ticket::find($id);
        return view('admin.ticket.show', compact('single_ticket_details'));
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

    public function ticket_reply($id){

        $all_reply_individual_tickets = Ticket_reply::where('ticket_id', $id)->orderBy('id', 'DESC')->get(); // also use latest()

        return view('admin.ticket.reply', compact('id','all_reply_individual_tickets'));
    }

    public function ticket_reply_store(Request $request){

        Ticket_reply::insert([
            'ticket_id' => $request->ticket_id,
            'user_id' => Auth::id(),
            'reply' => $request->reply,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', 'replay success');
    }
}
