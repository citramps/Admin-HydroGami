// MQTT Publisher
var mqtt = require('mqtt')
var client = mqtt.connect('mqtt://localhost:1883')

// Daftar topik
var topics = [
  'building/sensors',
  'building/temperature',
  'building/humidity',
  'building/light',
  'building/soil_moisture',
  'building/tds',
  'building/ph'
]

// Simulasi data untuk pengujian
function getRandomData(range) {
  return Math.floor(Math.random() * range)
}

// Fungsi untuk mempublikasikan data ke setiap topik
client.on('connect', () => {
  console.log('Connected to broker!')
  setInterval(() => {
    client.publish('building/temperature', getRandomData(50).toString())
    client.publish('building/humidity', getRandomData(100).toString())
    client.publish('building/light', getRandomData(1000).toString())
    client.publish('building/soil_moisture', getRandomData(100).toString())
    client.publish('building/tds', getRandomData(500).toString())
    client.publish('building/ph', getRandomData(14).toString())

    console.log('Published data to topics!')
  }, 5000)
})
