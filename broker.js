var mosca = require('mosca');
var settings = { port: 1883 };
var broker = new mosca.Server(settings);

broker.on('ready', () => {
  console.log('Broker is ready!');
});

broker.on('published', (packet, client) => {
  if (packet.topic !== '$SYS') {
    const message = packet.payload.toString();
    console.log(`Message on topic \n'${packet.topic}': ${message} \n`);
  }
});

broker.on('clientConnected', (client) => {
  console.log(`Client connected: ${client.id}`);
});

broker.on('clientDisconnected', (client) => {
  console.log(`Client disconnected: ${client.id}`);
});