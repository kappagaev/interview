<Html>
<head>
    <title>
        <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="/resources/css/bootstrap.min.css">

</head>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php
            if(!$auth->logged()):
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="/?route=registration">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/?route=login">Login</a>
                </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="/?route=profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/?route=logout">logout</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

    <?php if($session->get('errors')): ?>
        <?php foreach ($session->flash('errors') as $error): ?>

            <div class="alert alert-danger" role="alert">
                <?php echo ($error); ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>