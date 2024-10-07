<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Chỉnh sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
</head>
<style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }
    </style>
<body>

<div class="container my-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>Chỉnh sửa sản phẩm</h2>
        </div>
        <form method="post" action="{{ url('/admin/product/update/' . $product->MaSP) }}" enctype="multipart/form-data" id="updateForm">
            @csrf
            @method('PATCH') <!-- Sử dụng phương thức PATCH -->
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Tên sản phẩm</th>
                            <td><input type="text" name="TenSP" class="form-control" value="{{ $product->TenSP }}" required></td>
                        </tr>
                        <tr>
                            <th scope="row">Giá bán</th>
                            <td><input type="text" name="GiaBan" class="form-control" value="{{ $product->GiaBan }}" required></td>
                        </tr>
                        <tr>
                            <th scope="row">Số lượng</th>
                            <td><input type="text" name="SoLuong" class="form-control" value="{{ $product->SoLuong }}" required></td>
                        </tr>
                        <tr>
                            <th scope="row">Hình ảnh</th>
                            <td>
                                @if ($product->HinhAnh)
                                    <img src="{{ asset('storage/image/' . $product->HinhAnh) }}" width="100" alt="Image" class="img-thumbnail mb-2">
                                @else
                                    <p>No Image</p>
                                @endif
                                <input type="file" name="HinhAnh" id="HinhAnh" class="form-control-file">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Thương hiệu</th>
                            <td>
                                <select name="MaTH" class="form-control" required>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->MaTH }}" {{ $product->MaTH == $company->MaTH ? 'selected' : '' }}>
                                            {{ $company->TenTH }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#updateForm").validate({
            rules: {
                TenSP: {
                    required: true,
                    maxlength: 60,
                },
                GiaBan: {
                    required: true,
                    regex: /^\d+(\.\d{1,2})?$/ // Cho phép số có tối đa 2 chữ số thập phân
                },
                SoLuong: {
                    required: true,
                    regex: /^\d+$/ // Chỉ cho phép số nguyên
                },
                // Xóa regex cho HinhAnh vì nó là trường file
                MaTH: {
                    required: true,
                }
            },
            messages: {
                TenSP: {
                    required: "Vui lòng nhập tên sản phẩm",
                    maxlength: "Tên sản phẩm không được vượt quá 60 ký tự"
                },
                GiaBan: {
                    required: "Vui lòng nhập giá bán",
                    regex: "Giá bán phải là số hợp lệ với tối đa 2 chữ số thập phân"
                },
                SoLuong: {
                    required: "Vui lòng nhập số lượng",
                    regex: "Số lượng phải là số nguyên"
                },
                MaTH: {
                    required: "Vui lòng chọn thương hiệu"
                }
            }
        });

        // Custom method for regex validation
        $.validator.addMethod("regex", function(value, element, regexpr) {
            return regexpr.test(value);
        }, "Giá trị không hợp lệ");
    });
</script>
</body>
</html>



