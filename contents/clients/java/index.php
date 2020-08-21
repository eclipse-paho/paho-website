
    <div class="panel panel-default">
        <div class="panel-body">
            <h1>Eclipse Paho Java Client</h1>
            <p>The Paho Java Client is an MQTT client library written in Java
            for developing applications that run on the JVM or other Java
            compatible platforms such as Android</p>
            <p>The Paho Java Client provides two APIs: MqttAsyncClient provides
            a fully asychronous API where completion of activities is notified
            via registered callbacks. MqttClient is a synchronous wrapper
            around MqttAsyncClient where functions appear synchronous to the
            application.</p>
            <h2>Features</h2>
            <?php

                $features = array(
                    "mqtt-31" => true,
                    "mqtt-311" => true,
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
            <h2>Project description:</h2>
            <p>The Paho project has been created to provide reliable
            open-source implementations of open and standard messaging
            protocols aimed at new, existing, and emerging applications for
            Machine-to-Machine (M2M) and Internet of Things (IoT). Paho
            reflects the inherent physical and cost constraints of device
            connectivity. Its objectives include effective levels of decoupling
            between devices and applications, designed to keep markets open and
            encourage the rapid growth of scalable Web and Enterprise
            middleware and applications.</p>
            <h2>Links</h2>
            <ul>
                <li>Project Website: <a href="https://www.eclipse.org/paho">
                    https://www.eclipse.org/paho</a>
                </li>
                <li>Eclipse Project Information: <a href=
                "https://projects.eclipse.org/projects/iot.paho">https://projects.eclipse.org/projects/iot.paho</a>
                </li>
                <li>Paho Java Client Page: <a href=
                "https://eclipse.org/paho/clients/java">https://eclipse.org/paho/clients/java/</a>
                </li>
                <li>GitHub: <a href=
                "https://github.com/eclipse/paho.mqtt.java">https://github.com/eclipse/paho.mqtt.java</a>
                </li>
                <li>Twitter: <a href=
                "https://twitter.com/eclipsepaho">@eclipsepaho</a>
                </li>
                <li>Issues: <a href=
                "https://github.com/eclipse/paho.mqtt.java/issues">https://github.com/eclipse/paho.mqtt.java/issues</a>
                </li>
                <li>Mailing-list: <a href=
                "https://dev.eclipse.org/mailman/listinfo/paho-dev">https://dev.eclipse.org/mailman/listinfo/paho-dev</a>
                </li>
            </ul>
            <h2>Using the Paho Java Client</h2>
            <h3>Downloading</h3>
            <p>Eclipse hosts a Nexus repository for those who want to use Maven
            to manage their dependencies. The released libraries are also
            available in the Maven Central repository.</p>
            <p>Add the repository definition and the dependency definition
            shown below to your pom.xml.</p>
            <p>Replace <code>%REPOURL%</code> with either
            <code>https://repo.eclipse.org/content/repositories/paho-releases/</code>
            for the official releases, or
            <code>https://repo.eclipse.org/content/repositories/paho-snapshots/</code>
            for the nightly snapshots. Replace %VERSION% with the level
            required. The latest release version is <code>1.2.0</code> and the
            current snapshot version is <code>1.2.1</code>.</p>
            <pre>
&lt;project ...&gt;
&lt;repositories&gt;
    &lt;repository&gt;
        &lt;id&gt;Eclipse Paho Repo&lt;/id&gt;
        &lt;url&gt;%REPOURL%&lt;/url&gt;
    &lt;/repository&gt;
&lt;/repositories&gt;
...
&lt;dependencies&gt;
    &lt;dependency&gt;
        &lt;groupId&gt;org.eclipse.paho&lt;/groupId&gt;
        &lt;artifactId&gt;org.eclipse.paho.client.mqttv3&lt;/artifactId&gt;
        &lt;version&gt;%VERSION%&lt;/version&gt;
    &lt;/dependency&gt;
&lt;/dependencies&gt;
&lt;/project&gt;
    </pre>
            <p>If you find that there is functionality missing or bugs in the
            release version, you may want to try using the snapshot version to
            see if this helps before raising a feature request or an issue.</p>
            <h3>Building from source</h3>
            <p>There are two active branches on the Paho Java git repository,
            <code>master</code> which is used to produce stable releases, and
            <code>develop</code> where active development is carried out. By
            default cloning the git repository will download the
            <code>master</code> branch, to build from <code>develop</code> make
            sure you switch to the remote branch: <code>git checkout -b develop
            remotes/origin/develop</code></p>
            <p>To then build the library run the following maven command:
            <code>mvn package -DskipTests</code></p>
            <p>This will build the client library without running the tests.
            The jars for the library, source and javadoc can be found in the
            <code>org.eclipse.paho.client.mqttv3/target</code> directory.</p>
            <h2>Documentation</h2>
            <p>Reference documentation is online at: <a href=
            "http://www.eclipse.org/paho/files/javadoc/index.html">http://www.eclipse.org/paho/files/javadoc/index.html</a></p>
            <p>Log and Debug in the Java Client: <a href=
            "https://wiki.eclipse.org/Paho/Log_and_Debug_in_the_Java_client">https://wiki.eclipse.org/Paho/Log<em>and</em>Debug<em>in</em>the<em>Java</em>client</a></p>
            <h2>Getting Started</h2>
            <p>The included code below is a very basic sample that connects to
            a server and publishes a message using the MqttClient synchronous
            API. More extensive samples demonstrating the use of the
            Asynchronous API can be found in the
            <code>org.eclipse.paho.sample.mqttv3app</code> directory of the
            source.</p>
            <pre>
        import org.eclipse.paho.client.mqttv3.MqttClient;
        import org.eclipse.paho.client.mqttv3.MqttConnectOptions;
        import org.eclipse.paho.client.mqttv3.MqttException;
        import org.eclipse.paho.client.mqttv3.MqttMessage;
        import org.eclipse.paho.client.mqttv3.persist.MemoryPersistence;

        public class MqttPublishSample {

        public static void main(String[] args) {

            String topic        = &quot;MQTT Examples&quot;;
            String content      = &quot;Message from MqttPublishSample&quot;;
            int qos             = 2;
            String broker       = &quot;tcp://mqtt.eclipse.org:1883&quot;;
            String clientId     = &quot;JavaSample&quot;;
            MemoryPersistence persistence = new MemoryPersistence();

            try {
                MqttClient sampleClient = new MqttClient(broker, clientId, persistence);
                MqttConnectOptions connOpts = new MqttConnectOptions();
                connOpts.setCleanSession(true);
                System.out.println(&quot;Connecting to broker: &quot;+broker);
                sampleClient.connect(connOpts);
                System.out.println(&quot;Connected&quot;);
                System.out.println(&quot;Publishing message: &quot;+content);
                MqttMessage message = new MqttMessage(content.getBytes());
                message.setQos(qos);
                sampleClient.publish(topic, message);
                System.out.println(&quot;Message published&quot;);
                sampleClient.disconnect();
                System.out.println(&quot;Disconnected&quot;);
                System.exit(0);
            } catch(MqttException me) {
                System.out.println(&quot;reason &quot;+me.getReasonCode());
                System.out.println(&quot;msg &quot;+me.getMessage());
                System.out.println(&quot;loc &quot;+me.getLocalizedMessage());
                System.out.println(&quot;cause &quot;+me.getCause());
                System.out.println(&quot;excep &quot;+me);
                me.printStackTrace();
            }
        }
    }</pre>
        
    </div>
    </div>

