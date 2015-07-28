var totalBannersPublicador = 0;
var totalBannersCOCA = 0;
var ib = 0;
var banners = new Array;
var widgets_personalizacao = []; 

function carregarMinhaPagina(atualizarBanner){
	$.ajaxServico({"nomeServico":"dadosCoca",
		"funcaoOk" : function(data) {
			if(data.ofertaATOC){
				$.abrirModal({"url" : "/aapf/seguranca/ATOC.jsp","parametros" : {ambienteLayout:"modalTransacao"},"width": "560", height : "300"});
			}
			if(data.ofertaAPI){
				$.abrirModal({"url" : "/aapf/investimento/8CG.jsp","parametros" : {ambienteLayout:"modalTransacao"},"width": "600", height : "auto", closeOnEscape : false});
			}
			if(data.janelas){
				montarWidgets($(".lista-itens-coca").empty(),data.janelas);
			}

			if(atualizarBanner !== false && data.banners){
				carregarBanners(data.banners);				
			}
			
		}
	});	
}

function montarWidgetPadrao(elemento,widget,classe,tamanho,funcaoMontarCorpoWidget){
	
	var itemCoca = null;
	var item = $("<div></div>").appendTo(itemCoca = $("<div></div>",{"class" : "item-coca"}).attr("tipoJanela",widget.tipoJanela).addClass(classe).appendTo(elemento));
	if(tamanho === undefined || tamanho === 100){
		itemCoca.attr({"data-ss-colspan":"2"});
		itemCoca.css({"width" : "100%"});
	}else{
		itemCoca.css({"width" : "50%"});
	}
	
	var itemAcender = null;
	var icone = widget.tipoEstadoJanela == 5 ? "item-coca-acender" : "item-coca-apagar";
	if(widget.tipoJanela == 50){ //resumo do saldo
		itemAcender = $("<span></span>",{"class":icone})
		.click(function(e){
			acenderWidget($(this));
		})
	}	
	
	
	
	
	$("<div></div>",{"class" : "item-coca-titulo"}).html(widget.titulo)
	.append(
			$("<span></span>",{"class":"item-coca-fechar"})
			.click(function(e){
				fecharWidget($(this));
			})
	).append(itemAcender).appendTo(item);
	
	var conteudo = $("<div></div>",{"class" : "item-coca-corpo"})
	.appendTo(item);
	funcaoMontarCorpoWidget(conteudo);
}

function montarWidgets(elemento,widgets){
	
	$.each(widgets,function(i,widget){

		var data = widget.data;
		
		if(widget.tipoJanela === 50){//widget de resumo de saldos
			montarWidgetPadrao(elemento,widget,"item-resumo-saldos",100,function(conteudo){
				montarWidgetSaldos(conteudo,data,widget.tipoEstadoJanela);
			});
		}else if(widget.tipoJanela === 51){//widget de lanï¿½amentos Ãºltimos 5 dias
			montarWidgetPadrao(elemento,widget,"item-lancamentos",100,function(conteudo){
				montarWidgetLancamento(conteudo,data);
			});			
		}else if(widget.tipoJanela === 52){//widget de grï¿½ficos de saldos e do uso do cheque especial
			montarWidgetPadrao(elemento,widget,"item-grafico-cheque-especial",100,function(conteudo){
				montarWidgetContaChequeEspecial(conteudo,data);
			});
		}else if(widget.tipoJanela === 53){//widget com os lanï¿½amentos futuros
			montarWidgetPadrao(elemento,widget,"item-lancamentos-futuros",50,function(conteudo){
				montarWidgetLancamentosFuturos(conteudo,data);
			});
		}else if(widget.tipoJanela === 54){//widget com os pagamentos e transferÃªncias
			montarWidgetPadrao(elemento,widget,"item-pagamentos",50,function(conteudo){
				montarWidgetPagamentoTransferencia(conteudo,data);
			});
		}else if(widget.tipoJanela === 55){//widget com a lista de aplicaï¿½ï¿½es
			montarWidgetPadrao(elemento,widget,"item-aplicacoes",50,function(conteudo){
				montarWidgetTabelaAplicacoes(conteudo,data);
			});
		}else if(widget.tipoJanela === 56){//widget com o grï¿½fico de aplicaï¿½ï¿½es
			montarWidgetPadrao(elemento,widget,"item-grafico-aplicacao",50,function(conteudo){
				montarWidgetGraficoAplicacoes(conteudo,data);
			});
		}else if(widget.tipoJanela === 57){//widget com as transaï¿½ï¿½es favoritas
			montarWidgetPadrao(elemento,widget,"item-favoritas",50,function(conteudo){
				montarWidgetfavoritas(conteudo,data);
			});
		}else if(widget.tipoJanela === 58){//widget com as transaï¿½ï¿½es favoritas
			montarWidgetPadrao(elemento,widget,"item-credito",50,function(conteudo){
				montarWidgetCredito(conteudo,data);
			});
		}
	});

	if($(".lista-itens-coca").children().length > 0 ){
	
		inicializarPluginMinhaPagina(elemento);
	
		elemento.on("ss-drop-complete", function(e, selected) {
			var widgets = [];
			$(this).children(".item-coca").each(function(index){
				widgets.push({"tipoJanela" : $(this).attr("tipoJanela") ,"numPrimeiroElemento":index+1,"tipoEstadoJanela": 2 });
			});
			$(".item-coca").css({"z-index" :"0"});
			$.ajaxServico({"nomeServico":"alterarPosicaoWidget",
				"parametros" : {"widgets":JSON.stringify(widgets)}
			});				
		});
	}
}


