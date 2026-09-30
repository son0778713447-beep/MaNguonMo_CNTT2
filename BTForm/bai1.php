<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính diện tích hình chữ nhật</title>
    <style>
        .form-container {
            background-color: #FFF2CC; /* Màu nền */
            width: 400px;
            margin: 50px auto;
            border: 1px solid #ccc;
        }
        h2 {
            text-align: center;
            color: #ff0000ff; /* Màu chữ tiêu đề */
            background-color: #FCE4D6; /* Nền tiêu đề */
            margin: 0;
            padding: 10px;
        }
        .form-body {
            padding: 20px;
        }
        table {
            width: 100%;
        }
        td {
            padding: 8px 0;
        }
        /* Style cho ô Diện tích không cho phép chỉnh sửa */
        .readonly-input {
            pointer-events: none; /* Ko cho click vào */
        }
        .btn-tinh {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
// 1. Khởi tạo các biến
$chieudai = "";
$chieurong = "";
$dientich = "";

// 2. Kiểm tra xem người dùng đã nhấn nút "Tính" chưa
if (isset($_POST['tinh'])) {
    // Lấy dữ liệu từ form
    $chieudai = $_POST['chieudai'];
    $chieurong = $_POST['chieurong'];

    // Kiểm tra dữ liệu nhập vào có phải là số không
    if (is_numeric($chieudai) && is_numeric($chieurong) && $chieudai>0 && $chieurong>0) {
        // Thực hiện tính toán: Diện tích = Chiều dài * Chiều rộng
        $dientich = $chieudai * $chieurong;
    } else {
        $dientich = "Vui lòng nhập số hợp lệ!";
    }
    }
?>

<div class="form-container">
    <h2>DIỆN TÍCH HÌNH CHỮ NHẬT</h2>
    
    <!-- form có method="POST" và action rỗng (tự submit về chính trang hiện tại) -->
    <form name="formDienTich" action="" method="POST">
        <div class="form-body">
            <table>
                <tr>
                    <td>Chiều dài:</td>
                    <td><input type="text" name="chieudai" value="<?php echo $chieudai; ?>" required></td>
                </tr>
                <tr>
                    <td>Chiều rộng:</td>
                    <td><input type="text" name="chieurong" value="<?php echo $chieurong; ?>" required></td>
                </tr>
                <tr>
                    <td>Diện tích:</td>
                    <!-- Thuộc tính readonly giúp ô này không cho phép chỉnh sửa -->
                    <td><input type="text" name="dientich" class="readonly-input" value="<?php echo $dientich; ?>" readonly></td>
                </tr>
                <tr>
                    <td colspan="2" class="btn-tinh">
                        <input type="submit" name="tinh" value="Tính">
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>