<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users       = User::orderBy('created_at','asc')->paginate(10);
        $users_count = $users->count();

        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.index', compact('users', 'users_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    public function indexCustomers()
    {
        $customers       = User::where('user_type','customer')->orderBy('created_at','asc')->paginate(10);
        $customers_count = $customers->count();

        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.user_types_indexes.index_customers', compact('customers', 'customers_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }
    
    public function indexSuppliers()
    {
        $suppliers       = User::where('user_type','supplier')->orderBy('created_at','asc')->paginate(10);
        $suppliers_count = $suppliers->count();

        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.user_types_indexes.index_suppliers', compact('suppliers', 'suppliers_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    public function indexAdmins()
    {
        $admins       = User::where('user_type','admin')->orderBy('created_at','asc')->paginate(10);
        $admins_count = $admins->count();

        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.user_types_indexes.index_admins', compact('admins', 'admins_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    public function indexModerators()
    {
        $moderators       = User::where('user_type','moderator')->orderBy('created_at','asc')->paginate(10);
        $moderators_count = $moderators->count();

        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.user_types_indexes.index_moderators', compact('moderators', 'moderators_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    public function indexActiveUsers()
    {
        $active_users       = User::where('status','active')->orderBy('created_at','asc')->paginate(10);
        $active_users_count = $active_users->count();

        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.user_statuses_indexes.index_active_users', compact('active_users', 'active_users_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    public function indexInactiveUsers()
    {
        $inactive_users       = User::where('status','inactive')->orderBy('created_at','asc')->paginate(10);
        $inactive_users_count = $inactive_users->count();

        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.user_statuses_indexes.index_inactive_users', compact('inactive_users', 'inactive_users_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    public function indexBlockedUsers()
    {
        $blocked_users       = User::where('status','blocked')->orderBy('created_at','asc')->paginate(10);
        $blocked_users_count = $blocked_users->count();

        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.user_statuses_indexes.index_blocked_users', compact('blocked_users', 'blocked_users_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.create');
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'username'  => ['required', 'string', 'max:255', 'unique:users'],
        //     'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // ]);

        $users            = new User;
        $users->username  = $request->username;
        $users->name      = $request->name;
        $users->email     = $request->email;
        $users->password  = bcrypt($request->password);
        // if($request->confirm_password == ""){
        //     return redirect()->back()->with('confirm_password_empty','Please confirm your password!');
        // }
        if($request->confirm_password != $request->password){
            return redirect()->back()->with('confirm_password_not_matching','Password did not match confirmation. Please try again!');
        }
        $users->user_type = $request->user_type;
        $users->phone     = $request->phone;
        $users->gender    = $request->gender;
        $users->save();

        return redirect()->route('users.index')
            ->with(['message' => "($users->username / $users->email) - Added successfully!"]);
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
        //NOTE: in the users "form.blade.php" file admin could update his/her own email but not any other user, and if it happened the app will throw an error in the admin's face (unauthorized action)!

        $User_model = User::findOrFail($id);

        // if(auth()->user()->user_type == "admin" && $User_model->id == auth()->user()->id){ //the signed in admin could update his/her own info
        //     return view('dashboard.users.edit',compact('User_model'));
        // }
        // elseif(auth()->user()->user_type == "admin" && $User_model->user_type == "admin"){ //the signed in admin couldn't update the other admin(s) info, so take the signed in admin to the users index page
        //     return redirect('/dashboard/users');
        // }
        // elseif(auth()->user()->user_type == "admin" && $User_model->user_type != "admin"){ //the signed in admin could update any other users' info except the other admin(s)
        //     return view('dashboard.users.edit',compact('User_model'));
        // }
        // elseif(auth()->user()->user_type == "moderator" && $User_model->id == auth()->user()->id){ //the signed in moderator could only edit her/his own data only!
        //     return view('dashboard.users.edit',compact('User_model'));
        // }
        // elseif(auth()->user()->user_type == "moderator" && $User_model->id != auth()->user()->id){ //when for any other user (not the moderator her/himself!), the moderators are not allowed to do anything else more than "adding" & "showing", so take them to the users index page
        //     return redirect('/dashboard/users');
        // }
        // elseif(auth()->user()->user_type == "supplier"){ //the suppliers are allowed to access the dashboard but only for the products they own (from the front-end & back-end)!
        //     return redirect('/dashboard');
        // }

        if($User_model->id == auth()->user()->id || (auth()->user()->user_type == "admin" && $User_model->user_type != "admin")){
            return view('dashboard.users.edit', compact('User_model'));
        }
        else{
            return redirect()->back();
        }
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
        $users            = User::findOrFail($id);
        $users->username  = $request->username;
        $users->name      = $request->name;
        if($users->id == auth()->user()->id /* && auth()->user()->user_type == "admin" */){
            $users->email = $request->email;
        }
        else{ // elseif($user->id != auth()->user()->id) -> which means the retrieved data doesn't match the signed in (auth()->user()) admin, which also means all the other users except the signed in admin him/her self
            // $users->email != $request->email;
            return redirect()->route('users.index')->with('unauthorized_action', 'Sorry you are not allowed to do this action!');
        }
        $users->user_type = $request->user_type;
        $users->phone     = $request->phone;
        $users->gender    = $request->gender;
        $users->save();

        return redirect()->route('users.index')
            ->with(['message' => "($users->username) - Edited successfully!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('users.index')
            ->with(['message' => "($users->username) - Deleted successfully!"]);
    }

    public function delete()
    {
        $users       = User::orderBy('created_at','asc')->onlyTrashed()->paginate(10);
        $users_count = $users->count();

        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.users.delete',compact('users', 'users_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        $users = User::findOrFail($id);
        return redirect()->route('users.delete')
            ->with(['message' => "($users->username) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        User::where('id', $id)->forceDelete();
        return redirect()->route('users.delete')
            ->with(['message' => 'Permanently deleted successfully!']);
    }

    public function importExportViewUsers(){
        return view('dashboard.users.excel_imports_exports.import_export_file');
    }
 
    public function importUsers(Request $request){
        $rules = [
            'importing_input'          => 'required|mimes:xlsx,xlx,xls',
        ];

        $messages = [
            'importing_input.required' => "You didn't upload an Excel file! Please try again.",
            'importing_input.mimes'    => "The file's extension you uploaded isn't allowed to be chosen! Please try again.",
        ];

        $this->validate($request, $rules, $messages);

        Excel::import(
            new ImportUser, 
            $request->file('importing_input')->store('files')
        );

        return redirect()->back()
            ->with(['imported_file_successfully' => 'Your file has been imported to "Users" successfully!']);
    }

    public function exportUsers(){
        return Excel::download(new ExportUser, Carbon::now()->format('dmys').'_'.'users.xlsx');
            // ->back()->with(['exported_file_successfully' => "Your file has been exported successfully!"]);
    }
}
