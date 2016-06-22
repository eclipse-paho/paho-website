<?php include '_includes/header.php' ?>
<h1>Eclipse Paho Downloads</h1>

<?php include './comparison.php' ?>

<h2>Stable</h2>
<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">Mqtt Clients</h2>
  </div>
  <div class="panel-body">
      <table class="table table-hover table-bordered">
           <thead>
                <tr>
                     <th>Client</th>
                     <th>Official Release</th>
                     <th>Unstable</th>
                     <th>GitHub</th>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                    <th scope="row">Java</th>
                    <td>1.0.2 - <a target="_blank" href="https://repo.eclipse.org/content/repositories/paho-releases/org/eclipse/paho/org.eclipse.paho.client.mqttv3/1.0.2/">Eclipse</a> / <a target="_blank" href="http://search.maven.org/#search%7Cga%7C1%7Ca%3A%22org.eclipse.paho.client.mqttv3%22">Maven Central</a></td>
                    <td>1.0.3-SNAPSHOT - <a target="_blank" href="https://repo.eclipse.org/content/repositories/paho-snapshots/org/eclipse/paho/org.eclipse.paho.client.mqttv3/1.0.3-SNAPSHOT/">Eclipse</a></td>
                    <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.java">https://github.com/eclipse/paho.mqtt.java</a></td>
                </tr>
                <tr>
                    <th scope="row">Python</th>
                    <td>1.2 - <a target="_blank" href="https://pypi.python.org/pypi/paho-mqtt/1.2">Pypi (Pip)</a></td>
                    <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.python/tree/develop"><i>Build from Develop branch Source</i></a></td>
                    <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.python">https://github.com/eclipse/paho.mqtt.python</a></td>
                </tr>
                <tr>
                   <th scope="row">JavaScript</th>
                   <td>1.0.2 - <a target="_blank" href="https://www.eclipse.org/downloads/download.php?file=/paho/releases/1.0.2/Java/plugins/org.eclipse.paho.client.mqttv3_1.0.2.jar">Eclipse</a></td>
                   <td>1.0.3-SNAPSHOT - <a target="_blank" href="https://github.com/eclipse/paho.mqtt.javascript/tree/develop"><i>Build from Develop branch Source</i></a></td>
                   <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.javascript">https://github.com/eclipse/paho.mqtt.javascript</a></td>
               </tr>
               <tr>
                   <th scope="row">Golang</th>
                   <td>1.1.0 - <a target="_blank" href="https://github.com/eclipse/paho.mqtt.golang/releases/tag/v1.0.0">Github repo tag v1.1.0</a></td>
                   <td><code>go get github.com/eclipse/paho.mqtt.golang</code></td>
                   <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.golang">https://github.com/eclipse/paho.mqtt.golang</a></td>
               </tr>
               <tr>
                   <th scope="row">C</th>
                   <td>1.1.0 - <a target="_blank" href="https://www.eclipse.org/downloads/download.php?file=/paho/1.2/eclipse-paho-mqtt-c-windows-1.1.0.zip">Windows</a> /
                   <a target="_blank" href="https://www.eclipse.org/downloads/download.php?file=/paho/1.2/eclipse-paho-mqtt-c-unix-1.1.0.tar.gz">Unix</a> /
                   <a target="_blank" href="https://www.eclipse.org/downloads/download.php?file=/paho/1.2/eclipse-paho-mqtt-c-mac-1.1.0.tar.gz">Mac</a></td>
                   <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.c/tree/develop"><i>Build from Develop branch Source</i></a></td>
                   <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.c">https://github.com/eclipse/paho.mqtt.c</a></td>
               </tr>
               <tr>
                  <th scope="row">.Net (C#)</th>
                  <td>4.0.0 - <a target="_blank" href="https://www.nuget.org/packages/M2Mqtt/4.0.0">NuGet</a></td>
                  <td>4.3.0 - <a target="_blank" href="https://www.nuget.org/packages/M2Mqtt/4.3.0">NuGet</a></td>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.m2mqtt">https://github.com/eclipse/paho.mqtt.m2mqtt</a></td>
              </tr>
              <tr>
                 <th scope="row">Android Service</th>
                 <td>1.0.2 - <a target="_blank" href="https://repo.eclipse.org/content/repositories/paho-releases/org/eclipse/paho/org.eclipse.paho.android.service/1.0.2/">Eclipse</a></td>
                 <td>1.0.3-SNAPSHOT - <a target="_blank" href="https://repo.eclipse.org/content/repositories/paho-snapshots/org/eclipse/paho/org.eclipse.paho.android.service/1.0.3-SNAPSHOT/">Eclipse</a></td>
                 <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.android">https://github.com/eclipse/paho.mqtt.android</a></td>
             </tr>
             <tr>
                 <th scope="row">Embedded C/C++</th>
                 <td>1.0.0 - <a target="_blank" href="https://www.eclipse.org/downloads/download.php?file=/paho/arduino_1.0.0.zip">Arduino</a> / <i>Build from Source</i></td>
                 <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.embedded-c/tree/develop"><i>Build from Develop branch Source</i></a></td>
                 <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.embedded-c">https://github.com/eclipse/paho.mqtt.embedded-c</a></td>
             </tr>
             </tbody>
         </table>

  </div>
</div>





<h2>Experimental</h2>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">Tools and Clients</h2>
  </div>
  <div class="panel-body">
      <table class="table table-hover table-bordered">
           <thead>
                <tr>
                     <th>Tool</th>
                     <th>Unstable</th>
                     <th>GitHub</th>
                 </tr>
             </thead>
             <tbody>
               <tr>
                  <th scope="row">C++ Client</th>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.cpp"><i>Build from Source</i></a></td>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.cpp">https://github.com/eclipse/paho.mqtt.cpp</a></td>
              </tr>
              <tr>
                 <th scope="row">mqtt-spy</th>
                 <td><a target="_blank" href="https://github.com/kamilfb/mqtt-spy/wiki/Downloads">0.5.0</a></td>
                 <td><a target="_blank" href="https://github.com/kamilfb/mqtt-spy">https://github.com/kamilfb/mqtt-spy</a></td>
             </tr>
             <tr>
                 <th scope="row">MQTT-SN Embedded C Client</th>
                 <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt-sn.embedded-c"><i>Build from Source</i></a></td>
                 <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt-sn.embedded-c">https://github.com/eclipse/paho.mqtt-sn.embedded-c</a></td>
             </tr>
             <tr>
                 <th scope="row">MQTT client testing and interoperability tools</th>
                 <td><i>N/A</i></td>
                 <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.testing">https://github.com/eclipse/paho.mqtt.testing</a></td>
             </tr>

             </tbody>
         </table>

  </div>
</div>


<?php include '_includes/footer.php' ?>
