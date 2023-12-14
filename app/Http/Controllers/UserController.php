<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a newly created users on table.
     */
    public function show_user(Request $request)
    {
        $user_type =Auth::user()->usertype;
        if($user_type == 'admin')
        {
            $search = $request->search;
        
            if (!is_null($search)) 
            {
                $users = User::where('name', 'LIKE', "%$search%")->get();
            } 
            else 
            {
                $users = User::all();
            }
            return view('AdminPanel.Users.usertable')->with(['users' => $users , "search" => $search]);
        }
        elseif($user_type == 'staff') 
        {
            $category = Category::all();
            $featured_products = Product::with('category')->where('trending', '1')->take(4)->get();
            return view('Staff.staff', compact('featured_products','category'));
        }
        else
        {
            $category = Category::all();
            $featured_products = Product::with('category')->where('trending', '1')->take(4)->get();
            return view('Website.website', compact('featured_products','category'));
        }
    }

    /**
     * Show the form for editing the users.
     */
    public function edit_user(string $id)
    {
        $edit_user = User::find($id);
        return view('AdminPanel.Users.updateuser',['user'=> $edit_user]);
    }

    /**
     * Update Users
     */
    public function update_user(Request $request, string $id)
    {
        $update_user = User::find($id);
        $update_user->name = $request->name;
        $update_user->email = $request->email;
        $update_user->save();
        return redirect()->route('logged_user_table')->with('success' , 'User Updated Successfully');

    }

    // Delete users
    public function destroy_user(string $id)
    {
        $delete_user = User::find($id);
        $delete_user->delete();
        return redirect()->back()->with('success','User Deleted Successfully');
    }
}
