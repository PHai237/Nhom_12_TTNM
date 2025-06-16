<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wearly;

class WearlyController extends Controller
{
    public function index()
    {
        $products = Wearly::all();
        return view('product.index', compact('product'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Wearly::where('product_name', 'like', "%$keyword%")
                          ->orWhere('product_id', 'like', "%$keyword%")
                          ->get();

        return view('product.index', compact('products', 'keyword'));
    }
}
