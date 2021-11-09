<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\TypeProduct;

class ProductTypeController extends Controller
{
    public function index()
    {
        $lists = TypeProduct::orderBy('id', 'DESC')->paginate(20);
        return view('admin.pages.product_type.index', compact('lists'));
    }

    public function create()
    {
        return view('admin.pages.product_type.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'name.required'   => 'Please enter a name',
            'name.max'        => 'The name can only be up to 255 characters long',
            'avatar.required' => 'Please choose a image',
            'avatar.image'    => 'Please upload file in these format only (jpg, jpeg, png)',
            'avatar.mimes'    => 'Please upload file in these format only (jpg, jpeg, png)',
        ]);

        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator)->withInput();
        }

        $imagePath = $this->uploadImage($request);

        if (empty($imagePath)) {
            return \Redirect::route('admin.product_type.index')
                ->with([
                    'flashLevel' => 'warning',
                    'flashMes'   => 'Upload Image Fail'
                ]);
        }

        TypeProduct::create([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $imagePath
        ]);

        return \Redirect::route('admin.product_type.index')
            ->with([
                'flashLevel' => 'success',
                'flashMes'   => 'Create Product Type Success'
            ]);
    }

    public function edit($id)
    {
        $item = TypeProduct::find($id);

        if (empty($item)) {
            return \Redirect::route('admin.product_type.index')
                ->with([
                    'flashLevel' => 'warning',
                    'flashMes'   => 'Not Found The Product Type'
                ]);
        }

        return view ('admin.pages.product_type.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = TypeProduct::find($id);

        if (empty($item)) {
            return \Redirect::route('admin.product_type.index')
                ->with([
                    'flashLevel' => 'warning',
                    'flashMes'   => 'Not Found The Product Type'
                ]);
        }

        if ($request->hasFile('avatar')) {
            $imagePath = $this->uploadImage($request);

            if (empty($imagePath)) {
                return \Redirect::route('admin.product_type.index')
                    ->with([
                        'flashLevel' => 'warning',
                        'flashMes'   => 'Upload Image Fail'
                    ]);
            }

            $item->update([
                'name'        => $request->name,
                'description' => $request->description,
                'image'       => $imagePath
            ]);
        }
        else {
            $item->update([
                'name'        => $request->name,
                'description' => $request->description
            ]);
        }

        return \Redirect::route('admin.product_type.index')
            ->with([
                'flashLevel' => 'success',
                'flashMes'   => 'Update Product Type ' .$request->name . ' Info Success'
            ]);

    }

    public function uploadImage($request)
    {
        if ($request->hasFile('avatar')) {
            $imageFile = $request->avatar;

            $uploadFolder = 'uploads';
            if (!is_dir ($uploadFolder)) {
                mkdir($uploadFolder, 0777);
            }

            $folderName = 'uploads/' . date("Y") . '-' . date("m");
            $folderFullName = public_path($folderName);
            if (!is_dir ($folderFullName)) {
                mkdir($folderFullName, 0777);
            }

            $imageName = 'product_type' . time().'.'.$imageFile->extension();

            $imageFile->move($folderFullName, $imageName);

            return $folderName . '/' . $imageName;
        }

        return null;
    }

    public function destroy($id)
    {
        $item = TypeProduct::find($id);

        if (empty($item)) {
            return \Redirect::route('admin.product_type.index')
                ->with([
                    'flashLevel' => 'warning',
                    'flashMes'   => 'Not Found The Type Product'
                ]);
        }

        $products = DB::table('type_products')
            ->join('products', 'products.type_id', '=', 'type_products.id')
            ->select('type_products.name as type_product_name', 'products.*')
            ->where([
                ['type_products.del_flag', '=', 0],
                ['type_products.id', '=', $id],
                ['products.del_flag', '=', 0]
            ])
            ->get();
        if (isset($products) || !empty($products))
        {
            return \Redirect::route('admin.product_type.index')
                ->with([
                    'flashLevel' => 'warning',
                    'flashMes'   => 'This Type Product has Product in data. You cannot delete it.'
                ]);
        }
        else {
            $item->update([
                'del_flag' => 1
            ]);
        }

        return \Redirect::route('admin.product_type.index')
            ->with([
                'flashLevel' => 'success',
                'flashMes'   => 'Delete Type Product ' .$item->name . ' Success'
            ]);
    }
}
