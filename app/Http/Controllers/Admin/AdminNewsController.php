<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product; 
use App\Models\Company; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('company')->get();

        $pageName = 'Danh Sách';

        return view('admin.product', compact('product', 'pageName'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();  // Lấy danh sách các công ty
    
        return view('admin.product_create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->TenSP = $request->TenSP; 
        $product->GiaBan = $request->GiaBan;
        $product->SoLuong = $request->SoLuong;

        if ($request->hasFile('HinhAnh')) {
            $file = $request->file('HinhAnh');
            $fileName = $file->getClientOriginalName(); // Lưu tên gốc
            $file->storeAs('public/image', $fileName); // Lưu vào thư mục storage
            $product->HinhAnh = $fileName; // Lưu tên vào cơ sở dữ liệu
        } else {
            $product->HinhAnh = null;  // Hoặc giá trị mặc định nếu cần
        }

        $product->MaTH = $request->MaTH;
        $product->save();
        
        return redirect()->action([AdminNewsController::class, 'index'])
                         ->with('success', 'Thêm sản phẩm thành công.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('MaSP', '=',  $id)->select('*')->first();
        return view('admin.product_detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $companies = Company::all(); 

        return view('admin.product_update', compact('product', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->TenSP = $request->input('TenSP');
            $product->GiaBan = $request->input('GiaBan');
            $product->SoLuong = $request->input('SoLuong');
            $product->MaTH = $request->input('MaTH'); // Cập nhật mã thương hiệu

        // Xử lý hình ảnh nếu có
        if ($request->hasFile('HinhAnh')) {
            // Xóa hình ảnh cũ nếu có
            if ($product->HinhAnh && Storage::exists('public/image/' . $product->HinhAnh)) {
                Storage::delete('public/image/' . $product->HinhAnh);
            }

            // Lưu hình ảnh mới
            $file = $request->file('HinhAnh');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/image', $filename);
            $product->HinhAnh = $filename;
        }

        $product->save();

        return redirect()->action([AdminNewsController::class, 'index'])
                         ->with('success', 'Cập nhật sản phẩm thành công.');
        }
    
        return redirect()->action([AdminNewsController::class, 'index'])
                     ->with('error', 'Sản phẩm không tồn tại.');
    }   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::find($id);

        if ($product) {
            // Xóa hình ảnh nếu có
            if ($product->HinhAnh && Storage::exists('public/image/' . $product->HinhAnh)) {
                Storage::delete('public/image/' . $product->HinhAnh);
            }

            // Xóa sản phẩm
            $product->delete();
            
            return redirect()->action([AdminNewsController::class, 'index'])->with('success', 'Dữ liệu xóa thành công.');
        }
        
        return redirect()->action([AdminNewsController::class, 'index'])->with('error', 'Sản phẩm không tồn tại.');
    }
}
