<!--

//Bloco de c?digo para esconder e mostra form
var Ver4 = parseInt(navigator.appVersion) >= 4
var IE4 = ((navigator.userAgent.indexOf("MSIE") != -1) && Ver4)
var block = "formulario";
function esconde() {	document.forms.aapf.style.visibility = "hidden" }
function mostra() { document.forms.aapf.style.visibility = "visible" }
//Bloco de c?digo para esconder e mostra form


// C?digo para o teclado 
function tecladown (digito){
	if (digito == ''){
		document.forms.aapf.senha.value = '';
		return;	
	}
	var pass = document.forms.aapf.senha.value;
	if (pass.length >= 8){
		return;
	}
	document.forms.aapf.senha.value = document.forms.aapf.senha.value + digito;
}
function teclaclick(tecla){
	return false;
}
function teclaup(tecla){
	tecladown(tecla);
}

//Bloco de código para reposicionar os Divs com referência no menu.
function calcCordenadasDiv(id, e){
	//pega a posição atual do menuGFP.
	
	var left = $(e.target).offset().left;
	var top = $(e.target).offset().top + $(e.target).outerHeight(true)+5;
	
	$("#"+id).css({"top" : (top) + 'px',"left" : (left) + 'px'});
}

// --

// Bloco de código para reposicionar os Divs com referência no menu.
	function calcCordenadaDiv(id, dif){
		//pega a posição atual do menuGFP.
		
		cordMenu = $(".menuGFPNovo").offset().top;
		console.log(cordMenu);
		//cordMenu = eval(document.getElementById('Links').offsetTop);
		$("#"+id).css({"top" : (cordMenu + dif) + 'px'});
	}

// Bloco de código para reposicionar os Divs com referência no ponteiro mouse.
	function calcCordenadaDiv2(id, dif, e){
		var oEvt = e || window.event;
		cordMenu = $(".menuGFPNovo").offset().top;
		document.getElementById(id).style.top = (oEvt.clientY + document.body.scrollTop - dif) + 'px';
	}

// -- Contador para objeto TextArea.
function limita(campo){
	var tamanho = document.forms.aapf[campo].value.length;
	var tex=document.forms.aapf[campo].value;
	if (tamanho>=1539) {
		document.forms.aapf[campo].value=tex.substring(0,1539); 
	}
	return true;
}

function contacampo(campo, tamtxt) {
document.forms.aapf[tamtxt].value =  1540-document.forms.aapf[campo].value.length;
}
// --



function SetHelp(txt) {
	var oHelp = document.getElementById('help');
	if (oHelp) oHelp.innerHTML = txt ;
}

function main(campofoco) { 
	if ( campofoco == '' || document.forms.aapf.elements.length == 0 ) 
		return false;
			
	var num = parseInt(campofoco);

	if ( num || num == 0 )
	{
		if ( document.forms.aapf[num] )
			document.forms.aapf[num].focus();
	}
	else 
	{
		if ( (campofoco == "senhaConta" || campofoco == "senhaAtual") && document.applets["tclJava"] ) 

			document.applets["tclJava"].setFocus();
		else if ( document.forms.aapf[campofoco] )
			document.forms.aapf[campofoco].focus();
	}
}

function Apaga(){
	if (document.forms.aapf.elements.length != 0)
		for (i = 0; i < document.forms.aapf.elements.length; i++)
		{
			if( document.forms.aapf[i].type != "hidden" )
				document.forms.aapf[i].value="";
		}
}


var da = (document.all) ? 1 : 0;
var pr = (window.print) ? 1 : 0;
var mac = (navigator.userAgent.indexOf("Mac") != -1); 

function printPage()
{
  if (pr) // NS4, IE5
    window.print()
  else if (da && !mac) // IE4 (Windows)
    vbPrintPage()
  else // other browsers
    alert("Desculpe seu browser n?o suporta esta fun??o. Por favor utilize a barra de trabalho para imprimir a p?gina.");
  return false;
}

if (da && !pr && !mac) with (document) {
  writeln('<OBJECT ID="WB" WIDTH="0" HEIGHT="0" CLASSID="clsid:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>');
  writeln('<' + 'SCRIPT LANGUAGE="VBScript">');
  writeln('Sub window_onunload');
  writeln('  On Error Resume Next');
  writeln('  Set WB = nothing');
  writeln('End Sub');
  writeln('Sub vbPrintPage');
  writeln('  OLECMDID_PRINT = 6');
  writeln('  OLECMDEXECOPT_DONTPROMPTUSER = 2');
  writeln('  OLECMDEXECOPT_PROMPTUSER = 1');
  writeln('  On Error Resume Next');
  writeln('  WB.ExecWB OLECMDID_PRINT, OLECMDEXECOPT_DONTPROMPTUSER');
  writeln('End Sub');
  writeln('<' + '/SCRIPT>');
}

