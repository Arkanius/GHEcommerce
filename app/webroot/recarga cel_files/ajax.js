
//* força cache de scripts em chamadas ajax
$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
  if ( options.dataType == 'script' || originalOptions.dataType == 'script' ) {
      options.cache = true;
  }
});

/*
 * função responsável por todas as chamadas ajax
 * 
 */


$.ajaxApf = function(dados) {

	if (dados.type === undefined) { // metodo de passagem de parametros
		dados.type = "post";
	}
	
    if (dados.tiporetorno === undefined) { // tipo de retorno json ou html
        dados.tiporetorno = "html";
    }
    if (dados.parametros == undefined) {  // parametros no formato json  ex: {"nomeParametro" : "valorParametro"}
        dados.parametros = {};
    }
    dados.parametros.novoLayout = "sim";
    
    if(dados.tratarErroTransacao){
    	dados.parametros.erroFormatado = "sim";
    }    
    if (dados.funcaoAntesExecucao == undefined) {
        dados.funcaoAntesExecucao = function() {
            if (dados.elemento !== undefined) {
                jQuery(dados.elemento).html('<img id="imgCarregando" src="/aapf/imagens/carregando.gif"/>');
            }
        };
    }
    if (dados.funcaoSucesso == undefined) {
        dados.funcaoOk = function(data) {
            try{
            	var elementoTemp = $("<div></div>").html(data);
            	$.atualizarScripts($(dados.elemento),elementoTemp);
            	$.atualizarSessao(elementoTemp);
            }catch(err){
                console.error(err.message);
            }
        };
    }else{
    	dados.funcaoOk = function(data){
    		dados.funcaoSucesso(data);
    		var elementoTemp = $("<div></div>").html(data);
    		$.atualizarSessao(elementoTemp);
    	};
    	
    }
    if (dados.funcaoErro == undefined) {
        dados.funcaoErro = function(jqXHR, textStatus, errorThrown ) {
            // console.log(jqXHR.responseXML );
        };
    }

    var conector = "?";
    if (dados.url.indexOf("?") != -1) {
        conector = "&";
    }
    
    if(dados.cache === undefined){
    	dados.cache = false;
    }
    
    var options = {
        type: dados.type,
        cache : dados.cache,
        url: dados.url + conector + 'time=' + Date.now() + '&',
        data: dados.parametros,
        dataType: dados.tiporetorno,
        beforeSend: dados.funcaoAntesExecucao,
        success: dados.funcaoOk,
        error: dados.funcaoErro
    }
    ajax = $.ajax(options);
}

//função que refaz todos os scripts de uma página chamada via ajax
 
$.atualizarScripts = function(elemento,elementoTemp){

    var elementos = [];
    var elementosSrc = [];
    
    if(typeof elementoTemp === 'string'){
    	elementoTemp = $("<div></div>").html(elementoTemp);
    }
    
    elementoTemp.find('script').each(function(j) {
   	   
    	if($(this).attr("src")===undefined){
   		   try{
   			   elementos.push(jQuery("<script></script>").attr("type","text/javascript").text(jQuery(this).text()));
   			   $(this).remove();
	   	    }catch(err){
	   	    	console.log(err.message);
	   	    }	    
   	   }else{
   		   elementosSrc.push(jQuery("<script></script>").attr("type","text/javascript").attr("src",$(this).attr("src")));
   		   $(this).remove();	
   	   }
   });
   elemento.html(elementoTemp.html());

   if(elementosSrc !=undefined && elementosSrc.length > 0){
	   for(i=0;i<elementosSrc.length;i++){
		   try{
			   elemento.append(elementosSrc[i]);
		   }catch(err){}
	   }
   }
   if(elementos !=undefined && elementos.length > 0){
	   for(i=0;i<elementos.length;i++){
		   try{
			   elemento.append(elementos[i]);
		   }catch(err){}
	   }
   }
}


