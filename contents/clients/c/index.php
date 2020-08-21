<div class="panel panel-default">
<div class="panel-body">
<h1>MQTT C Client for Posix and Windows</h1>

<p>The Paho MQTT C Client is a fully featured MQTT client written in ANSI standard C.  
C was chosen rather than C++ to maximize portability.  
A <a href="../cpp">C++ API</a> over this library is also available in Paho.</p>

<p>In fact there are two C APIs.  "Synchronous" and "asynchronous" for which the API calls start with MQTTClient and MQTTAsync
respectively.  The synchronous API is intended to be simpler and more helpful.  To this end, some of the calls will block until
the operation has completed, which makes programming easier.  
In contrast, only one call blocks in the asynchronous API - waitForCompletion.  
Notifications of results are made by callbacks which makes the API suitable for use in environments where the application is not the main thread of control.
</p>

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
    include 'contents/_includes/features_list.php';
    getFeatures($features);


?>

<h2 id="source">Source</h2>

<p>Source archives for releases are available from the <a href="https://github.com/eclipse/paho.mqtt.c">Git repository</a>, as is the current source.

<h2 id="download">Download</h2>

<p>Pre-built binaries for Windows, Linux and Mac are available from the <a href="https://projects.eclipse.org/projects/technology.paho/downloads">downloads page</a>.

<p>The Windows binaries are built with Visual Studio 2013 and 2015.  
If you don't have the correct version installed already, you will need to install the 
appropriate Visual C++ Redistributable Package for Visual Studio.</p>

<h2 id="build-from-source">Building from source</h2>

<p>The continuous integration builds can be found on 
<a href="https://travis-ci.org/eclipse/paho.mqtt.c/branches">Travis-CI</a> for Linux and Mac, 
and 
<a href="https://ci.appveyor.com/project/eclipsewebmaster/paho-mqtt-c/history">AppVeyor</a> for Windows.

<h3>Linux/Mac</h3>

<p>The C client can be built for Linux/Unix/Mac with make and gcc. To build:</p>

<pre>
git clone https://github.com/eclipse/paho.mqtt.c.git
cd org.eclipse.paho.mqtt.c.git
make
</pre>

<p>To install:</p>

<pre>
sudo make install
</pre>

<p>CMake can also be used - see the readme for details.</p>

<h3>Windows</h3>

<p>The Windows build uses Visual Studio or Visual C++ and CMake.  
A batch file, cbuild.bat, shows how to use CMake to build:</p>

<pre>
mkdir build.paho

cd build.paho

call "C:\Program Files (x86)\Microsoft Visual Studio 14.0\VC\vcvarsall.bat" x64

cmake -G "NMake Makefiles" -DPAHO_WITH_SSL=TRUE -DPAHO_BUILD_DOCUMENTATION=FALSE -DPAHO_BUILD_SAMPLES=TRUE -DCMAKE_BUILD_TYPE=Release -DCMAKE_VERBOSE_MAKEFILE=TRUE ..

nmake
</pre>

<p>To set the path to find the compiler, you can run utility program vcvars32.bat, which is found in a location something like:</p>

<pre>
C:\Program Files (x86)\Microsoft Visual Studio 12.0\VC\bin
</pre>

<h2 id="documentation">Documentation</h2>

<p>Reference documentation is online <a href="http://www.eclipse.org/paho/files/mqttdoc/MQTTClient/html/index.html">here</a>.</p>

<h3 id="getting-started">Getting Started</h3>

<p>Command line utilities are included, paho_c_pub and paho_c_sub for publishing and subscribing respectively.  
To start the publishing program, connecting to the Eclipse IoT sandbox:
</p>

<pre>
paho_c_pub -t my_topic --connection mqtt.eclipse.org:1883
</pre>

<p>Then each line you type will be sent as a message.  To receive messages, in a similar way:
</p>

<pre>
paho_c_sub -t my_topic --connection mqtt.eclipse.org:1883
</pre>

<p>To see the full list of options, type the utility name without any options.</p>

<p>These C clients connect to a broker over a TCP/IP connection . They cannot be used with other networking APIs.  For that, look at the Embdedded C client.</p>

<p>Here is a simple example of publishing with the C client synchronous API:<p>

<pre>
#include "stdio.h"
#include "stdlib.h"
#include "string.h"
#include "MQTTClient.h"

#define ADDRESS     "tcp://localhost:1883"
#define CLIENTID    "ExampleClientPub"
#define TOPIC       "MQTT Examples"
#define PAYLOAD     "Hello World!"
#define QOS         1
#define TIMEOUT     10000L

int main(int argc, char* argv[])
{
    MQTTClient client;
    MQTTClient_connectOptions conn_opts = MQTTClient_connectOptions_initializer;
    MQTTClient_message pubmsg = MQTTClient_message_initializer;
    MQTTClient_deliveryToken token;
    int rc;

    MQTTClient_create(&client, ADDRESS, CLIENTID,
        MQTTCLIENT_PERSISTENCE_NONE, NULL);
    conn_opts.keepAliveInterval = 20;
    conn_opts.cleansession = 1;

    if ((rc = MQTTClient_connect(client, &conn_opts)) != MQTTCLIENT_SUCCESS)
    {
        printf("Failed to connect, return code %d\n", rc);
        exit(-1);
    }
    pubmsg.payload = PAYLOAD;
    pubmsg.payloadlen = strlen(PAYLOAD);
    pubmsg.qos = QOS;
    pubmsg.retained = 0;
    MQTTClient_publishMessage(client, TOPIC, &pubmsg, &token);
    printf("Waiting for up to %d seconds for publication of %s\n"
            "on topic %s for client with ClientID: %s\n",
            (int)(TIMEOUT/1000), PAYLOAD, TOPIC, CLIENTID);
    rc = MQTTClient_waitForCompletion(client, token, TIMEOUT);
    printf("Message with delivery token %d delivered\n", token);
    MQTTClient_disconnect(client, 10000);
    MQTTClient_destroy(&client);
    return rc;
}
</pre>
</div>
</div>

