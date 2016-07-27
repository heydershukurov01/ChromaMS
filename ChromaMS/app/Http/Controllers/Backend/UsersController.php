<?php

namespace ChromaMS\Http\Controllers\Backend;

use ChromaMS\User;

use Illuminate\Http\Request;

use ChromaMS\Http\Requests;

class UsersController extends Controller
{
	protected $users;

	public function __construct(User $users)
	{
		$this->users = $users;

		parent::__construct();
	} 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Fetching all of the users 10 users per page 
        $users = $this->users->paginate(10);

        return view('backend.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //If Pushed Edit Button Fetch Data by ID from DB. elseif pushed create new data returns empty form  
        return view('backend.users.form' , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreUserRequest $request) //Validates Form by StoreUserRequest
    {
        //Insert User Data Into users table

         $this->users->create($request->only('name' , 'email' , 'password'));

        return redirect(route('backend.users.index'))->with('status', 'User Has Been Created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Fetch Existing data about users to the from.blade.php
        $user = $this->users->findOrFail($id);

        return view('backend.users.form' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateUserRequest $request, $id)
    {
        //Update User Data
        $user = $this->users->findOrFail($id);
        $user->fill($request->only('name' , 'email' , 'password'))->save();

        return redirect(route('backend.users.edit', $user->id))->with('status' , 'User Has Been Updated!');
    }

    public function confirm(Requests\DeleteUserRequest $request , $id)
    {
    	//The User Which is logged in 
    	$user = $this->users->findOrFail($id);

        return view('backend.users.confirm' , compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\DeleteUserRequest $request , $id)
    {
        //Deletes User
        $user = $this->users->findOrFail($id);

        $user->delete();

        return redirect(route('backend.users.index'))->with('status' , 'User Has Been Deleted!');
    }
}
