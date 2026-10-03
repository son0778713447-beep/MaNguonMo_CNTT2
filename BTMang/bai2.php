<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bài tập 2 - Nhập và tính trên dãy số</title>
    <style>
        body { 
            margin: 20px; 
            line-height: 1.6; 
            font-family: Arial, sans-serif;
        }
        .form-container { 
            width: 500px; 
            margin-bottom: 20px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            background-color: #ccd9cf; /* Màu nền xanh nhạt của form */
        }
        th { 
            background-color: #2b7a78; /* Màu xanh lục đậm của Header */
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
            background-color: #ccffcc; /* Ô kết quả màu xanh lá mạ */
            color: red;
            font-weight: bold;
        }
        .highlight-text { 
            color: red; 
            font-weight: bold; 
        }
        .note { 
            text-align: center; 
            color: red; 
            font-size: 13px; 
            padding: 10px;
        }
    </style>
</head>
<body>

    <h2>Bài tập 2: Thiết kế Form nhập và tính trên dãy số</h2>

    <?php
    // Khởi tạo biến để tránh lỗi Undefined variable khi trang vừa load
    $day_so = "";
    $tong = "";

    // Kiểm tra xem người dùng đã bấm nút submit chưa
    if (isset($_POST['submit'])) {
        // Lấy giá trị dãy số trên form
        $day_so = trim($_POST['dayso']);
        
        if (!empty($day_so)) {
            // 1. Tách dãy số và gán vào một mảng
            $mang = explode(",", $day_so);
            
            // 2. Đếm số phần tử của mảng
            $n = count($mang);
            
            // 3. Tính tổng bằng vòng lặp for
            $tong = 0;
            for ($i = 0; $i < $n; $i++) {
                // Sử dụng (float) để cộng được cả số thực nếu người dùng nhập, trim để xóa khoảng trắng thừa
                $tong += (float)trim($mang[$i]); 
            }
        }
    }
    ?>

    <!-- Form nhập liệu -->
    <div class="form-container">
        <form method="POST" action="">
            <table>
                <tr>
                    <th colspan="3">Nhập và tính trên dãy số</th>
                </tr>
                <tr>
                    <td width="25%">Nhập dãy số:</td>
                    <td width="65%">
                        <!-- Input nhập liệu, giữ lại giá trị cũ sau khi submit -->
                        <input type="text" name="dayso" style="width: 95%;" value="<?php echo htmlspecialchars($day_so); ?>" required>
                    </td>
                    <td width="10%" class="highlight-text">(*)</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <button type="submit" name="submit" class="btn-submit">Tổng dãy số</button>
                    </td>
                </tr>
                <tr>
                    <td>Tổng dãy số:</td>
                    <td>
                        <!-- 4. Xuất tổng ra Textfield (chỉ đọc) -->
                        <input type="text" name="tong" class="input-readonly" style="width: 50%;" value="<?php echo htmlspecialchars($tong); ?>" readonly>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" class="note">(*) Các số được nhập cách nhau bằng dấu ","</td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>