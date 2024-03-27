<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductController;
use App\Models\Product;


class PageController extends Controller
{
    private $product_controller;
    private static $query_params_str = '';
    public function __construct(ProductController $product_controller){
        $this->product_controller = $product_controller;
    }
    public function pages($page){
        switch ($page) {
            case 'shop':
                return view('pages.shop', ['products'=>$this->product_controller->index(), 'carts' => CartsController::get_cart_with(auth()->user()->id ?? null)]);
            case 'about':
                return view('pages.about', ['carts' => CartsController::get_cart_with(auth()->user()->id ?? null)]);
            case 'contact':
                return view('pages.contact', ['carts' => CartsController::get_cart_with(auth()->user()->id ?? null)]);
            case 'address':
                return view('pages.address', ['carts' => CartsController::get_cart_with(auth()->user()->id ?? null)]);
            default:
                # code...
                break;
        }
    }
    public function home(){
        $product_features =  $this->product_controller->getProductFeature();

        return view("pages.home" ,['products' => $product_features, 'carts' => CartsController::get_cart_with(auth()->user()->id ?? null)]);
    }
    public function login(){
        return view('pages.login');
    }
    public function register(){
        return view('pages.register');
    }
    public function cart(){
        return view('pages.cart',['carts' => CartsController::get_cart_with(auth()->user()->id)]);
    }



    public function product_detail($slug){
        return view('pages.productDetail', ['product' => $this->product_controller->get_product_detail($slug)]);
    }
    public function redirect_category(){
        $params = request()->input('category');

        $search = $this->getPreviousQueryParams()['search'];
        $url = '/shop';
        if(!isset($params)){
            $query = empty($search) ? '': "?" .http_build_query(['search' => $search]);
            return redirect()->to($url. $query);
        }
        $category = '[' . implode(',', $params) . ']';

        $query_params = ['category' => $category];
        if (!empty($search)) {
            $query_params['search'] = $search;
        }
        return redirect()->to($url. "?". http_build_query($query_params));
    }
    public function redirect_search(){
        //get category from previous param
        $url = '/shop';
        $category_query_str = $this->getPreviousQueryParams()['category'];
        $search = request()->input("search");

        $query_params = [];
        if (!empty($category_query_str)) {
            $query_params['category'] = $category_query_str;
        }
        if (empty($search)) {
            $query = empty($category_query_str) ? "": "?".http_build_query($query_params);
            return redirect()->to($url. $query);
        }
        $query_params['search'] = $search;
        return redirect()->to($url. "?" .http_build_query($query_params));
    }
    public function getPreviousQueryParams(){
        //get category from previous param
        $preUrl = url()->previous();
        if(!isset(parse_url($preUrl)['query'])){
            return ['category' => '', 'search'=> ''];
        };
        $query_str_raw = urldecode(parse_url($preUrl)["query"]);
        $s = explode("&", $query_str_raw);
        $query_params_pre = [];
        foreach ($s as $value) {
            $key = substr($value, 0, strpos($value,"="));
           $query_params_pre[$key] = substr($value,strpos($value,"=") + 1);
        }
        $category = isset($query_params_pre["category"]) ? $query_params_pre["category"] :"";
        $search = isset($query_params_pre["search"]) ? $query_params_pre["search"] :"";
        $query_params = ['category' => $category, 'search' => $search];
        return $query_params;
    }
    public function  doing_product(){
        return view('pages.dashboard', ['products' => Product::orderBy('created_at', 'desc')->get(), 'carts' => CartsController::get_cart_with(auth()->user()->id)]);
    }
}
