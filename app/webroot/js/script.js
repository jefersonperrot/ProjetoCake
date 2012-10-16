
BASE = $('base').attr('href');
function aviso(msg, secs){
	$('body').prepend(msg);
	var html = $('div.message').html();
	var tipo = $('div.message').attr('class');			
	$('div.message').html('<span class="'+tipo+'"></span>'+html);
	$("div.message").slideDown(1000);
	$("div.message").delay(secs);
	$("div.message").fadeOut(1000);
}
$(document).ready(function () {

	//funcoes do capeta que nao funcionam nem a pau e travam tudo 
    // InitMisc ();
    // InitEvents ();
    // InitBoxSlide ();
	// InitGraphs ();
	// InitNotifications ();
	// InitContentBoxes ();
	// InitTables ();	
	// InitFancybox ();
	// InitWYSIWYG ();
  	// InitQuickEdit ();
	// InitMenuEffects ();
	
	InitListagemSubmenu();
	InitNovaJanela();
	InitNovaJanelaauto();
	InitSelectEstadoCidade();
	
	$('li.mala-imagens img').click(function(){
		img = $(this).attr('src');
		string = '<img src="' + img + '"/>';
		$('#MalaDiretaConteudoIFrame').contents().find('body').append(string);
	});
	
	$('.popmala').popupWindow({ 
		centerScreen:1,
		height:200, 
		width:500
	});
	
	$('.imagem-mala').click(function(){
		if (confirm('Deseja prosseguir?')) {
			linha = $(this).parents('tr');
			arquivo = $(this).parents('tr').children('td.nome-arquivo').html();
			$.ajax({
				url: $(this).attr('href'),
				type: 'POST',
				data: {
					"data[arquivo]" : arquivo
				},
				dataType: 'json',
				success: function(retorno){
					linha.fadeOut('fast');
				},
				error: function(){
					alert('Erro ao excluir arquivo');
				}
			});
		}
		return false;
	});
	
});

function InitMascaraMonetaria(){
	function formatar(campo, tammax, teclapres, decimal){
		var tecla = teclapres.keyCode,
			vr = limpar(campo.val(),"0123456789"),
			tam = vr.length,
			dec = decimal;
		if(tam < tammax && tecla != 8){
			tam = vr.length + 1;
		}
		if(tecla == 8){
			tam = tam - 1;
		}
		if(tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105){
			if(tam <= dec){
				campo.val(vr);
			}
			if((tam > dec) &&(tam <= 5)){
				campo.val(vr.substr(0, tam - 2) + "," + vr.substr(tam - dec, tam));
			}
			if((tam >= 6) &&(tam <= 8)){
				campo.val(vr.substr(0, tam - 5) + "." + vr.substr(tam - 5, 3) + "," + vr.substr(tam - dec, tam)); 
			}
			if((tam >= 9) &&(tam <= 11)){
				campo.val(vr.substr(0, tam - 8) + "." + vr.substr(tam - 8, 3) + "." + vr.substr(tam - 5, 3) + "," + vr.substr(tam - dec, tam));
			}
			if((tam >= 12) &&(tam <= 14)){
				campo.val(vr.substr(0, tam - 11) + "." + vr.substr(tam - 11, 3) + "." + vr.substr(tam - 8, 3) + "." + vr.substr(tam - 5, 3) + "," + vr.substr(tam - dec, tam));
			}
			if((tam >= 15) &&(tam <= 17)){
				campo.val(vr.substr(0, tam - 14) + "." + vr.substr(tam - 14, 3) + "." + vr.substr(tam - 11, 3) + "." + vr.substr(tam - 8, 3) + "." + vr.substr(tam - 5, 3) + "," + vr.substr(tam - 2, tam));
			}
		}
	}
	$("input.mask-money").keydown(function(e){
		formatar($(this), 14, e, 2);
	});
	
}

