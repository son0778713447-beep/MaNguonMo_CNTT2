<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sắp xếp mảng</title>
    <style>
        table {
            background-color: #e2efef;
            border: 1px solid #238b8c;
            margin: 20px auto;
            width: 480px;
            border-collapse: collapse;
        }

        th {
            background-color: #2b9998;
            color: white;
            font-size: 20px;
            padding: 10px;
            text-transform: uppercase;
        }

        td {
            padding: 8px 10px;
        }

        .btn {
            background-color: #f1f1f1;
            border: 1px solid #999;
            padding: 4px 15px;
            cursor: pointer;
            font-family: sans-serif;
        }

        /* TextField Tăng dần, Giảm dần có màu nền riêng biệt */
        .bg-readonly {
            background-color: #c9f0f1;
            border: 1px solid #7f9db9;
        }

        .note {
            color: red;
            font-weight: bold;
        }

        .subtitle {
            color: #d12229;
            font-weight: bold;
        }

        input[type="text"] {
            width: 85%;
            padding: 4px;
            border: 1px solid #a9a9a9;
        }
    </style>
</head>

<body>
    <?php
    // 1. Viết hàm hoán vị hai số (sử dụng tham chiếu &$a, &$b)[cite: 4]
    function hoan_vi(&$a, &$b)
    {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    // 2. Viết hàm sắp xếp tăng dần[cite: 4]
    function sap_tang($mang)
    {
        $n = count($mang);
        // Duyệt toàn bộ mảng theo hai vòng lặp lồng nhau[cite: 4]
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                // Nếu phần tử đứng trước lớn hơn phần tử đứng sau thì đổi chỗ[cite: 4]
                if ($mang[$i] > $mang[$j]) {
                    hoan_vi($mang[$i], $mang[$j]);
                }
            }
        }
        // Trả về mảng sau khi đã sắp xếp[cite: 4]
        return $mang;
    }

    // 3. Viết hàm sắp xếp giảm dần[cite: 4]
    function sap_giam($mang)
    {
        $n = count($mang);
        // Duyệt toàn bộ mảng theo hai vòng lặp lồng nhau[cite: 4]
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                // Nếu phần tử đứng trước nhỏ hơn phần tử đứng sau thì đổi chỗ
                if ($mang[$i] < $mang[$j]) {
                    hoan_vi($mang[$i], $mang[$j]);
                }
            }
        }
        // Trả về mảng sau khi đã sắp xếp[cite: 4]
        return $mang;
    }

    // Khởi tạo các biến để tránh lỗi khi trang vừa tải
    $chuoi_nhap = "";
    $chuoi_tang = "";
    $chuoi_giam = "";

    // 4. Lấy giá trị dãy số (mảng) trên form thông qua biến $_POST[cite: 4]
    if (isset($_POST['btn_sap_xep'])) {
        $chuoi_nhap = $_POST['nhap_mang'];

        // Tách chuỗi và gán vào mảng[cite: 4]
        $mang_ban_dau = explode(",", $chuoi_nhap);

        // Xử lý loại bỏ khoảng trắng thừa và ép kiểu về số nguyên để sắp xếp chính xác
        $mang = array();
        foreach ($mang_ban_dau as $gia_tri) {
            $mang[] = (int) trim($gia_tri);
        }

        // Gọi các hàm đã xây dựng[cite: 4]
        $mang_tang = sap_tang($mang);
        $mang_giam = sap_giam($mang);

        // Ghép mảng thành chuỗi để in ra kết quả như hình[cite: 4]
        $chuoi_tang = implode(", ", $mang_tang);
        $chuoi_giam = implode(", ", $mang_giam);
    }
    ?>


    <!-- Thiết lập phương thức cho form là POST[cite: 4]. action="" giúp form gửi về chính trang hiện tại để tránh lỗi 404 -->
    <form name="form_sap_xep" method="POST" action="">
        <table>
            <tr>
                <th colspan="2">SẮP XẾP MẢNG</th>
            </tr>
            <tr>
                <td width="30%">Nhập mảng:</td>
                <td>
                    <input type="text" name="nhap_mang" value="<?php echo htmlspecialchars($chuoi_nhap); ?>" required>
                    <span class="note">(*)</span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btn_sap_xep" class="btn" value="Sắp xếp tăng/giảm">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="subtitle">Sau khi sắp xếp:</td>
            </tr>
            <tr>
                <td>Tăng dần:</td>
                <td>
                    <!-- TextField không được phép nhập liệu và chỉnh sửa (sử dụng thuộc tính readonly)[cite: 4] -->
                    <input type="text" class="bg-readonly" style="width: 95%;" readonly
                        value="<?php echo htmlspecialchars($chuoi_tang); ?>">
                </td>
            </tr>
            <tr>
                <td>Giảm dần:</td>
                <td>
                    <!-- TextField không được phép nhập liệu và chỉnh sửa[cite: 4] -->
                    <input type="text" class="bg-readonly" style="width: 95%;" readonly
                        value="<?php echo htmlspecialchars($chuoi_giam); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; font-size: 14px;">
                    <span class="note">(*)</span> Các số được nhập cách nhau bằng dấu ","
                </td>
            </tr>
        </table>
    </form>

</body>

</html>