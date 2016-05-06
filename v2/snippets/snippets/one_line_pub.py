import paho.mqtt.publish as publish

publish.single(topic, payload=None, qos=0, retain=False, hostname="localhost",
           port=1883, client_id="", keepalive=60, will=None, auth=None,
           tls=None, protocol=mqtt.MQTTv31)