function listarCidades(){
	var estado_id = $('#slt-estado').val(),
		cidades = '';
	$.ajax({
		url: $('base').attr('href') + 'cidades/listar_ajax',
		type: 'POST',
		data: "data[estado_id]="+estado_id,
		beforeSend: function(){
			$('#slt-cidade').html('<option value="">Carregando cidades…</option>');
		},
		success: function(data){
			cidades = jQuery.parseJSON(data);
		}, 
		error: function(){
			$url = $('base').attr('href') ;
			alert("Erro ao buscar cidades");
		},
		complete: function(){
			var opcoes = '';
			$.each(cidades, function(valor, texto){
				opcoes += '<option value="'+valor+'">'+texto+'</option>';
			});
			$('#slt-cidade').html(opcoes);
		}
	});
}

function InitSelectEstadoCidade(){
// alert('acascsa');
	$('#slt-estado').change(function(){
		listarCidades();
	});
}

function InitNovaJanelaauto(){
	$('.novaJanelaauto').click(function(e){
        var url = $(this).attr("href");
        var windowName = "gestaoAuto";
        var windowSize = 'width=920,height=750,menubar=0,resizable=0,status=0,toolbar=0,location=0,directories=0,scrollbars=1,left=50%,top=0'
        window.open(url, windowName, windowSize);
        e.preventDefault();
    });
}

function InitNovaJanela(){
	$('.novaJanela').click(function(e){
        var url = $(this).attr("href");
        var windowName = "gestaoLeilao";
        var windowSize = 'width=996,height=670,menubar=0,resizable=0,status=0,toolbar=0,location=0,directories=0,scrollbars=1,left=50%,top=0'
        window.open(url, windowName, windowSize);
        e.preventDefault();
    });
}



function InitListagemSubmenu(){
	$('.listagens').hover(function(){
		$(this).children('ul').show();
	}, function(){
		$(this).children('ul').hide();
	});
}

/* *********************************************************************
 * Misc
 * *********************************************************************/
function InitMisc () {
     $('.onFocusEmpty').focus(function(){
        $(this).val('');
    });
    
    $('.validate-form').validate({
          errorPlacement: function(error, element) {
            placeholder = $('#error-' + element.attr('rel'));
            if(placeholder.length){
				placeholder.html(error);
            } else {
                error.insertAfter(element);
            }
        }
    });
}

/* *********************************************************************
 * Events
 * *********************************************************************/
function InitEvents () {
    $('.datepicker-inline').datepicker({
        firstDay: 1,
        dateFormat: 'dd/mm/yy',
        onSelect: function (dateText, inst) {
            id = $(this).attr('id');
            parts = id.split('-');
            id2 = parts[parts.length -1];
            $('#datepicker-target-id-' + id2).val(dateText);
        }
    });
}

/* *********************************************************************
 * Slide Box
 * *********************************************************************/
function InitBoxSlide () {
    $('.slide-but').live('click', function(event){

        tgt = $(event.target);
        if(tgt.hasClass('clickable')){
            return;
        }
        
        body = $(this).parent().next();
        
        if(!body.hasClass('box-slide-body')){
            body = body.find('.box-slide-body');
        }
        //body = $(this).next('.box-slide-body');

        if(body.is(':visible')){
            body.hide();
        } else {
            body.show();
        }
        event.preventDefault();
    });
}

/* *********************************************************************
 * Menus
 * *********************************************************************/
function InitMenuEffects () {
    $('.menu li').hover(function () {
        $(this).find('ul:first').css({'visibility': 'visible', 'display': 'none'}).slideDown();
    }, function () {
        $(this).find('ul:first').css({visibility: "hidden"});
    });
    
    // Look for active element
    indexStart = 1;
    $('#iconbar li').each( function(index) { 
            if ($(this).hasClass('active')) 
                indexStart = index;
    });
    // Initialize carousel plugin
    $('#iconbar').jcarousel({
        start:          indexStart,
        scroll:         7,
        buttonPrevHTML: '<span>&lt;</span>',
        buttonNextHTML: '<span>&gt;</span>',
        initCallback:   function (instance, state) {}
    });    
    instance = $('#iconbar').data('jcarousel')
    // Roll on active element
    if (indexStart >= 7) {
        if (!$.browser.webkit) {
            list = $('#iconbar .jcarousel-list');  
            number = list.css('left');
            list.css({'left': 0});
            list.delay(500).animate({left: '+=' + number}, 750, function () {});
        }
    }

}

