var inpfile=document.getElementById('inpfile');
var imagefile=document.getElementById('img_field');
var image=document.getElementById('img_field').src;
inpfile.addEventListener('change',function(){
file=this.files[0];
if(file){
	reader= new FileReader();
	reader.readAsDataURL(file);
	reader.addEventListener('load',function(){
		imagefile.setAttribute('src',this.result);
	});
}
else
{
imagefile.setAttribute('src',image);
}

});
