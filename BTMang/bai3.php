<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bài tập 3 - Phát sinh mảng và tính toán</title>
    <style>
        body { 
            margin: 20px; 
            line-height: 1.6; 
            font-family: Arial, sans-serif;
        }
        .form-container { 
            width: 550px; 
            margin-bottom: 20px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            background-color: #ffebf0; /* Màu nền hồng nhạt */
            border: 1px solid #b30059;
        }
        th { 
            background-color: #b30059; /* Màu đỏ đô/hồng đậm của Header */
            color: white; 
            padding: 10px; 
            font-size: 18px; 
            text-transform: uppercase; 
        }
        td { 
            padding: 8px 10px; 
        }
        .btn-submit { 
            background-color: #ffff99; /* Nút màu vàng */
            border: 1px solid #999; 
            padding: 5px 15px; 
            cursor: pointer; 
        }
        .btn-submit:hover {
            background-color: #ffff66;
        }
        .input-readonly { 
            background-color: #ffcccc; /* Ô kết quả màu hồng đậm hơn */
            color: red;
            font-weight: bold;
            border: 1px solid #ff9999;
        }
        .note { 
            text-align: center; 
            color: red; 
            font-size: 13px; 
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Bài tập 3: Thiết kế Form Phát sinh mảng và tính toán</h2>

    <?php
    // 1. Hàm tạo mảng ngẫu nhiên
    function tao_mang($n) {
        $arr = array();
        for ($i = 0; $i < $n; $i++) {
            $arr[] = rand(0, 20);
        }
        return $arr;
    }

    // 2. Hàm xuất mảng thành chuỗi
    function xuat_mang($arr) {
        return implode(" ", $arr);
    }

    // 3. Hàm tính tổng mảng
    function tinh_tong($arr) {
        $tong = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $tong += $arr[$i];
        }
        return $tong;
    }

    // 4. Hàm tìm giá trị lớn nhất (MAX)
    function tim_max($arr) {
        $max = $arr[0];
        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i] > $max) {
                $max = $arr[$i];
            }
        }
        return $max;
    }

    // 5. Hàm tìm giá trị nhỏ nhất (MIN)
    function tim_min($arr) {
        $min = $arr[0];
        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i] < $min) {
                $min = $arr[$i];
            }
        }
        return $min;
    }

    // Khởi tạo các biến hiển thị
    $n = "";
    $mang_kq = "";
    $max = "";
    $min = "";
    $tong = "";

    // Xử lý khi nhấn nút Phát sinh và tính toán
    if (isset($_POST['submit'])) {
        $n = trim($_POST['n']);
        
        // Kiểm tra số phần tử nhập vào phải là số dương
        if (is_numeric($n) && $n > 0) {
            // Gọi sử dụng 5 hàm đã xây dựng
            $mang = tao_mang($n);
            $mang_kq = xuat_mang($mang);
            $tong = tinh_tong($mang);
            $max = tim_max($mang);
            $min = tim_min($mang);
        } else {
            $mang_kq = "Vui lòng nhập số phần tử là số nguyên dương!";
        }
    }
    ?>

    <!-- Form nhập liệu -->
    <div class="form-container">
        <form method="POST" action="">
            <table>
                <tr>
                    <th colspan="2">Phát sinh mảng và tính toán</th>
                </tr>
                <tr>
                    <td width="35%">Nhập số phần tử:</td>
                    <td width="65%">
                        <input type="text" name="n" style="width: 50%;" value="<?php echo htmlspecialchars($n); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="submit" class="btn-submit">Phát sinh và tính toán</button>
                    </td>
                </tr>
                <tr>
                    <td>Mảng:</td>
                    <td>
                        <input type="text" class="input-readonly" style="width: 95%;" value="<?php echo htmlspecialchars($mang_kq); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>GTLN (MAX) trong mảng:</td>
                    <td>
                        <input type="text" class="input-readonly" style="width: 50%;" value="<?php echo htmlspecialchars($max); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>GTNN (MIN) trong mảng:</td>
                    <td>
                        <input type="text" class="input-readonly" style="width: 50%;" value="<?php echo htmlspecialchars($min); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Tổng mảng:</td>
                    <td>
                        <input type="text" class="input-readonly" style="width: 50%;" value="<?php echo htmlspecialchars($tong); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="note">
                        (<span style="text-decoration: underline;">Ghi chú:</span> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>