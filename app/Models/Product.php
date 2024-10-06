<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'sanpham'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'MaSP'; // Khóa chính của bảng
    public $timestamps = false; // Nếu bảng không có cột `created_at` và `updated_at`

    // Định nghĩa quan hệ với bảng `Company`
    public function company()
    {
        return $this->belongsTo(Company::class, 'MaTH', 'MaTH');
    }
}

