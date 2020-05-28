'use strict';
const express = require('express');
const http    = require('http');
const socket  = require('socket.io');

const SocketServer = require('./socket');

class Server{
    constructor()
    {
        this.port = 5000;
        this.host = 'localhost';
        this.app  = express();
        this.http   = http.Server(this.app);//node js server
        this.socket = socket(this.http);//here run a socket io module
    }
    runServer()
    {

        new SocketServer(this.socket).socketConnection();//this is soclet class

        /* Listening a node server*/
        this.http.listen(this.port,this.host,()=>{
            console.log(`server is running at http://${this.host}:${this.port}`);
        });
        /* Listening a node server*/
    }
}
const app = new Server();
app.runServer();// run the server class