function montarWidgetSaldos(elementoConteudo,data,estado){
	var opacidade = estado == 5 ? "0.13" : "1";
	
	if(data.saldos && data.saldos.length > 0){
		var ul = $("<ul></ul>",{"class":"saldos-itens"}).appendTo(elementoConteudo);
		$.each(data.saldos,function(i,objeto){
			var li = $("<li></li>",{"class":"saldo"})
			.appendTo(ul)
			.addClass(objeto.sinal === "D" ? "negativo" : "positivo")
			.append(
				$("<ul></ul>")
				.append($("<li></li>",{"class":"saldo-texto"}).text(objeto.descricao))
				.append($("<li></li>",{"class":"saldo-valor"}).text(objeto.valor))
			);
			if(objeto.link){
				li.click(function(e){
					$.carregaFormularioAjax(objeto.link);
				});
			}
		});
		
		$(".saldos-itens .saldo").css({"opacity":opacidade});
			
        $(".saldos-itens .saldo").bind('mouseover mouseenter',function(){
        	if($(".item-coca-apagar").length > 0) return;
            $(this).stop()
            .animate({"opacity":'1'},
            {queue:false, duration:600, easing: 'swing'})
        });

        $(".saldos-itens .saldo").bind('mouseout mouseleave',function(){
        	if($(".item-coca-apagar").length > 0) return;
            $(this).stop().animate({"opacity":'0.13'},
            {queue:false, duration:600, easing: 'swing'})
        });
	}
	
}		
function montarWidgetLancamento(elementoConteudo,data){
	
	if((data.lancamentos && data.lancamentos.length > 0)  || (data.outrosValores && data.outrosValores.length > 0)){
		
		$("<ul></ul>",{"class":"extrato-cabecalho-itens"})
		.append($("<li></li>").append($("<div></div>").html("Data")).css({"width": "16%", "text-align": "left"}))
		.append($("<li></li>").append($("<div></div>").html("Histórico")).css({"width": "33%", "text-align": "left"}))
		.append($("<li></li>").append($("<div></div>").html("Documento")).css({"width": "16%", "text-align": "left"}))
		.append($("<li></li>").append($("<div></div>").html("Valor (R$)")).css({"width": "16%", "text-align": "right","padding-right": "9px"}))
		.append($("<li></li>").append($("<div></div>").html("Saldo do dia(R$)")).css({"width": "15%", "text-align": "right"}))
		.append($("<li></li>").append($("<div></div>").html("&nbsp")).css({"width": "4%", "text-align": "center"}))
		.appendTo($("<div></div>",{"class":"extrato-cabecalho"}).appendTo(elementoConteudo));
		
		var corpo = $("<ul></ul>",{"class":"extrato-dados-lista"})
		.appendTo($("<div></div>",{"class":"extrato-dados-container"}).appendTo(elementoConteudo));
		
		$.each(data.lancamentos,function(i,objeto){
			var libotaoAcao = undefined;
			
			var sinalValor = objeto.sinalValor === "C" ? "+" : objeto.sinalValor === "D" ? "-" : ""; 
			var sinalSaldoDia = objeto.sinalSaldoDia && objeto.sinalValor === "C" ? "+" : 
			
			
			$("<li></li>",{"class":"item-lancamento"}).appendTo(corpo)
			.addClass(i%2===0 ? "linha-impar" : "linha-par")
			.append(
				 $("<ul></ul>")
				.append($("<li></li>").css({"text-align":"left","width": "16%"}).html(objeto.dataLancamento))
				.append($("<li></li>").css({"text-align":"left","width": "33%"}).html(objeto.textoHistorico))
				.append($("<li></li>").css({"text-align":"left","width": "16%"}).html(objeto.numeroDocumento))
				.append($("<li></li>").css({"text-align":"right","width": "16%","padding-right": "30px","position":"relative"}).html(objeto.valor + " <div class='sinal'>" +objeto.sinalValor+"</div>" ).addClass(objeto.sinalValor=== "+" || objeto.sinalValor=== "*" ? "lancamento-positivo" :"lancamento-negativo" ).addClass("item-negrito"))
				.append($("<li></li>").css({"text-align":"right","width": "15%","padding-right": "30px","position":"relative"}).html(objeto.saldoDia ? objeto.saldoDia + "<div class='sinal'>" + objeto.sinalSaldoDia : "</div>").addClass(objeto.sinalSaldoDia=== "+" ? "lancamento-positivo" :"lancamento-negativo" ).addClass("item-negrito"))
				.append(libotaoAcao = $("<li></li>").css({"text-align":"right","width": "4%"}))
			)
			if(libotaoAcao){
				if(parseInt(objeto.acao) !== 0){
					var classe = objeto.codigoHistorico === '999' ? 'btnAcaoExtratoOfertaCDC' : 'btnAcaoExtrato'; 
					
					libotaoAcao.append($("<div></div>",{"class":classe})
						.click(function(e){
							executarAcao(this,{acao:objeto.acao,codigoHistorico: objeto.codigoHistorico,numeroDocumento:objeto.numeroDocumento,dataLancamento:objeto.dataLancamento,valor:objeto.valor+" " + objeto.sinalValor,dependenciaDestino:objeto.dependenciaDestino,numeroContratoDestino:objeto.numeroContratoDestino},e);
						})		
					)
				}
			}
		});
		if(data.outrosValores && data.outrosValores.length > 0){
			$.each(data.outrosValores,function(i,objeto){
				$("<li></li>",{"class":"item-lancamento"}).appendTo(corpo)
				.addClass(i%2===0 ? "linha-par" : "linha-impar")
				.css(i===0 ? {"border-top" : "1px solid #ddd" } : {})
				.append(
					$("<ul></ul>")
					.append($("<li></li>").css({"text-align":"left","width": "84%"}).html(objeto.textoOV))
					.append($("<li></li>", {"id" : objeto.idibt}).css({"text-align":"right","width": "16%"}).html(objeto.valorOV).addClass(objeto.sinalOV=== "C" ? "textoCorPadrao" : objeto.sinalOV=== "D" ? "textoCorVermelha" : "" ).addClass("item-negrito"))
				)							
			});
		}
	}else{
		 $("<li></li>",{"class":"sem-informacao"}).text("Não houve lançamentos no período.") 
		.appendTo(corpo);
	}				

}
function montarWidgetContaChequeEspecial(elementoConteudo,data){
	
	var saldos = $("<div></div>",{"id":"grafico-cheque-especial"}).appendTo(elementoConteudo);
	var utilizacaoCheque = $("<div></div>",{"id":"grafico-utilizacao-cheque"}).appendTo(elementoConteudo);
	
	var dados = [];
	
	
	if(data.saldosDia && data.saldosDia.length > 0){
		if(data.dadosChequeEspecial === undefined){
			utilizacaoCheque.css({"width":"0%"});
			saldos.css({"width":"100%"});
		}			
		var data_saldo = [];
		$.each(data.saldosDia,function(i,objeto){
			data_saldo.push({"period" : objeto.dataSaldo.substring(0,5), "value" : objeto.saldo});
		});	
        Morris.Line({
            element: saldos,
            data: data_saldo,
            xkey: 'period',
            ykeys: ['value'],
            labels : ['Saldo'],
            parseTime : false,
            preUnits : "R$ ",
            hoverCallback: function (index, options, default_content, row) {
            	var retorno ='<div class="morris-hover-row-label">' + options.data[index].period +'</div><div class="morris-hover-point" style="color: #0b62a4">'
            	retorno += 'Saldo: R$ ' + options.data[index].value.toLocaleString() + '</div>';                	
            	return retorno;
             },
             hideHover : true,
             yLabelFormat : function(y){
            	 return("R$ " + y.toLocaleString());
             }
        });
	}else{
		$("#grafico-cheque-especial").html("Não houve movimentação nos últimos 5 dias").addClass("sem-informacao");
	}	
	
	if(data.dadosChequeEspecial !=undefined){
		//Cria grï¿½fico de demonstraï¿½ï¿½o de utilizaï¿½ï¿½o do cheque especial
		var data_cheque = [{ y: 'Cheque especial', a: data.dadosChequeEspecial.utilizadoCheque, b: data.dadosChequeEspecial.disponivelCheque }];
        Morris.Bar({
            element: utilizacaoCheque,
            data: data_cheque,
            xkey: 'y',
            ykeys: ['a','b'],
            labels : ['Utilizado','Disponível'],
            parseTime : false,
            preUnits : "R$ ",
             hideHover : true,
             yLabelFormat : function(y){
            	 return("R$ " + y.toLocaleString());
             },
             resize :true,
             barColors :["#ff0000","#417fca"],
             barSizeRatio : .25,
             barGap : 10,
             stacked :true
        });			
	}		
	//Cria grï¿½fico de saldos

}

