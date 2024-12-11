const mqtt = require('mqtt');

// Mengonfigurasi koneksi ke broker MQTT
const broker = 'mqtt://localhost:1883'; // Alamat broker
const client = mqtt.connect(broker);

// Menunggu koneksi ke broker
client.on('connect', () => {
  console.log('Connected to MQTT Broker');

  // Data sensor yang akan dikirim
  const sensorData = {
    temperature: 25.3,
    humidity: 60.5,
    light: 65.2,
    soil_moisture: 40.3,
    tds: 350,
    ph: 7.1,
  };

  // Mengonversi data menjadi JSON string
  const message = JSON.stringify(sensorData);

  // Mengirim pesan ke topic "sensor/data"
  client.publish('sensor/data', message, (err) => {
    if (err) {
      console.log('Failed to publish message:', err);
    } else {
      console.log('Sensor data sent:', message);
    }
  });
});

// Menangani jika ada error
client.on('error', (err) => {
  console.log('Connection error:', err);
});
