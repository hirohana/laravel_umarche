<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;

use App\Models\Shop; // Eloquent エロクアント

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('shop');

            if (!is_null($id)) {
                $shopOwnerId = (int)Shop::findOrFail($id)->owner_id;
                $ownerId = Auth::id();
                if ($shopOwnerId !== $ownerId) {
                    abort(404);
                }
            }

            return $next($request);
        })->only('edit');
    }

    public function index()
    {
        $shops = Shop::where('owner_id', Auth::id())->get();

        return view('owner.shops.index', compact('shops'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::findOrFail($id);

        return view('owner.shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadImageRequest $request, $id)
    {
        $imageFile = $request->image;
        $fileName = ImageService::upload($imageFile, 'shops');

        return redirect()->route('owner.shops.index');
    }
}
