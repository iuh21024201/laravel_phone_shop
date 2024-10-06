<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sách sản phẩm</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<h1 align="center">QUẢN LÝ SẢN PHẨM</h1>
<p>
<a href="{{ route('admin.product_create') }}" style="display: block; text-align: center; text-decoration: none; font-weight: bold;">Thêm sản phẩm</a>
</p>
<table width="835" border="1" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <th width="59" scope="col">STT</th>
      <th width="194" scope="col">Tên Sản Phẩm</th>
      <th width="95" scope="col">Giá Bán</th>
      <th width="95" scope="col">Số lượng</th>
      <th width="119" scope="col">Hình Ảnh</th>
      <th width="99" scope="col">Thương Hiệu</th>
      <th width="88" scope="col">Action</th>
    </tr>
        @php
            $dem = 1; // Khởi tạo biến $dem
        @endphp
        @foreach ($product as $row)
    <tr align="center">
    <td>{{ $dem }}</td>
            <td><a href="{{url('/admin/product/' .$row->MaSP)}} " style="text-decoration: none;">{{ $row->TenSP }}</a></td>
            <td>{{ $row->GiaBan }}</td>
            <td>{{ $row->SoLuong }}</td>
            <td>
                @if ($row->HinhAnh)
                    <img src="{{ asset('storage/image/' . $row->HinhAnh) }}" width="100" alt="Image">
                @else
                    <p>No Image</p>
                @endif
            </td>
            <td>{{ $row->company ? $row->company->TenTH : 'No Brand' }}</td>
            <td>
                <!-- Nút Chỉnh sửa -->
                <a href="{{ url('/admin/product/edit/' . $row->MaSP) }}" style="text-decoration: none; color: inherit;">
                    <button type="button" style="border: none; background: none;">
                        <i class="fas fa-pen-to-square" style="color: #4CAF50; font-size: 20px;"></i>
                    </button>
                </a>
    
                <!-- Nút Xóa -->
                <form method="POST" action="{{ url('/admin/product/delete/' . $row->MaSP) }}" onsubmit="return ConfirmDelete(this)" style="display: inline;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" style="border: none; background: none;">
                        <i class="fas fa-trash" style="color: #F44336; font-size: 20px;"></i>
                    </button>
                </form>
            </td>
        </tr>
        @php
            $dem++;
        @endphp
        @endforeach
    </tr>
  </tbody>
</table>
<!-- Thêm hàm JavaScript vào đây -->
<script>
    function ConfirmDelete(form) {
        return confirm("Bạn có chắc chắn muốn xóa không?");
    }
    document.getElementById('myForm').addEventListener('submit', function(event) {
        alert('Cập nhật sản phẩm thành công!');
    });
</script>
</body>
</html>
