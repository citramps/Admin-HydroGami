// Mosca MQTT broker
var mosca = require('mosca')
var settings = { port: 1883 }
var broker = new mosca.Server(settings)

broker.on('ready', () => {
  console.log('Broker is ready!')
})

broker.on('published', (packet) => {
  if (packet.topic !== '$SYS') {
    const message = packet.payload.toString()
    console.log(`Message on topic '${packet.topic}': ${message}`)
  }
})
