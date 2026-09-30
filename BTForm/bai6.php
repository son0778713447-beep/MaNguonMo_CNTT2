<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phép tính - Microsoft Internet Explorer</title>
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
        .radio-group {
            color: #C00000;
            font-weight: bold;
        }
        input[type="text"] {
            width: 200px;
            padding: 2px 5px;
        }
        .btn-center {
            text-align: center;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>

    <!-- Gửi dữ liệu sang trang bai6_ketqua.php qua method POST -->
    <form name="formPheptinh" action="bai6_ketqua.php" method="POST">
        <table>
            <tr>
                <td class="label-red" style="width: 35%;">Chọn phép tính:</td>
                <td class="radio-group">
                    <input type="radio" name="phep_tinh" value="Cộng" checked> Cộng
                    <input type="radio" name="phep_tinh" value="Trừ"> Trừ
                    <input type="radio" name="phep_tinh" value="Nhân"> Nhân
                    <input type="radio" name="phep_tinh" value="Chia"> Chia
                </td>
            </tr>
            <tr>
                <td class="label-blue">Số thứ nhất:</td>
                <td><input type="text" name="so1" required></td>
            </tr>
            <tr>
                <td class="label-blue">Số thứ nhì:</td>
                <td><input type="text" name="so2" required></td>
            </tr>
            <tr>
                <td colspan="2" class="btn-center">
                    <input type="submit" name="tinh" value="Tính">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>