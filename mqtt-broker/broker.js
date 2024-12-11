const aedes = require('aedes')(); // Pustaka broker MQTT
const server = require('net').createServer(aedes.handle); // Server TCP untuk MQTT
const PORT = 1883; // Port untuk broker MQTT

// Event saat broker berjalan
server.listen(PORT, function () {
  console.log(`Broker MQTT berjalan di port ${PORT}`);
});

// Event saat ada client yang terhubung
aedes.on('client', function (client) {
  console.log(`Client terhubung: ${client ? client.id : 'Anonymous'}`);
});

// Event saat client melepaskan koneksi
aedes.on('clientDisconnect', function (client) {
  console.log(`Client terputus: ${client ? client.id : 'Anonymous'}`);
});

// Event saat ada pesan yang diterima di topik
aedes.on('publish', function (packet, client) {
  console.log(`Pesan diterima di topik "${packet.topic}": ${packet.payload.toString()}`);
});

// Event saat ada client yang berlangganan ke topik
aedes.on('subscribe', (subscriptions, client) => {
  console.log(`Client ${client ? client.id : 'Anonymous'} berlangganan ke topik: ${subscriptions.map(s => s.topic).join(', ')}`);
});
