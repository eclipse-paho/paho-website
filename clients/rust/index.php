<?php include '../../_includes/header.php' ?>
<div class="panel panel-default">
<div class="panel-body">
<h1>MQTT Rust Client</h1>

<p>This Rust client provides an interface which is intended to mirror the Paho Java and C++ API's as closely as possible.  It requires the <a href="../c">Paho MQTT C client</a> library.</p>

<p>Note that the Rust client is still in early, pre-release development, and is due for a formal release in early 2018.</p>

<h2>Features</h2>
<?php

    $features = array(
        "mqtt-31" => true,
        "mqtt-311" => true,
        "mqtt-50" => true,
        "lwt" => true,
        "tls" => true,
        "persistence" => true,
        "reconnect" => true,
        "buffering" => true,
        "websocket" => true,
        "tcp" => true,
        "async" => true,
        "sync" => true,
        "ha" => true
    );
    include '../../_includes/features_list.php';
    getFeatures($features);


?>

<h2 id="source">Source</h2>
<p>Source is available from the <a href="https://github.com/eclipse/paho.mqtt.rust">GitHub repository</a>.

<h2 id="download">Download</h2>

<p>The project is availble on the Rust crates.io site as <a href="https://crates.io/crates/paho-mqtt">paho-mqtt</a>. Include it in a client application simply by adding a depency to the project's <i>Cargo.toml</i> file, like:</p>

<pre>
[dependencies]
paho-mqtt = "0.5"
</pre>

<h2 id="build-from-source">Building from source</h2>

<p>The project uses the standard Rust project/package manager, <i>Cargo</i>. Simply clone the repository and run <i>cargo build</i></p>

<p>See the <a href="https://github.com/eclipse/paho.mqtt.rust">GitHub page</a> for additional requirements and build instructions.</p>

<h2 id="documentation">Documentation</h2>

<p>Reference documentation is on <a href="https://docs.rs/paho-mqtt/0.5.0/paho_mqtt">Rust DOCS.RS</a>, and also here on <a href="http://www.eclipse.org/paho/files/rustdoc/paho_mqtt/index.html">eclipse.org</a>.</p>

<h3 id="getting-started">Getting Started</h3>

<p>There are a number of small sample applications in the <i>examples</i> directory of the repository. These can all be built with the command:</p>

<p><i>cargo build --examples</i></p>

<p>Here is a simple example of publishing with the Rust asynchronous API:<p>

<pre>
extern crate paho_mqtt as mqtt;

use std::process;

fn main() {
    // Create a client & define connect options
    let cli = mqtt::AsyncClient::new("tcp://localhost:1883").unwrap_or_else(|err| {
        println!("Error creating the client: {}", err);
        process::exit(1);
    });

    let conn_opts = mqtt::ConnectOptions::new();

    // Connect and wait for it to complete or fail
    if let Err(e) = cli.connect(conn_opts).wait() {
        println!("Unable to connect: {:?}", e);
        process::exit(1);
    }

    // Create a message and publish it
    println!("Publishing a message on the 'test' topic");
    let msg = mqtt::Message::new("test", "Hello world!", 0);
    let tok = cli.publish(msg);

    if let Err(e) = tok.wait() {
        println!("Error sending message: {:?}", e);
    }

    // Disconnect from the broker
    let tok = cli.disconnect(None);
    tok.wait().unwrap();
}
</pre>
</div>
</div>
<?php include '../../_includes/footer.php' ?>
