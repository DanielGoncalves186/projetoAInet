<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customer = Customer::all();
        return view('customers.index')
        ->with('customers', $customer)
        ->with('pageTitle', 'customers List');
    }
    public function create(): View
    {
      return view('customers.create')->withPageTitle('Add Customer');
    }

    public function store(Request $request): RedirectResponse 
    {
        $validated = $request->validate([
        'id' => 'required',
        'nif' => 'digits:9',
        'default_payment_ref' => 'max:255',
        ], [ // Custom Error Messages
        'nif.size' => '"id" comes from user',
        'nif.size' => '"nif" must have 9 characters',
        'default_payment_ref.max' => 'cant be bigget than 255 chars'
        ]);
        // If something is not valid, execution is interrupted.
        // Remaining code is only executed if validation passes
        Customer::create($validated);
        return redirect()->action(
        [CustomerController::class, 'index']);
    }
    public function edit($id): View
    {
        $customer = Customer::findOrFail($id);
        $pageTitle = 'Edit Customer';
        return view('customers.edit', compact('customer', 'pageTitle'));
    }

    public function getCustomerToUpdate($id): View
    {
        $customer = Customer::findOrFail($id);
        $user = User::findOrFail($id);
        $pageTitle = 'Customer Settings';
        return view('customers.settings', compact('customer','user', 'pageTitle'));
    }

    public function storeUpdate(Request $request, $id) : RedirectResponse {
        $validated = $request->validate([
        'nif' => 'size:9',
        'default_payment_ref' => 'max:255',
        ], [ // Custom Error Messages
        'nif.size' => '"nif" must have 9 characters',
        'default_payment_ref.max' => 'cant be bigget than 255 chars'
        ]);
        // If something is not valid, execution is interrupted.
        // Remaining code is only executed if validation passes
        $customer = Customer::findOrFail($id);
        $customer->fill($validated);
        $customer->save();
        $user= User::findOrFail($id);
        $user->updateUser($request, $id);
        return redirect()->back()->with('success', 'Information updated successfully.');
           }
           

    public function destroy($id) : RedirectResponse{
        User::destroy($id);
        Customer::destroy($id);
        return redirect()->action(
        [CustomerController::class, 'index']);
        }
}