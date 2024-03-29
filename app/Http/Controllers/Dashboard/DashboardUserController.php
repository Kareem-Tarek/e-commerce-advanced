<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\UserAllExport;
use App\Models\ProductDetail;
use App\Models\FinalProduct;

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

        $users             = new User;
        $users->name       = $request->name;
        $users->username   = $request->username;
        $users->email      = $request->email;
        if($request->confirm_password != $request->password){
            return redirect()->back()->with('confirm_password_not_matching','"Password *" did not match "Confirm Password *". Please try again!');
        }
        else{
            $users->password  = bcrypt($request->password);
        }
        $users->user_type  = $request->user_type;
        $users->phone      = $request->phone;
        $users->gender     = $request->gender;
        $users->status     = $request->status;
        $users->updated_at = null;
        $users->save();

        return redirect()->route('users.index')
            ->with(['added_user_message' => "($users->username / $users->email) - Added successfully!"]);
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

        $User_model = User::find($id);

        if($User_model == null){    //if the data (user's ID) is null, which is not found in the DB
            if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){    //"admin" & "moderator" are responsible for existing data and non existing data
                return view('errors.template-customized-error.dashboard.404');
            }
            else/*if(auth()->user()->user_type == "supplier")*/{    //"supplier" isn't responsible or allowed to access existing data and even the non-existing data
                // return redirect()->route('dashboard');
                return redirect()->route('users.edit', auth()->user()->id);
            }
        }
        else{    //if the data (user's ID) is found in the DB
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
            // elseif(auth()->user()->user_type == "supplier" && $User_model->id == auth()->user()->id){ //the signed in suppliers could only edit their own data only! + they could access only the products they own (from the front-end & back-end)!
            //     return view('dashboard.users.edit',compact('User_model'));
            // }
            // elseif(auth()->user()->user_type == "supplier" && $User_model->id != auth()->user()->id){ //when for any other user (not the suppliers their selves!), the suppliers are not allowed to do anything else that is related to users & profiles
            //     return redirect('/dashboard');
            // }

            if($User_model->id == auth()->user()->id || (auth()->user()->user_type == "admin" && $User_model->user_type != "admin")){    //the user who is logged in could access only his/her edit/profile page. Also the admin could access all the other user types edit/profile pages except the other admin(s) ONLY!
                return view('dashboard.users.edit', compact('User_model'));
            }
            else{    //for whoever access te edit/profile page the isn't mentioned in the previous condition (such as "moderator" & "supplier" when they only access the other users' edit/profile page)
                // return redirect()->route('dashboard');
                return redirect()->route('users.edit', auth()->user()->id);
            }
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
        $users = User::findOrFail($id);
        if($users->id == auth()->user()->id){
            $users->name      = $request->name;
            $users->username  = $request->username;
            if($users->id == auth()->user()->id/* || auth()->user()->user_type == "admin" */){
                $users->email = $request->email;
            }
            else{ // elseif($users->id != auth()->user()->id) -> which means the retrieved data doesn't match the signed in (auth()->user()) admin, which also means all the other users except the signed in admin him/her self
                // $users->email != $request->email;
                return redirect()->route('users.index')->with('unauthorized_action', 'Sorry you are not allowed to do this action!');
            }
            $users->user_type = $request->user_type;
            $users->phone     = $request->phone;
            $users->gender    = $request->gender;
            $users->status    = $request->status;
        }
        else{
            $users->user_type = $request->user_type;
            $users->status    = $request->status;
        }
        $users->save();

        return redirect()->route('users.index')
            ->with(['updated_user_message' => "($users->username / $users->email) - Edited successfully!"]);
    }

    public function changePasswordView($id)
    {
        $User_model = User::find($id);
        if($User_model != null && $User_model->id == auth()->user()->id){
            return view('dashboard.users.changePassword', compact('User_model'));
        }
        else{
            // return redirect()->back();
            return redirect()->route('users.changePasswordView', auth()->user()->id);
        }
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user();

        if(!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('old_req_not_matching_db', 'Old password did not match "the Current Password". Please try again!');
        }
        elseif($request->confirm_new_password != $request->new_password) {
            return redirect()->back()->with('confirm_not_matching_new', 'New Password did not match "Confirm Password". Please try again!');
        }
        elseif(Hash::check($request->new_password, $user->password)) {
            return redirect()->back()->with('new_is_matching_old', 'New Password must be different than the old password');
        }
        elseif(Hash::check($request->old_password, $user->password) && $request->old_password != "" && $request->new_password != "") {
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back()->with('password_changed_successfully', 'Your password has been updated successfully!');
        }
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
            ->with(['deleted_user_message' => "($users->username / $users->email) - Deleted successfully!"]);
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
            ->with(['restored_user_message' => "($users->username / $users->email) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        User::where('id', $id)->forceDelete();
        return redirect()->route('users.delete')
            ->with(['permanent_deleted_user_message' => 'Permanently deleted successfully!']);
    }

    public function deactivateAccountView($id)
    {
        $User_model = User::find($id);
        if($User_model != null && $User_model->id == auth()->user()->id){
            return view('dashboard.users.deactivateAccount', compact('User_model'));
        }
        else{
            // return redirect()->back();
            return redirect()->route('users.deactivateAccountView', auth()->user()->id);
        }
    }

    public function deactivateAccount(Request $request, $id)
    {
        $user = auth()->user();
        if($user->user_type == "admin" && $user->email == "admin@gmail.com"){
            return redirect()->route('users.edit', auth()->user()->id)
            ->with(['super_admin_not_allowed_to_do_account_deactivate_action' => 'Sorry, you are the master of the system which means that you are not allowed to do this action (Deactivate your account)!']);
        }
        else{
            if(Hash::check($request->password, $user->password)){
                $User_model_status_old = User::find($id)->status;

                $User_model = User::find($id);
                if($User_model->id == $user->id){
                    $user_status = $user->status == "active";
                    if($user_status){   //if true => (active)
                        $User_model->status = $request->status;
                        $User_model->save();
                    }
                    else{
                        $user_status = $user_status;    //if any thing changed (such as from inspect elements of the page), save it as the old value!
                        $status_old = ucfirst($User_model_status_old);
                        return redirect()->route('users.edit', auth()->user()->id)
                        ->with(['account_status_remained_the_same' => "Your account is already ($status_old)!"]);
                    }
                }
                // else{
                //     return "You can't deactivate someone's else account (as an 'admin' in the system of course!)";
                // }
                return redirect()->route('users.edit', auth()->user()->id)
                 ->with(['account_deactivated_successfully' => 'Your account has been deactivated successfully!']);
            }
            elseif($request->password != "" && !Hash::check($request->password, $user->password)){
                return redirect()->route('users.deactivateAccountView', $user->id)
                ->with(['incorrect_password_confirmation_for_account_deactivation' => "The password you entered is incorrect! Please try again."]);
            }
            elseif($request->password == ""){
                return redirect()->route('users.deactivateAccountView', $user->id)
                ->with(['empty_password_confirmation_for_account_deactivation' => "The password field is required in order to complete this action!"]);
            }
        }
    }

    // public function deactivateAccount(Request $request, $id)
    // {
    //     $user = auth()->user();
    //     if($user->user_type == "admin" && $user->email == "admin@gmail.com"){
    //         return redirect()->route('users.edit', auth()->user()->id)
    //         ->with(['super_admin_not_allowed_to_do_account_deactivate_action' => 'Sorry, you are the master of the system which means that you are not allowed to do this action (Deactivate your account)!']);
    //     }
    //     else{
    //         $User_model_status_old = User::find($id)->status;

    //         $User_model = User::find($id);
    //         if($User_model->id == $user->id){
    //             $user_status = $user->status == "active";
    //             if($user_status){   //if true => (active)
    //                 $User_model->status = $request->status;
    //                 $User_model->save();
    //             }
    //             else{
    //                 // $user_status = $user_status;    //if any thing changed (such as from inspect elements of the page), save it as the old value!
    //                 $status_old = ucfirst($User_model_status_old);
    //                 return redirect()->route('users.edit', auth()->user()->id)
    //                 ->with(['account_status_remained_the_same' => "Your account is already ($status_old)!"]);
    //             }
    //         }
    //         // else{
    //         //     return 'You can't deactivate someone's else account (as an "admin" in the system of course!)';
    //         // }
    //     }

    //     return redirect()->route('users.edit', auth()->user()->id)
    //         ->with(['account_deactivated_successfully' => 'Your account has been deactivated successfully!']);
    // }

    public function deleteAccountView($id)
    {
        $User_model = User::find($id);
        if($User_model != null && $User_model->id == auth()->user()->id){
            return view('dashboard.users.deleteAccount', compact('User_model'));
        }
        else{
            // return redirect()->back();
            return redirect()->route('users.deleteAccountView', auth()->user()->id);
        }
    }

    public function deleteAccount(Request $request)
    {
        // $user = auth()->user();
        // if(Hash::check($request->password, $user->password)){
        //     if($user->user_type == "supplier"){   //any user in the system with user type "supplier"
        //         $product_details = ProductDetail::where('supplier_id', $user->id);
        //         $final_products = FinalProduct::where('supplier_id', $user->id);
        //         if(($product_details->count() >= 1 || $final_products->count() >= 1) ||   //if supplier have products
        //         ($product_details->count() >= 1 && $final_products->count() >= 1)){
        //             foreach($product_details as $product_detail){
        //                 $product_detail->forceDelete();
        //             }
        //             foreach($final_products as $final_product){
        //                 $final_product->forceDelete();
        //             }
        //             $user->forceDelete();
        //         }
        //         else{   //if supplier doesn't have products
        //             $user->forceDelete();
        //         }

        //         //any route or redirect won't work because..since deleting account the user becomes guest and will be redirected automatically to login page
        //         return redirect()->back();
        //         // ->with(['account_deleted_successfully' => 'Your account has been deleted successfully!']);
        //     }
        //     elseif($user->user_type == "admin" && $user->email == "admin@gmail.com"){   //the super admin/master of the system
        //         return redirect()->route('users.edit', auth()->user()->id)
        //         ->with(['super_admin_not_allowed_to_do_this_action' => 'Sorry, you are the master of the system which means that you are not allowed to do this action (Delete your account)!']);
        //     }
        //     else{   //all the other user types in the system (which are "moderator", "customer" & also the "admin" but not the the super one)
        //         $user->forceDelete();
        //     }
        // }
        // elseif($request->password != "" && !Hash::check($request->password, $user->password)){
        //     return redirect()->route('users.deleteAccountView', $user->id)
        //     ->with(['incorrect_password_confirmation_for_account_deletion' => "The password you entered is incorrect! Please try again."]);
        // }
        // elseif($request->password == ""){
        //     return redirect()->route('users.deleteAccountView', $user->id)
        //     ->with(['empty_password_confirmation_for_account_deletion' => "The password field is required in order to complete this action!"]);
        // }


        $user = auth()->user();
        if(Hash::check($request->password, $user->password)){
            if($user->user_type == "supplier"){
                $product_details = ProductDetail::where('supplier_id', $user->id)->get();
                foreach($product_details as $product_detail){
                    $product_detail->forceDelete();
                }
                $final_products = FinalProduct::where('supplier_id', $user->id)->get();
                foreach($final_products as $final_product){
                    $final_product->forceDelete();
                }
                $user->forceDelete();
            }
            elseif($user->user_type == "admin" && $user->email == "admin@gmail.com"){
                return redirect()->route('users.edit', auth()->user()->id)
                ->with(['super_admin_not_allowed_to_do_account_delete_action' => 'Sorry, you are the master of the system which means that you are not allowed to do this action (Delete your account)!']);
            }
            else{   //all the other user types in the system (which are "moderator", "customer" & also the "admin" but not the the super one)
                $user->forceDelete();
            }

            //any route or redirect won't work because..since deleting account the user becomes guest and will be redirected automatically to login page
            return redirect()->back();
            // ->with(['account_deleted_successfully' => 'Your account has been deleted successfully!']);
        }
        elseif($request->password != "" && !Hash::check($request->password, $user->password)){
            return redirect()->route('users.deleteAccountView', $user->id)
            ->with(['incorrect_password_confirmation_for_account_deletion' => "The password you entered is incorrect! Please try again."]);
        }
        elseif($request->password == ""){
            return redirect()->route('users.deleteAccountView', $user->id)
            ->with(['empty_password_confirmation_for_account_deletion' => "The password field is required in order to complete this action!"]);
        }
    }

    public function importExportViewUsers(){
        return view('dashboard.users.excel_imports_exports.import_export_file');
    }

    public function importUsers(Request $request){
        $rules = [
            'importing_input'          => 'required|file|mimes:xls,xlsx,xlsm,xltx,xltm,xla,xlt,csv|max:16000',
        ];

        $messages = [
            'importing_input.required' => "You didn't upload an Excel file! Please try again.",
            'importing_input.mimes'    => "The extension of the file you uploaded isn't allowed to be chosen! Please try again.",
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
        return Excel::download(new UserAllExport, 'AA'.Carbon::now()->format('dmys').'_'.'users.xlsx');
            // ->back()->with(['exported_file_successfully' => "Your file has been exported successfully!"]);
    }

}




