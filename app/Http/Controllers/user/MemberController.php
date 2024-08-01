<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;

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
            'username' => 'alpha_dash',
            'email' => 'email|min:8|max:50',
            'password' => [Password::min(8)->mixedCase()->numbers()],
            'role' => 'in:admin,member',
        ]);

        $member = User::findOrFail($id);

        $member->update([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
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
