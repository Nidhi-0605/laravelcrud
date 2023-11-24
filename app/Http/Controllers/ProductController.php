<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\Request;
  
class ProductController extends Controller
{
   public function index(){
    // $products = Product::get();
    return view('products.index',['products'=> Product::latest()->paginate(5)]);
   }

   public function create(){
    return view('products.create');
   }

   public function store(Request $request){
    // vaidate data
    $request->validate([
        'name' => 'required',
        'detail' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

    ]);


    // upload image
    // dd($request->all());
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('products'),$imageName);
    // dd($imageName);
    $product= new product;
    $product->image = $imageName;
    $product->name = $request->name;
    $product->detail = $request->detail;
    $product->save();
    return back()->withSuccess('Product Created');
    
   }

   public function edit($id){
    // dd($id);
    $product = Product::where('id',$id)->first();
    return view('products.edit',['product'=> $product]);
   }

   public function update(Request $request,$id){
    // dd($request->id);

    // vaidate data
    $request->validate([
        'name' => 'required',
        'detail' => 'required',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

    ]);

    $product = Product::where('id',$id)->first();


    // dd($request->all());
    if(isset($request->image)){
         // upload image
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('products'),$imageName);
    $product->image = $imageName;
    }
    // dd($imageName);
   
    $product->name = $request->name;
    $product->detail = $request->detail;
    $product->save();
    return back()->withSuccess('Product updated');
   }

   public function destroy($id){
    $product = Product::where('id',$id)->first();
    $product->delete();
    return back()->withSuccess('Product deleted');
   }

   public function show($id){
    $product = Product::where('id',$id)->first();
    return view('products.show',['product'=>$product]);
    
 
   }
}