function montarWidgetTabelaAplicacoes(elementoConteudo,data){
	
	if(data.aplicacoes && data.aplicacoes.length > 0){
		
		$("<ul></ul>",{"class":"aplicacoes-cabecalho-itens"})
		.append($("<li></li>").html("Aplicação").css({"width": "50%", "text-align": "left"}))
		.append($("<li></li>").html("Valor (R$)").css({"width": "50%", "text-align": "right","padding-right": "9px"}))
		.appendTo($("<div></div>",{"class":"aplicacoes-cabecalho"}).appendTo(elementoConteudo));
		
		
		
		var div = $("<div></div>",{"class" : "dados-aplicacoes"}).appendTo(elementoConteudo);
		var corpo = $("<ul></ul>",{"class":"aplicacoes-lista"})
		.appendTo(
				$("<div></div>",{"class":"nano-content"}).appendTo($("<div></div>",{"class":"aplicacoes-container nano"}).appendTo(div))
		)
		
		$.each(data.aplicacoes,function(i,aplicacao){
			$("<li></li>",{"class":"item-aplicacao"}).appendTo(corpo)
			.addClass(i%2===0 ? "linha-impar" : "linha-par")
			.append(
				$("<ul></ul>")
				.append($("<li></li>",{"class":"nome-aplicao"}).css({"text-align":"left"}).html(aplicacao.nomeAplicacao))
				.append($("<li></li>",{"class":"valor-aplicao textoCorPadrao"}).css({"text-align":"right","padding-right":"24px"}).html(aplicacao.valorAplicacaoFormatado).addClass("item-negrito"))						
			)
		});

		$("<div></div>",{"class":"aplicacoes-total"})
		.append($("<div></div>").html("TOTAL"))
		.append($("<div></div>",{"class":"valor-aplicao textoCorPadrao item-negrito"}).html(data.totalAplicacoes))
		.appendTo(div);
		
		
		
		//totais por tipo de aplicação para o ibt
		$.each(data.totaisPorAplicacao,function(i,totais){
			if(totais){
				$("<li></li>").css({"display":"none"}).appendTo(corpo)
				.append(
					$("<ul></ul>")
					.append($("<li></li>",{"id" : totais.idibt}).html(totais.valor))
				);
			}
		});
		
		criarNanoScroll(elementoConteudo.find(".nano"));
	}else{
		$("<li></li>",{"class":"sem-informacao"}).text("Não há aplicações.") 
		.appendTo(elementoConteudo);
	}	
}
function montarWidgetGraficoAplicacoes(elementoConteudo,data){
	
	if(data.aplicacoes && data.aplicacoes.length > 0){
		
		var data_aplicacoes = [];
		
		for(k=0;k<data.aplicacoes.length;k++){
			var objeto = data.aplicacoes[k];
			data_aplicacoes.push({"label" : objeto.nomeAplicacao,"value" : objeto.valorAplicacao})
		}
		Morris.Donut({
		  element: elementoConteudo,
		  data: data_aplicacoes,
		  colors : ['#417fca','#ef8e2f','#ef3e37','#96bd48','#7858a3','#38b3d5','#a5cced','#017f7e','#7ca403'],
		  formatter: function (x) { 
			  return "R$" + x.toLocaleString();
		  }
		});		
	}else{
		$("<li></li>",{"class":"sem-informacao"}).text("Não há aplicações.") 
		.appendTo(elementoConteudo);
	}		
}
function montarWidgetPagamentoTransferencia(elementoConteudo,data){
	
	if(data.pagamentos && data.pagamentos.length > 0){
		
		$("<ul></ul>",{"class":"pagamentos-cabecalho-itens"})
		.append($("<li></li>").html("Data").css({"width": "14%", "text-align": "left"}))
		.append($("<li></li>").html("Descrição").css({"width": "41%", "text-align": "left"}))
		.append($("<li></li>").html("Situação").css({"width": "20%", "text-align": "left"}))
		.append($("<li></li>").html("Valor (R$)").css({"width": "25%", "text-align": "right","padding-right": "9px"}))
		.appendTo($("<div></div>",{"class":"pagamentos-cabecalho"}).appendTo(elementoConteudo));
		
		var div = $("<div></div>",{"class" : "dados-pagamentos"}).appendTo(elementoConteudo);
		var corpo = $("<ul></ul>",{"class":"pagamentos-lista"})
		.appendTo(
				$("<div></div>",{"class":"nano-content"}).appendTo($("<div></div>",{"class":"pagamentos-container nano"}).appendTo(div))
		)
		
		$.each(data.pagamentos,function(i,pagamento){
			$("<li></li>",{"class":"item-pagamento"}).appendTo(corpo)
			.addClass(i%2===0 ? "linha-impar" : "linha-par")
			.append(
				$("<ul></ul>")
				.append($("<li></li>").css({"text-align":"left","width": "14%"}).html(pagamento.dataPagamento.substring(0,5)))
				.append($("<li></li>").css({"text-align":"left","width": "41%"}).html(pagamento.descricaoPagamento))
				.append($("<li></li>").css({"text-align":"left","width": "20%"}).html(pagamento.situacaoPagamento))
				.append($("<li></li>").css({"text-align":"right","width": "25%","padding-right": "24px"}).html(pagamento.valorPagamento).addClass("textoCorVermelha item-negrito"))
			)
		});
		criarNanoScroll(elementoConteudo.find(".nano"));
		
	}else{
		$("<li></li>",{"class":"sem-informacao"}).text("Não há comprovantes.") 
		.appendTo(elementoConteudo);
	}					
}

