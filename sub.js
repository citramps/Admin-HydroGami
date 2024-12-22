// MQTT Subscriber
var mqtt = require('mqtt')
var client = mqtt.connect('mqtt://localhost:1883')

// Daftar topik yang ingin disubscribe
var topics = [
  'building/sensors',
  'building/temperature',
  'building/humidity',
  'building/light',
  'building/soil_moisture',
  'building/tds',
  'building/ph'
]

// Fungsi untuk menangani pesan dari broker
client.on('message', (topic, message) => {
  console.log(`Received message on ${topic}: ${message.toString()}`)
})

// Langganan ke semua topik
client.on('connect', () => {
  console.log('Connected to broker!')
  client.subscribe(topics, (err) => {
    if (!err) {
      console.log(`Subscribed to topics: ${topics.join(', ')} \n`)
    } else {
      console.error('Failed to subscribe:', err)
    }
  })
})
