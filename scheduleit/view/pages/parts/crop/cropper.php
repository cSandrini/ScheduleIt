<script type="text/javascript" src="../parts/crop/cropper_jsmin.js"></script>
<!-- A canvas which cropper will draw on -->
<canvas class="border rounded bg-light" id="canvasCropper" width="360" height="360" style="border: 1px solid black;" >Your browser does not support canvas.</canvas>
<script type="text/javascript">
	cropper.start(document.getElementById("canvasCropper"), 1); // initialize cropper by providing it with a target canvas and a XY ratio (height = width * ratio)
		
	function handleFileSelect() {
		$('#cropperModal').modal('show');
		// this function will be called when the file input below is changed
		var file = document.getElementById("imgPerfil").files[0];  // get a reference to the selected file
		var reader = new FileReader(); // create a file reader
		// set an onload function to show the image in cropper once it has been loaded
		reader.onload = function(event) {
			var data = event.target.result; // the "data url" of the image
			cropper.showImage(data); // hand this to cropper, it will be displayed
			cropper.startCropping();
		};
		reader.readAsDataURL(file); // this loads the file as a data url calling the function above once done
	}

	function saveCrop() {
  		var canvas = document.getElementById("canvasCropper");  
		var imgShow = document.getElementById('imgShow');
		var imageCropped = cropper.getCroppedImageBlob();
		var objectURL = URL.createObjectURL(imageCropped);
		imgShow.src = objectURL;

		console.log(imageCropped);

		let metadata = {
			type: 'image/png'
		};
		let file = new File([imageCropped], "perfil.png", metadata);
		let container = new DataTransfer(); 
    	container.items.add(file);

		document.querySelector('#imgPerfil').files = container.files;
	}
</script>
<br/>
<!-- Below are a series of inputs which allow file selection and interaction with the cropper api -->
<input class="btn btn-sm btn-outline-secondary" type="button" onclick="cropper.startCropping();" value="Ajustar" />
<input class="btn btn-sm btn-outline-secondary" type="button" onclick="cropper.getCroppedImageSrc()" value="Cortar" />
<input class="btn btn-sm btn-outline-secondary" type="button" onclick="cropper.restore()" value="Restaurar" />