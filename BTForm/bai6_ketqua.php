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
            font-style: italic;
        }
    </style>
</head>
<body>

<?php
// Định nghĩa các hàm
function cong($a, $b) {
    return $a + $b;
}

function tru($a, $b) {
    return $a - $b;
}

function nhan($a, $b) {
    return $a * $b;
}

function chia($a, $b) {
    if ($b == 0) {
        return "Không thể chia cho 0";
    }
    return $a / $b;
}

// Lấy dữ liệu từ form trang bai6.php gửi sang
$phep_tinh = isset($_POST['phep_tinh']) ? $_POST['phep_tinh'] : "";
$so1 = isset($_POST['so1']) ? $_POST['so1'] : 0;
$so2 = isset($_POST['so2']) ? $_POST['so2'] : 0;
$ket_qua = "";

// Gọi hàm tương ứng dựa trên phép tính đã chọn
if (is_numeric($so1) && is_numeric($so2)) {
    switch ($phep_tinh) {
        case "Cộng":
            $ket_qua = cong($so1, $so2);
            break;
        case "Trừ":
            $ket_qua = tru($so1, $so2);
            break;
        case "Nhân":
            $ket_qua = nhan($so1, $so2);
            break;
        case "Chia":
            $ket_qua = chia($so1, $so2);
            break;
    }
} else {
    $ket_qua = "Dữ liệu không hợp lệ!";
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
            <td><input type="text" value="<?php echo $so1; ?>" class="readonly-input" readonly></td>
        </tr>
        <tr>
            <td class="label-blue">Số 2:</td>
            <td><input type="text" value="<?php echo $so2; ?>" class="readonly-input" readonly></td>
        </tr>
        <tr>
            <td class="label-blue">Kết quả:</td>
            <td><input type="text" value="<?php echo $ket_qua; ?>" class="readonly-input" readonly></td>
        </tr>
        <tr>
            <td colspan="2" class="back-link">
                <!-- Thẻ link quay lại trang trước bằng JavaScript window.history -->
                <a href="javascript:window.history.back(-1);">Quay lại trang trước</a>
            </td>
        </tr>
    </table>
</div>

</body>
</html>