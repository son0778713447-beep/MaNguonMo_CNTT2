<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" align="center">
        <tr>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<th> Chương $i</th>";
            }
            ?>
        </tr>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 10; $j++) {
                echo "<td>$i x $j = " . $i * $j . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    //Cau 1
    echo "<br>Cau 1: ";
    $N = rand(1, 100);
    echo "Gia tri random tu 1 den 100: $N";
    echo "<br>Gia tri chan tu 1 den $N la: ";
    for ($i = 1; $i <= $N; $i++) {
        if ($i % 2 == 0) {
            echo "$i ";
        }
    }

    //Cau 3
    echo "<br>Cau 3";
    $M = rand(-100, 100);
    function kiemTraSNT($M)
    {
        $dem = 0;
        for ($i = 1; $i <= $M; $i++) {
            if ($M % $i == 0) {
                $dem++;
            }
        }
        return $dem == 2;
    }
    if ($M > 0) {
        echo "<br> $M la so duong";
        echo "<br> Uoc so cua $M la: ";
        for ($i = 1; $i <= $M; $i++) {
            if ($M % $i == 0) {
                echo "$i ";
            }
        }
        //Tim so nguyen to
        if (kiemTraSNT($M)) {
            echo "<br>$M la so nguyen to";
        } else {
            echo "<br>$M khong phai la so nguyen to";
        }
        //Tong cac so nguyen to < N
        $tong = 0;
        for ($i = 2; $i < $M; $i++) {
            if (kiemTraSNT($i)) {
                $tong += $i;
            }
        }
        echo "<br>Tong cac so nguyen to < $M la: $tong";
        //Tim so chinh phuong
        $E = (int) sqrt($M);
        if ($E * $E == $M)
            echo "<br>$M la so chinh phuong";
        else
            echo "<br>$M khong phai la so chinh phuong";
    } else {
        echo "<br> $M khong phai la so duong";
    }
    ?>
</body>

</html>