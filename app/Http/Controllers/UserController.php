<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('user.index',[
            'data' => $data,
        ]);
    }
    public function download(){
        return Excel::download(new UsersExport, 'user.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user()->name;
        return view('user.create',[
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:5',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'role' =>'required',
        ]);
        $data = ([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if($user = User::create($data)){
            if($request->role === 'admin'){
                $user->assignRole('admin');
            } elseif($request->role === 'operator'){
                $user->assignRole('operator');
            } elseif($request->role === 'petugas'){
                $user->assignRole('petugas');
            }
            return redirect()->route('users.index')->with('success', "Data user ".$data['name']." berhasil disimpan!");
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // mencari data berdasarkan http get {id} di web dan route
        $data = User::findOrFail($id);
        return view('user.edit',[
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        
        $this->validate($request ,[
            'name' => 'required|min:5',
            'username' => 'required|unique:users,username,'.$user->id, // hanya bisa mengedit data yang unique di table users field-
            //  username atau bisa mengedit jika nilainya sama kayak awal data yang ingin di edit
            'email' => 'required|unique:users,password,'.$user->id,
            'role' =>'required',
        ]);

        // update hanya berdasarkan findorfail id
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role,
        ]);

        if($user->update()){
            if($user->role === 'admin'){
                $user->syncRoles('admin');
            }elseif($user->role === 'petugas'){
                $user->syncRoles('petugas');
            }elseif($user->role === 'operator'){
                $user->syncRoles('operator');
            }
            return redirect()->route('users.index')->with('success-update','Data user '.$user->name.' berhasil diedit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success-delete','Data user '.$user->name.' berhasil dihapus!');
    }
}
