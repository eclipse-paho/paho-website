<?php include '../../_includes/header.php' ?>
<div class="panel panel-default">
<div class="panel-body">
<h1>MQTT-SN Transparent Gateway</h1>

<p>The MQTT-SN Transparent Gateway is a daemon, or small server, which accepts incoming
MQTT-SN data over a number of transports (UDP, XBee) and converts it into
MQTT appropriate for connecting to an MQTT server such as
<a href="https://mosquitto.org">Eclipse Mosquitto</a>.  Currently it only works on Linux.</p>

</p>A description of how transparent and aggregating gateways are intended to
work can be found in the <a href="http://mqtt.org/new/wp-content/uploads/2009/06/MQTT-SN_spec_v1.2.pdf">MQTT-SN specification</a>.</p>

<h2 id="source">Source</h2>

<p>The gateway is a sub-project of the Eclipse Paho MQTT-SN embedded C repository - it's source can be found
<a href="https://github.com/eclipse/paho.mqtt-sn.embedded-c/tree/master/MQTTSNGateway">here</a>.

<h2 id="download">Download</h2>

<p>There are no pre-built binary downloads today - you must build from source.</a>.

<h2 id="build-from-source">Building from source</h2>

<p>Guidelines for building from source are in the
<a href="https://github.com/eclipse/paho.mqtt-sn.embedded-c/blob/master/MQTTSNGateway/README.md">readme</a>.</p>

<h2 id="documentation">Documentation</h2>

<p>Documentation is online <a href="https://github.com/eclipse/paho.mqtt-sn.embedded-c/tree/master/MQTTSNGateway">here</a>.</p>

<h3 id="getting-started">Getting Started</h3>

<a href="https://github.com/eclipse/paho.mqtt-sn.embedded-c/tree/master/MQTTSNGateway">Getting started</a>.

</div>
</div>
<?php include '../../_includes/footer.php' ?>
