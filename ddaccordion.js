// ** Script de contenido de acordeón: por Dynamic Drive, en http://www.dynamicdrive.com
// ** Creado: 7 de enero, 08 '. Última actualización: 28 de agosto de 2018 'a v2.2

// Versión 1.9: 7 de junio de 2010 ':
// ** 1) Se agregó compatibilidad con contenido Ajax, por lo que el contenido de un encabezado determinado se puede recuperar dinámicamente desde un archivo externo y bajo demanda.
// ** 2) Rendimiento optimizado del script almacenando en caché el encabezado y las referencias del contenedor de contenido

// Versión 2.1: 16 de febrero de 2012 ':
// ** 1) Se agregó la opción ("scrolltoheader") para desplazarse al encabezado expandido en cuestión después de que se expande (útil si un encabezado contiene contenido largo).

// Versión 2.2: 28 de agosto de 2018 ':
// ** 1) Se agregó la opción "scrolltocontent" para desplazarse al contenido expandido en cuestión después de que se expande, lo cual es útil si el contenido está en un área diferente de la página en relación con el encabezado.

var ddaccordion = {
	ajaxloadingmsg: '<img src = "loading2.gif" /> <br /> Cargando contenido ...', // personalizar HTML para generar mientras se recupera el contenido de Ajax (si corresponde)

	headergroup: {}, // objeto para almacenar el grupo de encabezado correspondiente basado en el valor de headerclass
	grupo de contenido: {}, // objeto para almacenar el grupo de contenido correspondiente según el valor de la clase de encabezado

	preloadimages: function ($ images) {
		$ images.each (function () {
			var preloadimage = nueva imagen ()
			preloadimage.src = this.src
		})
	},

	expandone: function (headerclass, selected, scrolltoheader) {// función PUBLIC para expandir un encabezado particular
		this.toggleone (clase de encabezado, seleccionado, "expandir", encabezado de desplazamiento)
	},

	collapseone: function (headerclass, selected) {// función PUBLIC para contraer un encabezado particular
		this.toggleone (clase de encabezado, seleccionado, "contraer")
	},

	expanddall: function (headerclass) {// función PUBLIC para expandir todos los encabezados en función de su nombre de clase CSS compartido
		var $ headers = this.headergroup [headerclass]
		this.contentgroup [headerclass] .filter (': hidden'). each (function () {
			$ headers.eq (parseInt ($ (this) .attr ('contentindex'))). trigger ("evt_accordion")
		})
	},

	collapseall: function (headerclass) {// función PUBLIC para contraer todos los encabezados en función de su nombre de clase CSS compartido
		var $ headers = this.headergroup [headerclass]
		this.contentgroup [headerclass] .filter (': visible'). each (function () {
			$ headers.eq (parseInt ($ (this) .attr ('contentindex'))). trigger ("evt_accordion")
		})
	},

	toggleone: function (headerclass, selected, optstate, scrolltoheader) {// Función PUBLIC para expandir / contraer un encabezado particular
		var $ targetHeader = this.headergroup [headerclass] .eq (seleccionado)
		var $ subcontent = this.contentgroup [headerclass] .eq (seleccionado)
		if (typeof optstate == "undefined" || optstate == "expand" && $ subcontent.is (": hidden") || optstate == "collapse" && $ subcontent.is (": visible"))
			$ targetHeader.trigger ("evt_accordion", [false, scrolltoheader])
	},

	ajaxloadcontent: function ($ targetHeader, $ targetContent, config, callback) {
		var ajaxinfo = $ targetHeader.data ('ajaxinfo')

		function handlecontent (content) {// función anidada
			if (content) {// si se ha cargado contenido ajax
				ajaxinfo.cacheddata = content // recuerda el contenido de ajax 
				ajaxinfo.status = "en caché" // establece el estado de ajax en caché
				if ($ targetContent.queue ("fx"). length == 0) {// si este contenido no se está expandiendo o contrayendo actualmente
					$ targetContent.hide (). html (content) // oculta el mensaje de carga, luego configura el contenido HTML del contenido secundario a contenido ajax
					ajaxinfo.status = "complete" // establece el estado de ajax para completar
					callback () // ejecuta la función callback - expande este contenido secundario
				}
			}
			if (ajaxinfo.status! = "complete") {
				setTimeout (function () {handlecontent (ajaxinfo.cacheddata)}, 100) // llame a handlecontent () nuevamente hasta que el contenido de ajax se haya cargado (ajaxinfo.cacheddata contiene datos)
			}
		} // finaliza la función anidada

		if (ajaxinfo.status == "none") {// los datos de ajax aún no se han obtenido
			$ targetContent.html (this.ajaxloadingmsg)
			$ targetContent.slideDown (config.animatespeed)
			ajaxinfo.status = "cargando" // establezca el estado de ajax en "cargando"
			$ .ajax ({
				url: ajaxinfo.url, // ruta al archivo de menú externo
				error: function (ajaxrequest) {
					handlecontent ('Error al recuperar contenido. Respuesta del servidor:' + ajaxrequest.responseText)
				},
				éxito: función (contenido) {
					contenido = (contenido == "")? "": contenido // si el contenido devuelto está vacío, configúrelo en "espacio" si el contenido ya no devuelve falso / vacío (aún no se ha cargado)
					manejar contenido (contenido)
				}
			})
		}
		si no (ajaxinfo.status == "cargando")
			handlecontent (ajaxinfo.cacheddata)
	},

	expandit: function ($ targetHeader, $ targetContent, config, useractivated, directclick, skipanimation, scrolltoheader) {
		var ajaxinfo = $ targetHeader.data ('ajaxinfo')
		if (ajaxinfo) {// si este contenido se debe obtener a través de Ajax
			if (ajaxinfo.status == "ninguno" || ajaxinfo.status == "cargando")
				this.ajaxloadcontent ($ targetHeader, $ targetContent, config, function () {ddaccordion.expandit ($ targetHeader, $ targetContent, config, useractivated, directclick)})
			si no (ajaxinfo.status == "en caché") {
				$ targetContent.html (ajaxinfo.cacheddata)
				ajaxinfo.cacheddata = nulo
				ajaxinfo.status = "completo"
			}
		}
		this.transformHeader ($ targetHeader, config, "expand")
		$ targetContent.slideDown (skipanimation? 0: config.animatespeed, function () {
			config.onopenclose ($ targetHeader.get (0), parseInt ($ targetHeader.attr ('headerindex')), $ targetContent.css ('display'), useractivated)
			var scrolltocontent = config.scrolltocontent
			if (scrolltoheader || scrolltocontent) {
				var sthdelay = (config ["collapseprev"])? 20: 0
				clearTimeout (config.sthtimer)
				var $ destination = (scrolltocontent)? $ targetContent: $ targetHeader
				config.sthtimer = setTimeout (function () {ddaccordion.scrollToHeader ($ destination)}, sthdelay)
			}
			if (config.postreveal == "gotourl" && directclick) {// if revelar tipo es "Ir a la URL del encabezado al hacer clic", y este es un clic directo en el encabezado
				var targetLink = ($ targetHeader.is ("a"))? $ targetHeader.get (0): $ targetHeader.find ('a: eq (0)'). get (0)
				if (targetLink) // si este encabezado es un enlace
					setTimeout (function () {location = targetLink.href}, 200 + (scrolltoheader? 400 + sthdelay: 0)) // ignora el objetivo del enlace, ya que window.open (targetLink, targetLink.target) no funciona en FF si emergente bloqueador habilitado
			}
		})
	},

	scrollToHeader: function ($ targetHeader) {
		ddaccordion. $ docbody.stop (). animate ({scrollTop: $ targetHeader.offset (). top}, 400)
	},

	collapseit: function ($ targetHeader, $ targetContent, config, isuseractivated) {
		this.transformHeader ($ targetHeader, config, "collapse")
		$ targetContent.slideUp (config.animatespeed, function () {config.onopenclose ($ targetHeader.get (0), parseInt ($ targetHeader.attr ('headerindex')), $ targetContent.css ('display'), isuseractivated) })
	},

	transformHeader: function ($ targetHeader, config, state) {
		$ targetHeader.addClass ((state == "expand")? config.cssclass.expand: config.cssclass.collapse) // clases CSS alternativas "expandir" y "contraer"
		.removeClass ((state == "expand")? config.cssclass.collapse: config.cssclass.expand)
		if (config.htmlsetting.location == 'src') {// ¿Cambiar la imagen del encabezado (suponiendo que el encabezado sea una imagen)?
			$ targetHeader = ($ targetHeader.is ("img"))? $ targetHeader: $ targetHeader.find ('img'). eq (0) // Establezca el objetivo en el encabezado o en la primera imagen dentro del encabezado
			$ targetHeader.attr ('src', (state == "expand")? config.htmlsetting.expand: config.htmlsetting.collapse) // cambia la imagen del encabezado
		}
		de lo contrario, si (config.htmlsetting.location == "prefijo") // si cambia el HTML de "prefijo", ubique la etiqueta de extensión ".accordprefix" agregada dinámicamente y cámbiela
			$ targetHeader.find ('. accordprefix'). empty (). append ((state == "expand")? config.htmlsetting.expand: config.htmlsetting.collapse)
		si no (config.htmlsetting.location == "sufijo")
			$ targetHeader.find ('. accordsuffix'). empty (). append ((state == "expand")? config.htmlsetting.expand: config.htmlsetting.collapse)
	},

	urlparamselect: function (headerclass) {
		var result = window.location.search.match (new RegExp (headerclass + "= ((\\ d +) (, (\\ d +)) *)", "i")) // verifica "? headerclass = 2, 3,4 "en URL
		if (resultado! = nulo)
			resultado = RegExp. $ 1.split (',')
		return result // devuelve nulo, [index] o [index1, index2, etc.], donde index son los índices de encabezado seleccionados deseados
	},

	getCookie: function (Name) { 
		var re = new RegExp (Name + "= [^;] +", "i") // construye RE para buscar el par de nombre / valor objetivo
		if (document.cookie.match (re)) // si se encuentra la cookie
			return document.cookie.match (re) [0] .split ("=") [1] // devuelve su valor
		volver nulo
	},

	setCookie: function (nombre, valor) {
		document.cookie = nombre + "=" + valor + "; ruta = /"
	},

	init: function (config) {
	document.write ('<style type = "text / css"> \ n')
	document.write ('.' + config.contentclass + '{display: none} \ n') // genera CSS para ocultar contenidos
	document.write ('a.hiddenajaxlink {display: none} \ n') // Clase CSS para ocultar el enlace ajax
	document.write ('<\ / style>')
	jQuery (documento) .ready (función ($) {
		ddaccordion.urlparamselect (config.headerclass)
		var persistedheaders = ddaccordion.getCookie (config.headerclass)
		ddaccordion.headergroup [config.headerclass] = $ ('.' + config.headerclass) // recuerda el grupo de encabezado para este acordeón
		ddaccordion.contentgroup [config.headerclass] = $ ('.' + config.contentclass) // recuerda el grupo de contenido para este acordeón
		ddaccordion. $ docbody = (window.opera)? (document.compatMode == "CSS1Compat"? jQuery ('html'): jQuery ('body')): jQuery ('html, body')
		var $ headers = ddaccordion.headergroup [config.headerclass]
		var $ subcontents = ddaccordion.contentgroup [config.headerclass]
		config.cssclass = {collapse: config.toggleclass [0], expand: config.toggleclass [1]} // almacenar expandir y contraer clases CSS como propiedades de objeto
		config.revealtype = config.revealtype || "hacer clic"
		config.revealtype = config.revealtype.replace (/ mouseover / i, "mouseenter")
		if (config.revealtype == "clickgo") {
			config.postreveal = "gotourl" // recuerda la acción agregada
			config.revealtype = "clic" // sobrescribe revelar tipo a la palabra clave "clic"
		}
		if (typeof config.togglehtml == "undefined")
			config.htmlsetting = {ubicación: "none"}
		más
			config.htmlsetting = {ubicación: config.togglehtml [0], contraer: config.togglehtml [1], expandir: config.togglehtml [2]} // almacenar la configuración HTML como propiedades del objeto
		config.oninit = (typeof config.oninit == "undefined")? function () {}: config.oninit // adjunta el controlador de eventos "oninit" personalizado
		config.onopenclose = (typeof config.onopenclose == "undefined")? function () {}: config.onopenclose // adjunta el controlador de eventos "onopenclose" personalizado
		var lastexpanded = {} // objeto para contener la referencia al último encabezado expandido y contenido (objetos jquery)
		var expandindices = ddaccordion.urlparamselect (config.headerclass) || ((config.persiststate && persistedheaders! = null)? persistedheaders: config.defaultexpanded)
		if (typeof extendedindices == 'string') // prueba el valor de la cadena (la excepción es config.defaultexpanded, que es una matriz)
			expandindices = extendedindices.replace (/ c / ig, '') .split (',') // transforma el valor de la cadena en una matriz (es decir: "c1, c2, c3" se convierte en [1,2,3]
		if (extendedindices.length == 1 && expandedindices [0] == "- 1") // verifique el valor de los índices expandidos de [-1], lo que indica que la persistencia está activada y no hay contenido expandido
			índices expandidos = []
		if (config ["collapseprev"] && expandindices.length> 1) // ¿solo permite abrir un contenido?
			expandindices = [extendedindices.pop ()] // devuelve el último elemento de la matriz como una matriz (por el bien de jQuery.inArray ())
		if (config ["onemustopen"] && expandindices.length == 0) // si al menos un contenido debe estar abierto en todo momento y ninguno lo está, abra el primer encabezado
			índices expandidos = [0]
		$ headers.each (function (index) {// recorre todos los encabezados
			var $ header = $ (esto)
			if (/(prefix)|(suffix)/i.test(config.htmlsetting.location) && $ header.html ()! = "") {// agrega un elemento SPAN al encabezado dependiendo de la configuración del usuario y si el encabezado es una etiqueta de contenedor
				$ ('<span class = "accordprefix"> </span>') .prependTo (this)
				$ ('<span class = "accordsuffix"> </span>') .appendTo (this)
			}
			$ header.attr ('headerindex', index + 'h') // almacena la posición de este encabezado en relación con sus pares
			$ subcontents.eq (index) .attr ('contentindex', index + 'c') // almacena la posición de este contenido en relación con sus pares
			var $ subcontent = $ subcontents.eq (índice)
			var $ hiddenajaxlink = $ subcontent.find ('a.hiddenajaxlink: eq (0)') // ver si este contenido debe cargarse a través de ajax
			if ($ hiddenajaxlink.length == 1) {
				$ header.data ('ajaxinfo', {url: $ hiddenajaxlink.attr ('href'), cacheddata: null, status: 'none'}) // almacenar información sobre este contenido ajax dentro del encabezado
			}
			var aguja = (tipo de índices expandidos [0] == "número")? index: index + '' // verifica el tipo de datos dentro de la matriz de índices expandidos: el índice debe coincidir con ese tipo
			if (jQuery.inArray (aguja, índices expandidos)! = - 1) {// verifique los encabezados que deberían expandirse automáticamente (convierta primero el índice a cadena)
				ddaccordion.expandit ($ header, $ subcontent, config, false, false,! config.animatedefault) // 3er último parámetro establece el parámetro 'isuseractivated', 2do último establece isdirectclick, último establece el parámetro skipanimation
				lastexpanded = {$ encabezado: $ encabezado, $ contenido: $ subcontenido}
			} // fin de la verificación
			más{
				$ subcontent.hide ()
				config.onopenclose ($ header.get (0), parseInt ($ header.attr ('headerindex')), $ subcontent.css ('display'), false) // El último valor booleano establece el parámetro 'isuseractivated'
				ddaccordion.transformHeader ($ header, config, "collapse")
			}
		})
		// if (config ["scrolltoheader"] && lastexpanded. $ header)
			//ddaccordion.scrollToHeader(lastexpanded.$header)
		$ headers.bind ("evt_accordion", function (e, isdirectclick, scrolltoheader) {// asigna un controlador de eventos CUSTOM que expande / contacta un encabezado
				var $ subcontent = $ subcontents.eq (parseInt ($ (this) .attr ('headerindex'))) // obtiene un subcontenido que debe expandirse / contraerse
				if ($ subcontent.css ('display') == "none") {
					ddaccordion.expandit ($ (this), $ subcontent, config, true, isdirectclick, false, scrolltoheader) // 2do último parámetro establece el parámetro 'isuseractivated'
					if (config ["collapseprev"] && lastexpanded. $ header && $ (this) .get (0)! = lastexpanded. $ header.get (0)) {// ¿contraer el contenido anterior?
						ddaccordion.collapseit (lastexpanded. $ header, lastexpanded. $ content, config, true) // El último valor booleano establece el parámetro 'isuseractivated'
					}
					lastexpanded = {$ header: $ (this), $ content: $ subcontent}
				}
				sino if (! config ["onemustopen"] || config ["onemustopen"] && lastexpanded. $ header && $ (this) .get (0)! = lastexpanded. $ header.get (0)) {
					ddaccordion.collapseit ($ (this), $ subcontent, config, true) // El último valor booleano establece el parámetro 'isuseractivated'
				}
 		})
		$ headers.bind (config.revealtype, function () {
			if (config.revealtype == "mouseenter") {
				clearTimeout (config.revealdelay)
				var headerindex = parseInt ($ (this) .attr ("headerindex"))
				config.revealdelay = setTimeout (function () {ddaccordion.expandone (config ["headerclass"], headerindex, config.scrolltoheader)}, config.mouseoverdelay || 0)
			}
			más{
				$ (this) .trigger ("evt_accordion", [true, config.scrolltoheader]) // el último parámetro indica que se trata de un clic directo en el encabezado
				devuelve falso // cancela el comportamiento de clic predeterminado
			}
		})
		$ headers.bind ("mouseleave", function () {
			clearTimeout (config.revealdelay)
		})
		config.oninit ($ headers.get (), índices expandidos)
		$ (window) .bind ('unload', function () {// limpia y persiste en la descarga de la página
			$ headers.unbind ()
			var expandindices = []
			$ subcontents.filter (': visible'). each (function (index) {// obtener índices de encabezados expandidos
				expandindices.push ($ (this) .attr ('contentindex'))
			})
			if (config.persiststate == true && $ headers.length> 0) {// ¿persiste el estado?
				expandindices = (extendedindices.length == 0)? '-1c': índices expandidos // Sin contenido expandido, ¿indica eso con el valor ficticio '-1c'?
				ddaccordion.setCookie (config.headerclass, expandindices)
			}
		})
	})
	}
}

// precarga cualquier imagen definida dentro de la variable ajaxloadingmsg
ddaccordion.preloadimages (jQuery (ddaccordion.ajaxloadingmsg) .filter ('img'))