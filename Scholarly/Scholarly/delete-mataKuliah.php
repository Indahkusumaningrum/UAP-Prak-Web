<?php
include 'config.php';

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    // Display a confirmation message
    echo "<script>
        var result = confirm('Apakah anda ingin menghapus?');
        if (result) {
            window.location.href = 'delete-tugas.php?confirm=yes&id={$id}';
        } else {
            window.location.href = 'mata-kuliah.php';
        }
    </script>";
}

if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes' && isset($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $mysqli->prepare("DELETE FROM tugas WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Tugas deleted successfully";
        header("Location: mata-kuliah.php");
        exit(); // Untuk memastikan tidak ada output lain yang ditambahkan setelah header
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }
}
?>
