<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Product;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy ID công ty từ query string nếu có
        $companyId = $request->query('company_id');

        // Kiểm tra xem có ID công ty được truyền vào không
        if ($companyId) {
            // Nếu có, chỉ lấy sản phẩm của công ty đó
            $products = Product::with('company')->where('MaTH', $companyId)->paginate(3);
        } else {
            // Nếu không có, lấy tất cả sản phẩm
            $products = Product::with('company')->paginate(3);
        }

        // Lấy danh sách tất cả các công ty
        $companies = Company::all();

        // Trả view với các dữ liệu cần thiết
        return view('customer.dashboard', compact('products', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
   
    public function showProductsByCompany($id)
    {
        // Lấy sản phẩm theo công ty
        $products = Product::with('company')->where('MaTH', $id)->paginate(3);
        $companies = Company::all(); // Lấy tất cả công ty để hiển thị danh sách công ty

        // Trả về view với sản phẩm và danh sách công ty
        return view('customer.dashboard', compact('products', 'companies'));
    }

}