function FormataDado(campo,tammax,pos,teclapres){
	var tecla = teclapres.keyCode;
	vr = document.forms.aapf[campo].value;
	vr = vr.replace( "-", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( "/", "" );
	tam = vr.length ;

	if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }

	if (tecla == 8 ){ tam = tam - 1 ; }
			
	if ( tecla == 8 || tecla == 88 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 ){
		if ( tam <= 2 ){
	 		document.forms.aapf[campo].value = vr ;}
		if ( tam > pos && tam <= tammax ){
			document.forms.aapf[campo].value = vr.substr( 0, tam - pos ) + '-' + vr.substr( tam - pos, tam );}
	}
	//alert("campo: " + document.forms.aapf[campo+1].name);
	if ( !teclapres.shiftKey && tecla == 9 && document.forms.aapf[campo+1].name == "senhaConta" && document.applets['tclJava'] ){
		//alert("aki 1");
			document.applets['tclJava'].setFocus();
	}
}

function FormataValor(campo,tammax,teclapres) {
	var tecla = teclapres.keyCode;
	vr = document.forms.aapf[campo].value;
	vr = vr.replace( "/", "" );
	vr = vr.replace( "/", "" );
	vr = vr.replace( ",", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	tam = vr.length;

	if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }

	if (tecla == 8 ){	tam = tam - 1 ; }
		
	if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 ){
		if ( tam <= 2 ){ 
	 		document.forms.aapf[campo].value = vr ; }
	 	if ( (tam > 2) && (tam <= 5) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 2 ) + ',' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 6) && (tam <= 8) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 5 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 9) && (tam <= 11) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 8 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 12) && (tam <= 14) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 11 ) + '.' + vr.substr( tam - 11, 3 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 15) && (tam <= 17) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 14 ) + '.' + vr.substr( tam - 14, 3 ) + '.' + vr.substr( tam - 11, 3 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + ',' + vr.substr( tam - 2, tam ) ;}
	}
		
	for (var ct = 0; ct < document.forms.aapf.elements.length; ct++) {
		if (document.forms.aapf.elements[ct].name == document.forms.aapf.elements[campo].name) {
			if ( !teclapres.shiftKey && tecla == 9 && document.forms.aapf.elements[ct+1] && document.forms.aapf.elements[ct+1].name == "senhaConta" && document.applets['tclJava'] ){
				document.applets['tclJava'].setFocus();
			}	
		}
	}
}

function SaltaCampo (campo,prox,tammax,teclapres){
	var tecla = teclapres.keyCode;
	vr = document.forms.aapf[campo].value;
	if( tecla == 109 || tecla == 188 || tecla == 110 || tecla == 111 || tecla == 223 || tecla == 108 ){
		document.forms.aapf[campo].value = vr.substr( 0, vr.length - 1 ); }
	else{
	 	vr = vr.replace( "-", "" );
	 	vr = vr.replace( "/", "" );
	 	vr = vr.replace( "/", "" );
	 	vr = vr.replace( ",", "" );
	 	vr = vr.replace( ".", "" );
	 	vr = vr.replace( ".", "" );
	 	vr = vr.replace( ".", "" );
	 	vr = vr.replace( ".", "" );
	 	tam = vr.length;	
		
	 	if (tecla != 0 && tecla != 9 && tecla != 16 && tecla != 144 ){
		
			if ( tam == tammax ){
				if ( prox == "senhaConta" || (document.forms.aapf.elements[prox] && document.forms.aapf.elements[prox].name == "senhaConta"))
				{
					if ( document.applets['tclJava'] )
						document.applets['tclJava'].setFocus();
					else if ( document.forms.aapf.senhaConta )
						document.forms.aapf.senhaConta.focus();
				}
				else if ( document.forms.aapf[prox] )
					document.forms.aapf[prox].focus();
			}
		}
	}
}

