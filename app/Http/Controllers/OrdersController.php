<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if (Auth::check())
            {

                return view('orders.create');
            } else  
            {
        
                return view('auth.login');
            }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allRequest = $request->all();
        $user_id   = $allRequest['user_id'];
        $total_price  = $allRequest['total_price'];
        $description = $allRequest['description'];

        $dataInsertToDatabase = array(
            'user_id' => $user_id,
            'total_price' => $total_price,
            'description' => $description,    
        );

        $objOrder = new Order();
        $objOrder->insert($dataInsertToDatabase);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = User::find(1);
        //$orders = $user->orders;
        //$order = Order::find(1);
        //$user = $order->user;
        //return view('users.show', ['order' => $order]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return back();
        }

        return view('orders.edit', ['order' => $order]);
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
        $allRequest = $request->all();
        $user_id = $allRequest['user_id'];
        $total_price = $allRequest['total_price'];
        $description = $allRequest['description'];
        $idOrder     = $allRequest['id'];

        $objOrder  = new Order();
        $getOrderById = $objOrder->find($idOrder);
        $getOrderById->user_id = $user_id;
        $getOrderById->total_price = $total_price;
        $getOrderById->description = $description;
        $getOrderById->save();

        return redirect()->action('OrderController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $order = Order::find($id);
            $order->delete();
            $result = [
                'status' => true,
                'msg' => 'Delete success',
            ];
        } catch (Exception $e) {
            $result = [
                'status' => false,
                'msg' => 'Delete fail',
            ];
        }

        return response()->json($result);
    }
}
