<div class="widget new-user">
	<h4>Кто на сайте</h4>
	<ul id="online-user-list">
	
	</ul>
</div>
<script>
$(document).ready(function(){
	socket.emit('getActiveUser');
	socket.on('getActiveUser',function(data){
		
		var html = '';
		var user;
		$('#online-user-list li').remove();
		for (id in data){

			html+='<li id="user-online-id-'+data[id].id+'">';
			html+='<a class="avatar"><img width= 50 src="'+_app.getAvatar('mini',data[id].id,data[id].avatar)+'"></a>';
			html+='<a>'+data[id].name+'</a>'
			html+='</li>';
		}
		$('#online-user-list').append(html);

	});
});
</script>