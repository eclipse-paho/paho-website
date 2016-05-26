<?php
include '../_includes/header.php';

$markDownPath = $_GET['path'];
if(empty($markDownPath)){
     include 'examples_home.php';
} else {
    include './Parsedown.php';
    $Parsedown = new Parsedown();


    $markdown = file_get_contents("./paho-examples/$markDownPath");
    $html =  $Parsedown->text($markdown);
    ?>
    <div class="panel panel-default">
    <div class="panel-body">
        <?php echo $html ?>
    </div>
    </div>
    <?php
}
include '../_includes/footer.php';


  ?>
