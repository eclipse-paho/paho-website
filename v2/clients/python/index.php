<?php include '../../_includes/header.php' ?>
<div class="panel panel-default">
<div class="panel-body">
<h1>Python Client</h1>
<p>The Paho Python Client provides a client class with support for both MQTT v3.1 and v3.1.1 on Python 2.7 or 3.x. It also provides some helper functions to make publishing one off messages to an MQTT server very straightforward. </p>

<h2>Features</h2>
<div class="row">
    <div class="col-md-4">
        <table class="table table-bordered table-condensed">
            <tbody>
                <tr>
                    <td>MQTT 3.1</td>
                    <td class="text-center success"><i aria-hidden=
                    "true" class="fa fa-check"></i></td>
                </tr>
                <tr>
                    <td>MQTT 3.1.1</td>
                    <td class="text-center success"><i aria-hidden=
                    "true" class="fa fa-check"></i></td>
                </tr>
                <tr>
                    <td>LWT</td>
                    <td class="text-center success"><i aria-hidden=
                    "true" class="fa fa-check"></i></td>
                </tr>
                <tr>
                    <td>SSL / TLS</td>
                    <td class="text-center success"><i aria-hidden=
                    "true" class="fa fa-check"></i></td>
                </tr>
                <tr>
                    <td>Message Persistence</td>
                    <td class="text-center warning"><i aria-hidden=
                    "true" class="fa fa-times"></i></td>
                </tr>
                <tr>
                    <td>Automatic Reconnect</td>
                    <td class="text-center success"><i aria-hidden=
                    "true" class="fa fa-check"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <table class="table table-bordered table-condensed">
            <tbody>

                <tr>
                    <td>Offline Buffering</td>
                    <td class="text-center success"><i aria-hidden=
                    "true" class="fa fa-check"></i></td>
                </tr>
                <tr>
                    <td>WebSocket Support</td>
                    <td class="text-center success"><i aria-hidden=
                    "true" class="fa fa-check"></i></td>
                </tr>
                <tr>
                    <td>Standard TCP Support</td>
                    <td class="text-center success"><i aria-hidden=
                    "true" class="fa fa-check"></i></td>
                </tr>
                <tr>
                    <td>Non-Blocking API</td>
                    <td class="text-center success"><i aria-hidden=
                    "true" class="fa fa-check"></i></td>
                </tr>
                <tr>
                    <td>Blocking API</td>
                    <td class="text-center success"><i aria-hidden=
                    "true" class="fa fa-check"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4"></div>
</div>

<h2 id="source">Source</h2>
<p><a href="https://github.com/eclipse/paho.mqtt.python">https://github.com/eclipse/paho.mqtt.python</a></p>

<h2 id="download">Download</h2>

<p>The Python client can be downloaded and installed from <a href="https://pypi.python.org/pypi">PyPI</a> using the <code>pip</code> tool:</p>
<pre>pip install paho-mqtt</pre>
<!-- <p>Alternatively, if you are using Linux your distribution may include a packaged version of the client library, in which case install the <code>python-paho-mqtt</code> package.</p> -->

<h2 id="build-from-source">Building from source</h2>
<p>The project can be installed from the repository as well. To do this:</p>
<pre>git clone https://github.com/eclipse/paho.mqtt.python.git
cd org.eclipse.paho.mqtt.python.git
python setup.py install
</pre>
<p>The final step may need to be run with <code>sudo</code> if you are using Linux or similar system.</p>

<h2 id="documentation">Documentation</h2>
<p> Full client documentation is available <a href="docs/">here</a>.</p>
<h3 id="getting-started">Getting Started</h3>
<p>There are example clients in the <a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.python.git/tree/examples">examples</a> directory of the repository.</p>
<p>Here is a very simple example that subscribes to the broker $SYS topic tree and prints out the resulting messages:</p>
<pre>import paho.mqtt.client as mqtt

# The callback for when the client receives a CONNACK response from the server.
def on_connect(client, userdata, rc):
    print("Connected with result code "+str(rc))
	# Subscribing in on_connect() means that if we lose the connection and
	# reconnect then subscriptions will be renewed.
	client.subscribe("$SYS/#")

# The callback for when a PUBLISH message is received from the server.
def on_message(client, userdata, msg):
	print(msg.topic+" "+str(msg.payload))

client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

client.connect("iot.eclipse.org", 1883, 60)

# Blocking call that processes network traffic, dispatches callbacks and
# handles reconnecting.
# Other loop*() functions are available that give a threaded interface and a
# manual interface.
client.loop_forever()
</pre>
</div>
</div>
<?php include '../../_includes/footer.php' ?>
