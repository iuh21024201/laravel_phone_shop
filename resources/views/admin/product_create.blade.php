<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Thêm Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }
    </style>
</head>

<body>
<div class="container">

    <form method="post" action="{{ route('admin.product_store') }}" enctype="multipart/form-data" id="insertForm">
        @csrf 
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">THÊM SẢN PHẨM</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="align-left" scope="row">Tên sản phẩm</th>
                    <td><input type="text" name="TenSP" id="TenSP" class="form-control" required></td>
                </tr>
                <tr>
                    <th class="align-left" scope="row">Giá bán</th>
                    <td><input type="text" name="GiaBan" id="GiaBan" class="form-control" required></td>
                </tr>
                <tr>
                    <th class="align-left" scope="row">Số lượng</th>
                    <td><input type="text" name="SoLuong" id="SoLuong" class="form-control" required></td>
                </tr>
                <tr>
                    <th class="align-left" scope="row">Hình ảnh</th>
                    <td><input type="file" name="HinhAnh" id="HinhAnh" class="form-control"></td>
                </tr>
                <tr>
                    <th class="align-left" scope="row">Thương hiệu</th>
                    <td>
                        <select name="MaTH" class="form-select" required>
                            @foreach ($companies as $company)
                                <option value="{{ $company->MaTH }}">{{ $company->TenTH }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><button type="submit" class="btn btn-primary">Thêm sản phẩm</button></td>
                </tr>
            </tbody>
        </table>
    </form>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#insertForm").validate({
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
                HinhAnh: {
                    required: true,
                    regex: /\.(jpg|jpeg|png|gif)$/i // Kiểm tra định dạng file ảnh
                },
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
                HinhAnh: {
                    required: "Vui lòng chọn hình ảnh",
                    regex: "Chỉ chấp nhận các định dạng ảnh: jpg, jpeg, png, gif"
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

