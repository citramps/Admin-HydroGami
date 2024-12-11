const mqtt = require('mqtt');

// Mengonfigurasi koneksi ke broker MQTT
const broker = 'mqtt://localhost:1883'; // Alamat broker
const client = mqtt.connect(broker);

// Menunggu koneksi ke broker
client.on('connect', () => {
  console.log('Connected to MQTT Broker');
  
  // Berlangganan ke topic "sensor/data"
  client.subscribe('sensor/data', (err) => {
    if (err) {
      console.log('Failed to subscribe:', err);
    } else {
      console.log('Subscribed to topic: sensor/data');
    }
  });
});

// Menangani pesan yang diterima
client.on('message', (topic, message) => {
  if (topic === 'sensor/data') {
    // Mengonversi pesan JSON kembali ke objek
    const sensorData = JSON.parse(message.toString());
    console.log('Received sensor data:', sensorData);
  }
});

// Menangani jika ada error
client.on('error', (err) => {
  console.log('Connection error:', err);
});
