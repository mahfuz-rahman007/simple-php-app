<?php
include 'db.php';

$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

include 'header.php';
?>

<h2>All Posts</h2>

<?php if (isset($_GET['msg'])) { ?>
    <p class="msg"><?php echo htmlspecialchars($_GET['msg']); ?></p>
<?php } ?>

<?php if (mysqli_num_rows($result) > 0) { ?>
    <table>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><a href="view.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['title']); ?></a></td>
            <td><?php echo htmlspecialchars($row['author']); ?></td>
            <td><?php echo date("d M Y", strtotime($row['created_at'])); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
<?php } else { ?>
    <p>No posts found. <a href="create.php">Create one</a>.</p>
<?php } ?>

<?php include 'footer.php'; ?>
