<?php
include("../Database/Connection.php");
include("../Database/Controller.php");
$rows = getAll();
// Tambah
if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $syarat = true;
    // validasi
    if (empty($title)) {
        $syarat = false;
    }

    if ($syarat) {
        $result = insert($title);
        if ($result) {
            header("Refresh:0");
        }
    }
}
// Hapus
if (isset($_POST['hapus'])) {
    $hapusId = $_POST['hapus-id'];

    if ($hapusId) {
        $result = deleteList($hapusId);
        if ($result) {
            header("Refresh:0");
        }
    }
}
// Update
if (isset($_POST['update'])) {
    $updateId = $_POST['update-id'];
    $title = trim($_POST['title']);
    $syarat = true;
    // validasi
    if (empty($title)) {
        $syarat = false;
    }

    if ($syarat) {
        $result = updateList($updateId, $title);
        if ($result) {
            header("Refresh:0");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>CRUD</title>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <form class="myForm" action="./index.php" method="post">
                <input class="input" type="text" name="title">
                <input class="submit green" type="submit" name="submit" value="TAMBAH">
            </form>
            <div class="list">
                <?php foreach ($rows as $index => $row) {
                    $index += 1;
                    echo "<div class='card'>
                    <span class='nomor'>$index</span>
                    <form class='update-form' action='./index.php' method='post'>
                    <input type='text' name='title' value=$row[title]>
                    <input class='hidden' type='text' name='update-id' value=$row[id]>
                    <input class='submit primary' type='submit' name='update' value='UPDATE'>
                    </form>
                    <form action='./index.php' method='post'>
                    <input class='hidden' type='text' name='hapus-id' value=$row[id]>
                    <input class='submit danger' type='submit' name='hapus' value='HAPUS'>
                    </form>
                    </div>";
                } ?>
            </div>
        </div>
    </div>
</body>
<script>

</script>

</html>