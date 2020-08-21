<div class="panel panel-default">
<div class="panel-body">
<h1>MQTT C++ Client for Posix and Windows</h1>

<p>This C++ client provides an interface which is intended to mirror the Paho Java API as closely as possible.  It requires
the <a href="../c">Paho MQTT C client</a> library.</p>

<h2>Features</h2>
<?php

    $features = array(
        "mqtt-31" => true,
        "mqtt-311" => true,
        "mqtt-50" => false,
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
    include 'contents/_includes/features_list.php';
    getFeatures($features);


?>

<h2 id="source">Source</h2>
<p>Source is available from the <a href="https://github.com/eclipse/paho.mqtt.cpp">GitHub repository</a>.

<h2 id="download">Download</h2>

<p>Builds will be able to be downloaded <a href="http://build.eclipse.org/technology/paho">here</a>.</p>

<h2 id="build-from-source">Building from source</h2>

<h3>Linux</h3>

<p>The C++ client is built for Linux/Unix/Mac with CMake, and uses g++ or clang++ as the compiler. Because it requires a compliant C++11 compiler, only GCC 4.8.1 or clang 3.6 or later are supported.

See the <a href="https://github.com/eclipse/paho.mqtt.cpp">GitHub page</a> for complete build instructions.

<h3>Windows</h3>

<p>For Windows, CMake is used to generate a solution file for Visual Studio. Due to the C++11 requirement, the earliest version that can be used with the library is Visual Studio 2015.

See the <a href="https://github.com/eclipse/paho.mqtt.cpp">GitHub page</a> for complete build instructions.

<h2 id="documentation">Documentation</h2>

<p>Reference documentation is <a href="http://www.eclipse.org/paho/files/cppdoc/index.html">online</a>.</p>

<h3 id="getting-started">Getting Started</h3>

<p>These C++ clients connect to a broker using a TCP/IP connection using Posix or Windows networking, threading and memory allocation calls. They cannot be used with other networking APIs.  For that, look at the Embdedded C/C++ client.</p>

<p>Here is a simple example of publishing with the C++ client synchronous API:<p>

<pre>
int main(int argc, char* argv[])
{
    const std::string TOPIC { "hello" };
    const std::string PAYLOAD1 { "Hello World!" };

    const char* PAYLOAD2 = "Hi there!";

    // Create a client

    mqtt::client cli(ADDRESS, CLIENT_ID);

    mqtt::connect_options connOpts;
    connOpts.set_keep_alive_interval(20);
    connOpts.set_clean_session(true);

    try {
        // Connect to the client

        cli.connect(connOpts);

        // Publish using a message pointer.

        auto msg = mqtt::make_message(TOPIC, PAYLOAD1);
        msg->set_qos(QOS);

        cli.publish(msg);

        // Now try with itemized publish.

        cli.publish(TOPIC, PAYLOAD2, strlen(PAYLOAD2), 0, false);

        // Disconnect

        cli.disconnect();
    }
    catch (const mqtt::exception& exc) {
        std::cerr << "Error: " << exc.what() << " ["
            << exc.get_reason_code() << "]" << std::endl;
        return 1;
    }

    return 0;
}
</pre>
</div>
</div>
