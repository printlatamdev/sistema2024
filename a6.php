<!--New Video-->


<style type="text/css">
	<style type="text/css">
/*  --------------------------------------------------
 :: Accordion
 -------------------------------------------------- */

.dt-accordion {
	position: relative;
	display: block;
	width: 100%;
	margin: 0;
	padding: 0;
}

.dt-accordion input {
	position: absolute;
	display: none;
}







/*  --------------------------------------------------
 :: Sections
 -------------------------------------------------- */

.dt-accordion ul.dt-accordion-section-two {
	position: relative;
	margin: 0px 0 0 0;
	line-height: 1;
	padding: 0;
	border: none;
	z-index: 99;
	text-align: left;
	list-style: none;
	width: 100%;
}

.dt-accordion ul.dt-accordion-section-two li {
	position: relative;
	line-height: 1;
	margin: 0;
}




.dt-accordion > div.dt-accordion-label ul.dt-accordion-section-two {
	height: 0;
	overflow: hidden;
	-webkit-transition: all 0.6s ease-in-out;
	-moz-transition: all 0.6s ease-in-out;
	-o-transition: all 0.6s ease-in-out;
	transition: all 0.6s ease-in-out;
}
/*  --------------------------------------------------
    :: Accordion Dark Colors Orange
    -------------------------------------------------- */







.dt-accordion > div.dt-accordion-label > input.dt-tab-2 + label span.button1a:after {
	content: "VER";
}


.dt-accordion > div.dt-accordion-label > input.dt-tab-2:checked + label span.button1a:after {
	content: "OCULTAR";
}


/*button style 1a*/



.button1a:hover {
	background: #6189a8 !important;
	text-shadow: 0 2px 3px #355e7b;
	color: white;
}
/*end button style 1a*/
/*button style 1*/

.button1 {
	border: 6px solid white;
	outline: solid 1px rgba(0, 0, 0, .2);
	padding: 7px 12px 7px 12px;
	/*margin-right: 10px;*/
	
	font-family: gotham_mediumregular, sans-serif;
	font-size: 13px;
	text-transform: uppercase;
	color: white;
	text-shadow: 0 2px 5px #000000;
	background-color: rgb(149, 180, 214);
	/*gradient*/
	/* Old browsers */
	

}

.button1:hover {
	background: rgb(34, 62, 96) !important;
	text-shadow: none;
}
a.button1 {
	color: #fff;
	text-decoration: none !important;
}
/*end button style 1*/

.buttonWrap {
	padding: 0px 0px 0;
}
.dt-wrapper {
	margin-bottom: 19px;
}
/*Video Container*/

.embed-container {
	position: relative;
	padding-bottom: 100%;
	padding-top: 10px;
	height: 0;
	overflow: hidden;
	/*max-width: 560px;*/
	
	height: auto;
}
.embed-container iframe,
.embed-container object,
.embed-container embed {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 50%;
}
iframe {
	display: block;
}
.videoWrapper {
	position: absolute;
	top: 0;
	left: 0;
}
/*end Video Container*/

@media (min-width: 641px) {

    .dt-accordion > div.dt-accordion-label > input.dt-tab-2:checked + label ul.dt-accordion-section-two {
        width: 100%;
        padding-bottom: 10%;/*MEDIDA DE ALTURA DE IFRAME */
    }
}
@media only screen and (min-width: 240px) and (max-width: 640px) {

    .dt-accordion > div.dt-accordion-label > input.dt-tab-2:checked + label ul.dt-accordion-section-two {
        width: 100%;
        padding-bottom: 67.5%;
    }
}
</style>






<div class="dt-wrapper">
	<!-- Accordion Start -->
	<div class="container" style="padding: 0px;">
		<div class="col-md-12">
			<div class="dt-accordion dt-accordion-orange" id="dt-accordion">
				<div class="dt-accordion-label">
					<input type="checkbox" id="dt-accordion-two" name="dt-accordion" class="dt-tab-2" />
					<label for="dt-accordion-two">
						<h2></h2>
						<p></em>!</p>
						<ul class="dt-accordion-section-two">
							<li class="videoWrapper">
								<div class="embed-container">
									<iframe width="100" height="20" src="a5.php" frameborder="1" ></iframe>
								</div>
							</li>
						</ul>
						<div class="buttonWrap">
							<span class="button1a"></span>
							
						</div>
					</label>
				</div>
			</div>
		</div>
	</div>
	<!-- Accordion End -->
</div>
<!--END New Video-->
