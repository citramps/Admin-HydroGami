const mqtt = require('mqtt');

// Konfigurasi broker MQTT
const brokerUrl = 'mqtt://192.168.117.189'; // Ganti dengan IP Broker MQTT Anda
const options = {
  clientId: 'Node_Subscriber',
  username: 'mqtt_user',       // Opsional, kosongkan jika tidak ada username
  password: 'mqtt_password',   // Opsional, kosongkan jika tidak ada password
};

const client = mqtt.connect(brokerUrl, options);

// Event handler untuk koneksi
client.on('connect', () => {
  console.log('Terhubung ke broker MQTT!');
  client.subscribe('sensor/data', { qos: 0 }, (err, granted) => {
    if (err) {
      console.error('Gagal berlangganan:', err);
    } else {
      console.log('Berlangganan topik:', granted.map(g => g.topic).join(', '));
    }
  });
});

// Event handler untuk pesan masuk
client.on('message', (topic, message) => {
  console.log(`Pesan diterima di topik "${topic}": ${message.toString()}`);
});

// Event handler jika terjadi kesalahan
client.on('error', (err) => {
  console.error('Kesalahan MQTT:', err);
});

// Event handler jika broker offline
client.on('offline', () => {
  console.error('Broker MQTT offline.');
});
