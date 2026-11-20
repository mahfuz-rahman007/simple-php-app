<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM posts WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg=Post deleted successfully");
    } else {
        header("Location: index.php?msg=Could not delete post");
    }
} else {
    header("Location: index.php");
}
exit();
?>
