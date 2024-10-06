<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Chỉnh sửa sản phẩm</title>
</head>
<body>
<form method="post" action="{{ url('/admin/product/update/'  .$product->MaSP)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH') <!-- Sử dụng phương thức PATCH -->
    <table width="600" border="1" align="center" cellpadding="5" cellspacing="0">
        <tbody>
            <tr>
                <th colspan="2" scope="col">CHỈNH SỬA SẢN PHẨM</th>
            </tr>
            <tr>
                <th width="171" align="left" scope="row">Tên sản phẩm</th>
                <td><input type="text" name="TenSP" value="{{ $product->TenSP }}"></td>
            </tr>
            <tr>
                <th align="left" scope="row">Giá bán</th>
                <td><input type="text" name="GiaBan" value="{{ $product->GiaBan }}"></td>
            </tr>
            <tr>
                <th align="left" scope="row">Số lượng</th>
                <td><input type="text" name="SoLuong" value="{{ $product->SoLuong }}"></td>
            </tr>
            <tr>
                <th align="left" scope="row">Hình ảnh</th>
                <td>
                    @if ($product->HinhAnh)
                        <!-- Hiển thị hình ảnh hiện tại -->
                        <img src="{{ asset('storage/image/' . $product->HinhAnh) }}" width="100" alt="Image">
                    @else
                        <!-- Thông báo không có hình ảnh -->
                        <p>No Image</p>
                    @endif
                    <br>
                    <!-- Tệp tin hình ảnh -->
                    <input type="file" name="HinhAnh" id="HinhAnh">
                </td>
            </tr>
            <tr>
                <th align="left" scope="row">Thương hiệu</th>
                <td>
                    <select name="MaTH">
                        @foreach ($companies as $company)
                            <option value="{{ $company->MaTH }}" {{ $product->MaTH == $company->MaTH ? 'selected' : '' }}>
                                {{ $company->TenTH }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button type="submit">Cập nhật</button></td>
            </tr>
        </tbody>
    </table>
</form>
<!-- Thêm hàm JavaScript vào đây -->
<script>
    function ConfirmDelete(form) {
        return confirm("Bạn có chắc chắn muốn xóa không?");
    }
    </script>
</body>
</html>

