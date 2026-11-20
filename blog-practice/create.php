<?php
include 'db.php';

$error = "";

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, trim($_POST['title']));
    $author = mysqli_real_escape_string($conn, trim($_POST['author']));
    $content = mysqli_real_escape_string($conn, trim($_POST['content']));

    if ($title == "" || $author == "" || $content == "") {
        $error = "All fields are required!";
    } else {
        $sql = "INSERT INTO posts (title, author, content) VALUES ('$title', '$author', '$content')";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?msg=Post created successfully");
            exit();
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}

include 'header.php';
?>

<h2>Create New Post</h2>

<?php if ($error != "") { ?>
    <p class="error"><?php echo $error; ?></p>
<?php } ?>

<form method="POST" action="">
    <label>Title</label>
    <input type="text" name="title" placeholder="Enter post title">

    <label>Author</label>
    <input type="text" name="author" placeholder="Enter your name">

    <label>Content</label>
    <textarea name="content" rows="8" placeholder="Write something..."></textarea>

    <button type="submit" name="submit">Save Post</button>
    <a href="index.php" class="back">Cancel</a>
</form>

<?php include 'footer.php'; ?>
