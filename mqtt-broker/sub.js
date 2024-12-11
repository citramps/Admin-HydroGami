// Sub.js: Menggunakan MQTT.js untuk berlangganan data
const mqtt = require('mqtt');

// Konfigurasi broker MQTT
const brokerUrl = 'mqtt://192.168.117.189'; // Ganti dengan IP Broker MQTT Anda
const options = {
  clientId: 'Node_Subscriber',
  username: 'mqtt_user',       // Opsional, kosongkan jika tidak ada username
  password: 'mqtt_password',   // Opsional, kosongkan jika tidak ada password
};

const client = mqtt.connect(brokerUrl, options);

// Event handler untuk koneksix
client.on('connect', () => {
  console.log('Terhubung ke broker MQTT!');
  client.subscribe('sensor/data', { qos: 0 }, (err) => {
    if (err) {
      console.error('Gagal berlangganan:', err);
    } else {
      console.log('Berlangganan topik: sensor/data');
    }
  });
});

// Event handler untuk pesan masuk
client.on('message', (topic, message) => {
  console.log(`Pesan diterima di ${topic}: ${message.toString()}`);
});

client.on('error', (err) => {
  console.error('Kesalahan MQTT:', err);
});
