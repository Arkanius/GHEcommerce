jQuery("document").ready(function($){
	carregacarrinho();
	
	$('.ttip').tooltip();
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > 415) {
			$('#carrinho').addClass("fixo");
		} else {
			$('#carrinho').removeClass("fixo");
		}
	});
	
	if ($('.correios-entrega').length > 0 ) {
		var tipo = $('.correios-entrega').data('tipo');
		var cep = $('.correios-entrega').data('cep');
		var url = base_url+'compras/consultacep/'+tipo+'/'+cep+'.json';
		
		$.ajax({
			url :       url,
			dataType:   'json',
			type:       'GET',
			success:function(data){
				var total = $('.produtos-total').text();
				total = total.split(",");
				total = parseFloat(total);
				$('.correios-valor').text(data);
				data = data.split(",");
				data = parseFloat(data);
				total = total+data;
				$('.compras-total').text(total.toFixed(2));
				$('#pagar').removeAttr('disabled');
			}
		});
	}
	
	$('.produto-box').draggable({
		handle:'.icon-arrasta',
		revert:true,
		proxy:'clone',
		onStartDrag:function(){
			$(this).draggable('proxy').css('z-index',10);
		},
		onStopDrag:function(){
			$(this).css('left','0px');
		},
	});
	
	$('#carrinho').droppable({
		onDrop:function(e,source){
			addcarrinho($(source).data('id'));
		}
	});
	
	$('body').on('click','a',function(){
		if ($(this).attr('href')=="#") {
			return false;
		}
		
		if ($(this).hasClass('produto-remove')) {
			removecarrinho($(this).attr('href'));
			carregacarrinho();
			return false;
		}
	});
	
	function addcarrinho(id)
	{
		$.ajax({
			url	: 		base_url+'produtos/addcarrinho/'+id,
			dataType:	'Html',
			type:		'GET',
			success:	function(data){
				carregacarrinho();
			},
			error:		function() {
				$('#carrinho .alert').attr('class','alert alert-danger').text('O produto não pode ser adicionado ao carrinho, verifique sua conexão com a internet!');
			}
		});
	}
	
	function removecarrinho(url)
	{
		$.ajax({
			url	: 		url,
			dataType:	'Html',
			type:		'GET',
			success:	function(data){
				carregacarrinho();
			},
			error:		function() {
				$('#carrinho .alert').attr('class','alert alert-danger').text('O produto não pode ser adicionado ao carrinho, verifique sua conexão com a internet!');
			}
		});
	}
	
	function carregacarrinho() {
		$.ajax({
			url	: 		base_url+'produtos/carrinho.json',
			dataType:	'json',
			type:		'GET',
			success:	function(data){
				$('#carrinho .alert').attr('class','alert alert-info').text('Arraste outro produto para cá!');
				var count = 0;
				var html = '';
				if (data) {
					$.each(data, function(i, obj){
						html += '<li>';
						html += '<a href="'+base_url+'produto/'+obj.Produto['slug']+'" class="btn btn-info">'+obj.Produto['titulo']+'</a> ';
						html += '<a href="'+base_url+'produtos/removecarrinho/'+obj.Produto['id']+'" class="produto-remove btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></li>';
						html += '</li>';
						count += 1;
					});
				}
				if (count == 1) {
					count = 'tem ' + count + ' produto';
				} else if (count == 0) {
					count = 'não tem produtos';
				} else {
					count = 'tem ' + count + ' produtos';
				}
				
				$('#carrinho .produtos-carrinho').html(html);
				$('#carrinho .produtos-conta').text(count);
			},
			error:		function(data) {
				$('#carrinho .alert').attr('class','alert alert-danger').text('Não foi possivel carregar os produtos, verifique sua conexão com a internet!');
			}
		});
	}
	
});