// Import libraries
var mosca = require('mosca');
var mysql = require('mysql');

// MQTT broker settings
var settings = { port: 1883 };
var broker = new mosca.Server(settings);

// MySQL connection settings
var db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '', // Ganti dengan password MySQL Anda jika ada
    database: 'hydrogami_admin' // Nama database Anda
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
    let message = packet.payload.toString(); // Convert payload to string
    console.log('Message received:', message);

    // Abaikan pesan internal Mosca dan pesan kosong
    if (!message || message.startsWith('mqttjs_')) {
        console.log('Ignoring internal MQTT message:', message);
        return;
    }

    // Coba parsing sebagai JSON
    try {
        let data = JSON.parse(message);

        // Validasi apakah data JSON memiliki semua field yang diperlukan
        if (data.temperature && data.humidity && data.light && data.soil_moisture && data.tds) {
            let query = `
                INSERT INTO mqttjs (temperature, humidity, light, soil_moisture, tds)
                VALUES (?, ?, ?, ?, ?)
            `;

            // Simpan data ke database
            db.query(
                query,
                [data.temperature, data.humidity, data.light, data.soil_moisture, data.tds],
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
        // Tangani pesan non-JSON
        console.log('Non-JSON message, ignoring:', message);
    }
});
