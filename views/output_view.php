<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
<?php
foreach($css_files as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
  <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

</head>

<?php echo validation_errors(); ?>

<div id= "titulo" class="container-fluid">
        <h4><a><?php echo $titulo; ?></a></h4>
</div>

    <div>
    <?php echo $output; ?>
    </div>

</html>
