<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div style="height: 100%; width: 100%" class="containter">
	<button id="boton" style="position: fixed; width: 30px; height: 30px"></button>
	<iframe id="frame" src="pdfs/2-2147483647-sentido_y_sensibilidad.pdf#toolbar=0&navpanes=0&scrollbar=0&page=10" style="width: 100%;height: 645px" ></iframe>
	</div>
    <!--Scripts de bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>
    <script type="text/javascript" >
    	$(document).ready(function(){
    		const frame= document.getElementById("frame");
    		const content= frame.contentWindow;
    		const frameDoc= frame.contentDocument;
    		const boton= document.getElementById("boton");
    		boton.addEventListener("click", function(e){
    			console.log(content);
    			console.log(frameDoc);

    		});
    	});
    	
    </script>
</body>
</html>