/* popula o widget de lanï¿½amentos futuros com os dados */

function montarWidgetLancamentosFuturos(elementoConteudo,data){
	
	if(data.dadosLancamentosFuturos && data.dadosLancamentosFuturos.lancamentosFuturos && data.dadosLancamentosFuturos.lancamentosFuturos.length > 0){
		
		$("<ul></ul>",{"class":"lancamentos-fututos-cabecalho-itens"})
		.append($("<li></li>").html("Data").css({"width": "14%", "text-align": "left"}))
		.append($("<li></li>").html("Histórico").css({"width": "41%", "text-align": "left"}))
		.append($("<li></li>").html("Documento").css({"width": "20%", "text-align": "left"}))
		.append($("<li></li>").html("Valor (R$)").css({"width": "25%", "text-align": "right","padding-right": "9px"}))
		.appendTo($("<div></div>",{"class":"lancamentos-fututos-cabecalho"}).appendTo(elementoConteudo));
		
		var div = $("<div></div>",{"class" : "dados-lancamentos-futuros"}).appendTo(elementoConteudo);
		var corpo = $("<ul></ul>",{"class":"lancamentos-fututos-lista"})
		.appendTo(
				$("<div></div>",{"class":"nano-content"}).appendTo($("<div></div>",{"class":"lancamentos-fututos-container nano"}).appendTo(div))
		)
		
		$.each(data.dadosLancamentosFuturos.lancamentosFuturos,function(i,lancamentoFuturo){
			$("<li></li>",{"class":"item-lancamento-futuro"}).appendTo(corpo)
			.addClass(i%2===0 ? "linha-impar" : "linha-par")
			.append(
				$("<ul></ul>")
				.append($("<li></li>").css({"text-align":"left","width": "14%"}).html(lancamentoFuturo.data))
				.append($("<li></li>").css({"text-align":"left","width": "41%"}).html(lancamentoFuturo.textoHistorico))
				.append($("<li></li>").css({"text-align":"left","width": "20%"}).html(lancamentoFuturo.numeroDocumento))
				.append($("<li></li>").css({"text-align":"right","width": "25%","padding-right": "25px"}).html(lancamentoFuturo.valor + " " + lancamentoFuturo.indicadorDC).addClass(lancamentoFuturo.indicadorDC === "C" ? "textoCorPadrao" :  "textoCorVermelha"))
			)
		});
		
		var divTotal = $("<div></div>",{"class" : "lancamentos-futuros-total"}).appendTo(elementoConteudo);
		$("<ul></ul>")
		.append($("<li></li>").html("Total").css({"width": "75%", "text-align": "left"}))
		.append(
				$("<li></li>", {"id" : "valor_total_lancamentos_futuros"}).html(data.dadosLancamentosFuturos.total + " " + data.dadosLancamentosFuturos.indicadorDC)
				.css({"width": "25%", "text-align": "right","padding-right": "9px"})
				.addClass(data.dadosLancamentosFuturos.indicadorDC === "C" ? "textoCorPadrao" :  "textoCorVermelha")
		)
		.appendTo(divTotal);
		
		criarNanoScroll(elementoConteudo.find(".nano"));
		
		
		
	}else{
		$("<li></li>",{"class":"sem-informacao"}).text("Não há lançamentos futuros.") 
		.appendTo(elementoConteudo);
	}
}

