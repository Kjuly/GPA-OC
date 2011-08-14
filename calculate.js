/*
 * 2011.01.27
 * Author: KJuly
 * Blog: http://kjuly.com
 */

var url_prefix = $('#url_prefix').val(); // 绝对链接
var algor_use  = "";                     // 采用的算法

/*****************************************************
 * AJAX Loading
 *****************************************************/
$('#loading').ajaxStart(function() {
	$(this).slideToggle();
});
$('#loading').ajaxStop(function() {
	$(this).fadeTo(100,0.1).slideToggle().fadeTo(0,1.0);
});
// 
/*****************************************************
 * Default Set
 *****************************************************/
$(function() {
	$('#set_div').css({ marginTop:function(){return $(window).height()/3;} }); // 初始页设置为距离窗口顶部1/3处
	$.uiTableEdit( $('#data_format'), {} );                                    // 允许编辑表格
});
/*****************************************************
 * School Choose
 *****************************************************/
$(function() {
	$.widget( "ui.combobox_school", {
		_create: function() {
			var self = this,
				select = this.element.hide(),
				selected = select.children( ":selected" ),
				value = selected.val() ? selected.text() : "您所在学校?";
			var input = this.input = $( "<input id='combobox_school_input'>" )
				.insertAfter( select )
				.val( value )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: 
					function( request, response ) {
						var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
						response( select.children( "option" ).map(function() {
							var text = $( this ).text();
							if ( this.value && ( !request.term || matcher.test(text) ) )
								return {
									label: text.replace(
										new RegExp(
											"(?![^&;]+;)(?!<[^<>]*)(" +
											$.ui.autocomplete.escapeRegex(request.term) +
											")(?![^<>]*>)(?![^&;]+;)", "gi"
										), "<strong>$1</strong>" ),
									value: text,
									option: this
								};
						}) );
					},
					select:
					function( event, ui ) {
						ui.item.option.selected = true;
						self._trigger( "selected", event, {
							item: ui.item.option
						});
						choose_school_done(); // 显示输入框，并加载对应学校的数据示例到文本框	
					},
					change:
					function( event, ui ) {
						if ( !ui.item ) {
							var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
								valid = false;
							select.children( "option" ).each(function() {
								if ( $( this ).text().match( matcher ) ) {
									this.selected = valid = true;
									return false;
								}
							});
							if ( !valid ) {
								// remove invalid value, as it didn't match anything
								$( this ).val( "" );
								select.val( "" );
								input.data( "autocomplete" ).term = "";
								return false;
							}
						}
					}
				})
				.addClass( "ui-widget ui-widget-content ui-corner-left" );

			input.data( "autocomplete" )._renderItem = function( ul, item ) {
				return $( "<li></li>" )
					.data( "item.autocomplete", item )
					.append( "<a>" + item.label + "</a>" )
					.appendTo( ul );
			};

			this.button = $( "<button type='button'>&nbsp;</button>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "显示所有" )
				.insertAfter( input )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "ui-corner-right ui-button-icon" )
				.click(function() {
					// close if already visible
					if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
						input.autocomplete( "close" );
						return;
					}
					// pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
					input.focus();
				});

			// 输入框Focus状态判定是否为默认值，若是则清空，11-03-20
			$(input).focus(function() {
				if( $(this).val() == "您所在学校?" ) {
					$(this).val("");
				}
			});
			$(input).focusout(function() {
				if( $(this).val() == "" ) {
					$(this).val("您所在学校?");
					return false;
				}
			}); // 11-03-20 end
		},

		destroy: function() {
			this.input.remove();
			this.button.remove();
			this.element.show();
			$.Widget.prototype.destroy.call( this );
		}
	});	

	$.widget( "ui.combobox_algor", {
		_create: function() {
			var self = this,
				select = this.element.hide(),
				selected = select.children( ":selected" ),
				value = selected.val() ? selected.text() : "算法（默认采用您所在学校算法）";
			var input = this.input = $( "<input id='combobox_algor_input'>" )
				.insertAfter( select )
				.val( value )
				.autocomplete({
					delay: 0,
					minLength: 0,
					source: 
					function( request, response ) {
						var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
						response( select.children( "option" ).map(function() {
							var text = $( this ).text();
							if ( this.value && ( !request.term || matcher.test(text) ) )
								return {
									label: text.replace(
										new RegExp(
											"(?![^&;]+;)(?!<[^<>]*)(" +
											$.ui.autocomplete.escapeRegex(request.term) +
											")(?![^<>]*>)(?![^&;]+;)", "gi"
										), "<strong>$1</strong>" ),
									value: text,
									option: this
								};
						}) );
					},
					select:
					function( event, ui ) {
						ui.item.option.selected = true;
						self._trigger( "selected", event, {
							item: ui.item.option
						});
						choose_algor_done(); // 目标算法选择后，更换传输id	
						//alert (chs);
					},
					change:
					function( event, ui ) {
						if ( !ui.item ) {
							var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
								valid = false;
							select.children( "option" ).each(function() {
								if ( $( this ).text().match( matcher ) ) {
									this.selected = valid = true;
									return false;
								}
							});
							if ( !valid ) {
								// remove invalid value, as it didn't match anything
								$( this ).val( "" );
								select.val( "" );
								input.data( "autocomplete" ).term = "";
								return false;
							}
						}
					}
				})
				.addClass( "ui-widget ui-widget-content ui-corner-left" );

			input.data( "autocomplete" )._renderItem = function( ul, item ) {
				return $( "<li></li>" )
					.data( "item.autocomplete", item )
					.append( "<a>" + item.label + "</a>" )
					.appendTo( ul );
			};

			this.button = $( "<button type='button'>&nbsp;</button>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "显示所有" )
				.insertAfter( input )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "ui-corner-right ui-button-icon" )
				.click(function() {
					// close if already visible
					if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
						input.autocomplete( "close" );
						return;
					}
					// pass empty string as value to search for, displaying all results
					input.autocomplete( "search", "" );
					input.focus();
				});

			// 输入框Focus状态判定是否为默认值，若是则清空，11-03-20
			$(input).focus(function() {
				if( $(this).val() == ($('#combobox_school_input').val() + "（默认，您可以选择不同学校算法）") ) {
					$(this).val("");
				}
			});
			$(input).focusout(function() {
				if( $(this).val() == "" ) {
					$(this).val( $('#combobox_school_input').val() + "（默认，您可以选择不同学校算法）" );
					return false;
				}
			}); // 11-03-20 end
		},

		destroy: function() {
			this.input.remove();
			this.button.remove();
			this.element.show();
			$.Widget.prototype.destroy.call( this );
		}
	});	
});
$(function() {
	$( "#combobox_school" ).combobox_school();
	$( "#combobox_algor" ).combobox_algor();
});

