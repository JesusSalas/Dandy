$(document).ready(init);

function init(){
	
	new AjaxUpload('imgUploadPro', {
		action: '../../assets/ups/promos.php',
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
			
			height = 250;
			width = 500;
			
			var elemImg = document.createElement('img');
			elemImg.setAttribute("id", 'img_promo');
			elemImg.setAttribute("src", 'http://Dandy.mx/assets/promos/' + response);
			elemImg.setAttribute("style", "height:" + height + "px; width:" + width + "px;");
			
			document.getElementById("fachadaImg").appendChild(elemImg);
			$('#promoname').val('' + response);
		}
	});
	
}



