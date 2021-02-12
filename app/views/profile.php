<?php include 'header.php'; ?>
    <img src="/uploads/<?php echo $user['picture']; ?>" class="img-thumbnail">

    Hello! <?php echo $user['nickname']; ?>, you can change your <a href="/?route=user/edit" class="btn btn-primary">settings</a>
<?php include 'footer.php'; ?>