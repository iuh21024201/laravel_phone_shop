<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Chi Tiết Sản Phẩm</title>
</head>
<body>
    <table width="600" border="1" align="center" cellpadding="5" cellspacing="0">
        <tbody>
            <tr>
                <th colspan="2" scope="col">CHI TIẾT SẢN PHẨM</th>
            </tr>
            <tr>
                <th width="171" align="left" scope="row">Tên sản phẩm</th>
                <td>{{ $product->TenSP }}</td>
            </tr>
            <tr>
                <th align="left" scope="row">Giá gốc</th>
                <td>{{ $product->GiaGoc }}</td>
            </tr>
            <tr>
                <th align="left" scope="row">Giá bán</th>
                <td>{{ $product->GiaBan }}</td>
            </tr>
            <tr>
                <th align="left" scope="row">Hình ảnh</th>
                <td>
                    @if ($product->HinhAnh)
                        <img src="{{ asset('storage/image/' . $product->HinhAnh) }}" width="100" alt="Image">
                    @else
                        <p>No Image</p>
                    @endif
                </td>
            </tr>
            <tr>
                <th align="left" scope="row">Thương hiệu</th>
                <td>{{ $product->company ? $product->company->TenTH : 'No Brand' }}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <a href="{{ url('/admin/product/') }}" style="text-decoration: none;">Quay lại danh sách sản phẩm</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>

</html>