function montarWidgetCredito(elementoConteudo,data){
	
	if(data.credito.tiposLinha && data.credito.tiposLinha.length > 0){
		
		$("<ul></ul>",{"class":"creditos-cabecalho-itens"})
		.append($("<li></li>").html("Linhas de crédito").css({"width": "50%", "text-align": "left"}))
		.append($("<li></li>").html("Crédito BOMPRATODOS*").css({"width": "50%", "text-align": "right","padding-right": "9px"}))
		.appendTo($("<div></div>",{"class":"creditos-cabecalho"}).appendTo(elementoConteudo));
		
		var divLista = $("<div></div>",{"class":"nano-content"}).appendTo($("<div></div>",{"class":"credito-container nano"}).appendTo(elementoConteudo))
		var ul = $("<ul></ul>",{"class":"credito-itens"}).appendTo(divLista);

		$.each(data.credito.tiposLinha,function(i,objeto){
			$("<li></li>",{"class":"titulo-linha-credito"}).text(objeto.nome).appendTo(ul);
			
			$.each(objeto.linhas,function(i,objetoLinha){
				$("<li></li>",{"class":"linha-credito", "id":objetoLinha.idibt})
				.appendTo(ul)
				.append($("<div></div>",{"class":"nome-linha"}).text(objetoLinha.nome))
				.append($("<div></div>",{"class":"valor-linha"}).text(objetoLinha.valor));
			});
		});
		$("<ul></ul>",{"class":"creditos-rodape-itens"})
		.append($("<li></li>").html("*VALORES DE REFERÊNCIA. Sujeitos a confirmação no momento da contratação").css({"width": "100%", "text-align": "left"}))
		.appendTo($("<div></div>",{"class":"creditos-rodape"}).appendTo(elementoConteudo));	
		criarNanoScroll(elementoConteudo.find(".nano"));
	}else{
		$("<li></li>",{"class":"sem-informacao"}).text("Não há limite disponível.") 
		.appendTo(elementoConteudo);
	}
}

