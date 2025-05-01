const aedes = require('aedes')();
const net = require('net');
const axios = require('axios');
const port = 1883;

// Status perangkat untuk dilacak
const deviceStatus = {
  "AB MIX": "OFF",
  "WATER": "OFF",
  "PH UP": "OFF",
  "PH DOWN": "OFF",
  "AUTO": "OFF"
};

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
    const topic = packet.topic;
    const message = packet.payload.toString();

    console.log(`Message on topic '${topic}': ${message}\n`);

    // Handle sensor data
    if (topic === 'sensor/data') {
        try {
            const data = JSON.parse(message);

            // Kirim data sensor ke Laravel
            axios.post('http://localhost:8000/api/sensor-data', data)
                .then(response => {
                    console.log('Data sensor sent to Laravel successfully');
                })
                .catch(error => {
                    console.error('Error sending sensor data:', error.message);
                });

        } catch (error) {
            console.error('Invalid JSON payload from sensor:', error.message);
        }
    }

    // Tangani kontrol pompa dari gamifikasi_page
    if (topic.startsWith('gamifikasi/control/')) {
        const device = topic.split('/').pop(); 
        
        if (device in deviceStatus) {
            deviceStatus[device] = message; // Update status
            console.log(`Device '${device}' set to: ${message}`);
            
            // Optional: Kirim status perangkat ke Laravel
            try {
                axios.post('http://localhost:8000/api/device-status', {
                    device: device,
                    status: message
                })
                .then(response => {
                    console.log(`Status ${device} sent to Laravel`);
                })
                .catch(error => {
                    console.error(`Error sending ${device} status:`, error.message);
                });
            } catch (error) {
                console.error('Error updating device status:', error.message);
            }
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

// Fungsi untuk mendapatkan status semua perangkat
aedes.on('subscribe', function (subscriptions, client) {
    // Jika client subscribe ke status perangkat, kirim status terkini
    if (subscriptions.some(sub => sub.topic === 'device/status')) {
        const packet = {
            cmd: 'publish',
            qos: 0,
            topic: 'device/status',
            payload: Buffer.from(JSON.stringify(deviceStatus)),
            retain: false
        };
        
        client.publish(packet, function (err) {
            if (err) console.error('Error publishing device status:', err);
        });
    }
});