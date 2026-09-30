<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Kết quả phép tính - Microsoft Internet Explorer</title>
    <style>

        .container {
            width: 450px;
            margin: 30px auto;
            border: 1px solid #ccc;
            padding: 10px 20px;
        }

        h2 {
            color: #1F497D;
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
        }

        table {
            width: 100%;
        }

        td {
            padding: 6px;
        }

        .label-red {
            color: #C00000;
            font-weight: bold;
        }

        .label-blue {
            color: #1F497D;
            font-weight: bold;
            text-align: right;
            padding-right: 10px;
        }

        input[type="text"] {
            width: 200px;
            padding: 2px 5px;
        }

        .readonly-input {
            background-color: #FAFAFA;
        }

        .back-link {
            text-align: center;
            padding-top: 15px;
        }

        .back-link a {
            color: #800080;
        }
    </style>
</head>

<body>
    <?php
    // Lấy dữ liệu gửi từ form
    $phep_tinh = isset($_POST['phep_tinh']) ? $_POST['phep_tinh'] : "";
    $so1 = isset($_POST['so1']) ? trim($_POST['so1']) : "";
    $so2 = isset($_POST['so2']) ? trim($_POST['so2']) : "";

    /* Hàm kiểm tra dữ liệu nhập vào, nếu không hợp lệ (chuỗi ký tự, chia cho 0...), tự động thông báo và quay lại trang trước */
    function kiemTraDuLieu($s1, $s2, $pt)
    {
        // 1. Kiểm tra rỗng hoặc chứa chuỗi ký tự
        if ($s1 === "" || $s2 === "" || !is_numeric($s1) || !is_numeric($s2)) {
            echo "<script>
            alert('Lỗi: Dữ liệu nhập vào phải là số (không được chứa ký tự chữ hoặc để trống)!');
            window.history.back();
        </script>";
            exit(); // Dừng thực thi trang
        }

        // 2. Kiểm tra phép chia cho 0
        if ($pt == "Chia" && (float) $s2 == 0) {
            echo "<script>
            alert('Lỗi: Không thể thực hiện phép chia cho 0!');
            window.history.back();
        </script>";
            exit(); // Dừng thực thi trang
        }
    }

    // Gọi hàm kiểm tra ngay khi mở trang kết quả
    kiemTraDuLieu($so1, $so2, $phep_tinh);

    // Ép kiểu sang số thực (float)
    $num1 = floatval($so1);
    $num2 = floatval($so2);

    // Khai báo các hàm tính toán
    function cong($a, $b)
    {
        return $a + $b;
    }
    function tru($a, $b)
    {
        return $a - $b;
    }
    function nhan($a, $b)
    {
        return $a * $b;
    }
    function chia($a, $b)
    {
        return $a / $b;
    }

    // Thực hiện tính toán
    $ket_qua = 0;
    switch ($phep_tinh) {
        case "Cộng":
            $ket_qua = cong($num1, $num2);
            break;
        case "Trừ":
            $ket_qua = tru($num1, $num2);
            break;
        case "Nhân":
            $ket_qua = nhan($num1, $num2);
            break;
        case "Chia":
            $ket_qua = chia($num1, $num2);
            break;
    }

    // Điều khiển xuất dữ liệu: Làm tròn tối đa 4 chữ số thập phân nếu là số thực
    if (is_float($ket_qua)) {
        $ket_qua = round($ket_qua, 4);
    }
    ?>

    <div class="container">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>

        <table>
            <tr>
                <td class="label-red" style="width: 35%;">Chọn phép tính:</td>
                <td class="label-red"><?php echo $phep_tinh; ?></td>
            </tr>
            <tr>
                <td class="label-blue">Số 1:</td>
                <td><input type="text" value="<?php echo $num1; ?>" class="readonly-input" readonly></td>
            </tr>
            <tr>
                <td class="label-blue">Số 2:</td>
                <td><input type="text" value="<?php echo $num2; ?>" class="readonly-input" readonly></td>
            </tr>
            <tr>
                <td class="label-blue">Kết quả:</td>
                <td><input type="text" value="<?php echo $ket_qua; ?>" class="readonly-input" readonly></td>
            </tr>
            <tr>
                <td colspan="2" class="back-link">
                    <a href="javascript:window.history.back(-1);">Quay lại trang trước</a>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>