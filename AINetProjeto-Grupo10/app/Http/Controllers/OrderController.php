<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(): View
    {
        /*
        $orders = Order::all();
        return view('orders.index')
        ->with('orders', $orders)
        ->with('pageTitle', 'Orders List');
        */
        $orders = Order::paginate(500);

        $userType = Auth::user()->user_type;

        if ($userType === 'A') {
            return view('orders.index')
            ->with('orders', $orders)
            ->with('pageTitle', 'Orders List');
        }
        return view('orders.indexEmployee')
        ->with('orders', $orders)
        ->with('pageTitle', 'Orders List');
    }
    public function create(): View
    {
      return view('orders.create')->withPageTitle('New Order');
    }
    /*
    public function store(Request $request): RedirectResponse
    {
        User::create($request->all());
        return redirect()->action([UserController::class, 'index']);
    }
    */

    public function store(Request $request): RedirectResponse
    {//status', 'customer_id', 'date', 'total_price', 'notes', 'nif', 'address', 'payment_type', 'payment_ref', 'receipt_url'
        $validated = $request->validate([
        'customer_id' => 'required',
        'status' => 'required',
        'payment_type' => 'required',
        'payment_ref' => 'required',
        'address' => 'required',
        ], [ // Custom Error Messages
        'customer_id.required' => '"customer id" is required.',
        'status.required' => '"status" is required.',
        'address.required' => '"address" is required.',
        'payment_type.required' => '"payment type" is required.',
        'payment_ref.required' => '"payment ref" is required.',
        ]);
        // If something is not valid, execution is interrupted.
        // Remaining code is only executed if validation passes
        Order::create($validated);
        return redirect()->action(
        [OrderController::class, 'index']);
    }
    public function edit($id): View
    {
        $order = Order::findOrFail($id);
        $pageTitle = 'Update Order';
        return view('orders.edit', compact('order', 'pageTitle'));
    }
    public function findOrdersOfUser($id)
    {
        // Find the user by ID
        // Retrieve all orders associated with the user
        $orders = Order::where('customer_id', $id)->get();
        $pageTitle = 'Orders History';
        // Return the orders as a response
        return view('orders.history', compact('orders', 'pageTitle'));
    }

    public function update(Request $request, $id) : RedirectResponse {
        $validated = $request->validate([
            'customer_id' => 'required',
            'status' => 'required',
            'payment_type' => 'required',
            'payment_ref' => 'required',
            'address' => 'required',
            ], [ // Custom Error Messages
            'customer_id.required' => '"customer id" is required.',
            'status.required' => '"status" is required.',
            'address.required' => '"address" is required.',
            'payment_type.required' => '"payment type" is required.',
            'payment_ref.required' => '"payment ref" is required.',
            ]);
        // If something is not valid, execution is interrupted.
        // Remaining code is only executed if validation passes
        $order = Order::findOrFail($id);
        $order->fill($validated);
            $order->save();
        return redirect()->action([OrderController::class,'index']);
           }


    public function destroy($id) : RedirectResponse{
        Order::destroy($id);
        return redirect()->action(
        [OrderController::class, 'index']);
        }

}