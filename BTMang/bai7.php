<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Tính Năm Âm Lịch</title>
    <style>
        table {
            background-color: #c9e8f6;
            margin: 30px auto;
            width: 450px;
            border: 1px solid #0055a4;
            border-collapse: collapse;
            text-align: center;
        }

        th {
            background-color: #005bb5;
            color: white;
            font-size: 22px;
            padding: 10px;
            text-transform: uppercase;
        }

        td {
            padding: 10px;
        }

        .btn {
            background-color: #ffeeb2;
            border: 1px solid #d4a754;
            color: red;
            font-weight: bold;
            padding: 4px 15px;
            cursor: pointer;
            font-size: 16px;
        }

        /* TextField Năm âm lịch không được phép nhập liệu ( readonly ) và có nền vàng nhạt */
        .bg-readonly {
            background-color: #fffcce;
            border: 1px solid #a9a9a9;
            color: red;
            font-weight: bold;
            text-align: center;
        }

        .img-container {
            min-height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 15px;
        }

        input[type="text"] {
            width: 120px;
            padding: 4px;
            text-align: center;
            border: 1px solid #a9a9a9;
        }

        .label-text {
            color: #004d99;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
    </style>
</head>

<body>
    <?php
    // Khởi tạo biến ban đầu để tránh lỗi khi mới load trang
    $nam_duong_lich = "";
    $nam_am_lich = "";
    $hinh_anh = "";

    // Kiểm tra xem người dùng đã nhấn nút "=>" (btn_tinh) chưa[cite: 5]
    if (isset($_POST['btn_tinh'])) {
        // Lấy giá trị năm trên form thông qua biến $_POST[cite: 5]
        $nam_duong_lich = $_POST['nam_duong_lich'];

        if (is_numeric($nam_duong_lich) && $nam_duong_lich > 3) {
            // Tạo ra 3 mảng: $mang_can, $mang_chi và $mang_hinh để lưu giá trị can, chi, hình ảnh[cite: 5]
            $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
            $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
            $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.gif", "ran.jpg", "ngo.jpg", "mui.jpg", "than.gif", "dau.jpg", "tuat.jpg");

            // Tính can, chi và lấy hình ảnh cho năm được nhập[cite: 5]
            $nam = $nam_duong_lich - 3;
            $can = $nam % 10;
            $chi = $nam % 12;

            $nam_al = $mang_can[$can];
            $nam_al = $nam_al . " " . $mang_chi[$chi];

            $hinh = $mang_hinh[$chi];
            // Thẻ img lấy hình ảnh từ thư mục 12con_giap[cite: 5]
            $hinh_anh = "<img src='12con_giap/$hinh' alt='Hình con giáp' width='120'>";

            $nam_am_lich = $nam_al;
        }
    }
    ?>


    <!-- Thiết lập phương thức cho form là POST, action là tên trang (để rỗng "" sẽ tự trỏ về chính nó)[cite: 5] -->
    <form name="form_tinh_nam" method="POST" action="">
        <table>
            <tr>
                <th colspan="3">TÍNH NĂM ÂM LỊCH</th>
            </tr>
            <tr>
                <td width="35%">
                    <span class="label-text">Năm dương lịch</span>
                    <input type="text" name="nam_duong_lich" value="<?php echo htmlspecialchars($nam_duong_lich); ?>"
                        required>
                </td>
                <td width="20%">
                    <br>
                    <input type="submit" name="btn_tinh" class="btn" value="=>">
                </td>
                <td width="45%">
                    <span class="label-text">Năm âm lịch</span>
                    <!-- Textfield Năm âm lịch không được phép nhập liệu và chỉnh sửa (readonly)[cite: 5] -->
                    <input type="text" class="bg-readonly" name="nam_am_lich" readonly
                        value="<?php echo htmlspecialchars($nam_am_lich); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="img-container">
                        <?php
                        // In ra màn hình hình ảnh con vật[cite: 5]
                        echo $hinh_anh;
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>