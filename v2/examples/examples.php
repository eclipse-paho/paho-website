<?php
include '../_includes/header.php';

$markDownPath = $_GET['path'];
if(empty($markDownPath)){
     include 'examples_home.php';
} else {
    include './Parsedown.php';
    $Parsedown = new Parsedown();

    $url = "https://jpwsutton.github.io/paho-examples/$markDownPath";
    echo ($url);

    $proxy = 'tcp://proxy.eclipse.org:9898';
    echo($proxy);
    $context = array(
       'http' => array(
           'proxy' => $proxy,
           'request_fulluri' => True,
           ),
       );


    $context = stream_context_create($context);
    echo($context);
    $markdown = file_get_contents($url, False, $context);
    echo($markdown);
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
