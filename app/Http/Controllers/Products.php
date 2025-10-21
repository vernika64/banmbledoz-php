<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Products extends Controller
{
    public function newProductEntry(Request $request) {
        try {
            
            $validate = Validator::make($request->all(), [
                'productId'         => 'required',
                'productName'        => 'required',
                'productPrice'      => 'required',
                'productCategory'   => 'required'
            ]);

            if($validate->fails()) {
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'Data tidak valid'
                ], 422);
            }

            DB::beginTransaction();

            DB::table('products')->insert([
                'productId'         => $request->input('productId'),
                'productName'        => $request->input('productName'),
                'productPrice'      => $request->input('productPrice'),
                'productCategory'   => $request->input('productCategory')
            ]);

            DB::commit();

            return response()->json([
                'status'    => 'error',
                'message'   => 'Produk berhasil ditambahkan'
            ], 500);
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Server Error'
            ], 500);
        }
    }

    public function getProductEntries() {
        try {

            $data = DB::table('products')->limit(10)->get();

            return response()->json([
                'status'    => 'success',
                'message'   => 'Data berhasil diambil',
                'data'      => $data
            ], 500);
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Server Error'
            ], 500);
        }
    }
}
