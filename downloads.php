<?php include '_includes/header.php' ?>
<h1>Eclipse Paho Downloads</h1>

<h4>Latest Paho Project Release: <a href="https://projects.eclipse.org/projects/iot.paho/releases/1.3.0-oxygen">1.3 (Oxygen)</a></h4>

<?php include './comparison.php' ?>

<h2>Stable</h2>
<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">Utilities</h2>
  </div>
  <div class="panel-body">
      <table class="table table-hover table-bordered">
           <thead>
                <tr>
                     <th>Name</th>
                     <th>Official Release</th>
                     <th>Unstable</th>
                     <th>GitHub</th>
                 </tr>
             </thead>
             <tbody>
            <tr>
               <th scope="row"><a href="https://github.com/eclipse/paho.mqtt-spy/wiki">mqtt-spy</a></th>
               <td>1.0.0 - <a target="_blank" href="https://github.com/eclipse/paho.mqtt-spy/releases/download/1.0.0/mqtt-spy-1.0.0.jar">Eclipse Github</a></td>
               <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt-spy"><i>Build from master branch</i></a></td>
               <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt-spy">https://github.com/eclipse/paho.mqtt-spy</a></td>
           </tr>
           <tr>
               <th scope="row"><a href="https://github.com/eclipse/paho.mqtt-sn.embedded-c/tree/master/MQTTSNGateway">MQTT-SN Transparent Gateway</a></th>
               <td>1.0.0 - <a href="https://github.com/eclipse/paho.mqtt-sn.embedded-c/tree/v1.0.0/MQTTSNGateway"><i>Build from Source</i></a></td>
               <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt-sn.embedded-c/tree/master/MQTTSNGateway"><i>Build from master branch</i></a></td>
               <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt-sn.embedded-c/tree/master/MQTTSNGateway">https://github.com/eclipse/paho.mqtt-sn.embedded-c/tree/master/MQTTSNGateway</a></td>
           </tr>
             </tbody>
         </table>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">MQTT Clients</h2>
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
                    <th scope="row"><a href="https://www.eclipse.org/paho/clients/java/">Java</a></th>
                    <td>1.1.1 - <a target="_blank" href="http://search.maven.org/#search%7Cga%7C1%7Ca%3A%22org.eclipse.paho.client.mqttv3%22">Maven Central</a></td>
                    <td>1.1.2-SNAPSHOT - <a target="_blank" href="https://repo.eclipse.org/content/repositories/paho-snapshots/org/eclipse/paho/org.eclipse.paho.client.mqttv3/1.1.2-SNAPSHOT/">Eclipse</a></td>
                    <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.java">https://github.com/eclipse/paho.mqtt.java</a></td>
                </tr>
                <tr>
                    <th scope="row"><a href="https://www.eclipse.org/paho/clients/python/">Python</a></th>
		                <td>1.3.0 - <a target="_blank" href="https://pypi.python.org/pypi/paho-mqtt/1.3.0">Pypi (Pip)</a></td>
                    <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.python/tree/develop"><i>Build from develop branch</i></a></td>
                    <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.python">https://github.com/eclipse/paho.mqtt.python</a></td>
                </tr>
                <tr>
                   <th scope="row"><a href="https://www.eclipse.org/paho/clients/js/">JavaScript</a></th>
                   <td>1.0.2 - <a target="_blank" href="https://www.eclipse.org/downloads/download.php?file=/paho/releases/1.0.3/paho.javascript-1.0.3.zip">Eclipse</a></td>
                   <td>1.0.3-SNAPSHOT - <a target="_blank" href="https://github.com/eclipse/paho.mqtt.javascript/tree/develop"><i>Build from develop branch</i></a></td>
                   <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.javascript">https://github.com/eclipse/paho.mqtt.javascript</a></td>
               </tr>
               <tr>
                   <th scope="row"><a href="https://www.eclipse.org/paho/clients/golang/">Golang</a></th>
                   <td>1.0.0 - <a target="_blank" href="https://github.com/eclipse/paho.mqtt.golang/releases/tag/v1.0.0">Github repo tag v1.0.0</a></td>
                   <td><code>go get github.com/eclipse/paho.mqtt.golang</code></td>
                   <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.golang">https://github.com/eclipse/paho.mqtt.golang</a></td>
               </tr>
               <tr>
                   <th scope="row"><a href="https://www.eclipse.org/paho/clients/c/">C</a></th>
                   <td>1.2.0 - <a target="_blank" href="https://www.eclipse.org/downloads/download.php?file=/paho/1.3/eclipse-paho-mqtt-c-windows-1.2.0.zip">Windows</a> /
                   <a target="_blank" href="https://www.eclipse.org/downloads/download.php?file=/paho/1.3/eclipse-paho-mqtt-c-unix-1.2.0.tar.gz">Unix</a> /
                   <a target="_blank" href="https://www.eclipse.org/downloads/download.php?file=/paho/1.3/eclipse-paho-mqtt-c-mac-1.2.0.tar.gz">Mac</a></td>
                   <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.c/tree/master"><i>Build from master branch</i></a></td>
                   <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.c">https://github.com/eclipse/paho.mqtt.c</a></td>
               </tr>
               <tr>
                  <th scope="row"><a href="https://www.eclipse.org/paho/clients/cpp/">C++</a></th>
                  <td>1.0.0 - <a target="_blank" href="https://github.com/eclipse/paho.mqtt.cpp/releases/tag/v1.0.0"><i>Build from source</i></a></td>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.cpp/tree/master"><i>Build from master branch</i></a></td>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.cpp">https://github.com/eclipse/paho.mqtt.cpp</a></td>
               </tr>
               <tr>
                  <th scope="row"><a href="https://www.eclipse.org/paho/clients/dotnet/">.Net (C#)</a></th>
                  <td>4.3.0 - <a target="_blank" href="https://www.nuget.org/packages/M2Mqtt/4.3.0">NuGet</a></td>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.m2mqtt/tree/master"><i>Build from master branch</i></a></td>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.m2mqtt">https://github.com/eclipse/paho.mqtt.m2mqtt</a></td>
               </tr>
               <tr>
                  <th scope="row"><a href="https://www.eclipse.org/paho/clients/android/">Android Service</a></th>
                  <td>1.1.1 - <a target="_blank" href="https://search.maven.org/#search%7Cga%7C1%7Ca%3A%22org.eclipse.paho.android.service%22">Eclipse</a></td>
                  <td>1.1.2-SNAPSHOT - <a target="_blank" href="https://repo.eclipse.org/content/repositories/paho-snapshots/org/eclipse/paho/org.eclipse.paho.android.service/1.1.2-SNAPSHOT/">Eclipse</a></td>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.android">https://github.com/eclipse/paho.mqtt.android</a></td>
               </tr>
               <tr>
                  <th scope="row"><a href="https://www.eclipse.org/paho/clients/c/embedded/">Embedded C/C++</a></th>
                  <td>1.1.0 -
                    <a target="_blank" href="https://github.com/eclipse/paho.mqtt.embedded-c/releases/tag/v1.1.0"><i>Build from source</i></a> /
                    <a target="_blank" href="https://www.eclipse.org/downloads/download.php?file=/paho/arduino_1.0.0.zip">Arduino</a></td>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.embedded-c/tree/master"><i>Build from master branch</i></a></td>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.embedded-c">https://github.com/eclipse/paho.mqtt.embedded-c</a></td>
               </tr>
             </tbody>
         </table>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">MQTT-SN Clients</h2>
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
                  <th scope="row"><a href="https://www.eclipse.org/paho/clients/c/embedded-sn/">Embedded C</a></th>
                  <td>1.0.0 - <a href="https://github.com/eclipse/paho.mqtt.embedded-c/releases/tag/v1.0.0"><i>Build from Source</i></a></td>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt-sn.embedded-c"><i>Build from master branch</i></a></td>
                  <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt-sn.embedded-c">https://github.com/eclipse/paho.mqtt-sn.embedded-c</a></td>
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
                 <th scope="row">MQTT client testing and interoperability tools</th>
                 <td><i>N/A</i></td>
                 <td><a target="_blank" href="https://github.com/eclipse/paho.mqtt.testing">https://github.com/eclipse/paho.mqtt.testing</a></td>
             </tr>
             </tbody>
         </table>
  </div>
</div>


<?php include '_includes/footer.php' ?>