function FormataData(campo,teclapres) {
	var tecla = teclapres.keyCode;
	vr = document.forms.aapf[campo].value;
	vr = vr.replace( ".", "" );
	vr = vr.replace( "/", "" );
	vr = vr.replace( "/", "" );
	tam = vr.length + 1;

	if ( tecla != 9 && tecla != 8 ){
		if ( tam > 2 && tam < 5 )
			document.forms.aapf[campo].value = vr.substr( 0, tam - 2  ) + '/' + vr.substr( tam - 2, tam );
		if ( tam >= 5 && tam <= 10 )
			document.forms.aapf[campo].value = vr.substr( 0, 2 ) + '/' + vr.substr( 2, 2 ) + '/' + vr.substr( 4, 4 ); 
	}
/*	
	for (var ct = 0; ct < document.forms.aapf.elements.length; ct++) {
		if (document.forms.aapf.elements[ct].name == document.forms.aapf.elements[campo].name) {
			if ( !teclapres.shiftKey && tecla == 9 && document.forms.aapf[ct+1].name == "senhaConta" && document.applets['tclJava'] ){
				document.applets['tclJava'].setFocus();
			}	
		}
	}
*/
}

function FormataHora(campo,teclapres) {
	var tecla = teclapres.keyCode;
	vr = document.forms.aapf[campo].value;
	vr = vr.replace( ".", "" );
	vr = vr.replace( ":", "" );
	vr = vr.replace( ":", "" );
	tam = vr.length + 1;

	if ( tecla != 9 && tecla != 8 ){
		if ( tam > 2 && tam < 5 )
			document.forms.aapf[campo].value = vr.substr( 0, tam - 2  ) + ':' + vr.substr( tam - 2, tam );
	}
}

function FormataMesAno(Campo,teclapres) {
	var tecla = teclapres.keyCode;
	vr = document.forms.aapf[Campo].value;
	vr = vr.replace( ".", "" );
	vr = vr.replace( "/", "" );
	vr = vr.replace( "/", "" );
	tam = vr.length + 1;

	if ( tecla != 9 && tecla != 8 ){
		if ( tam > 2 && tam < 7 )
			document.forms.aapf[Campo].value = vr.substr( 0, 2 ) + '/' + vr.substr( 2, tam ); }
}

function FormataPercentual(campo,tammax,teclapres) {
	var tecla = teclapres.keyCode;
	vr = document.forms.aapf[campo].value;
	vr = vr.replace( "/", "" );
	vr = vr.replace( "/", "" );
	vr = vr.replace( ",", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	tam = vr.length;

	if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }

	if (tecla == 8 ){	tam = tam - 1 ; }
		
	if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 ){
		if ( tam <= 3 ){ 
	 		document.forms.aapf[campo].value = vr ; }
	 	if ( (tam > 3) && (tam <= 6) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 3 ) + ',' + vr.substr( tam - 3, tam ) ; }
	}		
	
}


function VerificaJava()
 	{
	if (navigator.javaEnabled())
		document.forms.aapf.javas.value="sim"
	}

function FormataCpf(campo,tammax,teclapres) {
	var tecla = teclapres.keyCode;
	vr = document.forms.aapf[campo].value;
	vr = vr.replace( "/", "" );
	vr = vr.replace( "/", "" );
	vr = vr.replace( ",", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	tam = vr.length;

	if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }

	if (tecla == 8 ){	tam = tam - 1 ; }
		
	if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 ){
		if ( tam <= 2 ){ 
	 		document.forms.aapf[campo].value = vr ; }
	 	if ( (tam > 2) && (tam <= 5) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 2 ) + '-' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 6) && (tam <= 8) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 5 ) + '.' + vr.substr( tam - 5, 3 ) + '-' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 9) && (tam <= 11) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 8 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + '-' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 12) && (tam <= 14) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 11 ) + '.' + vr.substr( tam - 11, 3 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + '-' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 15) && (tam <= 17) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 14 ) + '.' + vr.substr( tam - 14, 3 ) + '.' + vr.substr( tam - 11, 3 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + '-' + vr.substr( tam - 2, tam ) ;}
	}		
}

