<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Sarapan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-weight: bold;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin-bottom: 8px;
            color: #555;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 15px;
            font-weight: bold;
        }

        p.red {
            color: #f00;
            margin-top: 0;
        }
    </style>
</head>
<body>

<h1>To-Do List Sarapan</h1>

<?php
// Fungsi untuk menampilkan pesan
function displayMessage($message, $type = 'info') {
    echo "<p style='color: $type;'>$message</p>";
}

// Inisialisasi array untuk menyimpan menu sarapan
$menuSarapan = array(
    'telur' => 'Telur',
    'roti' => 'Roti',
    'nasi' => 'Nasi Goreng',
    'bubur'=> 'Bubur Ayam',
    'susu' => 'Susu',
    'jus' => 'Jus Buah',
    "teh" => 'Teh',
    'kopi' => 'Kopi',
);

// Cek apakah form sudah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data inputan form
    $sarapanPilihan = isset($_POST['sarapan']) ? $_POST['sarapan'] : array();

    // Validasi inputan
    if (empty($sarapanPilihan)) {
        displayMessage('Pilih setidaknya satu menu sarapan.', 'red');
    } else {
        // Tampilkan menu sarapan yang dipilih
        displayMessage('Menu sarapan yang dipilih:');
        echo '<ul>';
        foreach ($sarapanPilihan as $pilihan) {
            echo "<li>{$menuSarapan[$pilihan]}</li>";
        }
        echo '</ul>';
    }
}
?>

<form method="post" action="">
    <label>Pilih Menu Sarapan:</label><br>
    <?php
    // Tampilkan checkbox untuk setiap menu sarapan
    foreach ($menuSarapan as $key => $value) {
        echo "<input type='checkbox' name='sarapan[]' value='$key'> $value<br>";
    }
    ?>
    <br>
    <input type="submit" value="Simpan Pilihan">
</form>

</body>
</html>

