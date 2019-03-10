<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Product;
use App\Order;
use Session;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $products = Product::all();

        return view('products.index', ['products' => $products]);
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
        $data = $request->only(['category_id','category_name','image','quantity','avg_rating','price', 'created_by']);
        $currentUserId = auth()->id();
        $target_dir = public_path() . "/" . config('products.image_path');
        $imageName = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $imageName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["image"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        $k1 = true;
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
                $k1 = false;
            }
        }
        $data['image'] = $imageName;

        try {
            $data['user_id'] = $currentUserId;
            $product=Product::create($data);
        } catch (Exception $e) {
            return back()->with('status', 'Create fail');
        }

        return redirect('/products/' . $product->id)->with('status','created');
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
    public function edit($id )
    {   
        $objProduct     = new Product();
        $getProductById = $objProduct->find($id)->toArray();
        $product = Product::find($id);
        $checkId = auth()->id();
        if($product->user_id == $checkId){

        return view('products.edit')->with('getProductById', $getProductById);
        } else{
            return('Khong duoc sua');
        }
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
            $data = $request->only([
                'category_id',
                'product_name',
                'price',
                'image',
                'quantity',
                'avg_rating',
            ]);
        try {
            $product = Product::create($data);
        } catch (Exception $e) {
            return back()->with('status', 'Create fail!');
        }
        return redirect('products/' . $product->id)->with('status', 'Create success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $checkId = auth()->id();
        if($product->user_id == $checkId){
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
        } else {
            return('qqq');
        }    
    }
}
