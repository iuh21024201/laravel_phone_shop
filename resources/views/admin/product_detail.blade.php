<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Chi Tiết Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
</head>
<body>

<div class="container my-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>Chi Tiết Sản Phẩm</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Tên sản phẩm</th>
                        <td>{{ $product->TenSP }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Giá bán</th>
                        <td>{{ number_format($product->GiaBan, 0, ',', '.') }} VND</td>
                    </tr>
                    <tr>
                        <th scope="row">Số lượng</th>
                        <td>{{ $product->SoLuong }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Hình ảnh</th>
                        <td>
                            @if ($product->HinhAnh)
                                <img src="{{ asset('storage/image/' . $product->HinhAnh) }}" width="150" class="img-thumbnail" alt="Product Image">
                            @else
                                <p>No Image</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Thương hiệu</th>
                        <td>{{ $product->company ? $product->company->TenTH : 'No Brand' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <a href="{{ url('/admin/product/') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại danh sách sản phẩm
            </a>
        </div>
    </div>
</div>

</body>
</html>
