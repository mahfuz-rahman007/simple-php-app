<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);
$error = "";

// update post
if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($conn, trim($_POST['title']));
    $author = mysqli_real_escape_string($conn, trim($_POST['author']));
    $content = mysqli_real_escape_string($conn, trim($_POST['content']));

    if ($title == "" || $author == "" || $content == "") {
        $error = "All fields are required!";
    } else {
        $sql = "UPDATE posts SET title='$title', author='$author', content='$content' WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?msg=Post updated successfully");
            exit();
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}

// get old data
$result = mysqli_query($conn, "SELECT * FROM posts WHERE id = $id");
$post = mysqli_fetch_assoc($result);

if (!$post) {
    header("Location: index.php?msg=Post not found");
    exit();
}

include 'header.php';
?>

<h2>Edit Post</h2>

<?php if ($error != "") { ?>
    <p class="error"><?php echo $error; ?></p>
<?php } ?>

<form method="POST" action="">
    <label>Title</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>">

    <label>Author</label>
    <input type="text" name="author" value="<?php echo htmlspecialchars($post['author']); ?>">

    <label>Content</label>
    <textarea name="content" rows="8"><?php echo htmlspecialchars($post['content']); ?></textarea>

    <button type="submit" name="update">Update Post</button>
    <a href="index.php" class="back">Cancel</a>
</form>

<?php include 'footer.php'; ?>
