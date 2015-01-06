$(document).ready(init);
function init(){

	var heigthImg = 550;
	var actionImg = '../../assets/ups/logos_resize.php?folder=fotos&heigth=' + heigthImg + '&nombre=Img';
	
	new AjaxUpload('img1Upload', {
		action: actionImg+'1',
		name: 'userfile',
		onSubmit: function(file, extension) {
			if (!(extension && /^(jpg|png|jpeg|gif)$/i.test(extension))){
				// extension is not allowed
				alert('Error: invalid file extension');
				// cancel upload
				return false;
			}
		},
		onComplete: function(file, response) {
			
			var elemImg = null;
			if( $("#img_1").length > 0 ){
				elemImg = document.getElementById('img_1');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'img_' + 1);
			elemImg.setAttribute("src", 'http://Dandy.mx/assets' + response);
			elemImg.setAttribute("style", "width:" + 300 + "px;");
			
			document.getElementById("img1").appendChild(elemImg);
			$('#Imagen1').val('' + response);
		}
	});
	
	new AjaxUpload('img2Upload', {
		action: actionImg+'2',
		name: 'userfile',
		onSubmit: function(file, extension) {
			if (!(extension && /^(jpg|png|jpeg|gif)$/i.test(extension))){
				// extension is not allowed
				alert('Error: invalid file extension');
				// cancel upload
				return false;
			}
		},
		onComplete: function(file, response) {
			
			var elemImg = null;
			if( $("#img_2").length > 0 ){
				elemImg = document.getElementById('img_2');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'img_' + 2);
			elemImg.setAttribute("src", 'http://Dandy.mx/assets' + response);
			elemImg.setAttribute("style", "width:" + 300 + "px;");
			
			document.getElementById("img2").appendChild(elemImg);
			$('#Imagen2').val('' + response);
			document.getElementById("img2").height = elemImg.innerHeight;
		}
	});
	
	new AjaxUpload('img3Upload', {
		action: actionImg+'3',
		name: 'userfile',
		onSubmit: function(file, extension) {
			if (!(extension && /^(jpg|png|jpeg|gif)$/i.test(extension))){
				// extension is not allowed
				alert('Error: invalid file extension');
				// cancel upload
				return false;
			}
		},
		onComplete: function(file, response) {
			
			var elemImg = null;
			if( $("#img_3").length > 0 ){
				elemImg = document.getElementById('img_3');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'img_' + 3);
			elemImg.setAttribute("src", 'http://Dandy.mx/assets' + response);
			elemImg.setAttribute("style", "width:" + 300 + "px;");
			
			document.getElementById("img3").appendChild(elemImg);
			$('#Imagen3').val('' + response);
		}
	});
	
	new AjaxUpload('img4Upload', {
		action: actionImg+'4',
		name: 'userfile',
		onSubmit: function(file, extension) {
			if (!(extension && /^(jpg|png|jpeg|gif)$/i.test(extension))){
				// extension is not allowed
				alert('Error: invalid file extension');
				// cancel upload
				return false;
			}
		},
		onComplete: function(file, response) {
			
			var elemImg = null;
			if( $("#img_4").length > 0 ){
				elemImg = document.getElementById('img_4');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'img_' + 4);
			elemImg.setAttribute("src", 'http://Dandy.mx/assets' + response);
			elemImg.setAttribute("style", "width:" + 300 + "px;");
			
			document.getElementById("img4").appendChild(elemImg);
			$('#Imagen4').val('' + response);
		}
	});
	
	new AjaxUpload('img5Upload', {
		action: actionImg+'5',
		name: 'userfile',
		onSubmit: function(file, extension) {
			if (!(extension && /^(jpg|png|jpeg|gif)$/i.test(extension))){
				// extension is not allowed
				alert('Error: invalid file extension');
				// cancel upload
				return false;
			}
		},
		onComplete: function(file, response) {
			
			var elemImg = null;
			if( $("#img_5").length > 0 ){
				elemImg = document.getElementById('img_5');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'img_' + 5);
			elemImg.setAttribute("src", 'http://Dandy.mx/assets' + response);
			elemImg.setAttribute("style", "width:" + 300 + "px;");
			
			document.getElementById("img5").appendChild(elemImg);
			$('#Imagen5').val('' + response);
		}
	});
}