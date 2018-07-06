// JavaScript Document by NetArt
function externalLinks() {
 if (!document.getElementsByTagName) return;
 var anchors = document.getElementsByTagName("a");
 for (var i=0; i<anchors.length; i++) {
   var anchor = anchors[i];
   if (anchor.getAttribute("href") &&
       anchor.getAttribute("rel") == "blank")
     anchor.target = "_blank";
 }
}
window.onload = externalLinks;

function clearForm(AForm)
{
	AForm.reset();
	var inputs = AForm.getElementsByTagName('input');
    for (i = 0; i < inputs.length; i++) {
        if (inputs[i].type == "radio") {
            inputs[i].checked = false;
        } else if (inputs[i].type == "checkbox") {
            inputs[i].checked = false;
        } else if (inputs[i].type == "text") {
            inputs[i].value = '';
        } else if (inputs[i].type == "select-one") {
            inputs[i].selectedIndex = 0;
        } else if (inputs[i].type == "select-multiple") {
            inputs[i].selectedIndex = -1;
        }
    }

	var textareas = AForm.getElementsByTagName('textarea');
    for (i = 0; i < textareas.length; i++) {
        textareas[i].value = '';
	}

    return false;
}

function closepopup() {
	var insider = document.getElementById('insider');
	var body = document.getElementsByTagName('body')[0];
	body.removeChild(insider);

}

function loadpopup(url) {

	if (!document.getElementById('insider')) {
		var insider = document.createElement('div');
		insider.setAttribute('id', 'insider');
		insider.setAttribute('style', 'display: block; position: absolute; top: 0; left: 0; bottom: 0; right: 0; z-index: 80');
		var body = document.getElementsByTagName('body')[0];
		body.style.height='100%';
		var htmlobj = document.getElementsByTagName('html')[0];
		var clientheight = htmlobj.scrollHeight;

		insider.innerHTML = ''
			+ '<div id="bg" style="background: #000; opacity: 0.7; height: '+clientheight+'px; width: 100%; filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70); z-index: 90; position: absolute; top: 0; left: 0; bottom: 0; right: 0; "></div><div id="popupouter" style="position: absolute; left: 50%; top: 120px; z-index: 10000; opacity: 1.0"><div id="popupcontent" style="position: absolute; left: -200px; z-index: 20000; background: #fff; width: 400px; height: 400px; border: 1px solid #444;">'
				    + '<iframe src="'+url+'" scrolling="no" frameborder="0" border="0" style="overflow: hidden; border:0; width: 400px; height: 380px;"></iframe>'
			+ '   <p style="text-align: center;">[ <a class="close" href="index.html" onclick="closepopup(); return false;">zamknij</a> ]</p</div></div>';

		body.appendChild(insider);
		
		if (document.documentElement.scrollTop) {
			document.getElementById('popupcontent').style.top=document.documentElement.scrollTop+'px';
		}
	}
}
