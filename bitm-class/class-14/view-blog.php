<?php
      require_once './Blog.php';
      $blog = new Blog();
      $queryResult = $blog->getAllBlogInfo();
?>


<hr/>
    <a href="add-blog.php">Add Blog</a>
    <a href="view-blog.php">View Blog</a>
<hr/>

<table border="1">
    <tr>
        <th>Blog ID</th>
        <th>Blog Title</th>
        <th>Author Name</th>
        <th>Blog Description</th>
        <th>Publication Status</th>
        <th>Action</th>
    </tr>
    <?php while ( $blog = mysqli_fetch_assoc($queryResult)) { ?>
    <tr>
        <td><?php echo $blog['id']; ?></td>
        <td><?php echo $blog['blog_title']; ?></td>
        <td><?php echo $blog['author_name']; ?></td>
        <td><?php echo $blog['blog_description']; ?></td>
        <td><?php echo $blog['publication_status'] == 1 ?  'Published' : 'Unpublished'; ?></td>
        <td>
            <a href="edit-blog.php?id=<?php echo $blog['id']; ?>"> Edit </a> || 
            <a href="">Delete </a> 
        </td>
    </tr>
     <?php   } ?>
</table>