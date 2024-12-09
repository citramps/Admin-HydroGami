// MQTT publisher
var mqtt = require('mqtt');
var client = mqtt.connect('mqtt://localhost:1883');

// Publish a message to a topic
client.on('connect', () => {
    console.log('Publisher connected to MQTT broker');
    let message = JSON.stringify({
        temperature: 25.5,
        humidity: 60,
        light: 300,
        soil_moisture: 45,
        tds: 500,
        ph: 7.2  // Tambahkan data pH
    });

    client.publish('sensor/data', message, () => {
        console.log('Message published:', message);
        client.end(); // Disconnect after publishing
    });
});