/* *********************************************************************
 * Content Boxes
 * *********************************************************************/
function InitContentBoxes () {
	/* Checkboxes */
	$('.content-box .select-all').click(function () {
		if ($(this).is(':checked'))
			$(this).parent().parent().parent().parent().find(':checkbox').attr('checked', true);
		else
			$(this).parent().parent().parent().parent().find(':checkbox').attr('checked', false); 
	});
	
	/* Tabs */
	$('.content-box .tabs').idTabs();
}

/* *********************************************************************
 * Notifications
 * *********************************************************************/
function InitNotifications () {
	$('.notification .close').click(function () {
		$(this).parent().fadeOut(1000, function() {
			$(this).find('p').fixClearType ();
		});		
		return false;
	});
}

/* *********************************************************************
 * Data Tables
 * *********************************************************************/
function InitTables () {
	$('.datatable').dataTable({
		'bLengthChange': true,
		'bPaginate': true,
		'sPaginationType': 'full_numbers',
		'iDisplayLength': 10,
		'bInfo': false,
		'oLanguage': 
		{
			'sSearch': 'Pesquisar',
			'sLengthMenu': 'Exibindo _MENU_ registros por p&aacute;gina',
			'sZeroRecords': 'N&atilde;o existe nenhum registro',
			'oPaginate': 
			{
				'sNext': '&gt;',
				'sLast': '&gt;&gt;',
				'sFirst': '&lt;&lt;',
				'sPrevious': '&lt;'
			}
		},
		// 'aoColumns': [ 
			// { "bSortable": false },
			// null,
			// null,
			// null,
			// null,
			// null,
			// null
		// ]	
	});
}

/* *********************************************************************
 * Graphs
 * *********************************************************************/
function InitGraphs () {
	$('.visualize1').visualize({
			'type': 'bar',
			'width': '872px',
			'height': '250px'
	});

	$('.visualize2').visualize({
			'type': 'line',
			'width': '872px',
			'height': '250px'
	});

	$('.visualize3').visualize({
			'type': 'area',
			'width': '872px',
			'height': '250px'
	});
	
	$('.visualize4').visualize({
			'type': 'pie',
			'width': '872px',
			'height': '250px'
	});
	
	$('.visualize-T1').visualize({
			'type': 'bar',
			'width': '872px',
			'height': '250px'
	});
	
	$('.visualize-T2').visualize({
			'type': 'line',
			'width': '872px',
			'height': '250px'
	});
	
	$('.visualize-T3').visualize({
			'type': 'area',
			'width': '872px',
			'height': '250px'
	});
	
	$('.visualize_dashboard').visualize({
			'type': 'bar',
			'width': '240px',
			'height': '100px'
	});
}

/* *********************************************************************
 * Fancybox
 * *********************************************************************/
function InitFancybox () {
	$('.modal-link').fancybox({
		'modal' 				: false,
		'hideOnOverlayClick' 	: 'true',
		'hideOnContentClick' 	: 'true',
		'enableEscapeButton' 	: true,
		'showCloseButton' 		: true		
	});
	
	$("a[href$='gif']").fancybox();
	$("a[href$='GIF']").fancybox();
	$("a[href$='jpg']").fancybox();
	$("a[href$='JPG']").fancybox();
	$("a[href$='jpeg']").fancybox();
	$("a[href$='JPEG']").fancybox();
	$("a[href$='png']").fancybox(); 	
	$("a[href$='PNG']").fancybox(); 	
}

/* *********************************************************************
 * WYSIWYG
 * *********************************************************************/
