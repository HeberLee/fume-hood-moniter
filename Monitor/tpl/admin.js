var btn = document.getElementById('loginOut');

btn.addEventListener('click', function(e) {
	e.preventDefault();
	location.href = 'admin.php?controller=admin&method=logout';
	console.log('clicked');
}, false);
