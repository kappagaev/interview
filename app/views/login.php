<?php include 'header.php'; ?>
<form method="post" action="/?route=login">
    <h1>Login</h1>
    <div class="form-group">
        <label for="email">Email address*</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required
               value="<?php echo $session->old('email')?>"
        >
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password*</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php include 'footer.php'; ?>