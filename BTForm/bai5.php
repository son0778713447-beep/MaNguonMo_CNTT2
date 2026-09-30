<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính tiền Karaoke</title>
    <style>
        .form-container {
            background-color: #05b4b4ff; /* Màu nền */
            color: #FFFFFF;
            width: 420px;
            margin: 50px auto;
            border: 1px solid #005656;
        }
        h2 {
            text-align: center;
            color: #FFFFFF;
            margin: 0;
            padding: 12px;
            text-transform: uppercase;
            font-size: 20px;
            letter-spacing: 1px;
        }
        table {
            width: 100%;
            padding: 15px 25px;
        }
        td {
            padding: 6px 0;
            color: #FFFFFF;
        }
        .input-box {
            width: 85%;
            padding: 3px;
        }
        /* Style cho ô Tiền thanh toán ko cho chỉnh sửa */
        .readonly-input {
            color: #000000;
            pointer-events: none;
        }
        .btn-submit {
            text-align: center;
            padding-top: 10px;
        }
        .btn-submit input {
            padding: 4px 12px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
// 1. Khởi tạo các biến
$gio_bat_dau = "";
$gio_ket_thuc = "";
$tien_thanh_toan = "";

// 2. Xử lý khi nhấn nút "Tính tiền"
if (isset($_POST['tinh'])) {
    $gio_bat_dau = $_POST['gio_bat_dau'];
    $gio_ket_thuc = $_POST['gio_ket_thuc'];

    // Kiểm tra dữ liệu nhập vào phải là số
    if (is_numeric($gio_bat_dau) && is_numeric($gio_ket_thuc)) {
        // Yêu cầu: Kiểm tra giờ kết thúc > giờ bắt đầu
        if ($gio_ket_thuc > $gio_bat_dau) {
            // Kiểm tra giờ hoạt động (từ 10h đến 24h)
            if ($gio_bat_dau < 10 || $gio_ket_thuc > 24) {
                $tien_thanh_toan = "Chỉ phục vụ từ 10h đến 24h!";
            } else {
                // Tính số giờ trong khoảng 10h -> 17h (đơn giá 20.000 VNĐ/giờ)
                $gio_1 = max(0, min($gio_ket_thuc, 17) - max($gio_bat_dau, 10));
                
                // Tính số giờ trong khoảng 17h -> 24h (đơn giá 45.000 VNĐ/giờ)
                $gio_2 = max(0, min($gio_ket_thuc, 24) - max($gio_bat_dau, 17));

                // Tổng tiền thanh toán
                $tien_thanh_toan = ($gio_1 * 20000) + ($gio_2 * 45000);
            }
        } else {
            // Thông báo khi Giờ kết thúc <= Giờ bắt đầu
            $tien_thanh_toan = "Giờ kết thúc phải > Giờ bắt đầu";
        }
    } else {
        $tien_thanh_toan = "Vui lòng nhập giờ hợp lệ!";
    }
}
?>

<!-- 3. Thiết kế Form -->
<div class="form-container">
    <h2>TÍNH TIỀN KARAOKE</h2>
    
    <!-- Form phương thức POST, action rỗng để tự xử lý trên cùng trang -->
    <form name="formKaraoke" action="" method="POST">
        <table>
            <tr>
                <td style="width: 35%;">Giờ bắt đầu:</td>
                <td><input type="text" name="gio_bat_dau" class="input-box" value="<?php echo $gio_bat_dau; ?>" required></td>
                <td>(h)</td>
            </tr>
            <tr>
                <td>Giờ kết thúc:</td>
                <td><input type="text" name="gio_ket_thuc" class="input-box" value="<?php echo $gio_ket_thuc; ?>" required></td>
                <td>(h)</td>
            </tr>
            <tr>
                <td>Tiền thanh toán:</td>
                <!-- Textfield Tiền thanh toán có thuộc tính readonly (không cho phép nhập/chỉnh sửa) -->
                <td><input type="text" name="tien_thanh_toan" class="input-box readonly-input" value="<?php echo $tien_thanh_toan; ?>" readonly></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td colspan="3" class="btn-submit">
                    <input type="submit" name="tinh" value="Tính tiền">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>