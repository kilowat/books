function UserMessage(){
	this.db  = require('./db');
}
UserMessage.prototype.messageAdd = function(params){
	
		var q = 'INSERT INTO user_messages (user_id,user_send_id,text,message_type,confirmed,created_at) VALUES('+params.user.id+','+params.userSend.id+',"'+params.text+'","'+params.message_type+'",0,now())';
	 
		
	this.db.query(q, function(err, result) {
	  if (err) throw err;
	 
	  console.log('The solution is: ', result);
	});
	 
};

UserMessage.prototype.messageConfirm = function(data){
	
	var q = 'UPDATE `user_messages` SET `confirmed`=1 WHERE `user_id`='+data.curUser.id+' AND `user_send_id`='+data.pageUserId;
	console.log(q);
	
	this.db.query(q, function(err, result) {
	  if (err) throw err;
	 
	  console.log('The solution is: ', result);
	});	
};

module.exports = new UserMessage();