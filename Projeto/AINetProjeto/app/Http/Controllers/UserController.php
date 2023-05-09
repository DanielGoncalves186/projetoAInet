<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('users.index')
        ->with('users', $users)
        ->with('pageTitle', 'Users List');
    }
    public function create(): View
    {
      return view('users.create')->withPageTitle('Add User');
    }
    /*
    public function store(Request $request): RedirectResponse
    {
        User::create($request->all());
        return redirect()->action([UserController::class, 'index']);
    }
    */

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'password' => 'required'
        ], [ // Custom Error Messages
        'nome.required' => '"name" is required.',
        'email.required' => '"email" is required.',
        'email.unique' => '"email" is already in use',
        'password.required' => '"password" is required.',
        ]);
        // If something is not valid, execution is interrupted.
        // Remaining code is only executed if validation passes
        User::create($validated);
        return redirect()->action(
        [UserController::class, 'index']);
    }
    public function edit($id): View
    {
        $user = User::findOrFail($id);
        $pageTitle = 'Update User';
        return view('users.edit', compact('user', 'pageTitle'));
    }
    public function update(Request $request, $id) : RedirectResponse {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id ,
            'password' => 'required|min:6|same:password_confirm',
            'password_confirm' => 'required:min:6',
            ], [ // Custom Error Messages
            'nome.required' => '"name" is required.',
            'email.required' => '"email" is required.',
            'email.unique' => '"email" is already in use',
            'password.required' => '"password" is required.',
            ]);
        // If something is not valid, execution is interrupted.
        // Remaining code is only executed if validation passes
        $user = User::findOrFail($id);
        $user->fill($validated);
            $user->save();
        return redirect()->action([UserController::class,'index']);
           }


    public function destroy($id) : RedirectResponse{
        User::destroy($id);
        return redirect()->action(
        [UserController::class, 'index']);
        }
    }

        