<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Danh sách sản phẩm theo công ty</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .product-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .product-item {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
        width: 31%; /* 3 sản phẩm mỗi hàng */
        box-sizing: border-box;
    }
    .product-item img {
        max-width: 100%;
        height: auto;
    }
    .company-list {
        border-right: 1px solid #ddd;
        padding-right: 10px;
    }
    .pagination {
        justify-content: center;
    }
</style>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <!-- Cột bên trái chiếm 30% -->
        <div class="col-md-3 company-list">
            <!-- Nút để hiện tất cả sản phẩm -->
            <a href="{{ route('customer.dashboard') }}" class="btn btn-primary mb-3">Tất cả sản phẩm</a>
            <!-- Danh sách các công ty với các nút -->
            @foreach ($companies as $company)
                <a href="{{ route('company.products', ['id' => $company->MaTH]) }}" class="btn btn-secondary mb-2 w-100">
                    {{ $company->TenTH }}
                </a>
            @endforeach
        </div>
        <!-- Cột bên phải chiếm 70% -->
        <div class="col-md-9">
            <div class="product-container">
                @foreach ($products as $product)
                <div class="product-item">
                    <div class="product-image">
                        @if ($product->HinhAnh)
                            <img src="{{ asset('storage/image/' . $product->HinhAnh) }}" alt="Image">
                        @else
                            <p>No Image</p>
                        @endif
                    </div>
                    <div class="product-name">
                        <strong>{{ $product->TenSP }}</strong>
                    </div>
                    <div class="product-price">
                        <p><b>Giá Gốc: </b><s>{{ number_format($product->GiaGoc, 0, ',', '.') }} VNĐ</s></p>
                        <p><b>Giá Bán: </b> <span style="color: red;">{{ number_format($product->GiaBan, 0, ',', '.') }} VNĐ</span></p>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Phân trang -->
            <div class="mt-3">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
</body>
</html>



