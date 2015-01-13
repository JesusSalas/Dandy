$(document).ready(init);
function init(){

	var	heigthLogo = 300;
	var heigthImg = 550;
	var heigthFachada = 250;
	var heigthPromo = 250;
	var heigthSlider = 254;
	var heigthMenu = 100;
//	action: '../assets/ups/logos.php',
	new AjaxUpload('logoUpload', {
		action: '../../assets/ups/upload_only_logos.php?folder=fotos&nombre=Logo&heigth='+heigthLogo,
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
			elemImg.setAttribute("src", '../../assets' + response);
			elemImg.setAttribute("width", '128');
			elemImg.setAttribute("height", '128');
//			elemImg.setAttribute("style", "height: 300" + height + "px; width:" + width + "px;");
			
			document.getElementById("logoImg").appendChild(elemImg);
			$('#Logo').val('' + response);
		}
	});
	
	
	new AjaxUpload('logoMedianoUpload', {
		action: '../../assets/ups/upload_only_logos.php?folder=fotos&nombre=LogoMediano&heigth='+heigthLogo,
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
			if( $("#logoMediano").length > 0 ){
				elemImg = document.getElementById('logoMediano');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'logoMediano');
			elemImg.setAttribute("src", '../../assets' + response);
			elemImg.setAttribute("width", '227');
			elemImg.setAttribute("height", '208');
//			elemImg.setAttribute("style", "height: 300" + height + "px; width:" + width + "px;");
			
			document.getElementById("logoImgMediano").appendChild(elemImg);
			$('#LogoMediano').val('' + response);
		}
	});
	
	
	new AjaxUpload('fotoUpload', {
		action: '../../assets/ups/upload_only_logos.php?folder=fotos&nombre=Fachada&heigth='+heigthFachada,
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
			elemImg.setAttribute("src", '../../assets' + response);
//			elemImg.setAttribute("style", "height:" + height + "px; width:" + width + "px;");
			
			document.getElementById("fachadaImg").appendChild(elemImg);
			$('#Foto').val('' + response);
		}
	});
	
	
	new AjaxUpload('sliderUpload', {
		action: '../../assets/ups/logos_resize.php?folder=fotos&nombre=Slider&heigth='+heigthSlider,
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
			if( $("#imgSlider").length > 0 ){
				elemImg = document.getElementById('imgSlider');
			} else{
				elemImg = document.createElement('img');
				elemImg.setAttribute("id", 'imgSlider');
			}
			elemImg.setAttribute("src", '../../assets' + response);
//			elemImg.setAttribute("style", "height:" + height + "px; width:" + width + "px;");
			
			document.getElementById("sliderImg").appendChild(elemImg);
			$('#imagenSlider').val('' + response);
		}
	});
	
	
	var actionImg = '../assets/ups/logos_resize.php?folder=fotos&heigth=' + heigthImg + '&nombre=Img';
	
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
			elemImg.setAttribute("src", '../../assets/' + response);
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
			elemImg.setAttribute("src", '../../assets' + response);
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
			elemImg.setAttribute("src", '../../assets' + response);
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
			elemImg.setAttribute("src", '../../assets' + response);
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
			elemImg.setAttribute("src", '../../assets' + response);
			elemImg.setAttribute("style", "width:" + 300 + "px;");
			
			document.getElementById("img5").appendChild(elemImg);
			$('#Imagen5').val('' + response);
		}
	});

	new AjaxUpload('img6Upload', {
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
			if( $("#img_6").length > 0 ){
				elemImg = document.getElementById('img_6');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'img_' + 6);
			elemImg.setAttribute("src", '../../assets' + response);
			elemImg.setAttribute("style", "width:" + 300 + "px;");
			
			document.getElementById("img6").appendChild(elemImg);
			$('#Imagen6').val('' + response);
		}
	});
	
	new AjaxUpload('img7Upload', {
		action: actionImg+'7',
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
			if( $("#img_7").length > 0 ){
				elemImg = document.getElementById('img_7');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'img_' + 7);
			elemImg.setAttribute("src", '../../assets' + response);
			elemImg.setAttribute("style", "width:" + 300 + "px;");
			
			document.getElementById("img7").appendChild(elemImg);
			$('#Imagen7').val('' + response);
			document.getElementById("img7").height = elemImg.innerHeight;
		}
	});
	
	new AjaxUpload('img8Upload', {
		action: actionImg+'8',
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
			if( $("#img_8").length > 0 ){
				elemImg = document.getElementById('img_8');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'img_' + 8);
			elemImg.setAttribute("src", '../../assets' + response);
			elemImg.setAttribute("style", "width:" + 300 + "px;");
			
			document.getElementById("img8").appendChild(elemImg);
			$('#Imagen8').val('' + response);
		}
	});
	
	new AjaxUpload('img9Upload', {
		action: actionImg+'9',
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
			if( $("#img_9").length > 0 ){
				elemImg = document.getElementById('img_9');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'img_' + 9);
			elemImg.setAttribute("src", '../../assets' + response);
			elemImg.setAttribute("style", "width:" + 300 + "px;");
			
			document.getElementById("img9").appendChild(elemImg);
			$('#Imagen9').val('' + response);
		}
	});
	
	new AjaxUpload('img10Upload', {
		action: actionImg+'10',
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
			if( $("#img_10").length > 0 ){
				elemImg = document.getElementById('img_10');
			} else{
				elemImg = document.createElement('img');
			}
			elemImg.setAttribute("id", 'img_' + 10);
			elemImg.setAttribute("src", '../../assets' + response);
			elemImg.setAttribute("style", "width:" + 300 + "px;");
			
			document.getElementById("img10").appendChild(elemImg);
			$('#Imagen10').val('' + response);
		}
	});
	
	new AjaxUpload('menuUpload', {
		action: '../../assets/ups/menu_upload.php?folder=fotos&heigth='+heigthMenu,
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
			
			var names = response.split("|");
			
			var elemImg = null;
			//if( $("#menuImg").length > 0 ){
			//	elemImg = document.getElementById('menuImg');
			//} else{
				elemImg = document.createElement('img');
			//}
			counterMenuImg++;
			elemImg.setAttribute("id", 'menuImg');
			elemImg.setAttribute("name", 'menuImg');
			elemImg.setAttribute("src", '../../assets' + names[1]);
			elemImg.setAttribute("style", "width:" + 200 + "px;border-color:#FFF;");
			elemImg.setAttribute("boder", "1");
			
			
			var divName = document.createElement('div');
			divName.setAttribute("style","float:left");
			divName.setAttribute("id",names[1]);
			
			divName.appendChild(elemImg);
			document.getElementById('menuImages').appendChild(divName);
			
			var elemInput = document.createElement('input');
			elemInput.setAttribute("id", 'menuImagen[]');
			elemInput.setAttribute("name", 'menuImagen[]');
			elemInput.setAttribute('type','hidden');
			elemInput.setAttribute('value','' + names[0]);
			
			document.getElementById("menuImages").appendChild(elemInput);
			$("#menuImages").removeAttr("style");
			
		}
	});
	
	var counterMenuImg=0;
	
	new AjaxUpload('imgUploadPro', {
		action: '../../assets/ups/logos_resize.php?folder=fotos&nombre=Promo&heigth'+heigthPromo,
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
			elemImg.setAttribute("src", '../../assets/promos/' + response);
//			elemImg.setAttribute("style", "height:" + height + "px; width:" + width + "px;");
			
			document.getElementById("fachadaImg").appendChild(elemImg);
			$('#promoname').val('' + response);
		}
	});
		
}