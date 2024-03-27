<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = $this->get_desire_products();
        return $products;
    }
    public function show($id){
        $product = Product::find($id);
        return $product;
    }
    public function getProductFeature(){
        return Product::where('feature', true)->inRandomOrder()->limit(8)->get();
    }
    private function get_desire_products(){
        $category_raw = request()->query('category');
        $search = request()->query('search');
        $category = explode(',' ,trim($category_raw, '[]'));
        $results = Product::query();
        if(count($category) > 0){
            foreach ($category as $value) {
                $results->orWhere('categories', 'LIKE', "%" .$value. "%");
            }
        }
        if (!empty($search)) {
            $results->Where('name', 'LIKE', "%" .$search. "%");
            $results->orWhere('description','LIKE', '%'. $search . '%');
        }
       return $results->get();
    }
    public function get_product_detail($slug){
        return Product::where('slug',$slug)->first();
    }
    public function deleteProduct($id)
{
    $product = Product::where('id', $id)->first();

    if ($product) {
        // Delete the image
        if ($product->image) {
                Storage::disk('public')->delete($product->image);
        }

        // Delete the product
        $product->delete();

        return redirect('hidden_route')->with('success', 'Deleted product id: ' . $id . ' successfully.');
    } else {
        return redirect('hidden_route')->with('error', 'Product not found.');
    }
}
    public function handleProduct(Request $request){
        $action = $request->input('action');
        $id = $request->input('id');
        $featureInput = $request->input('feature');
        switch ($action) {
            case 'add':
                $formFiledValidate = $request->validate([
                    'name' => 'required',
                    'slug' => 'required',
                    'price' => 'required|numeric',
                    'description' => 'required',
                    'short_description' => 'required',
                    'categories' => 'required',
                    'image' => 'required'
                ]);
                $formFiled = ['name' => $formFiledValidate['name'], 'slug' => $formFiledValidate['slug'], 'price' => $formFiledValidate['price'], 'description' => $formFiledValidate['description'], 'categories' => $formFiledValidate['categories'], 'short_description' => $formFiledValidate['short_description'], 'feature' => $featureInput];
                $formFiled['image'] = $request->file('image')->store('productImages', 'public');
                Product::create($formFiled);
                return redirect()->back()->with('success', 'Add Product Name: ' . $formFiled['name'] . '. Successfully');
            case 'delete':
                $formFiledValidate = $request->validate([
                    'id' => 'required | numeric',
                ]);
                return $this->deleteProduct($id);
            case 'update':
                $request->validate([
                    'id' => 'required | numeric',
                ]);
                if (!$id)
                    return redirect()->back()->with("error", 'Wrong Id');
                $product_model = Product::find($id);
                if(!$product_model)
                    return redirect()->back()->with("error", 'No Product id: '. $id .' was found');
                $expect_keys = ['name', 'slug', 'image', 'description', 'short_description', 'price', 'feature', 'categories'];
                $raw_data = $request->input();
                $data = [];
                foreach ($raw_data as $key => $value) {
                    if (in_array($key, $expect_keys) && $value != null)
                        $data[$key] = $value;
                }
                if($request->hasFile('image')){
                    $oldImage = $product_model->image;
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                    $data['image'] = $request->file('image')->store('productImages', 'public');
                }
                if(count($data) <= 0 )
                return redirect()->back()->with("error", 'bro no data why?');
                $product_model->update($data);
                return redirect()->back()->with("success", 'Product id: '. $id .' was changed, successfully');
            default:
                # code...
                break;
        }
    }


}
