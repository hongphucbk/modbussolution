var io = require('socket.io')(6001)
console.log('Connected to port 6001');

io.on('error', function(socket) {
	console.log('error');
});



io.on('connection', function(socket) {
	console.log('Co nguoi vua ket noi id = ' + socket.id);

	socket.on('modbustcp1', function(msg){
	    console.log('modbustcp: ' + msg);
	});

	socket.on('eventMsg', function(socket) {
		console.log('hello');
	});

	//Receive data from Web fontend - Button
	socket.on('write_data_button', function(data) {
		console.log("Da nhan: " + data);
		io.emit('webwrite', data);
		console.log("Da gui: " + data);
	});

	//Receive data from Web fontend - Text
	socket.on('write_data_text', function(data) {
		console.log("Da nhan: " + data);
		io.emit('webwritetext', data);
		console.log("Da gui: " + data);
	});


	//
	socket.on('webwritestart', function(msg){
	    console.log('Đã kết nối: ' + msg);

	    data = {
			'ipaddress' : '127.0.0.1',
			'slave': 1,
			'address': '40001'
		}
		data = "127.0.0.1, 1,40001,125";
			
			
		io.emit('webwrite', data); 

		data1 = "1, 14, 2, 15, 3,17";
		io.emit('webwritetext', data1);
	});

	socket.on('modbustcp', function(msg){
		var obj = JSON.parse(msg);
	    console.log(obj.device_id + "--" + obj.ipaddress + "--" + obj.parameter_id + "--"  + obj.value + "--" + obj.created_at );
	    data = {
			'id' :obj.parameter_id,
			'value': obj.value,
			'time': obj.created_at
		}
		io.emit('modbus', data); 
	});
		
	socket.on('disconnect', function(){
	    console.log('Disconect '+ socket.id + ' disconnected');
	});

	// setInterval(function () {
	// 	A_emit();
	// }, 10000);
	
})



function A_emit() {

	var today = new Date();
	var timeValue = today.getDate() + "-" + (today.getMonth() + 1) + "-" + today.getFullYear() + " " + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
	for (var i = 1; i <= 4; i++) {
		data = {
			'id' :i,
			'value': randomInt(60,70),
			'time': timeValue
		}
		console.log(data);
		io.emit('modbus', data);  
	}
};

function randomInt(low, high) {
  return Math.floor(Math.random() * (high - low) + low)
}


// var Redis = require('ioredis')
// var redis = new Redis(1000)
// redis.psubscribe("*", function(error, count) {
// 	// body...
// })

// redis.on('pmessage',function(partner, channel, message) {
// 	// console.log(channel);
// 	// console.log(message);
// 	// console.log(partner);
	
// 	message = JSON.parse(message)
// 	io.emit(channel+":"+message.event, message.data.message);
// 	console.log('Sent');
// })