$.carregaFormularioAjax = function(url,parametros,funcaoSucesso) {
	
	if(!parametros){
		parametros = {};
	}
	parametros.ambienteLayout =  "transacao"
	var dados = {"url" : url,
				"type" : "post",
			    "tratarErroTransacao" : false,
			    "elemento" : ".corpo",
			    "parametros" : parametros,
				"funcaoAntesExecucao" : function(){
					$(".corpo").empty();
					$(".corpo").addClass("corpo-aguarde");
				},
			    "funcaoSucesso" : function(data){
		            try{
		            	
		            	var elementoTemp = $("<div></div>").html(data);
		            	
		            	if(elementoTemp.find("sessaofinalizada").length > 0){
		            		$(".corpo").removeClass("corpo-aguarde");
		            		$(".sessao").contadorSessao("telaSessaoFinalizada");
		            	}else{ 
			            	$.mudarLinkApf(elementoTemp);
			            	$(".corpo").removeClass("corpo-aguarde");
			            	$.atualizarScripts($(dados.elemento),elementoTemp);
			            	try{
			            		//$.atualizarSessao(elementoTemp);
			            	}catch(err){
			            	}
		            	}
		            }catch(err){
		            	$(".corpo").removeClass("corpo-aguarde");
		                console.error(err.message);
		            }
	            	$.buscarBannerTransacao();	
	            	if(funcaoSucesso && typeof funcaoSucesso === 'function'){
	            		funcaoSucesso(data);
	            	}
				}};
	
	$.ajaxApf(dados);
	$(window).scrollTop(0);
	
	if(optDadosCliente.dadosCliente.servidor === "externo" || optDadosCliente.dadosCliente.servidor === "interno"){
		if(!optDadosCliente.dadosCliente.inibeENI){
			$.carregarENI(document.URL);
		}									
	}
}


$.submeterTransacao = function(objeto,ambientLayout){
	try{
		var form = getFormularioAmbiente($(objeto));
		if(!ambientLayout){
			ambientLayout = "transacao";
		}
		$.submeter(form[0],ambientLayout);

	}catch(err){
		console.log(err.message);
	}
};

$.submeter = function(form,ambientLayout){
	
	try{
		
		if($("html").hasClass("a3") ){ // tratamento para autenticação via certificado digital
			if ( document.applets['tclAssinador'] ){
				if(confirmaAssinador && $("#assinatura").val() === "" && $("#idCartao").val() === "" && $("#ac").val() === "" && $("#nrSerie").val() === ""){
					confirmaAssinador = 0;
					if( document.applets['tclAssinador'].ok() ){
						loadData();
					}else{
						document.applets['tclAssinador'].focus();
					}
					return false;
				}
			}			
		}else{ // tratamento para cadastramento e vinculação de certificado digital
			if(confirmaAssinador && $("#certificado").val() === "" && $("#idCartao").val() === "" && $("#ac").val() === "" && $("#nrSerie").val() === ""){
				loadData();
			}
		}		
		if(!ambientLayout){
			ambientLayout = "transacao";
		}
		form = $(form);
		var elemento = ambientLayout ==="transacao" ? ".corpo" : ".corpoModal";
		var dados = {};
		dados.type = "post";
		dados.url = form.attr("action");
		dados.tratarErroTransacao = false;
		dados.parametros = {};
		dados.elemento = elemento;
		dados.funcaoAntesExecucao = function(){
			$(elemento).empty();
			$(elemento).addClass("corpo-aguarde");
		};	
		dados.funcaoSucesso = function(data){
            try{
            	$(elemento).removeClass("corpo-aguarde");
            	try{
            		var elementoTemp = $("<div></div>").html(data);
            		$.mudarLinkApf(elementoTemp);
            		$.atualizarScripts($(dados.elemento),elementoTemp);
            		//$.atualizarSessao(elementoTemp);
            	}catch(err){
            		console.log(err.message);
            	}
            	$.buscarBannerTransacao();            		            	
            }catch(err){
                console.log(err.message);
            }			
		}
		var array = form.serializeArray();
		dados.parametros =  array;
		dados.parametros.push({"name" : "ambienteLayout", "value" : ambientLayout});
		dados.parametros.push({"name" : $("#botaoAcao").val(), "value" : "sim"});
		$.ajaxApf(dados);
		if(ambientLayout ==="transacao"){
			$(window).scrollTop(0);
		}

	}catch(err){
		console.log(err.message);
	}
	return false;
};

