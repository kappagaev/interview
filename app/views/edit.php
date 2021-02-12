<?php include 'header.php'; ?>
    <h1>Settings</h1>
    <form method="post" action="/?route=user/edit" enctype="multipart/form-data">

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                   value="<?php echo $user['email']?>"
            >
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="nickname">Nickname*</label>
            <input type="text" class="form-control" id="nickname" placeholder="Enter nickname" name="nickname"
                   value="<?php echo $user['nickname']?>"
            >
        </div>
        <img src="/uploads/<?php echo $user['picture']; ?>" class="img-thumbnail">
        <div class="form-group">
            <label for="picture">Picture</label>
            <input type="file" class="form-control" id="picture" placeholder="Picture"name="picture" value="<?php echo $user['picture']?>"
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password*</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password confirm*</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_confirmed">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php include 'footer.php'; ?>