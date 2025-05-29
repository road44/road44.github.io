fetch("head/head.html")
	.then((response) => response.text())
	.then((data) => {
		document.head.innerHTML += data;
	});
