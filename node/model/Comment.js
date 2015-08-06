function Comment(){
	this.db  = require('./db');
}
Comment.prototype.add = function(params){
	
		var q = 'INSERT INTO comments (user_id,publication_id,message,created_at,updated_at) VALUES('+params.user.id+','+params.publication_id+',"'+params.message+'",now(),now())';
	 
		console.log(q);
	this.db.query(q, function(err, result) {
	  if (err) throw err;
	 
	  console.log('The solution is: ', result);
	});
	 
};

module.exports = new Comment();