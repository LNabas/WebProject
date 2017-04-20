<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Forum BDE CESI EXIA</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="../index.php" class="navbar-brand">BDE CESI Lyon</a>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 75px;">
        <?= $content; ?>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
    (function($){
        $('.reply').click(function(e){
            e.preventDefault();
            var $this = $(this);
            var $comment = $(this).parents('.comment');
            var $form = $('#comment');
            var id = $this.data('id');
            //$form.hide();
            $comment.after($form);
            //$form.slideDown();
            $('#parent_id').val(id);
        })
    })(jQuery);
    </script>

</body>
</html>