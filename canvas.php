<!DOCTYPE html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.js"></script>
	<title>asda</title>
	<style type="text/css">
		.parent-box{
			width: 700px;
			height: 680px;
			background: #332C2B;
			position: 
		}

		.header-box{
			width: 90%;
			top: 8px;
			position: relative;
			margin: 10px;
		}

		.image-cover{
			width: 100%;
			height: 360px;
			max-height: 360px;
			background-size: cover;
			object-fit: cover;
 			background-repeat:  no-repeat;
 			background-position: center center;
		}

		.image-kontent{
			width: 100%;
		}

		.hastag{
			position: relative;
			width: 100%;
		}


		.hastag p{
			font-size: 18px;
			text-align: center;
			font-family: arial;
			font-weight: bold;
			position: absolute;
			bottom: 0;
			margin: auto;
			margin-left: 25%;
			color: #333;
			padding: 0;
			overflow-x: hidden;
			background: #DBCD0A;
			width: 50%;
			border-radius: 10px;
		}

		.tag{

			font-size: 18px;
			text-align: center;
			font-family: arial;
			font-weight: bold;
			position: relative;
			bottom: 0;
			margin: auto;
			z-index: 19999;
			margin-left: 25%;
			margin-top: -11px;
			color: #333;
			padding: 0;
			overflow-x: hidden;
			background: #DBCD0A;
			width: 50%;
			border-radius: 10px;
		}

		.box-detail{
			height: 27%;
			display: flex;
			align-items: center;
			justify-content: center;
			position: relative;

		}
		table.template{
			width: 100%;
			right: 10px;
			max-width: 100%;
		}

		td.template{
			width: 50%;
			max-width: 50%;
		}

		td.template p{

			color: #8bc34a;
			font-size: 14px;
			margin-right: 10px;
			font-family: arial;
			margin-left: 10px;
		}

		.box-detail p{
			color: #8bc34a;
			font-size: 14px;
			margin-right: 10px;
			font-family: arial;
			margin-left: 10px;

		}

		p.text-detail{
			color: #fff;
			font-size: 20px;
			position: relative;
			text-align: center;
			line-height: 32px;
			font-weight: bold;
			word-wrap: break-word;
			margin-left: 10px;
		    -ms-transform: translateY(-50%);
		}
	</style>
</head>
<body>
		<input type="text" id="valsumber" placeholder="Sumber (contoh: owibu.com)">
		<input type="text" id="valcredit" placeholder="Masukkan credit">
		<textarea id="valdetail" placeholder="Masukkan isi berita" rows="20"></textarea>
		<input type="file" name="gambar" id="gambar_pro">
		<input type="submit" value="Submit" id="klik">

	<div class="parent-box" id="parent-feed">
		<div class="header-box">
			<img src="top-judul.png" width="659">
		</div>
		<div class="hastag">
			<div class="image-cover" id="image-cover"></div>
		</div>
		<p class="tag">#Owibuinfo</p>
			<table class="template">
				<tr class="template">
					<td class="template"><p><span id="sumber"></span></p></td>
					<td align="right" class="template"><p><span id="credit"></span></p></td>
				</tr>
			</table>
		<div class="box-detail">
			<p class="text-detail"><span id="detail"></span></p>
		</div>
		<div class="footera">
			<img src="bottom.jpg">
		</div>
	</div>
</body>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
   var reader = new FileReader();
   reader.onload = function (e) {
      if(e!=''){
        $('#image-cover').show();
        var img = "url('"+ e.target.result + "')";
        document.getElementById('image-cover').style.backgroundImage = img;
      }else{
        $('#image-cover').show();
      }
   }
   reader.readAsDataURL(input.files[0]);
 }
}

$('#gambar_pro').change(function(){
   readURL(this);
});
</script>
<script type="text/javascript">
			$('#klik').click(function(){
				var sumber = document.getElementById("valsumber").value.replace("Sumber:", "");
				var credit = document.getElementById("valcredit").value;
				var detail = document.getElementById("valdetail").value;
				var gambar_pro = document.getElementById("gambar_pro").value;
				if(sumber != '' && credit != '' && detail != '' && gambar_pro != ''){
					document.getElementById("sumber").innerHTML = "Sumber: " + sumber;
					document.getElementById("credit").innerHTML = credit;
					document.getElementById("detail").innerHTML = detail;
					document.getElementById("parent-feed").style.display = 'block';

			    html2canvas($('#parent-feed'), {
			      	onrendered: function (canvas) {

			        var a = document.createElement('a');
			        a.href = canvas.toDataURL("image/jpeg");
			        a.download = 'owibu.com-feed.jpg';
			        a.click();
			      },
			    	useCORS: true,
			    	letterRendering: 1,
			    	logging: true,
			    });

				}else{
					alert('Masih ada yang kosong atau belum diupload');
				}
		  });
	
</script>
</html>