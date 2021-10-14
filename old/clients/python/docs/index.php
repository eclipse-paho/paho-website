<?php include '../../../_includes/header.php' ?>
<h1 class="title">Python Client - documentation</h1>

<!-- The following is a copy/paste of rst2html output -->
<div class="section" id="contents">
<h1>Contents</h1>
<ul class="simple">
<li><a class="reference internal" href="#installation">Installation</a></li>
<li><dl class="first docutils">
<dt><a class="reference internal" href="#usage-and-api">Usage and API</a></dt>
<dd><ul class="first last">
<li><dl class="first docutils">
<dt><a class="reference internal" href="#client">Client</a></dt>
<dd><ul class="first last">
<li><a class="reference internal" href="#constructor-reinitialise">Constructor / reinitialise</a></li>
<li><a class="reference internal" href="#option-functions">Option functions</a></li>
<li><a class="reference internal" href="#connect-reconnect-disconnect">Connect / reconnect / disconnect</a></li>
<li><a class="reference internal" href="#network-loop">Network loop</a></li>
<li><a class="reference internal" href="#publishing">Publishing</a></li>
<li><a class="reference internal" href="#subscribe-unsubscribe">Subscribe / Unsubscribe</a></li>
<li><a class="reference internal" href="#callbacks">Callbacks</a></li>
<li><a class="reference internal" href="#external-event-loop-support">External event loop support</a></li>
<li><a class="reference internal" href="#global-helper-functions">Global helper functions</a></li>
</ul>
</dd>
</dl>
</li>
<li><dl class="first docutils">
<dt><a class="reference internal" href="#id2">Publish</a></dt>
<dd><ul class="first last">
<li><a class="reference internal" href="#single">Single</a></li>
<li><a class="reference internal" href="#multiple">Multiple</a></li>
</ul>
</dd>
</dl>
</li>
<li><dl class="first docutils">
<dt><a class="reference internal" href="#id3">Subscribe</a></dt>
<dd><ul class="first last">
<li><a class="reference internal" href="#simple">Simple</a></li>
<li><a class="reference internal" href="#using-callback">Using Callback</a></li>
</ul>
</dd>
</dl>
</li>
</ul>
</dd>
</dl>
</li>
<li><a class="reference internal" href="#reporting-bugs">Reporting bugs</a></li>
<li><a class="reference internal" href="#more-information">More information</a></li>
</ul>
</div>
<div class="section" id="installation">
<h1>Installation</h1>
<p>The latest stable version is available in the Python Package Index (PyPi) and can be installed using</p>
<pre class="literal-block">
pip install paho-mqtt
</pre>
<p>Or with <tt class="docutils literal">virtualenv</tt>:</p>
<pre class="literal-block">
virtualenv paho-mqtt
source paho-mqtt/bin/activate
pip install paho-mqtt
</pre>
<p>To obtain the full code, including examples and tests, you can clone the git repository:</p>
<pre class="literal-block">
git clone https://github.com/eclipse/paho.mqtt.python
</pre>
<p>Once you have the code, it can be installed from your repository as well:</p>
<pre class="literal-block">
cd paho.mqtt.python
python setup.py install
</pre>
</div>
<div class="section" id="usage-and-api">
<h1>Usage and API</h1>
<p>Detailed API documentation is available through <strong>pydoc</strong>. Samples are available in the <strong>examples</strong> directory.</p>
<p>The package provides two modules, a full client and a helper for simple publishing.</p>
<div class="section" id="getting-started">
<h2>Getting Started</h2>
<p>Here is a very simple example that subscribes to the broker $SYS topic tree and prints out the resulting messages:</p>
<pre class="literal-block">
import paho.mqtt.client as mqtt

