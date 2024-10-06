<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="{{ url('/admin/product/store') }}" enctype="multipart/form-data">
    @csrf 
    <table width="600" border="1" align="center" cellpadding="5" cellspacing="0">
        <tbody>
            <tr>
                <th colspan="2" scope="col">THÊM SẢN PHẨM</th>
            </tr>
            <tr>
                <th width="171" align="left" scope="row">Tên sản phẩm</th>
                <td width="403"><input type="text" name="TenSP" id="TenSP" required></td>
            </tr>
            <tr>
                <th align="left" scope="row">Giá bán</th>
                <td><input type="text" name="GiaBan" id="GiaBan" required></td>
            </tr>
            <tr>
                <th align="left" scope="row">Số lượng</th>
                <td><input type="text" name="SoLuong" id="SoLuong" required></td>
            </tr>
            <tr>
                <th align="left" scope="row">Hình ảnh</th>
                <td><input type="file" name="HinhAnh" id="HinhAnh"></td>
            </tr>
            <tr>
                <th align="left" scope="row">Thương hiệu</th>
                <td>
                    <select name="MaTH" required>
                        @foreach ($companies as $company)
                            <option value="{{ $company->MaTH }}">{{ $company->TenTH }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th colspan="2" align="align" scope="row"><input type="submit" name="submit" id="submit" value="Thêm sản phẩm"></th>
            </tr>
        </tbody>
    </table>
</form>
</body>
</html>
