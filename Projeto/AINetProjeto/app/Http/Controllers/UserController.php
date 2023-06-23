<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        ], [
            // Custom Error Messages
            'name.required' => '"name" is required.',
            'email.required' => '"email" is required.',
            'email.unique' => '"email" is already in use',
            'password.required' => '"password" is required.',
        ]);
        // If something is not valid, execution is interrupted.
        // Remaining code is only executed if validation passes
        User::create($validated);
        return redirect()->action(
            [UserController::class, 'index']
        );
    }
    public function edit($id): View
    {
        $user = User::findOrFail($id);
        $pageTitle = 'Update User';
        return view('users.edit', compact('user', 'pageTitle'));
    }

    public function searchUser(Request $request)
    {
        $email = $request->input('email');
        $email = mb_convert_encoding($email, 'UTF-8', 'auto');

        $user = User::where('email', $email)->first();

        if ($user) {
            return view('users.edit')
                ->with('user', $user)
                ->with('pageTitle', 'User Profile');
        } else {
            // User not found
            return "User not found";
        }
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc|unique:users,email,' . $id,
            'password' => 'required|min:6|same:password_confirm',
            'password_confirm' => 'required:min:6',
        ], [
            // Custom Error Messages
            'name.required' => '"name" is required.',
            'email.required' => '"email" is required.',
            'email.email' => '"email" must be valid.',
            'email.unique' => '"email" is already in use',
            'password.required' => '"password" is required.',
        ]);
        // If something is not valid, execution is interrupted.
        // Remaining code is only executed if validation passes
        $user = User::findOrFail($id);
        $user->fill($validated);
        $user->save();
        return redirect()->action([UserController::class, 'index']);
    }


    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);

        // Verificar se o usuário possui registros dependentes em outra tabela (por exemplo, 'customers')
        $hasCustomers = DB::table('customers')->where('user_id', $id)->exists();

        if ($hasCustomers) {
            // Caso existam registros dependentes, você pode decidir como lidar com eles.
            // Neste exemplo, estou apenas redirecionando de volta à página de listagem com uma mensagem de erro.
            return redirect()->action([UserController::class, 'index'])->with('error', 'O usuário possui registros dependentes e não pode ser excluído.');
        }

        // Se não houver registros dependentes, você pode prosseguir com a exclusão do usuário.
        $user->delete();

        return redirect()->action([UserController::class, 'index'])->with('success', 'O usuário foi excluído com sucesso.');
    }


}
