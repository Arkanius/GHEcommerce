//Script anti-frame
if(top.frames.length!=0){top.location=location;}

function getStyle(id){return document.getElementById(id).style;}
function showDiv(id){$("#"+id).css("visibility", "visible");}

//Define como vis?vel o div determinado como parametro.
function abrir(nome){
	//showDiv(nome);
	$("#"+nome).show();
}

//esconde arvore
function fecharArvore(nomeArvore){
	//hideDiv(nomeArvore);
	$("#"+nomeArvore).hide();
}

//Define como vis?vel o div determinado como parametro.
function abrirComGrafico(nome,tam){
	abrir(nome);
	$("#grafico").css('top',tam);
	//document.getElementById('grafico').style.top = tam;
}

//esconde arvore
function fecharArvoreComGrafico(nomeArvore,tam){
	fecharArvore(nomeArvore);
	$("#grafico").css('top',tam);
	//document.getElementById('grafico').style.top = tam;
}

//
function abrirRegistroLista(nome, pos){
	document.forms.aapf.posicao.value = pos;
	abrir(nome);
}

function abrirGFP(){
	$.abrirModal({'url':'/aapf/gfp/personalizacao/GEMA-02.jsp',"width":"400","resizeAuto":true} );
}

function atualizaGFP(valor) {
	document.forms.aapf.atualizacao.value = valor;
}

function atualizaGEMAContaDiversas(valor) {
	document.forms.aapf.atualizacao.value = valor;
	//document.forms.aapf.action = "GEML.jsp";
}

function abreCalendario(num) {
	if (document.forms.aapf.linhaSelecionada.value != '') {
		document.forms.aapf['image'+document.forms.aapf.linhaSelecionada.value].src = "/aapf/gfp/imagens/GFP/setaTransferencia.gif";
	}
	document.forms.aapf.linhaSelecionada.value = num;
	//document.all['Calendario'].style.visibility = "visible";
	abrir('Calendario');
	document.forms.aapf['image'+num].src = "/aapf/gfp/imagens/GFP/setaTransferenciaSelecionada.gif";
}
