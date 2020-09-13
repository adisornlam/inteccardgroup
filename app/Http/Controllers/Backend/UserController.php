<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User;
use App\Model\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['superadministrator','administrator']);
        $users = User::with('roles')->paginate(20);
        return view('backend.users.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
        $user->roles()->attach($request->role_id);

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.users.edit',compact('user','roles'));
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'email|max:255',
            'password' => 'min:6',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->active = ($request->active === "1" ? NULL : date('Y-m-d H:i:s'));
        $user->save();
        $user->roles()->sync([$request->role_id]);

        if($request->has('password')){
            $user->password = bcrypt($request->password);
            $user->save();
        }
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    /**
     * Update the avatar for the given user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function updateAvatar(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Storage::put(
            'avatars/'.$user->id,
            file_get_contents($request->file('avatar')->getRealPath())
        );
    }
}