function montarWidgetfavoritas(elementoConteudo,data){
	var corpo = $("<ul></ul>",{"class":"favoritos-lista"})
	.appendTo(
			$("<div></div>",{"class":"nano-content"}).appendTo($("<div></div>",{"class":"pagamentos-container nano"}).appendTo(elementoConteudo))
	);					
	if(data.favoritas && data.favoritas.length > 0){
		
		$.each(data.favoritas,function(i,objeto){
			$("<li></li>",{"class":"item-favorito","codigo":objeto.id,"sequencial": objeto.sequencial})
			.appendTo(corpo)
			.append(
					$("<div></div>",{"class":"favorito-excluir"}).html("X")
					.click(function(e){
						$.abrirCaixaDialogConfirmacao(1,"Tem certeza que deseja excluir?",
						function(retorno){
							if(retorno){
								$.ajaxServico({"nomeServico":"excluirFavorito",
									"parametros" : objeto,
									"funcaoOk" : function(data) {
										$(".item-favorito[codigo='"+objeto.id+"'][sequencial='"+ objeto.sequencial + "']").remove();
									},
									"funcaoErro" : function(data) {
									}
								});									
							}
						});
					})					
			)
			.append(
					$("<div></div>",{"class":"favorito-imagem"}).css({"background-image": "url("+objeto.icone+")"}).addClass(!objeto.url || objeto.url === "" ? "favorito-outro-canal" : "")
					.click(function(e){
						if(objeto.url && objeto.url !== ""){
							var parametros = {"codigoFavorito" : objeto.id,"numSeqlTransFavorita":objeto.sequencial,"codigoTransacao" :objeto.menu};
							$.carregaFormularioAjax(objeto.url,parametros);
						}
					})		
			
			)
			.append(
					$("<div></div>",{"class":"favorito-texto"}).html(objeto.nome).addClass(!objeto.url || objeto.url === "" ? "favorito-outro-canal" : "")
					.click(function(e){
						var parametros = {"codigoFavorito" : objeto.id,"numSeqlTransFavorita":objeto.sequencial,"codigoTransacao" :objeto.menu};
						$.carregaFormularioAjax(objeto.url,parametros);
					})
			);
		});
		
		criarNanoScroll(elementoConteudo.find(".nano"));
	}else{
		$("<li></li>",{"class":"sem-informacao"}).text("Não há transações favoritas.") 
		.appendTo(corpo)
	}		
}


function inicializarPluginMinhaPagina(elemento){
	elemento.shapeshift({
		paddingY: 0 ,
		paddingX: 0 ,
	    gutterX: 0,
	    gutterY: 0,
	    minColumns : 2,
	    handle : ".item-coca-titulo"
	});	
}

/**********************************************************************************************************************************************/
/**********************************************************************************************************************************************/
/**************  *********************************Funï¿½ï¿½s de personalizaï¿½ï¿½o da minha pï¿½gina****************************************************/ 
/**********************************************************************************************************************************************/
/**********************************************************************************************************************************************/

