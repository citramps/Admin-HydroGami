const aedes = require('aedes')();
const net = require('net');
const axios = require('axios');
const port = 1883;

// Buat server TCP untuk Aedes
const server = net.createServer(aedes.handle);

// Server akan mendengarkan di port 1883
server.listen(port, function () {
    console.log(`MQTT broker is running on port ${port} \n`);
});

// Menangani koneksi client
aedes.on('client', function (client) {
    console.log(`Client connected: ${client.id}`);
});

// Menangani pesan yang dipublikasikan
aedes.on('publish', function (packet, client) {
    console.log(`Message on topic '${packet.topic}': ${packet.payload.toString()}\n`);

    // Proses hanya jika topik yang diterima adalah 'sensor/data'
    if (packet.topic === 'sensor/data') {
        const message = packet.payload.toString();
        
        // Kirim data ke Laravel
        try {
            const data = JSON.parse(message);

            // Kirim data JSON ke API Laravel
            axios.post('http://localhost:8000/api/sensor-data', data)
                .then(response => {
                    console.log('Data sent to Laravel successfully');
                })
                .catch(error => {
                    console.error('Error sending data to Laravel:', error.message);
                });

        } catch (error) {
            console.error('Invalid JSON payload:', error.message);
        }
    }
});

// Menangani error broker
aedes.on('error', (err) => {
    console.error('Broker error:', err.message);
});

// Event: Klien terhubung
aedes.on('clientConnected', (client) => {
    console.log(`Client connected: ${client.id}`);
});

// Event: Klien terputus
aedes.on('clientDisconnected', (client) => {
    console.log(`Client disconnected: ${client.id}`);
});
