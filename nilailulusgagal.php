<!DOCTYPE html>
<html>
<head>
    <title>Konversi Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #00aeff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="submit"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Konversi Nilai</h2>
        <form method="post" action="">
            Nama: <input type="text" name="nama" required><br>
            NIM: <input type="text" name="nim" required><br>
            Masukkan Nilai: <input type="text" name="nilai" required><br>
            <input type="submit" value="Konversi">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $nilai = $_POST['nilai'];

            if (!is_numeric($nilai)) {
                echo "<div class='result'>Nilai harus berupa angka.</div>";
            } else {
                $nilai = floatval($nilai);

                function konversiNilai($nilai) {
                    if (($nilai >= 3.68 && $nilai <= 4.00) || ($nilai >= 80.00 && $nilai <= 100.00)) {
                        echo "A";
                    } elseif (($nilai >= 3.34 && $nilai <= 3.67) || ($nilai >= 76.25 && $nilai <= 79.99)) {
                        echo "A-";
                    } elseif (($nilai >= 3.01 && $nilai <= 3.33) || ($nilai >= 68.75 && $nilai <= 76.24)) {
                        echo "B+";
                    } elseif (($nilai >= 2.68 && $nilai <= 3.00) || ($nilai >= 65.00 && $nilai <= 68.74)) {
                        echo "B";
                    } elseif (($nilai >= 2.34 && $nilai <= 2.67) || ($nilai >= 62.50 && $nilai <= 64.99)) {
                        echo "B-";
                    } elseif (($nilai >= 2.01 && $nilai <= 2.33) || ($nilai >= 57.50 && $nilai <= 62.49)) {
                        echo "C+";
                    } elseif (($nilai >= 1.68 && $nilai <= 2.00) || ($nilai >= 55.00 && $nilai <= 57.49)) {
                        echo "C";
                    } elseif (($nilai >= 1.34 && $nilai <= 1.67) || ($nilai >= 51.25 && $nilai <= 54.99)) {
                        echo "C-";
                    } elseif (($nilai >= 1.01 && $nilai <= 1.33) || ($nilai >= 43.75 && $nilai <= 51.24)) {
                        echo "D+";
                    } elseif (($nilai >= 0.67 && $nilai <= 1.00) || ($nilai >= 40.00 && $nilai <= 43.74)) {
                        echo "D";
                    } elseif (($nilai >= 0.00 && $nilai <= 0.66) || ($nilai >= 0.00 && $nilai <= 39.99)) {
                        echo"E";
                    } else {
                        echo "Nilai tidak valid";
                    }
                }

                $nilaiHuruf = konversiNilai($nilai);

                echo "<div class='result'>";
                echo "Nama      : " . $nama . "<br>";
                echo "NIM       : " . $nim . "<br>";
                echo "Nilai Anda: " . $nilai . ", konversi ke nilai huruf adalah " . $nilaiHuruf . ".";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>