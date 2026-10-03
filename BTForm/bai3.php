<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán tiền điện</title>
</head>
<body>

    <?php
$ten_chu_ho = "";
$chi_so_cu = "";
$chi_so_moi = "";
$don_gia = 20000;
$so_tien = "";

// Kiểm tra khi người dùng bấm nút Tính (gửi form qua POST)
if (isset($_POST['tinh'])) {
    $ten_chu_ho = $_POST['ten_chu_ho'];
    $chi_so_cu = $_POST['chi_so_cu'];
    $chi_so_moi = $_POST['chi_so_moi'];
    $don_gia = $_POST['don_gia'];

    if(is_numeric($chi_so_moi) && is_numeric($chi_so_cu) && is_numeric($don_gia) && $chi_so_moi > $chi_so_cu && $chi_so_cu >0 && $chi_so_moi >0 && $ten_chu_ho != NULL) {
    //Số tiền thanh toán = (Chỉ số mới - Chỉ số cũ) * Đơn giá

    $so_tien = ($chi_so_moi - $chi_so_cu) * $don_gia;
     }else {
        $so_tien = "Vui lòng nhập số hợp lệ!";
     }
}
?>
<form name="form_tiendien" action="" method="POST">
    <table align="center" bgcolor="#FFF8DC" border="0" cellpadding="5">
        <tr bgcolor="#FFE4B5">
            <td colspan="3" align="center">
                <font color="#8B4513" size="4"><b>THANH TOÁN TIỀN ĐIỆN</b></font>
            </td>
        </tr>
        <tr>
            <td>Tên chủ hộ:</td>
            <td>
                <input type="text" name="ten_chu_ho" value="<?php echo $ten_chu_ho; ?>">
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Chỉ số cũ:</td>
            <td>
                <input type="text" name="chi_so_cu" value="<?php echo $chi_so_cu; ?>">
            </td>
            <td>(Kw)</td>
        </tr>
        <tr>
            <td>Chỉ số mới:</td>
            <td>
                <input type="text" name="chi_so_moi" value="<?php echo $chi_so_moi; ?>">
            </td>
            <td>(Kw)</td>
        </tr>
        <tr>
            <td>Đơn giá:</td>
            <td>
                <!-- Đơn giá có giá trị mặc định là 2000 hoặc 20000 theo đề bài -->
                <input type="text" name="don_gia" value="<?php echo $don_gia; ?>">
            </td>
            <td>(VNĐ)</td>
        </tr>
        <tr>
            <td>Số tiền thanh toán:</td>
            <td>
                <!-- Khóa không cho sửa bằng readonly và đổi màu nền thành màu hồng -->
                <input type="text" name="so_tien" value="<?php echo $so_tien; ?>" readonly style="background-color: #FFC0CB;">
            </td>
            <td>(VNĐ)</td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" name="tinh" value="Tính">
            </td>
        </tr>
    </table>
</form>
</body>
</html>