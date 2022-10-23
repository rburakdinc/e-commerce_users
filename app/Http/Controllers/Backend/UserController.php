<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->returnUrl;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        $users =User::all();
        return view('backend.users.index',["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view('backend.users.insert_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request):RedirectResponse
    {
        $user = new User();
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);
        $user->password=Hash::make($user->password);
        $user->save();
        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user):View
    {
        return view('backend.users.update_form',["user"=>$user]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user):RedirectResponse
    {
        $name = $request->get("name");
        $email = $request->get("email");
        $is_admin = $request->get("is_admin",0);
        $is_active = $request->get("is_active",0);


        $user->name = $name;
        $user->email=$email;
        $user->is_admin=$is_admin;
        $user->is_active=$is_active;
        $user->save();

        return Redirect::to($this->returnUrl);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json(["message"=> "Done","id"=>$user->user_id]);
    }

    public function passwordForm(User $user)
    {
        return view("backend.users.password_form", ["user" => $user]);
    }


    public function changePassword(User $user,UserRequest $request)
    {
        $password = $request->get("password");
        $user->password = Hash::make($password);
        $user->save();

        return Redirect::to($this->returnUrl);
    }
}

