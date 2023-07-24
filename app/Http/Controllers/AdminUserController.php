<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    //
    public function index()
    {
        $users = User::where('role', 'User')->latest('id')->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user_details = User::with('direct_refferals', 'indirect_refferals', 'salary_withdrawals', 'works', 'package', 'epin', 'parent')->find($id);

        return view('admin.users.edit', compact('user_details'));
    }

    public function update_password(Request $request, $id)
    {
        $user = User::find($id);

        $data['password'] = bcrypt($request->password);

        $user->update($data);

        return back()->with('success', 'Password updated successfully!');
    }
}