$.submeterFormulario = function(form,event,ambienteLayout){
	if(!ambienteLayout){
		ambienteLayout = "transacao";
	}
	event.preventDefault();
	$.submeter(form,ambienteLayout);
}

/*****************************************************************
 * 
 * Funções de adaptação para o layout antigo
 * 
****************************************************************** */

function executarAjaxCompleto (div,url,parametros,assincrono,funcaoantesdeenviar,funcaosucesso,funcaoErro){
	$.ajaxApf ({"elemento" : "#" + div, 
				"url" : url, 
				"parametros" : parametros,
				"funcaoAntesExecucao" : funcaoantesdeenviar,
				"funcaoSucesso" : funcaosucesso,
				"funcaoErro" : funcaoErro});
}
function ativarScripts(div){} 
function ajax(dados){
	$.ajaxApf(dados);
}
function submeterTransacaoAjax(objeto,ambientLayout){
	$.submeterTransacao(objeto,ambientLayout);
}
function executarAjax(div,url,parametros,assincrono){
	$.ajaxApf ({"elemento" : "#" + div, 
		"url" : url, 
		"parametros" : parametros});	
}
function atualizarScripts(elemento,data){
	var elementoTemp = $("<div></div>").html(data);
	$.atualizarScripts(elemento,elementoTemp);
}



/****************
 *  Chamada dos servicos do apf 
 *  parametros 
 *  
 *    nomeServico :  nome do serviço que deseja executar
 *    parametros : parametros da url no formato json Ex : {"nomeParametro1" : "valorParametro1","nomeParametro2" : "valorParametro2"}
 *    funcaoAguarde : função que será executada enquanto a o navegador aguarda a resposta da requisição
 *    funcaoOk : função que será executada se a requisição não retornar erro       
 *    funcaoErro : função que será executada se a requisição retornar erro
 *  */ 


$.ajaxServico  = function(dados){
	if(!dados.parametros){
		dados.parametros = {};
	}
	dados.parametros["servico"] = dados["nomeServico"];
	$.ajaxApf({"url" : "/aapf/servico","tiporetorno" : "json",
		"parametros" : dados.parametros, 
		"funcaoAntesExecucao" :  dados.funcaoAguarde && typeof dados.funcaoAguarde === 'function' ? dados.funcaoAguarde : undefined,
		"funcaoSucesso" : function(data){
			if(!data.retorno || data.retorno === 0){
				if(dados.funcaoOk && typeof dados.funcaoOk === 'function'){
					dados.funcaoOk(data);
				}
			}else{
				if(dados.funcaoErro && typeof dados.funcaoErro === 'function'){
					dados.funcaoErro(data);
				}
			}
		 }
	});	
};


/*******************************************************************************
 ********************* Chamadas aos serviços do Facebook *********************** 
 *******************************************************************************/
/* Busca as fotos dos relacionamentos no facebook e grava no cache do navegador*/
$.buscaFotoClienteFacebook = function(objeto,funcao){
	var urlfoto = objeto.pic_square;
	var xhr = new XMLHttpRequest();
	xhr.open("get", urlfoto, true);
	xhr.responseType = 'arraybuffer';
	xhr.onload = function(e) {
		var arr = new Uint8Array(this.response);
		var raw = String.fromCharCode.apply(null,arr);
		var base64 = btoa(raw);
		funcao({"base64" : base64});
	}
	xhr.send();
}

/* remove adesão do cliente ao aplicativo do banco no facebook */
$.removerAdesaoAplicativo = function(token,funcaoAguarde,funcaoSucesso,funcaoErro){
	$.ajaxApf({
        type: "get",
        "tiporetorno" :"jsonp",
        url: "https://graph.facebook.com/me/permissions?access_token=" + token + "&method=delete",
        "funcaoAntesExecucao": funcaoAguarde,
        "funcaoSucesso": function(data){
        	funcaoSucesso();
        },
        "funcaoErro" : funcaoErro
    });		
}