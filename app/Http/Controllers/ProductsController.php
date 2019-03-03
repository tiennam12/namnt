<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $objProduct  = new Product();
        $allProducts = $objProduct->all()->toArray();

        return view('products.show')->with('allProducts', $allProducts);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['price', 'image', 'avg_rating', 'quantity','category_id', 'category_name']);
        $currentOrderId = auth()->id();

        try {
            $data['order_id'] = $currentOrderId;
            Product::create($data);
        } catch (Exception $e) {
            return back()->with('status', 'Create fail');
        }

        return redirect('products')->with('status', 'Profile updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::findOrFail($id);
        return view('products.profile', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objProduct     = new Product();
        $getProductById = $objProduct->find($id)->toArray();
        return view('products.edit')->with('getProductById', $getProductById);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id='')
    {
        $allRequest = $request->all();
        $category_id = $allRequest['category_id'];
        $category_name = $allRequest['category_name'];
        $price = $allRequest['price'];
        $image = $allRequest['image'];
        $quantity = $allRequest['quantity'];
        $avg_rating = $allRequest['avg_rating'];
        $idProduct     = $allRequest['id'];

        $objProduct  = new Product();
        $getProductById = $objProduct->find($idProduct);
        $getProductById->category_id = $category_id;
        $getProductById->category_name = $category_name;
        $getProductById->price = $price;
        $getProductById->image = $image;
        $getProductById->quantity = $quantity;
        $getProductById->avg_rating = $avg_rating;
        $getProductById->save();

        return redirect()->action('ProductsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
        try {
            $product = Product::find($id);
            $product->delete();
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
}
