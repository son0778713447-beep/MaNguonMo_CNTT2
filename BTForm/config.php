<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Config</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            line-height: 1.6;
            color: #000;
        }
        .container {
            max-width: 600px;
        }
        .btn-back {
            margin-top: 15px;
        }
        .btn-back button {
            padding: 3px 12px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu gửi từ form.htm
    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $address  = isset($_POST['address']) ? $_POST['address'] : '';
    $phone    = isset($_POST['phone']) ? $_POST['phone'] : '';
    $gender   = isset($_POST['gender']) ? $_POST['gender'] : '';
    $country  = isset($_POST['country']) ? $_POST['country'] : '';
    
    // Lấy danh sách checkbox đã chọn (Study)
    $study = isset($_POST['study']) ? implode(', ', $_POST['study']) : '';
    
    // Lấy ghi chú Note
    $note = isset($_POST['note']) ? $_POST['note'] : '';
    // Chuyển ký tự xuống dòng (\n) thành khoảng trắng để giống hiển thị trong hình mẫu
    $note_display = str_replace(array("\r\n", "\r", "\n"), " ", $note);

    // Xuất thông tin ra màn hình theo mẫu
    echo "Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:<br>";
    echo "Họ tên: " . htmlspecialchars($fullname) . "<br>";
    echo "Address: " . htmlspecialchars($address) . "<br>";
    echo "Phone: " . htmlspecialchars($phone) . "<br>";
    echo "Gender: " . htmlspecialchars($gender) . "<br>";
    echo "Country: " . htmlspecialchars($country) . "<br>";
    if (!empty($study)) {
        echo "Study: " . htmlspecialchars($study) . "<br>";
    }
    echo "Note: " . htmlspecialchars($note_display) . "<br>";
} else {
    echo "Không tìm thấy dữ liệu được gửi đến!";
}
?>

    <!-- Nút Quay về để trở lại trang trước -->
    <div class="btn-back">
        <a href="javascript:window.history.back();">
            <button type="button">Quay về</button>
        </a>
    </div>
</div>

</body>
</html>