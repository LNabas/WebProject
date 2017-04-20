<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">BDE EXIA Lyon</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop/shop.php">Shop</a></li>
                <li><a href="photos.php">Photos</a></li>
                <li><a href="plugin/forum.php">Events</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php if (isset($_SESSION['auth'])): ?>

                    <li><a href="logout.php">Log out</a></li>

                <?php else: ?>

                    <li><a href="login.php">Log in</a></li>
                    <li><a href="register.php">Register</a></li>

                <?php endif; ?>


            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>