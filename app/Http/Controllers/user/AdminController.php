<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('pages.admin.user.admin.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $admin = User::create($validated);

        if ($admin) {
            Alert::success('Sukses', 'Data sub kriteria berhasil ditambahkan');
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
            'role' => 'required|in:admin,member'
        ]);

        $admin = User::findOrFail($id);

        $admin->update([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
         ]);

        if($admin){
             Alert::success('Success', 'Berhasil Merubah Data');
            return redirect()->back();
        } else {
            return abort(500);
        }
    }

    public function destroy(String $id)
    {
        $admin = User::findOrFail($id);

        $admin->delete();

        if($admin){
            Alert::warning('Warning', 'Anda baru saja menghapus data!');
            return redirect()->back();
        }else{
            return abort(500);
        }
    }
}
