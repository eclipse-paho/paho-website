<?php include '../../_includes/header.php' ?>
<div class="panel panel-default">
    <div class="panel-body">
        <h1>Eclipse Paho JavaScript Client</h1>
        <p>The Paho JavaScript Client is an MQTT browser-based client library written in Javascript that uses WebSockets to connect to an MQTT Broker.
            <p>
                <p>A simple utility to demonstrate it is included, and available <a href="./utility/">online</a>.</p>


                <h2>Features</h2>

                <?php

                    $features = array(
                        "mqtt-31" => true,
                        "mqtt-311" => true,
                        "lwt" => true,
                        "tls" => true,
                        "persistence" => true,
                        "reconnect" => false,
                        "buffering" => false,
                        "websocket" => true,
                        "tcp" => false,
                        "async" => true,
                        "sync" => false,
                        "ha" => true
                    );
                    include '../../_includes/features_list.php';
                    getFeatures($features);


                ?>
                <h2>Project description:</h2>
                <p>The Paho project has been created to provide reliable open-source implementations of open and standard messaging protocols aimed at new, existing, and emerging applications for Machine-to-Machine (M2M) and Internet of Things (IoT). Paho reflects the inherent physical and cost constraints of device connectivity. Its objectives include effective levels of decoupling between devices and applications, designed to keep markets open and encourage the rapid growth of scalable Web and Enterprise middleware and applications.</p>

                <h2>Links</h2>

                <ul>
                    <li>Project Website: <a href="https://www.eclipse.org/paho">https://www.eclipse.org/paho</a>
                    </li>
                    <li>Eclipse Project Information: <a href="https://projects.eclipse.org/projects/iot.paho">https://projects.eclipse.org/projects/iot.paho</a>
                    </li>
                    <li>Paho Java Client Page: <a href="https://eclipse.org/paho/clients/javascript">https://eclipse.org/paho/clients/java/</a>
                    </li>
                    <li>GitHub: <a href="https://github.com/eclipse/paho.mqtt.javascript">https://github.com/eclipse/paho.mqtt.javascript</a>
                    </li>
                    <li>Twitter: <a href="https://twitter.com/eclipsepaho">@eclipsepaho</a>
                    </li>
                    <li>Issues: <a href="https://github.com/eclipse/paho.mqtt.javascript/issues">https://github.com/eclipse/paho.mqtt.java/issues</a>
                    </li>
                    <li>Mailing-list: <a href="https://dev.eclipse.org/mailman/listinfo/paho-dev">https://dev.eclipse.org/mailman/listinfo/paho-dev</a>
                    </li>
                </ul>


                <h2>Using the Eclipse Paho JavaScript Client</h2>

                <h3>Downloading</h3>
                <p>A zip file containing the full and a minified version the Javascript client can be downloaded from the <a href="https://projects.eclipse.org/projects/technology.paho/downloads">Paho downloads page</a></p>
                <p>Alternatively the Javascript client can be downloaded directly from the projects git repository: <a href="https://raw.githubusercontent.com/eclipse/paho.mqtt.javascript/master/src/mqttws31.js">https://raw.githubusercontent.com/eclipse/paho.mqtt.javascript/master/src/mqttws31.js</a>.</p>
                <p>Please <b>do not</b> link directly to this url from your application.</p>

                <h3>CDNs</h3>
                <p>The Paho JavaScript client is currently available to be consumed from cdnjs.com</p>
                <h4>For the plain library</h4>
                <pre>&lt;script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"&gt;&lt;/script&gt;</pre>

                <h4>For the minified library</h4>
                <pre>&lt;script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"&gt;&lt;/script&gt;</pre>

                <h3>Building from source</h3>
                <p>There are two active branches on the Paho Java git repository, <code>master</code> which is used to produce stable releases,
                     and <code>develop</code> where active development is carried out. By default cloning the git repository will download the
                      <code>master</code> branch, to build from develop make sure you switch to the remote branch: <code>git checkout -b develop remotes/origin/develop</code></p>

                <p>The project contains a maven based build that produces a minified version of the client, runs unit tests and generates it's documentation.</p>

                <p>To run the build:</p>
                <pre>$ mvn</pre>
                <p>The output of the build is copied to the <code>target</code> directory.</p>

                <h3>Tests</h3>
                <p>The client uses the <a href="http://jasmine.github.io/">Jasmine</a> test framework, the tests for the client are in: <code>src/tests</code></p>

                <p>To run the tests with maven, use the following command:</p>
                <pre>$ mvn test -Dtest.server=iot.eclipse.com -Dtest.server.port=80 -Dtest.server.path=/ws</pre>

                <h3>Documentation</h3>
                <p>Reference documentation is online at: <a href="http://www.eclipse.org/paho/files/jsdoc/index.html">http://www.eclipse.org/paho/files/jsdoc/index.html</a></p>

                <h3>Compatibility</h3>
                <p>The client should work in any browser fully supporting WebSockets, <a href="http://caniuse.com/websockets">http://caniuse.com/websockets</a> lists browser compatibility.</p>


                <h2>Getting Started</h4>
                <p>The included code below is a very basic sample that connects to a server using WebSockets and subscribes to the topic <code>World</code>, once subscribed,
                     it then publishes the message <code>Hello</code> to that topic. Any messages that come into the subscribed topic will be printed to the Javascript console.<p>

                <p>This requires the use of a broker that supports WebSockets natively, or the use of a gateway that can forward between WebSockets and TCP.</p>

<pre>
// Create a client instance
client = new Paho.MQTT.Client(location.hostname, Number(location.port), "clientId");

// set callback handlers
client.onConnectionLost = onConnectionLost;
client.onMessageArrived = onMessageArrived;

// connect the client
client.connect({onSuccess:onConnect});


// called when the client connects
function onConnect() {
  // Once a connection has been made, make a subscription and send a message.
  console.log("onConnect");
  client.subscribe("World");
  message = new Paho.MQTT.Message("Hello");
  message.destinationName = "World";
  client.send(message);
}

// called when the client loses its connection
function onConnectionLost(responseObject) {
  if (responseObject.errorCode !== 0) {
    console.log("onConnectionLost:"+responseObject.errorMessage);
  }
}

// called when a message arrives
function onMessageArrived(message) {
  console.log("onMessageArrived:"+message.payloadString);
}
</pre>


    </div>
</div>
<?php include '../../_includes/footer.php' ?>
