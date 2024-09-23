<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript" src="ddaccordion.js">

/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* Please keep this notice intact
***********************************************/

</script>


<style type="text/css">

.mypets{ /*header of 1st demo*/
cursor: hand;
cursor: pointer;
padding: 2px 5px;
border: 1px solid gray;
background: #E1E1E1;
}

.openpet{ /*class added to contents of 1st demo when they are open*/
background: yellow;
}

.technology{ /*header of 2nd demo*/
cursor: hand;
cursor: pointer;
font: bold 14px Verdana;
margin: 10px 0;
}


.openlanguage{ /*class added to contents of 2nd demo when they are open*/
color: green;
}

.closedlanguage{ /*class added to contents of 2nd demo when they are closed*/
color: red;
}

</style>


</head>
<body>






<h2>Example 1:</h2>
<a href="#" onClick="ddaccordion.expandone('mypets', 0); return false">Expand 1st header</a> | <a href="#" onClick="ddaccordion.collapseone('mypets', 0); return false">Collapse 1st header</a> | <a href="#" onClick="ddaccordion.toggleone('mypets', 1); return false">Toggle 2nd header</a>

<h3 class="mypets">Dogs</h3>
<div class="thepet">
<img src="http://i10.tinypic.com/7xlrga1.jpg" />
The dog is a domestic subspecies of the wolf, a mammal of the Canidae family of the order Carnivora. The term encompasses both feral and pet varieties and is also sometimes used to describe wild canids of other subspecies or species. The domestic dog has been (and continues to be) one of the most widely-kept working and companion animals in human history, as well as being a food source in some cultures.
</div>

<h3 class="mypets">Cats</h3>
<div class="thepet">
The Cat, also known as the Domestic Cat or House Cat to distinguish it from other felines, is a small carnivorous species of crepuscular mammal that is often valued by humans for its companionship and its ability to hunt vermin. It has been associated with humans for at least 9,500 years.
</div>

<h3 class="mypets">Rabbits</h3>
<div class="thepet">
Rabbits are small mammals in the family Leporidae of the order Lagomorpha, found in several parts of the world. There are seven different genera in the family classified as rabbits, including the European rabbit (Oryctolagus cuniculus), cottontail rabbit (genus Sylvilagus; 13 species), and the Amami rabbit (Pentalagus furnessi, endangered species on Amami O-shima, Japan). There are many other species of rabbit, and these, along with cottontails, pikas, and hares, make up the order Lagomorpha. Rabbits generally live between four and twenty years.
</div>

<p><a href="currentpage.htm?mypets=2">Reload page and select the 3rd content using a URL parameter</a></p>


<br />


<h2>Example 2:</h2>
<a href="#" onClick="ddaccordion.collapseall('technology'); return false">Collapse all</a>  | <a href="#" onClick="ddaccordion.expandall('technology'); return false">Expand all</a> 


<div class="technology">What is JavaScript?</div>
<div class="thelanguage">
JavaScript is a scripting language originally developed by Netscape to add interactivity and power to web documents. It is purely client side, and runs completely on the client's browser and computer.
</div>

<div class="technology">Difference betwen Java & JavaScript?</div>
<div class="thelanguage">
Java is completely different from JavaScript- the former is a compiled language while the later is a scripting language.
</div>

<div class="technology">What is Ajax?</div>
<div class="thelanguage">
Ajax is a group of inter-related web development techniques used for creating interactive web applications. A primary characteristic is the increased responsiveness and interactiveness of web pages achieved by exchanging small amounts of data with the server "behind the scenes" so that the entire web page does not have to be reloaded each time the user performs an action. This is intended to increase the web page's interactivity, speed, functionality, and usability.
</div>

<p><a href="currentpage.htm?technology=0,1,2">Reload page and select the 1st, 2nd, and 3rd contents using a URL parameter</a></p>
<script type="text/javascript">

//Initialize first demo:
ddaccordion.init({
	headerclass: "mypets", //Shared CSS class name of headers group
	contentclass: "thepet", //Shared CSS class name of contents group
	revealtype: "mouseover", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content.
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	scrolltoheader: false, //scroll to header each time after it's been expanded by the user?
	scrolltocontent: false, //scroll to expanded content each time after it's been expanded by the user?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openpet"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["none", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

//Initialize 2nd demo:
ddaccordion.init({
	headerclass: "technology", //Shared CSS class name of headers group
	contentclass: "thelanguage", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: false, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc]. [] denotes no content.
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	scrolltoheader: false, //scroll to header each time after it's been expanded by the user?
	scrolltocontent: false, //scroll to expanded content each time after it's been expanded by the user?
	persiststate: false, //persist state of opened contents within browser session?
	toggleclass: ["closedlanguage", "openlanguage"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "<img src='http://i13.tinypic.com/80mxwlz.gif' style='width:13px; height:13px' /> ", "<img src='http://i18.tinypic.com/6tpc4td.gif' style='width:13px; height:13px' /> "], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

</script>
</body>

</html>