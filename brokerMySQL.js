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
// Handle published messages
broker.on('published', (packet) => {
    let topic = packet.topic; // Get topic
    let message = packet.payload.toString(); // Convert payload to string

    console.log('Topic received:', topic);
    console.log('Message received:', message);

    // Process only messages from the topic 'sensor/data'
    if (topic === 'sensor/data') {
        console.log('Processing message...');

        // Try parsing the message as JSON
        try {
            let data = JSON.parse(message);

            // Validate that the required fields exist in the JSON data
            if (data.temperature && data.humidity && data.light && data.soil_moisture && data.tds && data.ph) {
                let query = `
                    INSERT INTO mqttjs (temperature, humidity, light, soil_moisture, tds, ph)
                    VALUES (?, ?, ?, ?, ?, ?)
                `;

                // Save the data into the database
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
