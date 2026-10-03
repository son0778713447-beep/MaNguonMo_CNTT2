<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thiết kế Form Thay thế</title>
    <style>
        table {
            background-color: #feeffa;
            border: 1px solid #c8689c;
            margin: 20px auto;
            width: 450px;
            border-collapse: collapse;
        }
        th {
            background-color: #a02068;
            color: white;
            font-size: 18px;
            padding: 10px;
            text-transform: uppercase;
        }
        td { padding: 8px 10px; }
        .btn {
            background-color: #f7e178;
            border: 1px solid #b89800;
            padding: 4px 15px;
            font-weight: bold;
            cursor: pointer;
        }
        .bg-readonly { background-color: #fca09b; border: 1px solid #c8689c; }
        .note { color: red; text-align: center; font-size: 13px; }
        input[type="text"] { width: 95%; padding: 4px; }
    </style>
</head>
<body>
<?php
// 1. Hàm thay thế các giá trị cũ bằng giá trị mới[cite: 3]
function thay_the($mang, $cu, $moi) {
    for ($i = 0; $i < count($mang); $i++) {
        // Dùng trim() để loại bỏ khoảng trắng thừa (ví dụ sau dấu phẩy)
        if (trim($mang[$i]) == trim($cu)) {
            $mang[$i] = trim($moi);
        }
    }
    return $mang;
}

// 2. Hàm xuất mảng (chuyển mảng thành chuỗi cách nhau bởi khoảng trắng)
function xuat_mang($mang) {
    return implode(" ", $mang);
}

// Khởi tạo các biến để tránh lỗi Undefined variable khi mới tải trang
$chuoi_nhap = "";
$gia_tri_cu = "";
$gia_tri_moi = "";
$chuoi_mang_cu = "";
$chuoi_mang_moi = "";

// 3. Xử lý khi nút "Thay thế" được nhấn qua biến $_POST[cite: 3]
if (isset($_POST['btn_thay_the'])) {
    $chuoi_nhap = $_POST['nhap_mang'];
    $gia_tri_cu = $_POST['gia_tri_cu'];
    $gia_tri_moi = $_POST['gia_tri_moi'];

    // Tạo mảng từ dãy số dùng explode[cite: 3]
    $mang = explode(",", $chuoi_nhap);

    // Xuất mảng cũ
    $chuoi_mang_cu = xuat_mang($mang);

    // Gọi hàm thay thế để tạo mảng mới[cite: 3]
    $mang_sau_thay_the = thay_the($mang, $gia_tri_cu, $gia_tri_moi);
    
    // Xuất mảng mới
    $chuoi_mang_moi = xuat_mang($mang_sau_thay_the);
}
?>

<!-- Thiết lập action="" để form luôn gửi dữ liệu về đúng file hiện tại, tránh lỗi Not Found[cite: 3] -->
<form name="form_thay_the" method="POST" action="">
    <table>
        <tr>
            <th colspan="2">THAY THẾ</th>
        </tr>
        <tr>
            <td width="35%">Nhập các phần tử:</td>
            <td>
                <input type="text" name="nhap_mang" value="<?php echo htmlspecialchars($chuoi_nhap); ?>" required>
            </td>
        </tr>
        <tr>
            <td>Giá trị cần thay thế:</td>
            <td>
                <input type="text" name="gia_tri_cu" value="<?php echo htmlspecialchars($gia_tri_cu); ?>" required>
            </td>
        </tr>
        <tr>
            <td>Giá trị thay thế:</td>
            <td>
                <input type="text" name="gia_tri_moi" value="<?php echo htmlspecialchars($gia_tri_moi); ?>" required>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="btn_thay_the" class="btn" value="Thay thế">
            </td>
        </tr>
        <tr>
            <td>Mảng cũ:</td>
            <td>
                <!-- TextField không được phép nhập liệu và chỉnh sửa (readonly)[cite: 3] -->
                <input type="text" class="bg-readonly" readonly value="<?php echo htmlspecialchars($chuoi_mang_cu); ?>">
            </td>
        </tr>
        <tr>
            <td>Mảng sau khi thay thế:</td>
            <td>
                <!-- TextField không được phép nhập liệu và chỉnh sửa (readonly)[cite: 3] -->
                <input type="text" class="bg-readonly" readonly value="<?php echo htmlspecialchars($chuoi_mang_moi); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" class="note">
                (<b>Ghi chú:</b> Các phần tử trong mảng sẽ cách nhau bằng dấu phẩy ",")
            </td>
        </tr>
    </table>
</form>

</body>
</html>