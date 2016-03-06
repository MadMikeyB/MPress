<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Hash;

class ProfileController extends Controller
{
    public function show(User $user)
    {
    	return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
    	return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
    	if ( !empty( $request->old_password) )
    	{
	    	$this->validate($request, [
	               'new_password'      => 'confirmed'
	        ]);

	    	if ( Hash::check( $request->old_password, $user->password ) !== false )
	    	{
	    		$user->password = bcrypt($request->new_password);
	    	}
	    	else
	    	{
	    		session()->flash('flash_message', 'Incorrect password!');
	    		return back();
	    	}
    	}

    	$user->update($request->all());
    	
    	session()->flash('flash_message', 'Yay! You updated your profile!');

    	return redirect('@' . $user->slug);
    }

    public function deactivate(Request $request, User $user)
    {

    }

    public function destroy(User $user)
    {

    }
}
