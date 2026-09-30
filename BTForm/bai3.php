<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán tiền điện</title>
    <style>
        .form-container {
            background-color: #FFF2CC; /* Màu nền */
            width: 450px;
            margin: 50px auto;
            border: 1px solid #ccc;
        }
        h2 {
            text-align: center;
            color: #ef1717; /* Màu chữ */
            background-color: #F8CBAD; /* Nền tiêu đề */
            margin: 0;
            padding: 10px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            padding: 15px;
        }
        td {
            padding: 6px 0;
        }
        .input-box {
            width: 90%;
        }
        /* Ô Số tiền thanh toán không cho chỉnh sửa */
        .readonly-input {
            pointer-events: none; /* Khóa click chuột */
        }
        .btn-tinh {
            text-align: center;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<?php
// 1. Khởi tạo các biến
$ten_chu_ho = "";
$chi_so_cu = "";
$chi_so_moi = "";
// Gán giá trị mặc định của Đơn giá là 20000
$don_gia = "20000"; 
$so_tien_thanh_toan = "";

// 2. Kiểm tra nếu người dùng bấm nút Tính (phương thức POST)
if (isset($_POST['tinh'])) {
    $ten_chu_ho = $_POST['ten_chu_ho'];
    $chi_so_cu = $_POST['chi_so_cu'];
    $chi_so_moi = $_POST['chi_so_moi'];
    $don_gia = $_POST['don_gia'];

    // Kiểm tra dữ liệu nhập vào phải là số
    if (is_numeric($chi_so_cu) && is_numeric($chi_so_moi) && is_numeric($don_gia)) {
        if ($chi_so_moi >= $chi_so_cu) {
            // Thực hiện tính toán: Số tiền = (Chỉ số mới - Chỉ số cũ) * Đơn giá
            $so_tien_thanh_toan = ($chi_so_moi - $chi_so_cu) * $don_gia;
        } else {
            $so_tien_thanh_toan = "Lỗi: Chỉ số mới < Chỉ số cũ";
        }
    } else {
        $so_tien_thanh_toan = "Dữ liệu nhập không hợp lệ!";
    }
}
?>

<!-- 3. Thiết kế Form -->
<div class="form-container">
    <h2>THANH TOÁN TIỀN ĐIỆN</h2>
    
    <!-- Thiết lập phương thức POST và action là tên của trang (ở đây để rỗng để tự xử lý trên cùng trang) -->
    <form name="formTienDien" action="" method="POST">
        <table>
            <tr>
                <td style="width: 35%;">Tên chủ hộ:</td>
                <td><input type="text" name="ten_chu_ho" class="input-box" value="<?php echo $ten_chu_ho; ?>"></td>
                <td style="width: 15%;"></td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td><input type="text" name="chi_so_cu" class="input-box" value="<?php echo $chi_so_cu; ?>" required></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td><input type="text" name="chi_so_moi" class="input-box" value="<?php echo $chi_so_moi; ?>" required></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td><input type="text" name="don_gia" class="input-box" value="<?php echo $don_gia; ?>" required></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>
                <!-- Textfield Số tiền thanh toán sử dụng thuộc tính readonly để không cho phép nhập liệu và chỉnh sửa -->
                <td><input type="text" name="so_tien_thanh_toan" class="input-box readonly-input" value="<?php echo $so_tien_thanh_toan; ?>" readonly></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td colspan="3" class="btn-tinh">
                    <input type="submit" name="tinh" value="Tính">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>