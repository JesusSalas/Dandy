$(document).ready(init);
function init(){
	
	
	var	heigthLogo = 300;
	var heigthImg = 550;
	var heigthFachada = 250;
	var heigthPromo = 250;
	var heigthSlider = 254;
//	action: '../../assets/ups/logos.php',
	new AjaxUpload('logoUpload', {
		action: '../../assets/ups/logos_resize.php?folder=fotos&heigth='+heigthLogo,
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
			if( $("#logo").length > 0 ){
				elemImg = document.getElementById('logo');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'logo');
			elemImg.setAttribute("src", 'http://Dandy.mx/assets' + response);
//			elemImg.setAttribute("style", "height: 300" + height + "px; width:" + width + "px;");
			
			document.getElementById("logoImg").appendChild(elemImg);
			$('#Logo').val('' + response);
		}
	});
	
	new AjaxUpload('fotoUpload', {
		action: '../../assets/ups/logos_resize.php?folder=fotos&heigth='+heigthFachada,
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
			if( $("#fachada").length > 0 ){
				elemImg = document.getElementById('fachada');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'fachada');
			elemImg.setAttribute("src", 'http://Dandy.mx/assets' + response);
//			elemImg.setAttribute("style", "height:" + height + "px; width:" + width + "px;");
			
			document.getElementById("fachadaImg").appendChild(elemImg);
			$('#Foto').val('' + response);
		}
	});
	
	
	new AjaxUpload('sliderUpload', {
		action: '../../assets/ups/logos_resize.php?folder=fotos&heigth='+heigthSlider,
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
			if( $("#slider_principal").length > 0 ){
				elemImg = document.getElementById('slider_principal');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'slider_principal');
			elemImg.setAttribute("src", 'http://Dandy.mx/assets' + response);
//			elemImg.setAttribute("style", "height:" + height + "px; width:" + width + "px;");
			
			document.getElementById("sliderImg").appendChild(elemImg);
			$('#sliderPrincipal').val('' + response);
		}
	});
	
	
	var actionImg = '../../assets/ups/logos_resize.php?folder=fotos&heigth=' + heigthImg;
	
	new AjaxUpload('img1Upload', {
		action: actionImg,
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
		action: actionImg,
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
		action: actionImg,
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
		action: actionImg,
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
		action: actionImg,
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
	
	new AjaxUpload('imgUploadPro', {
		action: '../../assets/ups/logos_resize.php?folder=fotos&heigth'+heigthPromo,
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
			if( $("#img_promo").length > 0 ){
				elemImg = document.getElementById('img_promo');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'img_promo');
			elemImg.setAttribute("src", 'http://Dandy.mx/assets/promos/' + response);
//			elemImg.setAttribute("style", "height:" + height + "px; width:" + width + "px;");
			
			document.getElementById("fachadaImg").appendChild(elemImg);
			$('#promoname').val('' + response);
		}
	});
		
}