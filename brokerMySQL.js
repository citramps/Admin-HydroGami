var aedes = require('aedes');        // Ganti Mosca dengan Aedes
var mysql = require('mysql');        // Tetap menggunakan MySQL untuk menyimpan data

// MQTT broker settings
var settings = { port: 1883 };       // Port tetap sama
var broker = aedes(settings);       // Ganti Mosca.Server dengan Aedes()

// MySQL connection settings
var db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '', 
    database: 'db3_hydro'
});

// Connect to MySQL database
db.connect((err) => {
    if (err) {
        console.error('Error connecting to MySQL:', err);
        process.exit(1); // Hentikan program jika koneksi gagal
    }
    console.log('Database connected!');
});

// MQTT broker is ready
broker.on('ready', () => {
    console.log('MQTT broker is ready!');
});

// Handle published messages
broker.on('published', (packet) => {
    let topic = packet.topic; // Dapatkan topik
    let message = packet.payload.toString(); // Konversi payload ke string

    console.log('Topic received:', topic);
    console.log('Message received:', message);

    // Hanya proses pesan dari topik 'sensor/data'
    if (topic === 'sensor/data') {
        console.log('Processing message...');

        // Coba parsing pesan sebagai JSON
        try {
            let data = JSON.parse(message);

            // Validasi apakah semua field yang diperlukan ada dalam data JSON
            if (data.temperature && data.humidity && data.light && data.soil_moisture && data.tds && data.ph) {
                let query = `
                    INSERT INTO mqttjs (temperature, humidity, light, soil_moisture, tds, ph)
                    VALUES (?, ?, ?, ?, ?, ?)
                `;

                // Simpan data ke dalam database
                db.query(
                    query,
                    [data.temperature, data.humidity, data.light, data.soil_moisture, data.tds, data.ph],  // Masukkan pH ke query
                    (err, result) => {
                        if (err) {
                            console.error('Error saving to database:', err);
                        } else {
                            console.log('Data saved to database:', result);
                        }
                    }
                );
            } else {
                console.log('Invalid sensor data:', message);
            }
        } catch (error) {
            console.log('Error parsing JSON message:', error);
        }
    } else {
        console.log('Ignoring message from topic:', topic);
    }
});

// Memulai broker Aedes
require('net').createServer(broker.handle).listen(1883, () => {
    console.log('Aedes MQTT broker running on port 1883');
});
