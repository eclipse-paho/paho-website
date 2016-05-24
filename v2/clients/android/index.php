<?php include '../../_includes/header.php' ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div class="panel panel-default">
        <div class="panel-body">
            <h1>Eclipse Paho Android Service</h1>
            <p>The Paho Android Service is an MQTT client library written in
            Java for developing applications on Android.</p>
            <p>To get started, download <a href=
            "http://developer.android.com/tools/studio/index.html">Android
            Studio</a>. You will also need to download the <a href=
            "https://developer.android.com/sdk/installing/adding-packages.html">
            Android SDK</a>. Currently you will need the SDK for 19,21 and 22,
            This will hopefully be simplified soon.</p>
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
                    "sync" => false,
                    "ha" => true
                );
                include '../../_includes/features_list.php'

            ?>

            <h2>Project description</h2>
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
                <li>Paho Android Client Page: <a href=
                "https://eclipse.org/paho/clients/java">https://eclipse.org/paho/clients/android/</a>
                </li>
                <li>GitHub: <a href=
                "https://github.com/eclipse/paho.mqtt.android">https://github.com/eclipse/paho.mqtt.android</a>
                </li>
                <li>Twitter: <a href=
                "https://twitter.com/eclipsepaho">@eclipsepaho</a>
                </li>
                <li>Issues: <a href=
                "https://github.com/eclipse/paho.mqtt.android/issues">https://github.com/eclipse/paho.mqtt.android/issues</a>
                </li>
                <li>Mailing-list: <a href=
                "https://dev.eclipse.org/mailman/listinfo/paho-dev">https://dev.eclipse.org/mailman/listinfo/paho-dev</a>
                </li>
            </ul>
            <h2>Using the Paho Android Client</h2>
            <h3>Downloading</h3>
            <h4>Maven</h4>
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
            required . The latest release version is <code>1.0.2</code> and the
            current snapshot version is <code>1.0.3-SNAPSHOT</code>.</p>
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
        &lt;artifactId&gt;org.eclipse.paho.android.service&lt;/artifactId&gt;
        &lt;version&gt;%VERSION%&lt;/version&gt;
    &lt;/dependency&gt;
&lt;/dependencies&gt;
&lt;/project&gt;
    </pre>

            <h4>Gradle</h4>
            <p>If you are using Android Studio and / or Gradle to manage your
            application dependencies and build then you can use the same
            repository to get the Paho Android Service. Add the Eclipse
            Maven repository to your <code>build.gradle</code> file and then
            add the Paho dependency to the <code>dependencies</code> section</p>
            <pre>
repositories {
    maven {
        url "https://repo.eclipse.org/content/repositories/paho-snapshots/"
    }
}


dependencies {
    compile 'org.eclipse.paho:org.eclipse.paho.client.mqttv3:1.0.2'
    compile 'org.eclipse.paho:org.eclipse.paho.android.service:1.0.2'
}
            </pre>
            <p><b>Note:</b> currently you have to include the <code>org.eclipse.paho:org.eclipse.paho.client.mqttv3</code>
             dependency as well. We are attempting to get the build to produce an Android <code>AAR</code> file that
             contains both the Android service as well as it's dependencies, however this is still experimental.
              If you wish to try it, remove the <code>org.eclipse.paho:org.eclipse.paho.client.mqttv3</code> dependency
             and append <code>@aar</code> to the end of the Android Service dependency.
              E.g. <code>org.eclipse.paho:org.eclipse.paho.android.service:1.0.2@aar</code></p>

            <p>If you find that there is functionality missing or bugs in the
            release version, you may want to try using the snapshot version to
            see if this helps before raising a feature request or an issue.</p>

            <h3>Building from source</h3>
            <ul>
                <li>Open a terminal and navigate to this directory
                (org.eclipse.paho.android.service)</li>
                <li>Run the command <code>./gradlew clean assemble
                exportJar</code> or on Windows: <code>gradlew.bat clean
                assemble exportJar</code></li>
            </ul>
            <h3>Running the sample app:</h3>
            <ul>
                <li>Open the this current directory in Android Studio
                (org.eclipse.paho.android.service).</li>
                <li>In the toolbar along the top, there should be a dropdown
                menu. Make sure that it contains 'org.eclipse.android.sample'
                then click the Green 'Run' Triangle. It should now build and
                launch an Virtual Android Device to run the App. If you have an
                Android device with developer mode turned on plugged in, you
                will have the oppertunity to run it directly on that.</li>
                <li>If you have any problems, check out the Android Developer
                Documentation for help: <a href=
                "https://developer.android.com">https://developer.android.com</a>
                </li>
            </ul>

            <h2 id="documentation">Documentation</h2>
            <p>Reference documentation is online at: <a href=
            "http://www.eclipse.org/paho/files/android-javadoc/index.html">http://www.eclipse.org/paho/files/android-javadoc/index.html</a></p>
        </div>
    </div><?php include '../../_includes/footer.php' ?>