// Abre o modal com a tela de personaliï¿½ï¿½o da "minha pï¿½gina"
function abrirTelaConfiguracao(){
	$.abrirModal({"url":"/aapf/srp/personalizacao/RL02-00.jsp","width":"960","height":"530","resizeAuto":true});
}
//carrega os widgets selecionados e disponï¿½veis
function carregarWidgetsPersonalizacao(){	
	
	$.ajaxServico({"nomeServico" : "listaWidgets",
		"funcaoOk" : function(data) {
			var widgetSelecionados = $(".widget-selecionados");
			var widgetNaoSelecionados = $(".widget-nao-selecionados");
			widgets_personalizacao = data;
			$.each(widgets_personalizacao,function(i,widget){
				if(widget.tipoEstadoJanela === 1){
					adicionarItensDisponiveis(widget);				
				}else{
					adicionarItensSelecionados(widget);
				}	
			});
			inicializarPluginPersonalizacao();
		}
	});	

}
//Adiciona widget aos itens disponï¿½veis
function adicionarItensDisponiveis(widget){
	
	var widgetNaoSelecionados = $(".widget-nao-selecionados");
	
	if(widgetNaoSelecionados.find(".sem-informacao").length === 1){
		widgetNaoSelecionados.find(".sem-informacao").remove();
	}
	$("<div></div>",{"class":"widget-item","tipoJanela" : widget.tipoJanela}).appendTo(widgetNaoSelecionados)
	.append($("<div></div>").html(widget.titulo))
	.append(
			$("<span></span>").html("+").click(function(e){
				removerItensDisponiveis($(this));
			})
	).appendTo(widgetNaoSelecionados);	
}
//remove widget aos itens disponï¿½veis
function removerItensDisponiveis(objeto){
	var widget = {};
	var tipoJanela = objeto.closest(".widget-item").attr("tipoJanela");
	for(i=0;i<widgets_personalizacao.length;i++){
		if(widgets_personalizacao[i].tipoJanela === parseInt(tipoJanela)){
			widget = widgets_personalizacao[i];
			break;
		}
	}	
	objeto.closest(".widget-item").remove();
	
	if($(".widget-nao-selecionados").children().length === 0){
		$(".widget-nao-selecionados").append($("<div></div>",{"class":"sem-informacao"}).html("Não há itens disponíveis."));
	}
	
	adicionarItensSelecionados(widget);
	inicializarPluginPersonalizacao();
}
//remove widget aos itens selecionados
function removerItensSelecionados(objeto){
	var widget = {};
	var tipoJanela = objeto.closest(".widget-item").attr("tipoJanela");
	for(i=0;i<widgets_personalizacao.length;i++){
		if(widgets_personalizacao[i].tipoJanela === parseInt(tipoJanela)){
			widget = widgets_personalizacao[i];
			break;
		}
	}
	objeto.closest(".widget-item").remove();
	if($(".widget-selecionados").children().length === 0){
		$(".widget-selecionados").append($("<div></div>",{"class":"sem-informacao"}).html("Não há itens disponíveis."));
	}else{
		inicializarPluginPersonalizacao();
	}
	adicionarItensDisponiveis(widget);
}
//Adiciona widget aos itens selecionados
function adicionarItensSelecionados(widget){
	
	var widgetSelecionados = $(".widget-selecionados");
	if(widgetSelecionados.find(".sem-informacao").length === 1){
		widgetSelecionados.find(".sem-informacao").remove();
	}	
	var larguraWidget =  widget.coordenadaY * 50;
	var item = $("<div></div>",{"class":"widget-item","tipoJanela" : widget.tipoJanela}).appendTo(widgetSelecionados).css({"width" : larguraWidget + "%"})
	.append($("<div></div>")
		.append(
			$("<div></div>").append(
				$("<div></div>",{"class":"widget-titulo"}).html(widget.titulo)
					.append(
						$("<div></div>",{"class":"widget-fechar"}).html("X").click(function(e){
							removerItensSelecionados($(this));
					})
				)
			)
		)
	);
	if(widget.coordenadaY === 2){
		item.attr({"data-ss-colspan":"2"});
	}	
}
//inicializa o plugin dos itens selecionados
function inicializarPluginPersonalizacao(){
	$(".widget-selecionados").shapeshift({
		paddingY: 0,
		paddingX: 0 ,
	    gutterX: 0,
	    gutterY: 0,
	    minColumns : 2,
	    handle : ".widget-titulo"
	});		
}

// Funï¿½ï¿½o de salvar a personalizaï¿½ï¿½o da "minha pï¿½gina"
function salvarPersonalizacaoMinhaPagina(){
	var widgets = [];

	$(".widget-selecionados > div").each(function(index){
		widgets.push({"tipoJanela" : $(this).attr("tipoJanela") ,"numPrimeiroElemento":index+1,"tipoEstadoJanela": 2 });
	});
	$(".widget-nao-selecionados > div").each(function(index){
		widgets.push({"tipoJanela" : $(this).attr("tipoJanela") ,"numPrimeiroElemento":1,"tipoEstadoJanela": 1 });
	});	
	
	$.ajaxServico({"nomeServico":"alterarPosicaoWidget",
		"parametros" : {"widgets":JSON.stringify(widgets)},
		"funcaoAguarde" : function() {
			$(".personalizacao-coca .overlay").show();
		},
		"funcaoOk" : function(data) {
			carregarMinhaPagina(false);
			$(".personalizacao-coca .overlay").hide();
			$(".personalizacao-coca").closest(".modal").dialog("close");	
		},
		"funcaoErro" : function(data) {
			$(".personalizacao-coca .overlay").hide();
			$(".modal .transacao-erros-validacao").empty().append($("<span>").html(data.mensagem));
		}
	});	
}


//Exclui widget da "minha pï¿½gina"
function fecharWidget(elemento){
	var widget = elemento.closest(".item-coca");
	$.ajaxServico({"nomeServico" : "excluirWidget","parametros" : {"tipoJanela" : widget.attr("tipoJanela")},
	"funcaoOk" : function(data) {
		widget.hide( "fade", function() {
		    $( this ).remove(); 
		    inicializarPluginMinhaPagina($(".lista-itens-coca"));		    
		  });		
	}
	});
}

