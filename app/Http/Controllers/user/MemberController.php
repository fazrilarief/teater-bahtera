<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('pages.admin.user.member.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $member = User::create($validated);

        if ($member) {
            Alert::success('Success', 'Data akses member berhasil ditambahkan');
            return redirect()->back();
        } else {
            return abort(500);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|alpha_dash|unique:App\Models\User,username',
            'email' => 'required|email|unique:App\Models\User,email|min:8|max:50',
            'role' => 'required|in:admin,member',
        ]);

        $member = User::findOrFail($id);

        $member->update([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
        ]);

        if ($member) {
            Alert::success('Success', 'Data akses member berhasil diubah');
            return redirect()->back();
        } else {
            return abort(500);
        }
    }

    public function destroy(String $id)
    {
        $memberDestroy = User::findOrFail($id);

        $memberDestroy->delete();

        if($memberDestroy){
            Alert::warning('Warning', 'Anda baru saja menghapus data!');
            return redirect()->back();
        }else{
            return abort(500);
        }
    }
}
