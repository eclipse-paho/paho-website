<div class="panel panel-default">
<div class="panel-body">
<h1>Python Client</h1>
<p>The Paho Python Client provides a client class with support for MQTT v5.0,
MQTT v3.1.1, and v3.1 on Python 3.7+. It also provides some helper
functions to make publishing one off messages to an MQTT server very
straightforward.</p>

<h2>Features</h2>
<?php

    $features = array(
        "mqtt-31" => true,
        "mqtt-311" => true,
        "mqtt-50" => true,
        "lwt" => true,
        "tls" => true,
        "persistence" => false,
        "reconnect" => true,
        "buffering" => true,
        "websocket" => true,
        "tcp" => true,
        "async" => true,
        "sync" => true,
        "ha" => false
    );
    include 'contents/_includes/features_list.php';
    getFeatures($features);


?>

<h2 id="source">Source</h2>
<p><a href="https://github.com/eclipse/paho.mqtt.python">https://github.com/eclipse/paho.mqtt.python</a></p>

<h2 id="download">Download</h2>

<p>The Python client can be downloaded and installed from <a href="https://pypi.python.org/pypi">PyPI</a> using the <code>pip</code> tool:</p>
<pre>pip install paho-mqtt</pre>
<!-- <p>Alternatively, if you are using Linux your distribution may include a packaged version of the client library, in which case install the <code>python-paho-mqtt</code> package.</p> -->

<h2 id="build-from-source">Building from source</h2>
<p>The project can be installed from the repository as well. To do this:</p>
<pre>git clone https://github.com/eclipse/paho.mqtt.python.git
cd paho.mqtt.python
pip install -e .
</pre>

<h2 id="documentation">Documentation</h2>
<p>Reference documentation is online <a href="http://www.eclipse.org/paho/files/paho.mqtt.python/html/index.html">here</a>.</p>

<h3 id="getting-started">Getting Started</h3>
<p>There are example clients in the <a href="https://github.com/eclipse/paho.mqtt.python/tree/master/examples">examples</a> directory of the repository.</p>
<p>Here is a very simple example that subscribes to the broker $SYS topic tree and prints out the resulting messages:</p>
<pre>import paho.mqtt.client as mqtt

# The callback for when the client receives a CONNACK response from the server.
def on_connect(client, userdata, flags, reason_code, properties):
    print(f"Connected with result code {reason_code}")
    # Subscribing in on_connect() means that if we lose the connection and
    # reconnect then subscriptions will be renewed.
    client.subscribe("$SYS/#")

# The callback for when a PUBLISH message is received from the server.
def on_message(client, userdata, msg):
    print(msg.topic+" "+str(msg.payload))

mqttc = mqtt.Client(mqtt.CallbackAPIVersion.VERSION2)
mqttc.on_connect = on_connect
mqttc.on_message = on_message

mqttc.connect("mqtt.eclipseprojects.io", 1883, 60)

# Blocking call that processes network traffic, dispatches callbacks and
# handles reconnecting.
# Other loop*() functions are available that give a threaded interface and a
# manual interface.
mqttc.loop_forever()
</pre>
</div>
</div>
