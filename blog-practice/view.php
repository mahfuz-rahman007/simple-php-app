<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_assoc($result);

include 'header.php';

if (!$post) {
    echo "<p class='error'>Post not found!</p>";
    echo "<a href='index.php' class='back'>&larr; Back</a>";
    include 'footer.php';
    exit();
}
?>

<div class="post">
    <h2><?php echo htmlspecialchars($post['title']); ?></h2>
    <p class="meta">By <?php echo htmlspecialchars($post['author']); ?> on <?php echo date("d M Y, h:i A", strtotime($post['created_at'])); ?></p>
    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
</div>

<a href="index.php" class="back">&larr; Back</a> |
<a href="edit.php?id=<?php echo $post['id']; ?>">Edit</a> |
<a href="delete.php?id=<?php echo $post['id']; ?>" class="delete" onclick="return confirm('Are you sure?');">Delete</a>

<?php include 'footer.php'; ?>