# The callback for when the client receives a CONNACK response from the server.
def on_connect(client, userdata, flags, rc):
    print(&quot;Connected with result code &quot;+str(rc))

    # Subscribing in on_connect() means that if we lose the connection and
    # reconnect then subscriptions will be renewed.
    client.subscribe(&quot;$SYS/#&quot;)

# The callback for when a PUBLISH message is received from the server.
def on_message(client, userdata, msg):
    print(msg.topic+&quot; &quot;+str(msg.payload))

client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message

client.connect(&quot;mqtt.eclipseprojects.io&quot;, 1883, 60)

# Blocking call that processes network traffic, dispatches callbacks and
# handles reconnecting.
# Other loop*() functions are available that give a threaded interface and a
# manual interface.
client.loop_forever()
</pre>
</div>
<div class="section" id="client">
<h2>Client</h2>
<p>You can use the client class as an instance, within a class or by subclassing. The general usage flow is as follows:</p>
<ul class="simple">
<li>Create a client instance</li>
<li>Connect to a broker using one of the <tt class="docutils literal"><span class="pre">connect*()</span></tt> functions</li>
<li>Call one of the <tt class="docutils literal"><span class="pre">loop*()</span></tt> functions to maintain network traffic flow with the broker</li>
<li>Use <tt class="docutils literal">subscribe()</tt> to subscribe to a topic and receive messages</li>
<li>Use <tt class="docutils literal">publish()</tt> to publish messages to the broker</li>
<li>Use <tt class="docutils literal">disconnect()</tt> to disconnect from the broker</li>
</ul>
<p>Callbacks will be called to allow the application to process events as necessary. These callbacks are described below.</p>
<div class="section" id="constructor-reinitialise">
<h3>Constructor / reinitialise</h3>
<div class="section" id="id1">
<h4>Client()</h4>
<pre class="literal-block">
Client(client_id=&quot;&quot;, clean_session=True, userdata=None, protocol=MQTTv311, transport=&quot;tcp&quot;)
</pre>
<p>The <tt class="docutils literal">Client()</tt> constructor takes the following arguments:</p>
<dl class="docutils">
<dt>client_id</dt>
<dd>the unique client id string used when connecting to the broker. If
<tt class="docutils literal">client_id</tt> is zero length or <tt class="docutils literal">None</tt>, then one will be randomly
generated. In this case the <tt class="docutils literal">clean_session</tt> parameter must be <tt class="docutils literal">True</tt>.</dd>
<dt>clean_session</dt>
<dd><p class="first">a boolean that determines the client type. If <tt class="docutils literal">True</tt>, the broker will
remove all information about this client when it disconnects. If <tt class="docutils literal">False</tt>,
the client is a durable client and subscription information and queued
messages will be retained when the client disconnects.</p>
<p class="last">Note that a client will never discard its own outgoing messages on
disconnect. Calling connect() or reconnect() will cause the messages to be
resent. Use reinitialise() to reset a client to its original state.</p>
</dd>
<dt>userdata</dt>
<dd>user defined data of any type that is passed as the <tt class="docutils literal">userdata</tt> parameter
to callbacks. It may be updated at a later point with the
<tt class="docutils literal">user_data_set()</tt> function.</dd>
<dt>protocol</dt>
<dd>the version of the MQTT protocol to use for this client. Can be either
<tt class="docutils literal">MQTTv31</tt> or <tt class="docutils literal">MQTTv311</tt></dd>
<dt>transport</dt>
<dd>set to &quot;websockets&quot; to send MQTT over WebSockets. Leave at the default of
&quot;tcp&quot; to use raw TCP.</dd>
</dl>
<div class="section" id="constructor-example">
<h5>Constructor Example</h5>
<pre class="literal-block">
import paho.mqtt.client as mqtt

mqttc = mqtt.Client()
</pre>
</div>
</div>
<div class="section" id="reinitialise">
<h4>reinitialise()</h4>
<pre class="literal-block">
reinitialise(client_id=&quot;&quot;, clean_session=True, userdata=None)
</pre>
<p>The <tt class="docutils literal">reinitialise()</tt> function resets the client to its starting state as if it had just been created. It takes the same arguments as the <tt class="docutils literal">Client()</tt> constructor.</p>
<div class="section" id="reinitialise-example">
<h5>Reinitialise Example</h5>
<pre class="literal-block">
mqttc.reinitialise()
</pre>
</div>
</div>
</div>
<div class="section" id="option-functions">
<h3>Option functions</h3>
<p>These functions represent options that can be set on the client to modify its behaviour. In the majority of cases this must be done <em>before</em> connecting to a broker.</p>
<div class="section" id="max-inflight-messages-set">
<h4>max_inflight_messages_set()</h4>
<pre class="literal-block">
max_inflight_messages_set(self, inflight)
</pre>
<p>Set the maximum number of messages with QoS&gt;0 that can be part way through their network flow at once.</p>
<p>Defaults to 20. Increasing this value will consume more memory but can increase throughput.</p>
</div>
<div class="section" id="max-queued-messages-set">
<h4>max_queued_messages_set()</h4>
<pre class="literal-block">
max_queued_messages_set(self, queue_size)
</pre>
<p>Set the maximum number of outgoing messages with QoS&gt;0 that can be pending in the outgoing message queue.</p>
<p>Defaults to 0. 0 means unlimited. When the queue is full, any further outgoing messages would be dropped.</p>
</div>
<div class="section" id="message-retry-set">
<h4>message_retry_set()</h4>
<pre class="literal-block">
message_retry_set(retry)
</pre>
<p>Set the time in seconds before a message with QoS&gt;0 is retried, if the broker does not respond.</p>
<p>This is set to 5 seconds by default and should not normally need changing.</p>
</div>
<div class="section" id="ws-set-options">
<h4>ws_set_options()</h4>
<pre class="literal-block">
ws_set_options(self, path=&quot;/mqtt&quot;, headers=None)
</pre>
<p>Set websocket connection options. These options will only be used if <tt class="docutils literal"><span class="pre">transport=&quot;websockets&quot;</span></tt> was passed into the <tt class="docutils literal">Client()</tt> constructor.</p>
<dl class="docutils">
<dt>path</dt>
<dd>The mqtt path to use on the broker.</dd>
<dt>headers</dt>
<dd>Either a dictionary specifying a list of extra headers which should be appended to the standard websocket headers, or a callable that takes the normal websocket headers and returns a new dictionary with a set of headers to connect to the broker.</dd>
</dl>
<p>Must be called before <tt class="docutils literal"><span class="pre">connect*()</span></tt>. An example of how this can be used with the AWS IoT platform is in the <strong>examples</strong> folder.</p>
</div>
<div class="section" id="tls-set">
<h4>tls_set()</h4>
<pre class="literal-block">
tls_set(ca_certs=None, certfile=None, keyfile=None, cert_reqs=ssl.CERT_REQUIRED,
    tls_version=ssl.PROTOCOL_TLS, ciphers=None)
</pre>
<p>Configure network encryption and authentication options. Enables SSL/TLS support.</p>
<dl class="docutils">
<dt>ca_certs</dt>
<dd>a string path to the Certificate Authority certificate files that are to be treated as trusted by this client. If this is the only option given then the client will operate in a similar manner to a web browser. That is to say it will require the broker to have a certificate signed by the Certificate Authorities in <tt class="docutils literal">ca_certs</tt> and will communicate using TLS v1, but will not attempt any form of authentication. This provides basic network encryption but may not be sufficient depending on how the broker is configured. By default, on Python 2.7.9+ or 3.4+, the default certification authority of the system is used. On older Python version this parameter is mandatory.</dd>
<dt>certfile, keyfile</dt>
<dd>strings pointing to the PEM encoded client certificate and private keys respectively. If these arguments are not <tt class="docutils literal">None</tt> then they will be used as client information for TLS based authentication. Support for this feature is broker dependent. Note that if either of these files in encrypted and needs a password to decrypt it, Python will ask for the password at the command line. It is not currently possible to define a callback to provide the password.</dd>
<dt>cert_reqs</dt>
<dd>defines the certificate requirements that the client imposes on the broker. By default this is <tt class="docutils literal">ssl.CERT_REQUIRED</tt>, which means that the broker must provide a certificate. See the ssl pydoc for more information on this parameter.</dd>
<dt>tls_version</dt>
<dd>specifies the version of the SSL/TLS protocol to be used. By default (if the python version supports it) the highest TLS version is detected. If unavailable, TLS v1 is used. Previous versions (all versions beginning with SSL) are possible but not recommended due to possible security problems.</dd>
<dt>ciphers</dt>
<dd>a string specifying which encryption ciphers are allowable for this connection, or <tt class="docutils literal">None</tt> to use the defaults. See the ssl pydoc for more information.</dd>
</dl>
<p>Must be called before <tt class="docutils literal"><span class="pre">connect*()</span></tt>.</p>
</div>
<div class="section" id="tls-set-context">
<h4>tls_set_context()</h4>
<pre class="literal-block">
tls_set_context(context=None)
</pre>
<p>Configure network encryption and authentication context. Enables SSL/TLS support.</p>
<dl class="docutils">
<dt>context</dt>
<dd>an ssl.SSLContext object. By default, this is given by <tt class="docutils literal">ssl.create_default_context()</tt>, if available (added in Python 3.4).</dd>
</dl>
<p>If you're unsure about using this method, then either use the default context, or use the <tt class="docutils literal">tls_set</tt> method. See the ssl module documentation section about <a class="reference external" href="https://docs.python.org/3/library/ssl.html#ssl-security">security considerations</a> for more information.</p>
<p>Must be called before <tt class="docutils literal"><span class="pre">connect*()</span></tt>.</p>
</div>
<div class="section" id="tls-insecure-set">
<h4>tls_insecure_set()</h4>
<pre class="literal-block">
tls_insecure_set(value)
</pre>
<p>Configure verification of the server hostname in the server certificate.</p>
<p>If <tt class="docutils literal">value</tt> is set to <tt class="docutils literal">True</tt>, it is impossible to guarantee that the host you are connecting to is not impersonating your server. This can be useful in initial server testing, but makes it possible for a malicious third party to impersonate your server through DNS spoofing, for example.</p>
<p>Do not use this function in a real system. Setting value to True means there is no point using encryption.</p>
<p>Must be called before <tt class="docutils literal"><span class="pre">connect*()</span></tt> and after <tt class="docutils literal">tls_set()</tt> or <tt class="docutils literal">tls_set_context()</tt>.</p>
</div>
<div class="section" id="enable-logger">
<h4>enable_logger()</h4>
<pre class="literal-block">
enable_logger(logger=None)
</pre>
<p>Enable logging using the standard python logging package (See PEP 282). This may be used at the same time as the <tt class="docutils literal">on_log</tt> callback method.</p>
<p>If <tt class="docutils literal">logger</tt> is specified, then that <tt class="docutils literal">logging.Logger</tt> object will be used, otherwise one will be created automatically.</p>
<p>Paho logging levels are converted to standard ones according to the following mapping:</p>
<table border="1" class="docutils">
<colgroup>
<col width="33%" />
<col width="67%" />
</colgroup>
<thead valign="bottom">
<tr><th class="head">Paho</th>
<th class="head">logging</th>
</tr>
</thead>
<tbody valign="top">
<tr><td><tt class="docutils literal">MQTT_LOG_ERR</tt></td>
<td><tt class="docutils literal">logging.ERROR</tt></td>
</tr>
<tr><td><tt class="docutils literal">MQTT_LOG_WARNING</tt></td>
<td><tt class="docutils literal">logging.WARNING</tt></td>
</tr>
<tr><td><tt class="docutils literal">MQTT_LOG_NOTICE</tt></td>
<td><tt class="docutils literal">logging.INFO</tt> <em>(no direct equivalent)</em></td>
</tr>
<tr><td><tt class="docutils literal">MQTT_LOG_INFO</tt></td>
<td><tt class="docutils literal">logging.INFO</tt></td>
</tr>
<tr><td><tt class="docutils literal">MQTT_LOG_DEBUG</tt></td>
<td><tt class="docutils literal">logging.DEBUG</tt></td>
</tr>
</tbody>
</table>
</div>
<div class="section" id="disable-logger">
<h4>disable_logger()</h4>
<pre class="literal-block">
disable_logger()
</pre>
<p>Disable logging using standard python logging package. This has no effect on the <tt class="docutils literal">on_log</tt> callback.</p>
</div>
<div class="section" id="username-pw-set">
<h4>username_pw_set()</h4>
<pre class="literal-block">
username_pw_set(username, password=None)
</pre>
<p>Set a username and optionally a password for broker authentication. Must be called before <tt class="docutils literal"><span class="pre">connect*()</span></tt>.</p>
</div>
<div class="section" id="user-data-set">
<h4>user_data_set()</h4>
<pre class="literal-block">
user_data_set(userdata)
</pre>
<p>Set the private user data that will be passed to callbacks when events are generated. Use this for your own purpose to support your application.</p>
</div>
<div class="section" id="will-set">
<h4>will_set()</h4>
<pre class="literal-block">
will_set(topic, payload=None, qos=0, retain=False)
</pre>
<p>Set a Will to be sent to the broker. If the client disconnects without calling
<tt class="docutils literal">disconnect()</tt>, the broker will publish the message on its behalf.</p>
<dl class="docutils">
<dt>topic</dt>
<dd>the topic that the will message should be published on.</dd>
<dt>payload</dt>
<dd>the message to send as a will. If not given, or set to <tt class="docutils literal">None</tt> a zero
length message will be used as the will. Passing an int or float will
result in the payload being converted to a string representing that number.
If you wish to send a true int/float, use <tt class="docutils literal">struct.pack()</tt> to create the
payload you require.</dd>
<dt>qos</dt>
<dd>the quality of service level to use for the will.</dd>
<dt>retain</dt>
<dd>if set to <tt class="docutils literal">True</tt>, the will message will be set as the &quot;last known
good&quot;/retained message for the topic.</dd>
</dl>
<p>Raises a <tt class="docutils literal">ValueError</tt> if <tt class="docutils literal">qos</tt> is not 0, 1 or 2, or if <tt class="docutils literal">topic</tt> is
<tt class="docutils literal">None</tt> or has zero string length.</p>
</div>
<div class="section" id="reconnect-delay-set">
<h4>reconnect_delay_set</h4>
<pre class="literal-block">
reconnect_delay_set(min_delay=1, max_delay=120)
</pre>
<p>The client will automatically retry connection. Between each attempt
it will wait a number of seconds between <tt class="docutils literal">min_delay</tt> and <tt class="docutils literal">max_delay</tt>.</p>
<p>When the connection is lost, initially the reconnection attempt is delayed of
<tt class="docutils literal">min_delay</tt> seconds. It's doubled between subsequent attempt up to <tt class="docutils literal">max_delay</tt>.</p>
<p>The delay is reset to <tt class="docutils literal">min_delay</tt> when the connection complete (e.g. the CONNACK is
received, not just the TCP connection is established).</p>
</div>
</div>
<div class="section" id="connect-reconnect-disconnect">
<h3>Connect / reconnect / disconnect</h3>
<div class="section" id="connect">
<h4>connect()</h4>
<pre class="literal-block">
connect(host, port=1883, keepalive=60, bind_address=&quot;&quot;)
</pre>
<p>The <tt class="docutils literal">connect()</tt> function connects the client to a broker. This is a blocking
function. It takes the following arguments:</p>
<dl class="docutils">
<dt>host</dt>
<dd>the hostname or IP address of the remote broker</dd>
<dt>port</dt>
<dd>the network port of the server host to connect to. Defaults to 1883. Note
that the default port for MQTT over SSL/TLS is 8883 so if you are using
<tt class="docutils literal">tls_set()</tt> or <tt class="docutils literal">tls_set_context()</tt>, the port may need providing manually</dd>
<dt>keepalive</dt>
<dd>maximum period in seconds allowed between communications with the broker.
If no other messages are being exchanged, this controls the rate at which
the client will send ping messages to the broker</dd>
<dt>bind_address</dt>
<dd>the IP address of a local network interface to bind this client to,
assuming multiple interfaces exist</dd>
</dl>
<div class="section" id="callback">
<h5>Callback</h5>
<p>When the client receives a CONNACK message from the broker in response to the
connect it generates an <tt class="docutils literal">on_connect()</tt> callback.</p>
</div>
<div class="section" id="connect-example">
<h5>Connect Example</h5>
<pre class="literal-block">
mqttc.connect(&quot;mqtt.eclipseprojects.io&quot;)
</pre>
</div>
</div>
<div class="section" id="connect-async">
<h4>connect_async()</h4>
<pre class="literal-block">
connect_async(host, port=1883, keepalive=60, bind_address=&quot;&quot;)
</pre>
<p>Use in conjunction with <tt class="docutils literal">loop_start()</tt> to connect in a non-blocking manner.
The connection will not complete until <tt class="docutils literal">loop_start()</tt> is called.</p>
<div class="section" id="callback-connect">
<h5>Callback (connect)</h5>
<p>When the client receives a CONNACK message from the broker in response to the
connect it generates an <tt class="docutils literal">on_connect()</tt> callback.</p>
</div>
</div>
<div class="section" id="connect-srv">
<h4>connect_srv()</h4>
<pre class="literal-block">
connect_srv(domain, keepalive=60, bind_address=&quot;&quot;)
</pre>
<p>Connect to a broker using an SRV DNS lookup to obtain the broker address. Takes
the following arguments:</p>
<dl class="docutils">
<dt>domain</dt>
<dd>the DNS domain to search for SRV records. If <tt class="docutils literal">None</tt>, try to determine the
local domain name.</dd>
</dl>
<p>See <tt class="docutils literal">connect()</tt> for a description of the <tt class="docutils literal">keepalive</tt> and <tt class="docutils literal">bind_address</tt>
arguments.</p>
<div class="section" id="callback-connect-srv">
<h5>Callback (connect_srv)</h5>
<p>When the client receives a CONNACK message from the broker in response to the
connect it generates an <tt class="docutils literal">on_connect()</tt> callback.</p>
</div>
<div class="section" id="srv-connect-example">
<h5>SRV Connect Example</h5>
<pre class="literal-block">
mqttc.connect_srv(&quot;eclipse.org&quot;)
</pre>
</div>
</div>
<div class="section" id="reconnect">
<h4>reconnect()</h4>
<pre class="literal-block">
reconnect()
</pre>
<p>Reconnect to a broker using the previously provided details. You must have
called <tt class="docutils literal"><span class="pre">connect*()</span></tt> before calling this function.</p>
<div class="section" id="callback-reconnect">
<h5>Callback (reconnect)</h5>
<p>When the client receives a CONNACK message from the broker in response to the
connect it generates an <tt class="docutils literal">on_connect()</tt> callback.</p>
</div>
</div>
<div class="section" id="disconnect">
<h4>disconnect()</h4>
<pre class="literal-block">
disconnect()
</pre>
<p>Disconnect from the broker cleanly. Using <tt class="docutils literal">disconnect()</tt> will not result in a
will message being sent by the broker.</p>
<p>Disconnect will not wait for all queued message to be sent, to ensure all messages
are delivered, <tt class="docutils literal">wait_for_publish()</tt> from <tt class="docutils literal">MQTTMessageInfo</tt> should be used.
See <tt class="docutils literal">publish()</tt> for details.</p>
<div class="section" id="callback-disconnect">
<h5>Callback (disconnect)</h5>
<p>When the client has sent the disconnect message it generates an
<tt class="docutils literal">on_disconnect()</tt> callback.</p>
</div>
</div>
</div>
<div class="section" id="network-loop">
<h3>Network loop</h3>
<p>These functions are the driving force behind the client. If they are not
called, incoming network data will not be processed and outgoing network data
may not be sent in a timely fashion. There are four options for managing the
network loop. Three are described here, the fourth in &quot;External event loop
support&quot; below. Do not mix the different loop functions.</p>
<div class="section" id="loop">
<h4>loop()</h4>
<pre class="literal-block">
loop(timeout=1.0, max_packets=1)
</pre>
<p>Call regularly to process network events. This call waits in <tt class="docutils literal">select()</tt> until
the network socket is available for reading or writing, if appropriate, then
handles the incoming/outgoing data. This function blocks for up to <tt class="docutils literal">timeout</tt>
seconds. <tt class="docutils literal">timeout</tt> must not exceed the <tt class="docutils literal">keepalive</tt> value for the client or
your client will be regularly disconnected by the broker.</p>
<p>The <tt class="docutils literal">max_packets</tt> argument is obsolete and should be left unset.</p>
<div class="section" id="loop-example">
<h5>Loop Example</h5>
<pre class="literal-block">
run = True
while run:
    mqttc.loop()
</pre>
</div>
</div>
<div class="section" id="loop-start-loop-stop">
<h4>loop_start() / loop_stop()</h4>
<pre class="literal-block">
loop_start()
loop_stop(force=False)
</pre>
<p>These functions implement a threaded interface to the network loop. Calling
<tt class="docutils literal">loop_start()</tt> once, before or after <tt class="docutils literal"><span class="pre">connect*()</span></tt>, runs a thread in the
background to call <tt class="docutils literal">loop()</tt> automatically. This frees up the main thread for
other work that may be blocking. This call also handles reconnecting to the
broker. Call <tt class="docutils literal">loop_stop()</tt> to stop the background thread. The <tt class="docutils literal">force</tt>
argument is currently ignored.</p>
<div class="section" id="loop-start-stop-example">
<h5>Loop Start/Stop Example</h5>
<pre class="literal-block">
mqttc.connect(&quot;mqtt.eclipseprojects.io&quot;)
mqttc.loop_start()

while True:
    temperature = sensor.blocking_read()
    mqttc.publish(&quot;paho/temperature&quot;, temperature)
</pre>
</div>
</div>
<div class="section" id="loop-forever">
<h4>loop_forever()</h4>
<pre class="literal-block">
loop_forever(timeout=1.0, max_packets=1, retry_first_connection=False)
</pre>
<p>This is a blocking form of the network loop and will not return until the
client calls <tt class="docutils literal">disconnect()</tt>. It automatically handles reconnecting.</p>
<p>Except for the first connection attempt when using connect_async, use
<tt class="docutils literal">retry_first_connection=True</tt> to make it retry the first connection.
Warning: This might lead to situations where the client keeps connecting to an
non existing host without failing.</p>
<p>The <tt class="docutils literal">timeout</tt> and <tt class="docutils literal">max_packets</tt> arguments are obsolete and should be left
unset.</p>
</div>
</div>
<div class="section" id="publishing">
<h3>Publishing</h3>
<p>Send a message from the client to the broker.</p>
<div class="section" id="publish">
<h4>publish()</h4>
<pre class="literal-block">
publish(topic, payload=None, qos=0, retain=False)
</pre>
<p>This causes a message to be sent to the broker and subsequently from the broker
to any clients subscribing to matching topics. It takes the following
arguments:</p>
<dl class="docutils">
<dt>topic</dt>
<dd>the topic that the message should be published on</dd>
<dt>payload</dt>
<dd>the actual message to send. If not given, or set to <tt class="docutils literal">None</tt> a zero length
message will be used. Passing an int or float will result in the payload
being converted to a string representing that number. If you wish to send a
true int/float, use <tt class="docutils literal">struct.pack()</tt> to create the payload you require</dd>
<dt>qos</dt>
<dd>the quality of service level to use</dd>
<dt>retain</dt>
<dd>if set to <tt class="docutils literal">True</tt>, the message will be set as the &quot;last known
good&quot;/retained message for the topic.</dd>
</dl>
<p>Returns a MQTTMessageInfo which expose the following attributes and methods:</p>
<ul class="simple">
<li><tt class="docutils literal">rc</tt>, the result of the publishing. It could be <tt class="docutils literal">MQTT_ERR_SUCCESS</tt> to
indicate success, <tt class="docutils literal">MQTT_ERR_NO_CONN</tt> if the client is not currently connected,
or <tt class="docutils literal">MQTT_ERR_QUEUE_SIZE</tt> when <tt class="docutils literal">max_queued_messages_set</tt> is used to indicate
that message is neither queued nor sent.</li>
<li><tt class="docutils literal">mid</tt> is the message ID for the publish request. The mid value can be used to
track the publish request by checking against the mid argument in the
<tt class="docutils literal">on_publish()</tt> callback if it is defined. <tt class="docutils literal">wait_for_publish</tt> may be easier
depending on your use-case.</li>
<li><tt class="docutils literal">wait_for_publish()</tt> will block until the message is published. It will
raise ValueError if the message is not queued (rc == <tt class="docutils literal">MQTT_ERR_QUEUE_SIZE</tt>).</li>
<li><tt class="docutils literal">is_published</tt> returns True if the message has been published. It will
raise ValueError if the message is not queued (rc == <tt class="docutils literal">MQTT_ERR_QUEUE_SIZE</tt>).</li>
</ul>
<p>A <tt class="docutils literal">ValueError</tt> will be raised if topic is <tt class="docutils literal">None</tt>, has zero length or is
invalid (contains a wildcard), if <tt class="docutils literal">qos</tt> is not one of 0, 1 or 2, or if the
length of the payload is greater than 268435455 bytes.</p>
<div class="section" id="callback-publish">
<h5>Callback (publish)</h5>
<p>When the message has been sent to the broker an <tt class="docutils literal">on_publish()</tt> callback will
be generated.</p>
</div>
</div>
</div>
<div class="section" id="subscribe-unsubscribe">
<h3>Subscribe / Unsubscribe</h3>
<div class="section" id="subscribe">
<h4>subscribe()</h4>
<pre class="literal-block">
subscribe(topic, qos=0)
</pre>
<p>Subscribe the client to one or more topics.</p>
<p>This function may be called in three different ways:</p>
<div class="section" id="simple-string-and-integer">
<h5>Simple string and integer</h5>
<p>e.g. <tt class="docutils literal"><span class="pre">subscribe(&quot;my/topic&quot;,</span> 2)</tt></p>
<dl class="docutils">
<dt>topic</dt>
<dd>a string specifying the subscription topic to subscribe to.</dd>
<dt>qos</dt>
<dd>the desired quality of service level for the subscription. Defaults to 0.</dd>
</dl>
</div>
<div class="section" id="string-and-integer-tuple">
<h5>String and integer tuple</h5>
<p>e.g. <tt class="docutils literal"><span class="pre">subscribe((&quot;my/topic&quot;,</span> 1))</tt></p>
<dl class="docutils">
<dt>topic</dt>
<dd>a tuple of <tt class="docutils literal">(topic, qos)</tt>. Both topic and qos must be present in the tuple.</dd>
<dt>qos</dt>
<dd>not used.</dd>
</dl>
</div>
<div class="section" id="list-of-string-and-integer-tuples">
<h5>List of string and integer tuples</h5>
<p>e.g. <tt class="docutils literal"><span class="pre">subscribe([(&quot;my/topic&quot;,</span> 0), (&quot;another/topic&quot;, <span class="pre">2)])</span></tt></p>
<p>This allows multiple topic subscriptions in a single SUBSCRIPTION command,
which is more efficient than using multiple calls to <tt class="docutils literal">subscribe()</tt>.</p>
<dl class="docutils">
<dt>topic</dt>
<dd>a list of tuple of format <tt class="docutils literal">(topic, qos)</tt>. Both topic and qos must be
present in all of the tuples.</dd>
<dt>qos</dt>
<dd>not used.</dd>
</dl>
<p>The function returns a tuple <tt class="docutils literal">(result, mid)</tt>, where <tt class="docutils literal">result</tt> is
<tt class="docutils literal">MQTT_ERR_SUCCESS</tt> to indicate success or <tt class="docutils literal">(MQTT_ERR_NO_CONN, None)</tt> if the
client is not currently connected.  <tt class="docutils literal">mid</tt> is the message ID for the subscribe
request. The mid value can be used to track the subscribe request by checking
against the mid argument in the <tt class="docutils literal">on_subscribe()</tt> callback if it is defined.</p>
<p>Raises a <tt class="docutils literal">ValueError</tt> if <tt class="docutils literal">qos</tt> is not 0, 1 or 2, or if topic is <tt class="docutils literal">None</tt> or
has zero string length, or if <tt class="docutils literal">topic</tt> is not a string, tuple or list.</p>
</div>
<div class="section" id="callback-subscribe">
<h5>Callback (subscribe)</h5>
<p>When the broker has acknowledged the subscription, an <tt class="docutils literal">on_subscribe()</tt>
callback will be generated.</p>
</div>
</div>
<div class="section" id="unsubscribe">
<h4>unsubscribe()</h4>
<pre class="literal-block">
unsubscribe(topic)
</pre>
<p>Unsubscribe the client from one or more topics.</p>
<dl class="docutils">
<dt>topic</dt>
<dd>a single string, or list of strings that are the subscription topics to
unsubscribe from.</dd>
</dl>
<p>Returns a tuple <tt class="docutils literal">(result, mid)</tt>, where <tt class="docutils literal">result</tt> is <tt class="docutils literal">MQTT_ERR_SUCCESS</tt> to
indicate success, or <tt class="docutils literal">(MQTT_ERR_NO_CONN, None)</tt> if the client is not
currently connected. <tt class="docutils literal">mid</tt> is the message ID for the unsubscribe request. The
mid value can be used to track the unsubscribe request by checking against the
mid argument in the <tt class="docutils literal">on_unsubscribe()</tt> callback if it is defined.</p>
<p>Raises a <tt class="docutils literal">ValueError</tt> if <tt class="docutils literal">topic</tt> is <tt class="docutils literal">None</tt> or has zero string length, or
is not a string or list.</p>
<div class="section" id="callback-unsubscribe">
<h5>Callback (unsubscribe)</h5>
<p>When the broker has acknowledged the unsubscribe, an <tt class="docutils literal">on_unsubscribe()</tt>
callback will be generated.</p>
</div>
</div>
</div>
<div class="section" id="callbacks">
<h3>Callbacks</h3>
<div class="section" id="on-connect">
<h4>on_connect()</h4>
<pre class="literal-block">
on_connect(client, userdata, flags, rc)
</pre>
<p>Called when the broker responds to our connection request.</p>
<dl class="docutils">
<dt>client</dt>
<dd>the client instance for this callback</dd>
<dt>userdata</dt>
<dd>the private user data as set in <tt class="docutils literal">Client()</tt> or <tt class="docutils literal">user_data_set()</tt></dd>
<dt>flags</dt>
<dd>response flags sent by the broker</dd>
<dt>rc</dt>
<dd>the connection result</dd>
<dt>flags is a dict that contains response flags from the broker:</dt>
<dd><dl class="first last docutils">
<dt>flags['session present'] - this flag is useful for clients that are</dt>
<dd>using clean session set to 0 only. If a client with clean
session=0, that reconnects to a broker that it has previously
connected to, this flag indicates whether the broker still has the
session information for the client. If 1, the session still exists.</dd>
</dl>
</dd>
</dl>
<p>The value of rc indicates success or not:</p>
<blockquote>
0: Connection successful
1: Connection refused - incorrect protocol version
2: Connection refused - invalid client identifier
3: Connection refused - server unavailable
4: Connection refused - bad username or password
5: Connection refused - not authorised
6-255: Currently unused.</blockquote>
<div class="section" id="on-connect-example">
<h5>On Connect Example</h5>
<pre class="literal-block">
def on_connect(client, userdata, flags, rc):
    print(&quot;Connection returned result: &quot;+connack_string(rc))

mqttc.on_connect = on_connect
...
</pre>
</div>
</div>
<div class="section" id="on-disconnect">
<h4>on_disconnect()</h4>
<pre class="literal-block">
on_disconnect(client, userdata, rc)
</pre>
<p>Called when the client disconnects from the broker.</p>
<dl class="docutils">
<dt>client</dt>
<dd>the client instance for this callback</dd>
<dt>userdata</dt>
<dd>the private user data as set in <tt class="docutils literal">Client()</tt> or <tt class="docutils literal">user_data_set()</tt></dd>
<dt>rc</dt>
<dd>the disconnection result</dd>
</dl>
<p>The rc parameter indicates the disconnection state. If <tt class="docutils literal">MQTT_ERR_SUCCESS</tt>
(0), the callback was called in response to a <tt class="docutils literal">disconnect()</tt> call. If any
other value the disconnection was unexpected, such as might be caused by a
network error.</p>
<div class="section" id="on-disconnect-example">
<h5>On Disconnect Example</h5>
<pre class="literal-block">
def on_disconnect(client, userdata, rc):
    if rc != 0:
        print(&quot;Unexpected disconnection.&quot;)

mqttc.on_disconnect = on_disconnect
...
</pre>
</div>
</div>
<div class="section" id="on-message">
<h4>on_message()</h4>
<pre class="literal-block">
on_message(client, userdata, message)
</pre>
<p>Called when a message has been received on a topic that the client subscribes
to and the message does not match an existing topic filter callback.
Use <tt class="docutils literal">message_callback_add()</tt> to define a callback that will be called for
specific topic filters. <tt class="docutils literal">on_message</tt> will serve as fallback when none matched.</p>
<dl class="docutils">
<dt>client</dt>
<dd>the client instance for this callback</dd>
<dt>userdata</dt>
<dd>the private user data as set in <tt class="docutils literal">Client()</tt> or <tt class="docutils literal">user_data_set()</tt></dd>
<dt>message</dt>
<dd>an instance of MQTTMessage. This is a class with members <tt class="docutils literal">topic</tt>, <tt class="docutils literal">payload</tt>, <tt class="docutils literal">qos</tt>, <tt class="docutils literal">retain</tt>.</dd>
</dl>
<div class="section" id="on-message-example">
<h5>On Message Example</h5>
<pre class="literal-block">
def on_message(client, userdata, message):
    print(&quot;Received message '&quot; + str(message.payload) + &quot;' on topic '&quot;
        + message.topic + &quot;' with QoS &quot; + str(message.qos))

mqttc.on_message = on_message
...
</pre>
</div>
</div>
<div class="section" id="message-callback-add">
<h4>message_callback_add()</h4>
<p>This function allows you to define callbacks that handle incoming messages for
specific subscription filters, including with wildcards. This lets you, for
example, subscribe to <tt class="docutils literal">sensors/#</tt> and have one callback to handle
<tt class="docutils literal">sensors/temperature</tt> and another to handle <tt class="docutils literal">sensors/humidity</tt>.</p>
<pre class="literal-block">
message_callback_add(sub, callback)
</pre>
<dl class="docutils">
<dt>sub</dt>
<dd>the subscription filter to match against for this callback. Only one
callback may be defined per literal sub string</dd>
<dt>callback</dt>
<dd>the callback to be used. Takes the same form as the <tt class="docutils literal">on_message</tt>
callback.</dd>
</dl>
<p>If using <tt class="docutils literal">message_callback_add()</tt> and <tt class="docutils literal">on_message</tt>, only messages that do
not match a subscription specific filter will be passed to the <tt class="docutils literal">on_message</tt>
callback.</p>
<p>If multiple sub match a topic, each callback will be called (e.g. sub <tt class="docutils literal">sensors/#</tt>
and sub <tt class="docutils literal">+/humidity</tt> both match a message with a topic <tt class="docutils literal">sensors/humidity</tt>, so both
callbacks will handle this message).</p>
</div>
<div class="section" id="message-callback-remove">
<h4>message_callback_remove()</h4>
<p>Remove a topic/subscription specific callback previously registered using
<tt class="docutils literal">message_callback_add()</tt>.</p>
<pre class="literal-block">
message_callback_remove(sub)
</pre>
<dl class="docutils">
<dt>sub</dt>
<dd>the subscription filter to remove</dd>
</dl>
</div>
<div class="section" id="on-publish">
<h4>on_publish()</h4>
<pre class="literal-block">
on_publish(client, userdata, mid)
</pre>
<p>Called when a message that was to be sent using the <tt class="docutils literal">publish()</tt> call has
completed transmission to the broker. For messages with QoS levels 1 and 2,
this means that the appropriate handshakes have completed. For QoS 0, this
simply means that the message has left the client. The <tt class="docutils literal">mid</tt> variable matches
the mid variable returned from the corresponding <tt class="docutils literal">publish()</tt> call, to allow
outgoing messages to be tracked.</p>
<p>This callback is important because even if the publish() call returns success,
it does not always mean that the message has been sent.</p>
</div>
<div class="section" id="on-subscribe">
<h4>on_subscribe()</h4>
<pre class="literal-block">
on_subscribe(client, userdata, mid, granted_qos)
</pre>
<p>Called when the broker responds to a subscribe request. The <tt class="docutils literal">mid</tt> variable
matches the mid variable returned from the corresponding <tt class="docutils literal">subscribe()</tt> call.
The <tt class="docutils literal">granted_qos</tt> variable is a list of integers that give the QoS level the
broker has granted for each of the different subscription requests.</p>
</div>
<div class="section" id="on-unsubscribe">
<h4>on_unsubscribe()</h4>
<pre class="literal-block">
on_unsubscribe(client, userdata, mid)
</pre>
<p>Called when the broker responds to an unsubscribe request. The <tt class="docutils literal">mid</tt> variable
matches the mid variable returned from the corresponding <tt class="docutils literal">unsubscribe()</tt>
call.</p>
</div>
<div class="section" id="on-log">
<h4>on_log()</h4>
<pre class="literal-block">
on_log(client, userdata, level, buf)
</pre>
<p>Called when the client has log information. Define to allow debugging. The
<tt class="docutils literal">level</tt> variable gives the severity of the message and will be one of
<tt class="docutils literal">MQTT_LOG_INFO</tt>, <tt class="docutils literal">MQTT_LOG_NOTICE</tt>, <tt class="docutils literal">MQTT_LOG_WARNING</tt>, <tt class="docutils literal">MQTT_LOG_ERR</tt>,
and <tt class="docutils literal">MQTT_LOG_DEBUG</tt>. The message itself is in <tt class="docutils literal">buf</tt>.</p>
<p>This may be used at the same time as the standard Python logging, which can be
enabled via the <tt class="docutils literal">enable_logger</tt> method.</p>
</div>
</div>
<div class="section" id="external-event-loop-support">
<h3>External event loop support</h3>
<div class="section" id="loop-read">
<h4>loop_read()</h4>
<pre class="literal-block">
loop_read(max_packets=1)
</pre>
<p>Call when the socket is ready for reading. <tt class="docutils literal">max_packets</tt> is obsolete and
should be left unset.</p>
</div>
<div class="section" id="loop-write">
<h4>loop_write()</h4>
<pre class="literal-block">
loop_write(max_packets=1)
</pre>
<p>Call when the socket is ready for writing. <tt class="docutils literal">max_packets</tt> is obsolete and
should be left unset.</p>
</div>
<div class="section" id="loop-misc">
<h4>loop_misc()</h4>
<pre class="literal-block">
loop_misc()
</pre>
<p>Call every few seconds to handle message retrying and pings.</p>
</div>
<div class="section" id="socket">
<h4>socket()</h4>
<pre class="literal-block">
socket()
</pre>
<p>Returns the socket object in use in the client to allow interfacing with other
event loops.</p>
</div>
<div class="section" id="want-write">
<h4>want_write()</h4>
<pre class="literal-block">
want_write()
</pre>
<p>Returns true if there is data waiting to be written, to allow interfacing the
client with other event loops.</p>
</div>
</div>
<div class="section" id="global-helper-functions">
<h3>Global helper functions</h3>
<p>The client module also offers some global helper functions.</p>
<p><tt class="docutils literal">topic_matches_sub(sub, topic)</tt> can be used to check whether a <tt class="docutils literal">topic</tt>
matches a <tt class="docutils literal">subscription</tt>.</p>
<p>For example:</p>
<blockquote>
<p>the topic <tt class="docutils literal">foo/bar</tt> would match the subscription <tt class="docutils literal">foo/#</tt> or <tt class="docutils literal">+/bar</tt></p>
<p>the topic <tt class="docutils literal">non/matching</tt> would not match the subscription <tt class="docutils literal"><span class="pre">non/+/+</span></tt></p>
</blockquote>
<p><tt class="docutils literal">connack_string(connack_code)</tt> returns the error string associated with a
CONNACK result.</p>
<p><tt class="docutils literal">error_string(mqtt_errno)</tt> returns the error string associated with a Paho
MQTT error number.</p>
</div>
</div>
<div class="section" id="id2">
<h2>Publish</h2>
<p>This module provides some helper functions to allow straightforward publishing
of messages in a one-shot manner. In other words, they are useful for the
situation where you have a single/multiple messages you want to publish to a
broker, then disconnect with nothing else required.</p>
<p>The two functions provided are <tt class="docutils literal">single()</tt> and <tt class="docutils literal">multiple()</tt>.</p>
<div class="section" id="single">
<h3>Single</h3>
<p>Publish a single message to a broker, then disconnect cleanly.</p>
<pre class="literal-block">
single(topic, payload=None, qos=0, retain=False, hostname=&quot;localhost&quot;,
    port=1883, client_id=&quot;&quot;, keepalive=60, will=None, auth=None, tls=None,
    protocol=mqtt.MQTTv311, transport=&quot;tcp&quot;)
</pre>
<div class="section" id="publish-single-function-arguments">
<h4>Publish Single Function arguments</h4>
<dl class="docutils">
<dt>topic</dt>
<dd>the only required argument must be the topic string to which the payload
will be published.</dd>
<dt>payload</dt>
<dd>the payload to be published. If &quot;&quot; or None, a zero length payload will be
published.</dd>
<dt>qos</dt>
<dd>the qos to use when publishing,  default to 0.</dd>
<dt>retain</dt>
<dd>set the message to be retained (True) or not (False).</dd>
<dt>hostname</dt>
<dd>a string containing the address of the broker to connect to. Defaults to
localhost.</dd>
<dt>port</dt>
<dd>the port to connect to the broker on. Defaults to 1883.</dd>
<dt>client_id</dt>
<dd>the MQTT client id to use. If &quot;&quot; or None, the Paho library will
generate a client id automatically.</dd>
<dt>keepalive</dt>
<dd>the keepalive timeout value for the client. Defaults to 60 seconds.</dd>
<dt>will</dt>
<dd><p class="first">a dict containing will parameters for the client:</p>
<p>will = {'topic': &quot;&lt;topic&gt;&quot;, 'payload':&quot;&lt;payload&quot;&gt;, 'qos':&lt;qos&gt;, 'retain':&lt;retain&gt;}.</p>
<p>Topic is required, all other parameters are optional and will default to
None, 0 and False respectively.</p>
<p class="last">Defaults to None, which indicates no will should be used.</p>
</dd>
<dt>auth</dt>
<dd><p class="first">a dict containing authentication parameters for the client:</p>
<p>auth = {'username':&quot;&lt;username&gt;&quot;, 'password':&quot;&lt;password&gt;&quot;}</p>
<p>Username is required, password is optional and will default to None if not provided.</p>
<p class="last">Defaults to None, which indicates no authentication is to be used.</p>
</dd>
<dt>tls</dt>
<dd><p class="first">a dict containing TLS configuration parameters for the client:</p>
<p>dict = {'ca_certs':&quot;&lt;ca_certs&gt;&quot;, 'certfile':&quot;&lt;certfile&gt;&quot;, 'keyfile':&quot;&lt;keyfile&gt;&quot;, 'tls_version':&quot;&lt;tls_version&gt;&quot;, 'ciphers':&quot;&lt;ciphers&quot;&gt;}</p>
<p>ca_certs is required, all other parameters are optional and will default to None if not provided, which results in the client using the default behaviour - see the paho.mqtt.client documentation.</p>
<p class="last">Defaults to None, which indicates that TLS should not be used.</p>
</dd>
<dt>protocol</dt>
<dd>choose the version of the MQTT protocol to use. Use either <tt class="docutils literal">MQTTv31</tt> or <tt class="docutils literal">MQTTv311</tt>.</dd>
<dt>transport</dt>
<dd>set to &quot;websockets&quot; to send MQTT over WebSockets. Leave at the default of
&quot;tcp&quot; to use raw TCP.</dd>
</dl>
</div>
<div class="section" id="publish-single-example">
<h4>Publish Single Example</h4>
<pre class="literal-block">
import paho.mqtt.publish as publish

publish.single(&quot;paho/test/single&quot;, &quot;payload&quot;, hostname=&quot;mqtt.eclipseprojects.io&quot;)
</pre>
</div>
</div>
<div class="section" id="multiple">
<h3>Multiple</h3>
<p>Publish multiple messages to a broker, then disconnect cleanly.</p>
<pre class="literal-block">
multiple(msgs, hostname=&quot;localhost&quot;, port=1883, client_id=&quot;&quot;, keepalive=60,
    will=None, auth=None, tls=None, protocol=mqtt.MQTTv311, transport=&quot;tcp&quot;)
</pre>
<div class="section" id="publish-multiple-function-arguments">
<h4>Publish Multiple Function arguments</h4>
<dl class="docutils">
<dt>msgs</dt>
<dd><p class="first">a list of messages to publish. Each message is either a dict or a tuple.</p>
<p>If a dict, only the topic must be present. Default values will be
used for any missing arguments. The dict must be of the form:</p>
<p>msg = {'topic':&quot;&lt;topic&gt;&quot;, 'payload':&quot;&lt;payload&gt;&quot;, 'qos':&lt;qos&gt;, 'retain':&lt;retain&gt;}</p>
<p>topic must be present and may not be empty.
If payload is &quot;&quot;, None or not present then a zero length payload will be published. If qos is not present, the default of 0 is used. If retain is not present, the default of False is used.</p>
<p>If a tuple, then it must be of the form:</p>
<p class="last">(&quot;&lt;topic&gt;&quot;, &quot;&lt;payload&gt;&quot;, qos, retain)</p>
</dd>
</dl>
<p>See <tt class="docutils literal">single()</tt> for the description of <tt class="docutils literal">hostname</tt>, <tt class="docutils literal">port</tt>, <tt class="docutils literal">client_id</tt>, <tt class="docutils literal">keepalive</tt>, <tt class="docutils literal">will</tt>, <tt class="docutils literal">auth</tt>, <tt class="docutils literal">tls</tt>, <tt class="docutils literal">protocol</tt>, <tt class="docutils literal">transport</tt>.</p>
</div>
<div class="section" id="publish-multiple-example">
<h4>Publish Multiple Example</h4>
<pre class="literal-block">
import paho.mqtt.publish as publish

msgs = [{'topic':&quot;paho/test/multiple&quot;, 'payload':&quot;multiple 1&quot;},
    (&quot;paho/test/multiple&quot;, &quot;multiple 2&quot;, 0, False)]
publish.multiple(msgs, hostname=&quot;mqtt.eclipseprojects.io&quot;)
</pre>
</div>
</div>
</div>
<div class="section" id="id3">
<h2>Subscribe</h2>
<p>This module provides some helper functions to allow straightforward subscribing
and processing of messages.</p>
<p>The two functions provided are <tt class="docutils literal">simple()</tt> and <tt class="docutils literal">callback()</tt>.</p>
<div class="section" id="simple">
<h3>Simple</h3>
<p>Subscribe to a set of topics and return the messages received. This is a
blocking function.</p>
<pre class="literal-block">
simple(topics, qos=0, msg_count=1, retained=False, hostname=&quot;localhost&quot;,
    port=1883, client_id=&quot;&quot;, keepalive=60, will=None, auth=None, tls=None,
    protocol=mqtt.MQTTv311)
</pre>
<div class="section" id="simple-subscribe-function-arguments">
<h4>Simple Subscribe Function arguments</h4>
<dl class="docutils">
<dt>topics</dt>
<dd>the only required argument is the topic string to which the client will
subscribe. This can either be a string or a list of strings if multiple
topics should be subscribed to.</dd>
<dt>qos</dt>
<dd>the qos to use when subscribing, defaults to 0.</dd>
<dt>msg_count</dt>
<dd>the number of messages to retrieve from the broker. Defaults to 1. If 1, a
single MQTTMessage object will be returned. If &gt;1, a list of MQTTMessages
will be returned.</dd>
<dt>retained</dt>
<dd>set to True to consider retained messages, set to False to ignore messages
with the retained flag set.</dd>
<dt>hostname</dt>
<dd>a string containing the address of the broker to connect to. Defaults to localhost.</dd>
<dt>port</dt>
<dd>the port to connect to the broker on. Defaults to 1883.</dd>
<dt>client_id</dt>
<dd>the MQTT client id to use. If &quot;&quot; or None, the Paho library will
generate a client id automatically.</dd>
<dt>keepalive</dt>
<dd>the keepalive timeout value for the client. Defaults to 60 seconds.</dd>
<dt>will</dt>
<dd><p class="first">a dict containing will parameters for the client:</p>
<p>will = {'topic': &quot;&lt;topic&gt;&quot;, 'payload':&quot;&lt;payload&quot;&gt;, 'qos':&lt;qos&gt;, 'retain':&lt;retain&gt;}.</p>
<p>Topic is required, all other parameters are optional and will default to
None, 0 and False respectively.</p>
<p class="last">Defaults to None, which indicates no will should be used.</p>
</dd>
<dt>auth</dt>
<dd><p class="first">a dict containing authentication parameters for the client:</p>
<p>auth = {'username':&quot;&lt;username&gt;&quot;, 'password':&quot;&lt;password&gt;&quot;}</p>
<p>Username is required, password is optional and will default to None if not
provided.</p>
<p class="last">Defaults to None, which indicates no authentication is to be used.</p>
</dd>
<dt>tls</dt>
<dd><p class="first">a dict containing TLS configuration parameters for the client:</p>
<p>dict = {'ca_certs':&quot;&lt;ca_certs&gt;&quot;, 'certfile':&quot;&lt;certfile&gt;&quot;, 'keyfile':&quot;&lt;keyfile&gt;&quot;, 'tls_version':&quot;&lt;tls_version&gt;&quot;, 'ciphers':&quot;&lt;ciphers&quot;&gt;}</p>
<p>ca_certs is required, all other parameters are optional and will default to
None if not provided, which results in the client using the default
behaviour - see the paho.mqtt.client documentation.</p>
<p class="last">Defaults to None, which indicates that TLS should not be used.</p>
</dd>
<dt>protocol</dt>
<dd>choose the version of the MQTT protocol to use. Use either <tt class="docutils literal">MQTTv31</tt> or <tt class="docutils literal">MQTTv311</tt>.</dd>
</dl>
</div>
<div class="section" id="simple-example">
<h4>Simple Example</h4>
<pre class="literal-block">
import paho.mqtt.subscribe as subscribe

msg = subscribe.simple(&quot;paho/test/simple&quot;, hostname=&quot;mqtt.eclipseprojects.io&quot;)
print(&quot;%s %s&quot; % (msg.topic, msg.payload))
</pre>
</div>
</div>
<div class="section" id="using-callback">
<h3>Using Callback</h3>
<p>Subscribe to a set of topics and process the messages received using a user
provided callback.</p>
<pre class="literal-block">
callback(callback, topics, qos=0, userdata=None, hostname=&quot;localhost&quot;,
    port=1883, client_id=&quot;&quot;, keepalive=60, will=None, auth=None, tls=None,
    protocol=mqtt.MQTTv311)
</pre>
<div class="section" id="callback-subscribe-function-arguments">
<h4>Callback Subscribe Function arguments</h4>
<dl class="docutils">
<dt>callback</dt>
<dd><p class="first">an &quot;on_message&quot; callback that will be used for each message received, and
of the form</p>
<blockquote class="last">
def on_message(client, userdata, message)</blockquote>
</dd>
<dt>topics</dt>
<dd>the topic string to which the client will subscribe. This can either be a
string or a list of strings if multiple topics should be subscribed to.</dd>
<dt>qos</dt>
<dd>the qos to use when subscribing, defaults to 0.</dd>
<dt>userdata</dt>
<dd>a user provided object that will be passed to the on_message callback when
a message is received.</dd>
</dl>
<p>See <tt class="docutils literal">simple()</tt> for the description of <tt class="docutils literal">hostname</tt>, <tt class="docutils literal">port</tt>, <tt class="docutils literal">client_id</tt>, <tt class="docutils literal">keepalive</tt>, <tt class="docutils literal">will</tt>, <tt class="docutils literal">auth</tt>, <tt class="docutils literal">tls</tt>, <tt class="docutils literal">protocol</tt>.</p>
</div>
<div class="section" id="callback-example">
<h4>Callback Example</h4>
<pre class="literal-block">
import paho.mqtt.subscribe as subscribe

def on_message_print(client, userdata, message):
    print(&quot;%s %s&quot; % (message.topic, message.payload))

subscribe.callback(on_message_print, &quot;paho/test/callback&quot;, hostname=&quot;mqtt.eclipseprojects.io&quot;)
</pre>
</div>
</div>
</div>
</div>
<div class="section" id="reporting-bugs">
<h1>Reporting bugs</h1>
<p>Please report bugs in the issues tracker at <a class="reference external" href="https://github.com/eclipse/paho.mqtt.python/issues">https://github.com/eclipse/paho.mqtt.python/issues</a>.</p>
</div>
<div class="section" id="more-information">
<h1>More information</h1>
<p>Discussion of the Paho clients takes place on the <a class="reference external" href="https://dev.eclipse.org/mailman/listinfo/paho-dev">Eclipse paho-dev mailing list</a>.</p>
<p>General questions about the MQTT protocol are discussed in the <a class="reference external" href="https://groups.google.com/forum/?fromgroups#!forum/mqtt">MQTT Google Group</a>.</p>
<p>There is much more information available via the <a class="reference external" href="http://mqtt.org/">MQTT community site</a>.</p>
</div>

<?php include '../../../_includes/footer.php' ?>

