<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        .logout-btn {
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
            display: inline-block;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .header-container {
            display: flex;
            justify-content: flex-end; /* Đưa các phần tử sang bên phải */
            margin-bottom: 20px;
        }

        p {
            text-align: center;
        }

        table {
            width: 85%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container img {
            max-width: 100px;
            height: auto;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .action-buttons button {
            background: none;
            border: none;
            cursor: pointer;
            margin: 0 5px;
        }

        .action-buttons button:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    

    <div class="header-container">
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
    <h1>QUẢN LÝ SẢN PHẨM</h1>
    <p>
        <a href="{{ route('admin.product_create') }}" style="display: block; text-align: center; text-decoration: none; font-weight: bold;">Thêm sản phẩm</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá Bán</th>
                <th>Số lượng</th>
                <th>Hình Ảnh</th>
                <th>Thương Hiệu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $dem = 1; // Khởi tạo biến $dem
            @endphp
            @foreach ($product as $row)
            <tr>
                <td>{{ $dem }}</td>
                <td><a href="{{ url('/admin/product/' . $row->MaSP) }}" style="text-decoration: none;">{{ $row->TenSP }}</a></td>
                <td>{{ number_format($row->GiaBan, 0, ',', '.') }} VNĐ</td>
                <td>{{ $row->SoLuong }}</td>
                <td>
                    <div class="image-container">
                        @if ($row->HinhAnh)
                            <img src="{{ asset('storage/image/' . $row->HinhAnh) }}" alt="Image">
                        @else
                            <p>No Image</p>
                        @endif
                    </div>
                </td>
                <td>{{ $row->company ? $row->company->TenTH : 'No Brand' }}</td>
                <td class="action-buttons">
                    <!-- Nút Chỉnh sửa -->
                    <a href="{{ url('/admin/product/edit/' . $row->MaSP) }}">
                        <button type="button">
                            <i class="fas fa-pen-to-square" style="color: #4CAF50; font-size: 20px;"></i>
                        </button>
                    </a>
                    <!-- Nút Xóa -->
                    <form method="POST" action="{{ url('/admin/product/delete/' . $row->MaSP) }}" onsubmit="return ConfirmDelete(this)" style="display: inline;">
                        @method('DELETE')
                        @csrf
                        <button type="submit">
                            <i class="fas fa-trash" style="color: #F44336; font-size: 20px;"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @php
                $dem++;
            @endphp
            @endforeach
        </tbody>
    </table>
    <script>
        function ConfirmDelete(form) {
            return confirm("Bạn có chắc chắn muốn xóa không?");
        }
    </script>
</body>
</html>