// 显示输入框，并载入被选择的学校的数据实例、更新算法选择情况
function choose_school_done()
{
	$('#set_div').animate({marginTop:'35'},{duration:'slow'});
	$('#algor_choose_area').fadeIn();
	$('#calculate_form').fadeIn();
	$.post(
		url_prefix + 'data_eg_load.php',
		{ school_id : $('#combobox_school').val() },
		function(data) {
			$('#data').fadeTo('fast',0.1,function() {
				$('#data').val(data);
			}).fadeTo('slow',1.0);
		}
	);
	algor_use = $('#combobox_school').val().substr(6); // 获取学校英文首字母，作为算法名称
	//$('#combobox_algor_input').val( $('#combobox_school_input').val() + "（默认，您可以选择不同学校算法）" ); // 一旦改变所在学校，重置采用的算法选择
	$('#combobox_algor_input').val( $('#school_choose_area option:selected').text() + "（默认，您可以选择不同学校算法）" ); // 一旦改变所在学校，重置采用的算法选择
	// 在显示为表格的状态下处理学校选择
	if( $('#format_print').text() == "转换到 纯文本" ) {
		$('#data').slideToggle(600);
		$('#data_format_area').children().remove();
		$('#data_format_area').html('<table id="data_format"></table>');
		$('#format_print').text( "转换到 表格" );
	}
	return false;
}
// 选择新算法后，更新algor_use对象
function choose_algor_done()
{
	algor_use = $('#combobox_algor').val().substr(6);  // 获取学校英文首字母，作为算法名称
	return false;
}

$('#format_print').click(function() {
	if( $(this).text() == "转换到 表格" ) {
		$.post(
			url_prefix + 'data_format.php',
			{
				school_id : $('#combobox_school').val(),
				data      : $('#data').val()
			},
			function(data) {
				$('#data_format_area').css({display:'block'});
				//$('#data').animate({height:'100'},{duration:'slow'});
				$('#data').css({display:'block'}).slideToggle(600);
				$('#data_format').html(data);
				format_style();
			}
		);
		$(this).text( "转换到 纯文本" );
		return false;
	}
	else {
		$.post(
			url_prefix + 'data_format_reverse.php',
			{
				//school_id : $('#combobox_school').val(),
				data : $('#data_format').html()
			},
			function(data) {
				$('#data').val(data);
			}
		);
		$('#data').slideToggle(600);
		$('#data_format_area').children().remove().html('<table id="data_format"></table>');
		$(this).text( "转换到 表格" );
		return false;
	}
});
function format_style() {
	$('#data_format').flexigrid({height:'auto'});
};

/*****************************************************
 * Main Page
 *****************************************************/
/* 按钮：选择学校 */
$(function() {
	$('#combobox_school').load( url_prefix + 'data_load.php' ); // 加载学校列表；
	$('#combobox_algor').load( url_prefix + 'algor_list_load.php' ); // 加载学校列表；
});

/* 按钮：添加 | 计算 | 清空，样式 */
$(function() {
	$('button').button();
	$('input','#calculate_button').button();
});

