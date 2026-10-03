<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài tập 1 - Xử lý mảng trong PHP</title>
    <style>
        body { margin: 20px; line-height: 1.6; }
        .form-group { margin-bottom: 15px; }
        .result { margin-top: 20px; padding: 15px; border: 1px solid #4CAF50; background-color: #f9f9f9; border-radius: 5px; }
        .error { color: red; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Bài tập 1: Thao tác với mảng</h2>

    <!-- Form nhập liệu -->
    <form method="POST" action="">
        <div class="form-group">
            <label for="n">Nhập n: </label>
            <input type="text" id="n" name="n" value="<?php echo isset($_POST['n']) ? htmlspecialchars($_POST['n']) : ''; ?>" required>
            <button type="submit" name="submit">Thực hiện</button>
        </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input = trim($_POST['n']);

        // a- Kiểm tra n có phải là số nguyên dương
        if (filter_var($input, FILTER_VALIDATE_INT) !== false && (int)$input > 0) {
            $n = (int)$input;

            // b- Phát sinh ngẫu nhiên mảng gồm n phần tử
            // Sử dụng phạm vi từ -150 đến 150 để xuất hiện số âm, số 0 và các số < 100
            $arr = array();
            for ($i = 0; $i < $n; $i++) {
                $arr[] = rand(-150, 150);
            }

            // c, d, e, f- Khởi tạo các biến để tính toán
            $evenCount = 0;        // c- Đếm số chẵn
            $lessThan100Count = 0; // d- Đếm số < 100
            $sumNegative = 0;      // e- Tổng số âm
            $zeroPositions = array(); // f- Vị trí số 0

            foreach ($arr as $index => $val) {
                // c- Đếm số chẵn
                if ($val % 2 == 0) {
                    $evenCount++;
                }

                // d- Đếm số nhỏ hơn 100
                if ($val < 100) {
                    $lessThan100Count++;
                }

                // e- Tính tổng số âm
                if ($val < 0) {
                    $sumNegative += $val;
                }

                // f- Lưu vị trí các phần tử bằng 0 (vị trí tính từ 0)
                if ($val == 0) {
                    $zeroPositions[] = $index;
                }
            }

            // Hiển thị kết quả
            echo "<div class='result'>";
            echo "<h3>KẾT QUẢ:</h3>";
            echo "<p><strong>a- n là số nguyên dương</strong>";
            echo "<p><strong>b- Mảng ngẫu nhiên vừa phát sinh:</strong> " . implode(", ", $arr) . "</p>";
            echo "<p><strong>c- Số lượng phần tử có giá trị chẵn:</strong> " . $evenCount . "</p>";
            echo "<p><strong>d- Số lượng phần tử có giá trị nhỏ hơn 100:</strong> " . $lessThan100Count . "</p>";
            echo "<p><strong>e- Tổng các phần tử có giá trị âm:</strong> " . $sumNegative . "</p>";

            // f- In ra vị trí số 0
            if (count($zeroPositions) > 0) {
                echo "<p><strong>f- Vị trí phần tử bằng 0 (chỉ số index):</strong> " . implode(", ", $zeroPositions) . "</p>";
            } else {
                echo "<p><strong>f- Vị trí phần tử bằng 0:</strong> Không có phần tử nào bằng 0 trong mảng.</p>";
            }

            // g- Sắp xếp tăng dần và in mảng
            $sortedArr = $arr;
            sort($sortedArr);
            echo "<p><strong>g- Mảng sau khi sắp xếp tăng dần:</strong> " . implode(", ", $sortedArr) . "</p>";
            echo "</div>";

        } else {
            // Trường hợp n không phải là số nguyên dương
            echo "<p class='error'>Vui lòng nhập n là một số nguyên dương!</p>";
        }
    }
    ?>

</body>
</html>