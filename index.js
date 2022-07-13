const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const io = require('socket.io')(server, {
    cors: {origin: "*"}
});
const mysql = require('mysql');
const connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : '',
    database : 'accelscience'
});

connection.connect();
io.on('connection', (socket) => {
    console.log('connection ');
    socket.on('sendChatToServer', (user, message) => {
        console.log(message);
        console.log(user);
        const date = new Date();
        var inserting = connection.query("INSERT INTO chat (email,message,created_at,updated_at) VALUES ('"+ user +"','"+ message +"',NOW(), NOW())");
        io.sockets.emit('sendChatToClient', user, message);
    });
    socket.on('disconnect', (socket) =>{
        console.log('disconnect')
    });
})
server.listen(3000,() => {
    console.log('Server is running!')
})