function FormataCartaoCredito(campo, teclapres) {
	
    var tammax = 16;
	var tecla = teclapres.keyCode;
	vr = document.forms.aapf[campo].value;

	if ( tecla == 8 || (tecla >= 48 && tecla <= 57) || (tecla >= 96 && tecla <= 105) ) {
		
		vr = vr.replace( "/", "" );
		vr = vr.replace( "/", "" );
		vr = vr.replace( ",", "" );
		vr = vr.replace( ".", "" );
		vr = vr.replace( ".", "" );
		vr = vr.replace( ".", "" );
		vr = vr.replace( ".", "" );
		vr = vr.replace( "-", "" );
		vr = vr.replace( "-", "" );
		vr = vr.replace( "-", "" );
		vr = vr.replace( "-", "" );
		vr = vr.replace( "-", "" );
		tam = vr.length;

		if (tam < tammax && tecla != 8) {
		   tam = vr.length + 1 ;
		}

		if (tecla == 8 ) {
			tam = tam - 1 ;
		}
		
		if ( tam > 1 ) {
			
	        if ( vr.substr(0,1) != "3" ) {
	        	
				if ( tam < 5 ) {
					document.forms.aapf[campo].value = vr ;
				} else if ( ( tam >  4 ) && ( tam < 9 ) ) {
				   document.forms.aapf[campo].value = vr.substr( 0, 4 ) + '.' + vr.substr( 4, tam-4 ) ;
				} else if ( ( tam >  8 ) && ( tam < 13 ) ) {
				   document.forms.aapf[campo].value = vr.substr( 0, 4 ) + '.' + vr.substr( 4, 4 ) + '.' + vr.substr( 8, tam-4 ) ;
				} else if ( tam > 12 ) {
				   document.forms.aapf[campo].value = vr.substr( 0, 4 ) + '.' + vr.substr( 4, 4 ) + '.' + vr.substr( 8, 4 ) + '.' + vr.substr( 12, tam-4 );
				}
			 	
			} else {
				
				if ( tam < 5 ) {
			   	   document.forms.aapf[campo].value = vr ;
			   	} else if ( ( tam >  4 ) && ( tam < 10 ) ) {
				   document.forms.aapf[campo].value = vr.substr( 0, 4 ) + '.' + vr.substr( 4, tam-4 ) ;
				} else if ( tam >  9 ) {
				   document.forms.aapf[campo].value = vr.substr( 0, 4 ) + '.' + vr.substr( 4, 5 ) + '.' + vr.substr( 9, tam-4 ) ;
				}
			 	
			}
		
		}
		
	}	
	
}

function FormataCgc(campo,tammax,teclapres) {
	var tecla = teclapres.keyCode;
	vr = document.forms.aapf[campo].value;
	vr = vr.replace( "/", "" );
	vr = vr.replace( "/", "" );
	vr = vr.replace( "/", "" );
	vr = vr.replace( ",", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	tam = vr.length;

	if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }

	if (tecla == 8 ){	tam = tam - 1 ; }
		
	if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 ){
		if ( tam <= 2 ){ 
	 		document.forms.aapf[campo].value = vr ; }
	 	if ( (tam > 2) && (tam <= 6) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 2 ) + '-' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 7) && (tam <= 9) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 6 ) + '/' + vr.substr( tam - 6, 4 ) + '-' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 10) && (tam <= 12) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 9 ) + '.' + vr.substr( tam - 9, 3 ) + '/' + vr.substr( tam - 6, 4 ) + '-' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 13) && (tam <= 14) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 12 ) + '.' + vr.substr( tam - 12, 3 ) + '.' + vr.substr( tam - 9, 3 ) + '/' + vr.substr( tam - 6, 4 ) + '-' + vr.substr( tam - 2, tam ) ; }
	 	if ( (tam >= 15) && (tam <= 17) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 14 ) + '.' + vr.substr( tam - 14, 3 ) + '.' + vr.substr( tam - 11, 3 ) + '.' + vr.substr( tam - 8, 3 ) + '.' + vr.substr( tam - 5, 3 ) + '-' + vr.substr( tam - 2, tam ) ;}
	}		
}

function FormataTelefone(campo,tammax,teclapres) {
	var tecla = teclapres.keyCode;
	vr = document.forms.aapf[campo].value;
	vr = vr.replace( "/", "" );
	vr = vr.replace( "/", "" );
	vr = vr.replace( ",", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( ".", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	vr = vr.replace( "-", "" );
	tam = vr.length;

	if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }

	if (tecla == 8 ){	tam = tam - 1 ; }
		
	if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 ){
		if ( tam <= 2 ){ 
	 		document.forms.aapf[campo].value = vr ; }
	 	if ( (tam > 4) ){
	 		document.forms.aapf[campo].value = vr.substr( 0, tam - 4 ) + '-' + vr.substr( tam - 4, tam ) ; }
	}		
}

var confirmaAssinador = 0;
var linkJS = "";

function getSenha() {
	if ( document.getElementById('tclAssinadorContent') && document.getElementById('tclAssinadorContent').style.display == 'none' )
	{
		if(showApplet());
			return false;
	}

	if ( document.applets['tclJava'] ){
		var senha = document.applets['tclJava'].getSenha();
		document.forms.aapf.elements['senhaConta'].value = senha;
		if (document.forms.aapf.elements['numCod']) {
			document.forms.aapf.elements['numCod'].value = document.applets['tclJava'].getNumCod();
		}
	}
	else if ( document.applets['tclAssinador'] )
	{
		if(confirmaAssinador == 1)
		{
			confirmaAssinador = 0;
			if( document.applets['tclAssinador'].ok() )
			{
				loadData();
				return true;
			}	
			else
			{
				document.applets['tclAssinador'].focus();
				return false;
			}
		}
		else
		{
			return document.applets['tclAssinador'].cancel();
		}
	}
}

