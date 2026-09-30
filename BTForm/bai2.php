<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính diện tích và chu vi hình tròn</title>
    <style>
        .form-container {
            background-color: #e7d7a6ff; /* Màu nền form */
            width: 400px;
            margin: 50px auto;
            border: 1px solid #ccc;
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
            color: #D2691E; /* Màu chữ*/
            margin: 0;
            padding: 10px;
            font-size: 22px;
        }
        .form-body {
            padding: 15px 30px;
        }
        table {
            width: 100%;
        }
        td {
            padding: 8px 0;
        }
        /* Style cho ô không cho phép chỉnh sửa */
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
// 1. Định nghĩa hằng số PI
define("PI", 3.14);

// 2. Khởi tạo các biến
$bankinh = "";
$dientich = "";
$chuvi = "";

// 3. Xử lý khi người dùng nhấn nút "Tính"
if (isset($_POST['tinh'])) {
    $bankinh = $_POST['bankinh'];

    // Kiểm tra dữ liệu nhập vào phải là số
    if (is_numeric($bankinh) && $bankinh > 0) {
        // Tính diện tích = PI * (Bán kính)^2
        $dientich = PI * pow($bankinh, 2);
        
        // Tính chu vi = 2 * PI * Bán kính
        $chuvi = 2 * PI * $bankinh;
    } else {
        $dientich = "Vui lòng nhập số > 0!";
        $chuvi = "Vui lòng nhập số > 0!";
    }
}
?>

<div class="form-container">
    <h2>DIỆN TÍCH VÀ CHU VI<br>HÌNH TRÒN</h2>
    
    <!-- form có method="POST", action rỗng để trang tự xử lý -->
    <form name="formHinhTron" action="" method="POST">
        <div class="form-body">
            <table>
                <tr>
                    <td>Bán kính:</td>
                    <td><input type="text" name="bankinh" value="<?php echo $bankinh; ?>" required></td>
                </tr>
                <tr>
                    <td>Diện tích:</td>
                    <!-- Thuộc tính readonly để không cho phép chỉnh sửa -->
                    <td><input type="text" name="dientich" class="readonly-input" value="<?php echo $dientich; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Chu vi:</td>
                    <!-- Thuộc tính readonly để không cho phép chỉnh sửa -->
                    <td><input type="text" name="chuvi" class="readonly-input" value="<?php echo $chuvi; ?>" readonly></td>
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