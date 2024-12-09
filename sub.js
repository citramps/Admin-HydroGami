// MQTT subscriber
var mqtt = require('mqtt');
var client = mqtt.connect('mqtt://localhost:1883');

// Subscribe to a topic and log received messages
client.on('connect', () => {
    console.log('Subscriber connected to MQTT broker');
    client.subscribe('sensor/data', (err) => {
        if (!err) {
            console.log('Subscribed to topic: sensor/data');
        } else {
            console.error('Subscription error:', err);
        }
    });
});

client.on('message', (topic, message) => {
    console.log(`Message received on topic '${topic}':`, message.toString());
});