function trocaBotaoAction(botao)
{
	if ( document.applets['tclAssinador'] )
	{
		pos = document.forms.aapf.action.indexOf("?");
		acao = document.forms.aapf.action;
		if(pos != -1)
		{
			acao = acao.substring(0, pos);
		}
		document.forms.aapf.action = acao + "?" + botao + ".x=1";
	}
}

// metodo chamado pela applet na finaliza??o do processo
function appletTerminated(ok)
{
	if (ok)
		loadData();
	if (linkJS == "")
		document.forms.aapf.submit();
	else if (linkJS == "retorna") {
		linkJS = "";
		window.history.back(1);
	}
	else {
		var linkJSTemp = linkJS;
		linkJS = "";
		window.navigate(linkJSTemp);
	}
}

function controleJS(link) {
	linkJS = link;
	if (document.applets['tclAssinador'])
		getSenha();
	else {
		if (linkJS == "retorna") {
			linkJS = "";
			window.history.back(1);
		}
		else {
			var linkJSTemp = linkJS;
			linkJS = "";
			window.navigate(linkJSTemp);
		}
	}
}

function enviaSub() {
	document.forms.aapf.submit();
	return false;
}


function mudaFoco(campo)
{
	if(campo == "98") {
		//var nb = document.forms.aapf.elements[document.forms.aapf.elements.length - 1].name;
		//if(nb.indexOf(".x"))
		//	nb = nb.substring(0,nb.length-2);
		//document.forms.aapf.elements[nb].focus();
		return;
	}
	if( (campo == "senhaConta" || (document.forms.aapf.elements[campo] && document.forms.aapf.elements[campo].name == "senhaConta")) && document.applets['tclJava'] )
		document.applets.tclJava.setFocus();
	else if (document.forms.aapf.elements[campo])
		document.forms.aapf.elements[campo].focus();
	else if (document.getElementById && document.getElementById(campo))
		document.getElementById(campo).focus();
	else if (document.all && document.all[campo])
		document.all[campo].focus();
}

function mostraBalao(mst) {
	if (mst) {
		document.all["balaoApplet"].style.visibility="visible";
	}
	else {
		document.all["balaoApplet"].style.visibility="hidden";
	}
}

function teclaTab(teclaPress) {
	if(teclaPress.keyCode == 9)
		focaApplet();
}

function focaApplet() {
	if (document.applets['tclJava'] ) {
		document.applets.tclJava.setFocus();
	}
}
	
function focaApplet2(nomeApplet) {
	if (document.applets[nomeApplet] ) {
		document.applets[nomeApplet].setFocus();
	}
}

function focaApplet3(prox,teclapres) {
	var tecla = teclapres.keyCode;
	if ( !teclapres.shiftKey && tecla == 9 && document.forms.aapf.elements[prox] && document.forms.aapf.elements[prox].name == "senhaConta" && document.applets['tclJava'] )
		document.applets['tclJava'].setFocus();
}

function setaCod(numCod) {
	if (document.forms.aapf.elements['numCod'])
		document.forms.aapf.elements['numCod'].value = numCod;
}

function setaContraste(contr) {
	if (document.forms.aapf.elements['valorContr'])
		document.forms.aapf.elements['valorContr'].value = contr;
}

function setaQW(strT) {
	if (document.forms.aapf.elements['texto'])
		document.forms.aapf.elements['texto'].value = strT;
}

function executarLogin() {
	getSenha();
	enviaSub();
}

var submeteuFormulario = 0;
function controleDoubleClick() 
{
	if(submeteuFormulario=="1") 
	{
		alert("O bot?o 'OK' ou 'Confirma' foi acionado mais de uma vez enquanto a transa??o estava em andamento. Aguarde... ");
		return false;
	}
	submeteuFormulario = "1";
	return true;
}

function formataCampoSoNumerico(e) {
	var isIE = (navigator.appVersion.indexOf("MSIE") > -1);
	var code = isIE ? e.keyCode : e.charCode
	var digitado = String.fromCharCode(code).toUpperCase();

	/* Este ? o c?digo que barra caracteres n?o num?ricos */
	e.keyCode = (/\d/.test(digitado)) ? digitado.charCodeAt(0) : 0;
	/* -------------------------------------------------- */
}
//-->
