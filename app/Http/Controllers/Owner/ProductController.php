<?php

namespace App\Http\Controllers\Owner;

use Throwable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\ProductRequest;
use App\Models\Image;
use App\Models\Owner;
use App\Models\PrimaryCategory;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Stock;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('product');

            if (!is_null($id)) {
                $ownerId = (int)Product::findOrFail($id)->shop->owner->id;
                if ($ownerId!== Auth::id()) {
                    abort(404);
                }
            }

            return $next($request);
        });
    }

    public function index()
    {
        $ownerInfo = Owner::with('shop.product.imageFirst')->where('id', Auth::id())->first();

        return view('owner.products.index', compact("ownerInfo"));
    }

    public function create()
    {
        $shops = Shop::where('owner_id', Auth::id())->select('id', 'name')->get();
        $images = Image::where('owner_id', Auth::id())->select('id', 'title', 'filename')->orderBy('updated_at', 'desc')->get();
        $categories = PrimaryCategory::with('secondary')->get();

        return view('owner.products.create', compact('shops', 'images', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $product = Product::create([
                    'name' => $request->name,
                    'information' => $request->information,
                    'price' => $request->price,
                    'is_selling' => $request->is_selling,
                    'sort_order' => $request->sort_order,
                    'shop_id' => $request->shop_id,
                    'secondary_category_id' => $request->category,
                    'image1' => $request->image1,
                    'image2' => $request->image2,
                    'image3' => $request->image3,
                    'image4' => $request->image4,
                ]);

                Stock::create([
                  'product_id' => $product->id,
                  'type' => 1,
                  'quantity' => $request->quantity
                ]);
            }, 2);

            return redirect()->route('owner.products.index')->with(['message' => '商品登録しました。', 'status' => 'info']);
        } catch(Throwable $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function edit($id)
    {
        // TODO Productを取得する際に、Eager Loadを使う必要がある？
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)->sum('quantity');
        $shops = Shop::where('owner_id', Auth::id())->select('id', 'name')->get();
        $categories = PrimaryCategory::with('secondary')->get();
        $images = Image::where('owner_id', Auth::id())->select('id', 'title', 'filename')->orderBy('updated_at', 'desc')->get();

        return view('owner.products.edit', compact('product', 'quantity', 'shops', 'categories', 'images'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
