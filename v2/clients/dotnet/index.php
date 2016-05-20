<?php include '../../_includes/header.php' ?>
<div class="panel panel-default">
<div class="panel-body">
<h1>C# .Net and WinRT Client</h1>
<p><b>M2Mqtt</b> is a MQTT client available for all .Net platforms (.Net Framework, .Net Compact Framework and .Net Micro Framework) and WinRT platforms (Windows 8.1 and Windows Phone 8.1).</p>

<h2>Features</h2>
<?php

    $features = array(
        "mqtt-31" => true,
        "mqtt-311" => true,
        "lwt" => true,
        "tls" => true,
        "persistence" => false,
        "reconnect" => false,
        "buffering" => false,
        "websocket" => false,
        "tcp" => true,
        "async" => true,
        "sync" => false
    );
    include '../../_includes/features_list.php'

?>

<h2 id="source">Source</h2>
<p><a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.m2mqtt.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.m2mqtt.git/</a></p>

<h2 id="download">Download</h2>
<p>The M2Mqtt client assemblies for using as references in your Visual Studio projects can be downloaded from <a href="https://www.eclipse.org/downloads/download.php?file=/paho/1.2-milestones/m2mqtt/M2Mqtt_4.2.0.0.zip">here</a></p>

<h2 id="build-from-source">Building from source</h2>
<p>The project can be installed from the repository as well. To do this:</p>
<pre>git clone http://git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.m2mqtt.git</pre>
<p>You can open one of the available solutions for Visual Studio (in the "org.eclipse.paho.mqtt.m2mqtt" folder) depends on .Net or WinRT platform you want to use.</p>

<h2 id="documentation">Documentation</h2>
<p>Full client documentation is available on the official M2Mqtt project web site <a href="http://m2mqtt.wordpress.com/m2mqtt_doc/">here</a>.</p>
<h3 id="getting-started">Getting Started</h3>
<p>Here is a very simple example that shows a publisher and a subscriber for a topic on temperature sensor:</p>
<pre>
// SUBSCRIBER
...

// create client instance
MqttClient client = new MqttClient(IPAddress.Parse(MQTT_BROKER_ADDRESS));

// register to message received
client.MqttMsgPublishReceived += client_MqttMsgPublishReceived;

string clientId = Guid.NewGuid().ToString();
client.Connect(clientId);

// subscribe to the topic "/home/temperature" with QoS 2
client.Subscribe(new string[] { "/home/temperature" }, new byte[] { MqttMsgBase.QOS_LEVEL_EXACTLY_ONCE });

...

static void client_MqttMsgPublishReceived(object sender, MqttMsgPublishEventArgs e)
{
// handle message received
}

// PUBLISHER
...

// create client instance
MqttClient client = new MqttClient(IPAddress.Parse(MQTT_BROKER_ADDRESS));

string clientId = Guid.NewGuid().ToString();
client.Connect(clientId);

string strValue = Convert.ToString(value);

// publish a message on "/home/temperature" topic with QoS 2
client.Publish("/home/temperature", Encoding.UTF8.GetBytes(strValue), MqttMsgBase.QOS_LEVEL_EXACTLY_ONCE);

...
</pre>
</div>
</div>
<?php include '../../_includes/footer.php' ?>