//Acende uma janela da minha pagina
function acenderWidget(elemento){
	var widget = elemento.closest(".item-coca");
	var acao = 2; //aberta e acesa
	
	if($(".saldos-itens .saldo").css("opacity") == 1){
		//$(".saldos-itens").css({"opacity":"0.15"});
		$(".saldos-itens .saldo").css({"opacity":"0.15"});
		$(".item-coca-apagar").addClass("item-coca-acender").removeClass("item-coca-apagar");
		acao = 5; //aberta e apagada
	}else{
		//$(".saldos-itens").css({"opacity":"1"});
		$(".saldos-itens .saldo").css({"opacity":"1"});
		$(".item-coca-acender").addClass("item-coca-apagar").removeClass("item-coca-acender");
	}
	
	$.ajaxServico({"nomeServico" : "excluirWidget","parametros" : {"tipoJanela" : widget.attr("tipoJanela"), "estado_janela" : acao},
		"funcaoOk" : function(data) {
			//console.log(data);
		}
	});
	
}


function carregarBanners(data){
	var enderecoImagem = "";

	$.each(data,function(i,banners){
		if (banners.tipoBanner === "1"){
			if (banners.texto !== ""){
				var div = $("<div></div>",{"class":"touchslider-item", "tipoBanner": banners.tipoBanner, "style":"background-color:#fff;height: 120px;overflow: hidden;width: 1010px;float: left;border-bottom: 1px solid #eee;"});
				var span = $("<span></span>",{"style":"color: #5574B4;font-size: 14px;margin: 40px 0px;font-weight: bold;width: 100%;height:100%;float: left;text-align: center;padding-left:15px;"}).html(banners.texto);
				if(banners.link !== ""){
					if (banners.target === "_blank"){
						var link = $("<a></a>",{"href":banners.link, "target": banners.target, "style":"float: left; width: 100%; height: 100%"});
						link.append(span);					
						div.append(link);					
					}else{
						var link = $("<a></a>",{"href":"#", "target": banners.target, "onclick": "$.carregaFormularioAjax('"+banners.link+"');", "style":"float: left; width: 100%; height: 100%"});
						link.append(span);
						div.append(link);					
					}
				}
				
				$("#touchslideritensBanners").append(div);
				$(".touchslider-nav").append($("<div></div>",{"class":"touchslider-nav-item contador-banner"}));				
			}
		}else{
			if (banners.enderecoImagem !== ""){
				var div = $("<div></div>",{"class":"touchslider-item", "tipoBanner": banners.tipoBanner, "codOfertaAtivaBanner": banners.codigoOfertaAtiva, "style":"height: 120px;overflow: hidden;width: 1010px;float: left;background-image: url('"+banners.enderecoImagem+"');"});
				if(banners.link !== ""){				
					if (banners.target === "_blank"){
						div.append($("<a></a>",{"href":banners.link, "target": banners.target, "style":"float: left; width: 100%; height: 100%"}));					
					}else{
						div.append($("<a></a>",{"href":"#", "target": banners.target, "onclick": "$.carregaFormularioAjax('"+banners.link+"');", "style":"float: left; width: 100%; height: 100%"}));					
					}
				}

				$("#touchslideritensBanners").append(div);
				$(".touchslider-nav").append($("<div></div>",{"class":"touchslider-nav-item contador-banner"}));				
			}
		}
	});
	if ($(".contador-banner").length > 0){
			var dados = {
					"url" : "/aapf/servico",
					"tiporetorno" : "json",
					"parametros" : {"servico" : "bannerTransacao", "codigoTransacao" : $(".corpo #codigoTransacao").val(), "codigoBannerTransacao" : $(".corpo #codigoBannerTransacao").val(), "atualizarBannerCOCA" : "nao"},
					"verificaSessao" : true,
					"funcaoAntesExecucao" : function() {
					}
					,
					"funcaoSucesso" : function(data) {
		            	try{
		            		if(data.atualizarBannerCOCA != "nao"){
			    				if(data.exibirBanner === "sim" && data.estadoBanner === "aberto"){
		    						$(".transacao-abrir-banner-coca").slideUp("slow", function() {
				    					$(".transacao-banner-coca").slideDown("slow", function() {
				    						$(".touchslider-banner").touchSlider({ 
				    							mouseTouch: true,
				    							autoplay: true,
				    							duration: 1000,
				    							delay: 5000
				    						});
				    					});
		    						});		    					
			    					
			    				}else{
				    				if(data.exibirBanner === "sim" && data.estadoBanner === "fechado"){
										if ($(".touchslider").data("touchslider") !== undefined){
				    						$(".transacao-abrir-banner-coca").slideDown("slow", function() {$(".touchslider").data("touchslider").stop();});											
										}else{
				    						$(".transacao-abrir-banner-coca").slideDown("slow");											
										}				    					
				    				}
			    				}		            			
		            		}

		            	}catch(err){
		            		console.log(err.message);
		            	}				

						
					}
			};
			$.ajaxApf(dados);		
		
	}
}