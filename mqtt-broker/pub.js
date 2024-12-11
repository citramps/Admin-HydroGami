// Pub.js: Menggunakan MQTT.js untuk mempublikasikan data
const mqtt = require('mqtt');

// Konfigurasi broker MQTT
const brokerUrl = 'mqtt://192.168.117.189'; // Ganti dengan IP Broker MQTT Anda
const options = {
  clientId: 'Node_Publisher',
  username: 'mqtt_user',       // Opsional, kosongkan jika tidak ada username
  password: 'mqtt_password',   // Opsional, kosongkan jika tidak ada password
};

const client = mqtt.connect(brokerUrl, options);

// Event handler untuk koneksi
client.on('connect', () => {
  console.log('Terhubung ke broker MQTT!');

  // Simulasi data sensor (misalnya, random number)
  setInterval(() => {
    const sensorData = Math.floor(Math.random() * 1024); // Ganti dengan data aktual
    client.publish('sensor/data', sensorData.toString(), { qos: 0, retain: false });
    console.log(`Data dikirim: ${sensorData}`);
  }, 1000); // Kirim setiap 1 detik
});

client.on('error', (err) => {
  console.error('Kesalahan MQTT:', err);
});
