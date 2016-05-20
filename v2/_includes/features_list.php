<?php


$featuresList = array(
    "mqtt-31" => array(
        "name" => "MQTT 3.1",
        "tooltip" => "MQTT version 3.1 specification."
    ),
    "mqtt-311" => array(
        "name" => "MQTT 3.1.1",
        "tooltip" => "MQTT version 3.1.1 specification."
    ),
    "lwt" => array(
        "name" => "LWT",
        "tooltip" => "Last Will and Testament messages."
    ),
    "tls" => array(
        "name" => "SSL / TLS",
        "tooltip" => "Transport Layer Security or SSL."
    ),
    "persistence" => array(
        "name" => "Message Persistence",
        "tooltip" => "Supports persisting messages incase of an application crash."
    ),
    "reconnect" => array(
        "name" => "Automatic Reconnect",
        "tooltip" => "Can automatically reconnect to the server if the connection is lost."
    ),
    "buffering" => array(
        "name" => "Offline Buffering",
        "tooltip" => "Will buffer messages whilst offline to send when the connection is re-established."
    ),
    "websocket" => array(
        "name" => "WebSocket Support",
        "tooltip" => "Can communicate to MQTT servers that support WebSockets."
    ),
    "tcp" => array(
        "name" => "Standard TCP Support",
        "tooltip" => "Can communicate to MQTT servers with support TCP."
    ),
    "async" => array(
        "name" => "Non-Blocking API",
        "tooltip" => "Supports Asynchronous APIs."
    ),
    "sync" => array(
        "name" => "Blocking API",
        "tooltip" => "Supports a blocking or 'single threaded' API."
    )
);

function getHtml($id, $features){
    global $featuresList;
    $value = $features[$id];
    if($value == true){
        $tdClass = "success";
        $iClass = "fa-check";
    } else {
        $tdClass = "warning";
        $iClass = "fa-times";
    }

    $html = "<tr>
                <td><a href='#' data-toggle='tooltip' data-placement='right' title='{$featuresList[$id]["tooltip"]}'>{$featuresList[$id]["name"]}</a></td>
                <td class='text-center {$tdClass}'><i aria-hidden=
                'true' class='fa {$iClass}'></i></td>
            </tr>";
    return $html;
};
 ?>
<div class="row">
    <div class="col-md-4">
        <table class="table table-bordered table-condensed">
            <tbody>
                <?php print(getHtml("mqtt-31", $features)); ?>
                <?php print(getHtml("mqtt-311", $features)); ?>
                <?php print(getHtml("lwt", $features)); ?>
                <?php print(getHtml("tls", $features)); ?>
                <?php print(getHtml("persistence", $features)); ?>
                <?php print(getHtml("reconnect", $features)); ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <table class="table table-bordered table-condensed">
            <tbody>
                <?php print(getHtml("buffering", $features)); ?>
                <?php print(getHtml("websocket", $features)); ?>
                <?php print(getHtml("tcp", $features)); ?>
                <?php print(getHtml("async", $features)); ?>
                <?php print(getHtml("sync", $features)); ?>

            </tbody>
        </table>
    </div>
    <div class="col-md-4"></div>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</div>
