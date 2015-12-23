function addmsg(){
	msgtext = document.getElementById('msgtext').value;
	messageblock = document.getElementById('messagebox');
	username="ivanov"
	datetime= new Date();
	messagetext="Holy cow! It works."
	var div = document.createElement('div');
	div.className = 'message panel panel-default';

	// div.innerHTML = '<div><h3 class="panel-title">'+username+'</h3><small>'+datetime+'</small></div><div class="panel-body">'+messagetext+'</div>';
	div.innerHTML=username+' at '+datetime+' wrote:<br>'+msgtext;


	messageblock.appendChild(div);
	messageblock.insertBefore(div, messageblock.firstChild);
}