function InitWYSIWYG () {
	$('.jwysiwyg').wysiwyg({
		controls: {
			strikeThrough : { visible : true },
			underline     : { visible : true },

			separator00 : { visible : true },

			justifyLeft   : { visible : true },
			justifyCenter : { visible : true },
			justifyRight  : { visible : true },
			justifyFull   : { visible : true },

			separator01 : { visible : true },

			indent  : { visible : true },
			outdent : { visible : true },

			separator02 : { visible : true },

			subscript   : { visible : true },
			superscript : { visible : true },

			separator03 : { visible : true },

			undo : { visible : true },
			redo : { visible : true },

			separator04 : { visible : true },

			insertOrderedList    : { visible : true },
			insertUnorderedList  : { visible : true },
			insertHorizontalRule : { visible : true },

			separator07 : { visible : true },

			cut   : { visible : true },
			copy  : { visible : true },
			paste : { visible : true }
		}
	});
	
	$('textarea.tinymce').tinymce({
		// Location of TinyMCE script
		script_url : 'js/tiny_mce/tiny_mce.js',
		// General options
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		// theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough",
		//theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		//theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
}

/* *********************************************************************
 * Quick Edit
 * *********************************************************************/
function InitQuickEdit () {
	$.editable.addInputType('datepicker', {
                element : function(settings, original) {
                    var input = $('<input>');
                    if (settings.width  != 'none') { input.width(settings.width);  }
                    if (settings.height != 'none') { input.height(settings.height); }
                    input.attr('autocomplete','off');
                    $(this).append(input);
                    return(input);
                },
                plugin : function(settings, original) {
                    var form = this;
                    settings.onblur = 'ignore';
                    $(this).find('input').datepicker({
                        firstDay: 1,
                        dateFormat: 'dd/mm/yy',
                        closeText: 'X',
                        onSelect: function(dateText) { 
                                $(this).hide(); 
                                $(form).trigger('submit'); 
                        },
                        onClose: function(dateText) {
                                original.reset.apply(form, [settings, original]);
                                $(original).addClass(settings.cssdecoration);
                                $(this).hide(); 
                                $(form).trigger('submit'); 
                        }
                    });
                }
        });


		
        $('.quick_edit').click(function () {
                $(this).parent().parent().find('td.edit-field').click();
                return false;
        });
        
        $('.edit-textfield').editable('http://www.google.com', {
                'type': 'text'
        });

        $('.edit-date').editable('date.php', {
             'type' : 'datepicker'
        });
       
        $('.edit-textarea').editable('http://www.google.com', {
                'type': 'textarea'
        });
        
        $('.edit-select').editable('http://www.google.com', {
                'data': "{'true': 'Active', 'false': 'Inactive'}",
                'type': 'select'
        });        
}

jQuery.fn.fixClearType = function(){
    return this.each(function(){
        if( !!(typeof this.style.filter  && this.style.removeAttribute))
            this.style.removeAttribute("filter");
    })

} 



$(document).ready(
function(){
	
	// BUSCA CIDADES  E COMARCAS ATRAVES DO ESTADO SELECIONADO
	function listarCidadesPorEstado(){
		var estado_id = $('#estado_id').val(),
			cidades = '';
		$.ajax({
			url: BASE + 'cidades/teste_ajax',
			type: 'POST',
			data: "data[estado_id]="+estado_id,
			beforeSend: function(){
				$('#slc-cidade').html('<option value="">Carregando cidades…</option>');
			},
			success: function(data){		
			$('#comarcas').html('');		
				retorno = jQuery.parseJSON(data);
				cidades = retorno['Cidades'];
				comarcas = retorno['Comarcas'];
				
				
				
			}, 
			error: function(){
				alert('Erro ao buscar as cidades');
			},
			complete: function(){
				var opcoes = '';
				$.each(cidades, function(valor, texto){
					opcoes += '<option value="'+valor+'">'+texto+'</option>';
				});
				opcoes += '<option value=" " selected="selected">Escolha uma Cidade</option>';
				$('#slc-cidades').html(opcoes);
				
				// COMARCAS
				var count = 0;
				h4 = document.createElement('h4');
				h4.innerHTML = "Comarcas do estado";
				$(h4).css("visibility","visible");
				document.getElementById('comarcas').appendChild(h4);
				
				
				$.each(comarcas, function(valor, texto){
					var div = document.createElement("div");
					div.className = "form-checkbox-item clear fl-space2";
					
					var input = document.createElement('input');
					input.className ="checkbox fl-space required";
					
					$(input).attr('type','checkbox');
					$(input).attr('value',valor);
					$(input).attr('name',"data[clientes_leilao]["+count+"]");
					
					var label = document.createElement('label');
					label.className = "f1";
					$(label).attr('for',"data[clientes_leilao]["+count+"]");
					label.innerHTML = texto;
										
					div.appendChild(input);
					div.appendChild(label);
					
					
					
					document.getElementById('comarcas').appendChild(div);
									
					count++;
					
					
				});
				
				
				
			}
		});
	};
	
	
	
	// BUSCA COMARCAS ATRAVÉS DA CIDADE ESCOLHIDA
	function listarComarcasPorCidade(){
		var cidade_id = $('#slc-cidades').val(),
			comarcas = '';
		$.ajax({
			url: BASE + 'cidades/listar_comarcas_por_cidade',
			type: 'POST',
			data: "data[cidade_id]="+cidade_id,

			success: function(data){
		
				retorno = jQuery.parseJSON(data);				
			}, 
			error: function(){
				alert('Erro ao buscar as cidades');
			},
			complete: function(){
				
				// COMARCAS
				if($('#cliente_justica'))
				{
					$('#cliente_justica').remove();
				}	
				
				label = document.createElement('label');
				label.innerHTML = "Varas";
				label.className ="size-120 fl";
			

			
				var div = document.createElement("div");
				div.id = "cliente_justica";
				div.className ="form-field clear";
				div.appendChild(label);
			
				var slct = document.createElement('select');
				slct.className ="checkbox fl-space required";
				slct.name = "clientes_leilao";
				
				var option = document.createElement('option');
				$(option).attr('value',0);
				option.innerHTML = "Todas as Varas";											
				slct.appendChild(option);
				
				var n = 0; 			
				
				
				$.each(retorno, function(count,it)
				{				
					var option = document.createElement('option');
					$(option).attr('value',it['clientes_leilao']['id']);
					option.innerHTML = it['clientes_leilao']['nome'];											
					slct.appendChild(option);
					n++;					
					
				});
				
				if(!n)
				{
					 p = document.createElement('p');
					 p.innerHTML ="Nenhuma Vara";
					 div.appendChild(p);	
				}
				else
				{
					div.appendChild(slct);	
				}
				document.getElementById('comarcas').appendChild(div);
				
			}
		});
	};


	//ESTE BLOCO FAZ AS REQUISIÇÕES DE AJAX DO LEMENTO estado_ajax
	// busca as cidades e comarcas por estado  e as cidades do estado
	$('#estado_id').change(function(){
		$('#comarcas').html('Buscando Comarcas..');
		listarCidadesPorEstado();
	});
	
	//BUSCA CAS COMARCAS DA CIDADE
	$('#slc-cidades').change(function(){
		listarComarcasPorCidade();
	});
	
	// BUSCA OS PROCESSOS , NO KEYUP E FILTRA O CAMPO PROCESSO,
	// O CAMPO ONDE O SCRIPT AGE PRECISA DE id='busca_processo'
	// CAMPO ALVO DA BUSCA , é o parent parent do campo de busca
	
	
	$(".npt-filtro-processo").live('keyup', function(e){
		if(e.keyCode >= 48 && e.keyCode <= 105 || e.keyCode == 8 || e.keyCode == 46){
			var url = $('base').attr('href') + 'processos/getProcessos/',
				atual = $(this),
				filtro = atual.val();
			$.ajax({
				url: url,
				type: 'POST',
				data: "data[filtro]=" + filtro,
				dataType: 'json',
				success: function(data){
					var opcoes = '';
					$.each(data, function(valor, texto){
						opcoes += '<option value="' + valor + '">' + texto + '</option>';
					});
					atual.parent('div').prev('div').children('select').html(opcoes);
				}
			});
		}
	});
	
	// NO KEYUP E FILTRA O CAMPO CABEÇALHO,
	// O CAMPO ONDE O SCRIPT AGE PRECISA DE id='busca_cabecalho'
	// CAMPO ALVO DA BUSCA , é campo cujo id="cabecalho_id"
	$(".npt-filtro-cliente-leilao").live('keyup', function(e){
		if(e.keyCode >= 49 && e.keyCode <= 105 || e.keyCode == 8 || e.keyCode == 46){
			var url = $('base').attr('href') + 'leiloes/getClientesLeilao/',
				atual = $(this),
				filtro = atual.val();
			$.ajax({
				url: url,
				type: 'POST',
				data: "data[filtro]=" + filtro,
				dataType: 'json',
				success: function(data){
					var opcoes = '';
					$.each(data, function(valor, texto){
						opcoes += '<option value="' + valor + '">' + texto + '</option>';
					});
					atual.parent('div').prev('div').children('select').html(opcoes);
				}
			});
		}
	});
	
	$(".npt-filtro-cabecalho").live('keyup', function(e){
		if(e.keyCode >= 48 && e.keyCode <= 105  || e.keyCode == 8 || e.keyCode == 46){
			var url = $('base').attr('href') + 'processos/getCabecalhos/',
				atual = $(this),
				filtro = atual.val();
			$.ajax({
				url: url,
				type: 'POST',
				data: "data[filtro]=" + filtro,
				dataType: 'json',
				success: function(data){
					var opcoes = '';
					$.each(data, function(valor, texto){
						opcoes += '<option value="' + valor + '">' + texto + '</option>';
					});
					atual.parent('div').prev('div').children('select').html(opcoes);
				}
			});
		}
	});
	
	$('.lnk-add-designacao').live('click',function()
	{
		//CONTA QUANTOS BLOCOS (DESIGNAÇÃO DE PROCESSOS) E PASSA PARA O AJAX QUE VAI LER O CTP
		// i = 0;
		
		
		// $(".designacao").each(
			// function(){i++;}
		// )
		contadorDesignacao = $('#contador');
		var numeroAtual = parseInt(contadorDesignacao.val())+1;
		contadorDesignacao.val(numeroAtual);
		// alert(numeroAtual);
		
		$.ajax({
				url : $('base').attr('href')+"/processos/putDesignacaoProcesso/",
				type: 'POST',
				data: "data[contador]=" + numeroAtual,

				success: function(data){
					if(data)
					{
						div = document.createElement('div');
						div.innerHTML=data;
						document.getElementById('designacao_processo_container').appendChild(div);		

					}
				
				}
			});
		
	}
	);
	
	$('.lnk-add-cronograma').live('click',function() {
		//CONTA QUANTOS BLOCOS (DESIGNAÇÃO DE PROCESSOS) E PASSA PARA O AJAX QUE VAI LER O CTP

		contadorCronograma = $('#contador');
		var numeroAtual = parseInt(contadorCronograma.val())+1;
		contadorCronograma.val(numeroAtual);
		// alert(numeroAtual);
		
		$.ajax({
				url : $('base').attr('href')+"/visitacronograma/putVisitaCronograma/",
				type: 'POST',
				data: "data[contador]=" + numeroAtual,

				success: function(data){
					if(data)
					{
						div = document.createElement('div');
						div.innerHTML=data;
						document.getElementById('visita_cronograma_container').appendChild(div);		

					}
				
				}
			});
		
	}
	);
	
	
}

)