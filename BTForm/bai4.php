<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả thi đại học</title>
    <style>
        .form-container {
            background-color: #FCE4D6; /* Màu nền */
            width: 420px;
            margin: 50px auto;
            border: 1px solid #E6B0AA;
        }
        h2 {
            text-align: center;
            color: #FFFFFF;
            background-color: #f33b79ff; /* Màu hồng đậm cho thanh tiêu đề */
            margin: 0;
            padding: 10px;
            text-transform: uppercase;
            font-size: 20px;
        }
        table {
            width: 100%;
            padding: 15px 25px;
        }
        td {
            padding: 6px 0;
        }
        .input-box {
            width: 90%;
        }
        /* Style cho các ô không cho phép nhập */
        .readonly-input {
            pointer-events: none;
        }
        .btn-submit {
            text-align: center;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<?php
// 1. Khởi tạo các biến ban đầu
$toan = "";
$ly = "";
$hoa = "";
$diem_chuan = "";
$tong_diem = "";
$ket_qua = "";

// 2. Xử lý khi nhấn nút "Xem kết quả"
if (isset($_POST['xem_ket_qua'])) {
    $toan = $_POST['toan'];
    $ly = $_POST['ly'];
    $hoa = $_POST['hoa'];
    $diem_chuan = $_POST['diem_chuan'];

    // Kiểm tra dữ liệu nhập vào có phải là số hay ko
    if (is_numeric($toan) && is_numeric($ly) && is_numeric($hoa) && is_numeric($diem_chuan) && ($toan >= 0&& $hoa >= 0&&$ly>=0) && ($toan <=10 && $hoa <=10 && $ly<=10) ) {
        // Công thức tính Tổng điểm = Toán + Lý + Hóa
        $tong_diem = $toan + $ly + $hoa;

        // Đậu khi ko có môn nào 0 điểm VÀ tổng điểm >= điểm chuẩn. Ngược lại: Rớt.
        if ($toan > 0 && $ly > 0 && $hoa > 0 && $tong_diem >= $diem_chuan) {
            $ket_qua = "Đậu";
        } else {
            $ket_qua = "Rớt";
        }
    } else {
        $ket_qua = "Vui lòng nhập điểm hợp lệ!";
    }
}
?>

<!-- 3. Thiết kế Form -->
<div class="form-container">
    <h2>KẾT QUẢ THI ĐẠI HỌC</h2>
    
    <!-- Form tên formKetQuaThi, method POST, action rỗng để tự xử lý trên trang -->
    <form name="formKetQuaThi" action="" method="POST">
        <table>
            <tr>
                <td style="width: 35%;">Toán:</td>
                <td><input type="text" name="toan" class="input-box" value="<?php echo $toan; ?>" required></td>
            </tr>
            <tr>
                <td>Lý:</td>
                <td><input type="text" name="ly" class="input-box" value="<?php echo $ly; ?>" required></td>
            </tr>
            <tr>
                <td>Hoá:</td>
                <td><input type="text" name="hoa" class="input-box" value="<?php echo $hoa; ?>" required></td>
            </tr>
            <tr>
                <td>Điểm chuẩn:</td>
                <td><input type="text" name="diem_chuan" class="input-box" value="<?php echo $diem_chuan; ?>" required></td>
            </tr>
            <tr>
                <td>Tổng điểm:</td>
                <!-- Textfield Tổng điểm được thêm readonly để không cho phép chỉnh sửa -->
                <td><input type="text" name="tong_diem" class="input-box readonly-input" value="<?php echo $tong_diem; ?>" readonly></td>
            </tr>
            <tr>
                <td>Kết quả thi:</td>
                <!-- Textfield Kết quả thi được thêm readonly để không cho phép chỉnh sửa -->
                <td><input type="text" name="ket_qua" class="input-box readonly-input" value="<?php echo $ket_qua; ?>" readonly></td>
            </tr>
            <tr>
                <td colspan="2" class="btn-submit">
                    <input type="submit" name="xem_ket_qua" value="Xem kết quả">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>