
var objArrast = null;
var posOrigX = 0;
var posOrigY = 0;
var mousePosX = 0;
var mousePosY = 0;

function gerenciadorDeObjetos(){
	this.codigo = "";
	this.indice = new Array(0);
	this.ataulizaPagina = function ataulizaPagina(){
		codigoHTML.innerHTML += this.codigo;
		document.forms.aapf.text.value += this.codigo;
	}
	this.add = function add(novoObjeto){
		var novoRegistroObjeto = new registroDeObjetos();
		var codigoObjeto = novoObjeto.getCodigo();
		novoRegistroObjeto.objeto = novoObjeto;
		novoRegistroObjeto.posInicio = this.codigo.length;
		novoRegistroObjeto.posFim = this.codigo.length+codigoObjeto.length;
//		this.codigo+=codigoObjeto;
		this.indice = this.indice.concat(novoRegistroObjeto);
		document.getElementById("codigoHTML").innerHTML += codigoObjeto;
		document.forms.aapf.text.value += codigoObjeto;
//		this.ataulizaPagina();
	}
	this.del = function del(objeto){
		
	}
	this.getObjeto = function getObjeto(nomeObjeto){
		for(var i=0;i<this.indice.length;i++)
			if(nomeObjeto==this.indice[i].objeto.getNome()){
				return this.indice[i].objeto;				
			}
		alert("Objeto não localizado!");
	}
	this.modifi = function modifi(objeto,novoCodigo){
		for(var i=0;i<this.indice.length;i++)
			if(objeto==this.indice[i].objeto){
				var lengthOrig = this.indice[i].posFim - this.indice[i].posInicio;
				var variaLength = novoCodigo.length - lengthOrig;
				this.codigo = this.codigo.substring(0,this.indice[i].posInicio-1)+novoCodigo+this.codigo.substring(this.indice[i].posFim);
				this.indice[i].posFim+=variaLength;
				if(variaLength!=0)
					this.ajustarIndices(this.indice[i].posInicio,variaLength)
				this.ataulizaPagina();					
				return;				
			}
		alert("Objeto não localizado!");
	}
	this.ajustarIndices = function ajustarIndices(posMod,valorMod){
		for(var i=0;i<this.indice.length;i++)
			if(this.indice[i].posInicio>posMod){
				this.indice[i].posInicio+=valorMod;			
				this.indice[i].posFim+=valorMod;			
			}
	}
}

function registroDeObjetos(){
	this.objeto;
	this.posInicio;
	this.posFim;
}


document.onmousemove = function mouseMoveDiv(e){
//	alert(this);
	if(!window.event){
		mousePosX = e.pageX;
		mousePosY = e.pageY;
	}
	
	if(objArrast!=null)
		if(window.event)
			moveDiv(objArrast,window.event.x,window.event.y);
		else
			moveDiv(objArrast,e.pageX,e.pageY);

}
document.onmouseup = function mouseUP(){
	if(objArrast!=null)
		objArrast.style.zIndex=100;
//		objArrast.style.zIndex=0;
	objArrast=null;
	posOrigX = 0;
	posOrigY = 0;
}
/*
function exibeDiv(divID){
	divID.style.visibility='visible';
	var px = window.event.x;
	var py = window.event.y;
	divID.style.top = py;
	divID.style.left = px;
}
function escondeDiv(divID){
	divID.style.visibility='hidden';
}
*/
function setObjArrast(obj){
	objArrast=obj;
	if(!document.layers)
		obj.style.zIndex=100;
//		obj.style.zIndex=1;
	if(window.event){
		posOrigX =  parseInt(obj.style.left)  - window.event.x;
		posOrigY =  parseInt(obj.style.top) - window.event.y;
	}else{
		posOrigX =  parseInt(obj.style.left)  - mousePosX;
		posOrigY =  parseInt(obj.style.top) - mousePosY;
	}
}
function moveDiv(div,px,py){
//	div.style.top =  py + posOrigY;
//	div.style.left = px + posOrigX ;
	mDiv(div,(px + posOrigX),(py + posOrigY));
//	window.status = " py="+py+" px="+px+" div.top="+div.style.top+"div.left="+div.style.left+" posOrigX="+posOrigX+" posOrigY="+posOrigY;
}
function getDiv(divName){
	if (document.layers)
		return document.layers["layerMouse"];
		else
			return document.all["layerMouse"];
}
function mDiv(div,px,py){
	if (document.layers)
		div.left = px;
		else
			div.style.left = px;
	if (document.layers)
		div.top = py;
		else
			div.style.top = py;
}	
/*
function exibeDiv(divID){
	divID.style.visibility='visible';
	var px = window.event.x;
	var py = window.event.y;
	divID.style.top = py;
	divID.style.left = px;
}
function escondeDiv(divID){
	divID.style.visibility='visible';
}
*/
