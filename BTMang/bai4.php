<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bài tập 4 - Tìm kiếm trên mảng</title>
    <style>
        body {  
            margin: 20px;
        }
        .form-wrapper {
            width: 550px; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #d1ece1; /* Màu nền xanh ngọc nhạt của thân form */
            border: 1px solid #339999;
        }
        th {
            background-color: #3b9b8f; /* Màu xanh ngọc đậm của Header */
            color: white;
            padding: 12px;
            font-size: 22px;
            font-style: italic;
        }
        td {
            padding: 8px 10px;
            font-size: 14px;
        }
        .col-label {
            width: 150px; 
        }
        .btn-submit {
            background-color: #bfe0ed; /* Nút màu xanh xám nhạt */
            border: 1px solid #7a9ea8;
            padding: 4px 15px;
            cursor: pointer;
            font-size: 13px;
        }
        .btn-submit:hover {
            background-color: #a8d1e3;
        }
        .input-normal {
            padding: 3px;
            border: 1px solid #ccc;
        }
        /* Định dạng ô kết quả và mảng không được sửa */
        .input-readonly {
            background-color: #f5fcf9;
            padding: 3px;
            border: 1px solid #ccc;
        }
        .input-result {
            background-color: #f5fcf9;
            color: red;
            font-weight: bold;
            padding: 3px;
            border: 1px solid #ccc;
        }
        .footer-note {
            background-color: #76c7b7; /* Màu xanh ngọc ở footer */
            text-align: center;
            color: #1a5247;
            font-size: 14px;
            padding: 8px;
        }
    </style>
</head>
<body>

    <?php
    // Hàm tìm kiếm phần tử trong mảng[cite: 5]
    function tim_kiem($mang, $gia_tri) {
        // Duyệt mảng bằng vòng lặp for[cite: 5]
        for ($i = 0; $i < count($mang); $i++) {
            // Dùng trim() để loại bỏ khoảng trắng dư thừa khi người dùng nhập "1, 2, 3"
            if (trim($mang[$i]) == trim($gia_tri)) {
                return $i; // Trả về vị trí (index) của phần tử[cite: 5]
            }
        }
        return -1; // Không tìm thấy trả về -1[cite: 5]
    }

    // Khởi tạo biến rỗng để tránh lỗi khi mới load trang
    $nhap_mang = "";
    $so_can_tim = "";
    $mang_xuat = "";
    $ket_qua = "";

    // Lấy giá trị trên form qua biến $_POST khi nhấn TÌm kiếm[cite: 5]
    if (isset($_POST['submit'])) {
        $nhap_mang = $_POST['nhap_mang'];
        $so_can_tim = $_POST['so_can_tim'];
        
        if (!empty($nhap_mang) && $so_can_tim !== "") {
            // Tách chuỗi và gán vào mảng[cite: 4]
            $mang = explode(",", $nhap_mang);
            
            // Xuất lại mảng (có thể dùng implode để nối lại thành chuỗi nếu cần format)[cite: 5]
            $mang_xuat = implode(", ", array_map('trim', $mang)); 
            
            // Gọi hàm đã viết[cite: 4]
            $vi_tri = tim_kiem($mang, $so_can_tim);
            
            if ($vi_tri != -1) {
                // Nếu tìm thấy, cộng index thêm 1 để ra vị trí thực tế cho người dùng dễ đọc
                $vi_tri_hien_thi = $vi_tri + 1;
                $ket_qua = "Tìm thấy $so_can_tim tại vị trí thứ $vi_tri_hien_thi của mảng";
            } else {
                $ket_qua = "Không tìm thấy $so_can_tim trong mảng";
            }
        }
    }
    ?>

    <!-- Thiết kế Form[cite: 4] -->
    <div class="form-wrapper">
        <form method="POST" action="">
            <table>
                <tr>
                    <th colspan="2">TÌM KIẾM</th>
                </tr>
                <tr>
                    <td class="col-label">Nhập mảng:</td>
                    <td>
                        <input type="text" name="nhap_mang" class="input-normal" style="width: 95%;" value="<?php echo htmlspecialchars($nhap_mang); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Nhập số cần tìm:</td>
                    <td>
                        <input type="text" name="so_can_tim" class="input-normal" style="width: 80px;" value="<?php echo htmlspecialchars($so_can_tim); ?>" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="submit" class="btn-submit">Tìm kiếm</button>
                    </td>
                </tr>
                <tr>
                    <td>Mảng:</td>
                    <td>
                        <!-- Textfield Mảng không được phép nhập liệu và chỉnh sửa[cite: 4] -->
                        <input type="text" class="input-readonly" style="width: 95%;" value="<?php echo htmlspecialchars($mang_xuat); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Kết quả tìm kiếm:</td>
                    <td>
                        <!-- Textfield Kết quả tìm kiếm không được phép nhập liệu và chỉnh sửa[cite: 4] -->
                        <input type="text" class="input-result" style="width: 95%;" value="<?php echo htmlspecialchars($ket_qua); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="footer-note">
                        (Các phần tử trong mảng sẽ cách nhau bằng dấu ",")
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>