<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\JobOffered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminUserController extends Controller
{
    //
    public function index()
    {
        $users = User::where('role', 'User')->latest('id')->paginate(50);

        return view('admin.users.index', compact('users'));
    }

    public function searchUsers(Request $request)
    {
        $search = $request->get('search');

        $users = User::where(function ($user) use ($search) {
            $user->where('username', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
        });

        $users = $users->paginate(20);
        return view('admin.users.index', compact('search', 'users'));
    }

    public function employUsers(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id', $ids)->update([ 'employed' => 1 ]);
        return back()->with('success', 'Workers employed successfully');
    }

    public function employUser($id)
    {
        $user = User::where('id', $id)->update([ 'employed' => 1 ]);
        //Notification::send($user, new JobOffered());
        return back()->with('success', 'Worker employed successfully');
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