/* 按钮：添加学校 */
$('#school_add_but').click(function() {
	$('body').css({overflow:'hidden'}); // 撤销滚动条
	$('#school_add_area').css({ height:function(){return $(window).height();} }); // 设置区域高度适应浏览器
	//$('#school_add_area').load( url_prefix + 'school_add.php' ).success( $('#school_add_area').slideToggle(3000) ); // 加载表单；
	$.post(
		url_prefix + 'school_add.php',
		{ },
		function(data) {
			$('#school_add_area').html(data).slideToggle(3000);
		}
	);
	/*$.ajax({
		url: url_prefix + "school_add.php",
		ajaxSend:
		function() {	
			$('#school_add_but').fadeTo('fast',0.5,function() {
				$('#school_add_but').text('加载中...');
			}).fadeTo('slow',1.0);
		},
		success: 
		function(data) { 
			$('#school_add_but').fadeTo('fast',0.5,function() {
				$('#school_add_but').text('添加');
			}).fadeTo('slow',1.0);
			$('#school_add_area').html(data)           // 加载数据提交表区域
								 .slideToggle(3000);
		},
		error:
		function() { alert ("错误"); }
	});*/
});

/* 按钮：算法信息 =========================================================================================*/
$('#algor_info').click(function() {
	$.post(
		url_prefix + 'algor_info_load.php',
		{
			algor: algor_use						// 获取算法
			//algor_id: $('#combobox_algor').val(), // 获取学校及数据列
		},
		function(data)
		{
			$('#result_dialog').html(data).dialog('open');
		}
	);
});

/* 按钮：计算 */
$('#calculate').click(function() {
	if( $('#combobox_school').val() == "" ) {	
		$('#alert_message').html('您是否忘记选择学校了？');
		$('#sa_alert').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( $('#data').val() == "" ) {	
		$('#alert_message').html('您是否忘记拷贝内容到文本框了？');
		$('#sa_alert').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else {
		if( $('#format_print').text() == "转换到 纯文本" ) {
			calculate_reset_data(); // 其中含calculate()方法
		}
		else calculate(); // ajax 调用算法获得结果
		return false;
	}
});

/* 按钮：清空 */
$('#calculate_clear').click(function() {
	if( $('#format_print').text() == "转换到 纯文本" ) {
		$('#data').slideToggle(600);
		$('#data_format_area').children().remove().html('<table id="data_format"></table>');
		$('#format_print').text( "转换到 表格" );
	}
	$('#data').val("");
	return false;
});

/* 按钮：文本框帮助 */
$('#set_div .title, #calculate_help').click(function() {
	$('#result_dialog').html(
		'<p>&nbsp;&nbsp;&nbsp;&nbsp;GPA在线计算(&copy;小狮.博)提供GPA(平均成绩点数)计算功能。您可以在输入或者选择自己所在学校后，将教务系统中给出的成绩数据复制粘帖到输入框中，点击计算即可给出结果。您也可以以不同于自己学校的GPA算法来计算，只需在选择学校后，再选择需要的算法（默认为所选学校的算法）。</p>' +
		'<p>&nbsp;&nbsp;&nbsp;&nbsp;如果您所在学校未被收录，您可以花几分钟时间点击“添加学校”进行添加。</p>' +
		'<p>&nbsp;&nbsp;&nbsp;&nbsp;另外，您遇到任何问题，可以随时访问<a href="http://kjuly.com/dev/gpa-calculator-project" title="Feedback" target="_blank">工页</a>向我反馈。:)</p>').dialog('open');
	return false;
});

/*****************************************************
 * Functions
 *****************************************************/
function calculate_reset_data()
{
	$.post(
		url_prefix + 'data_format_reverse.php',
		{
			//school_id : $('#combobox_school').val(),
			data : $('#data_format').html()
		},
		function(data) {
			$('#data').val(data);
			calculate(); // 在Data更新后调用calculate()方法
		}
	);
}
function calculate()
{
	var id = $('#combobox_school').val();
	$.post(
		url_prefix + 'algor.php',
		{
			algor: algor_use,						// 获取算法
			school_id: $('#combobox_school').val(), // 获取学校及数据列
			data: $('#data').val()
		},
		function(data)
		{
			$('#result_dialog').html(data).dialog('open');
		}
	);
}
$(function() {
	$('#result_dialog').dialog({
		autoOpen:false,
		//show:'slide',
		hide:'slide',
		modal:true,
		resizable:false,
		minHeight:120,
		minWidth:450
	});
});


/* 文本框：帮助 */
/*$('#textform_help_but').toggle(
	function(){
		$('#textform_help_area').animate({top:125,height:170},{duration:'slow'});
		$('#textform_help_but').html('X');
	},
	function(){
		$('#textform_help_area').animate({top:286,height:25},{duration:'slow'});
		$('#textform_help_but').html('?');
	}
);*/
