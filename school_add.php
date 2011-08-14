<!-- Add School -->
<div id="sAdd_mainarea">
<!-- Tabs -->
<form id="sAdd_page_tabs">
   <ul>
      <li><a href="#sAdd-tabs-0">开始</a></li>
      <li><a href="#sAdd-tabs-1">1 : 学校信息</a></li>
      <li><a href="#sAdd-tabs-2">2 : 算法描述</a></li>
      <li><a href="#sAdd-tabs-3">3 : 格式定位</a></li>
      <li><a href="#sAdd-tabs-4">完成</a></li>
   </ul>
   <div id="sAdd-tabs-0">
	  <div id="sa_form">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;首先非常感谢您选择使用本GPA计算器，如果有什么意见或疑问可以在<a href="http://kjuly.com/dev/gpa-calculator-project" title="Feedback" target="_blacnk">工页</a>进行反馈。</p>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;由于各个学校绩点算法(尤其是单门绩点)和成绩栏数据格式不尽相同，所以在这里提供自动提交功能，允许您提交相关信息，服务器会自动记录处理诸如学校等信息，以电子邮件的形式发送给我。由于绩点算法需要通过您提交的描述手动进行编写，而且目前还是以个人形式进行系统维护，所以需要点时间，但我会尽快完成。</p>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数据一旦成功添加后，会进入测试期，到时会以邮件形式第一时间通知您(所以希望您能在最后留下电子邮件)，您可以在该平台进行简单测试。当然，我非常高兴您能推荐同学或者朋友们一起进行测试和使用，这绝对是个极大的支持！ :D</p>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;填写分简单三步，如果在该过程中遇到不能解决的问题，您可以前往<a href="http://kjuly.com/dev/gpa-calculator-project" title="Feedback" target="_blacnk">工页</a>反馈，我会尽快回复。请点击开始进入下一页。</p>
		<button id="sa_n">开始</button>
	  </div>
   </div>
   <div id="sAdd-tabs-1">
	  <div id="sa_form">
		<div id="sa_name_help" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-help"></span></div>
		<span>学校名称：</span><br/>
		<input id="sa_name" name="sa_name" value=""><br/>
		<span>英文：</span><br/>
		<input id="sa_name_en" name="sa_name_en" value=""><br/>
		<span>英文缩写：</span><br/>
		<input id="sa_name_en_short" name="sa_name_en_short" value=""><br/>
		<button id="sa_p">上一步</button>
		<button id="sa_n">下一步</button>
	  </div>
   </div>
   <div id="sAdd-tabs-2">
	  <div id="sa_form">
		<div id="sa_algor_help" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-help"></span></div>
		<span>单门学科绩点算法描述：</span><br/>
		<textarea id="sa_algor" name="sa_algor"></textarea>
		<span style="display:inline">平均绩点(GPA)算法公式：</span><br/>
		<input id="sa_gpa_formula" name="sa_gpa_formula" value="&sum;(单门绩点*单门学分) / &sum;(单门学分)" disabled="disabled"><br/>
		<input id="sa_gpa_formula_copy" value="&sum;(单门绩点*单门学分) / &sum;(单门学分)" type="hidden">
		* 如果上诉公式不对，您可以勾选 <input type="checkbox" id="new_gpa_formula" name="new_gpa_formula"> 以进行修改<br/>
		<button id="sa_p">上一步</button>
		<button id="sa_n">下一步</button>
	  </div>
   </div>
   <div id="sAdd-tabs-3">
	  <div id="sa_form">
		<div id="sa_column_help" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-help"></span></div>
		<span>数据格式：</span><br/>
		<div id="sa_data_column">
			<span>总列数：</span><input id="sa_column_total" name="sa_column_total" maxlength="2" value="">
			<span>成绩所在列：</span><input id="sa_column_score" name="sa_column_score" maxlength="2" value="">
			<span>学分所在列：</span><input id="sa_column_credits" name="sa_column_credits" maxlength="2" value="">
		</div>
		<br/>
		<span>数据实例(为便于测试，请至少提供三行内容)：</span><br/>
		<textarea id="sa_data_eg" name="sa_data_eg"></textarea>
		<button id="sa_p">上一步</button>
		<button id="sa_n">下一步</button>
	  </div>
   </div>
   <div id="sAdd-tabs-4">
	  <div id="sa_form">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;恭喜您，已经完成相关信息的填写。您可以直接点击提交完成，不过我还是建议您填写该页信息，以方便在成功添加后第一时间通知您。以下个人信息将会作为提交人随学校绩点算法等信息一起发布。最后，感谢您的支持！:)</p>
		<span>提交人：</span><br/>
		<input id="sa_per_name" name="sa_per_name" value=""><br/>
		<span>E-Mail(不公开)：</span><br/>
		<input id="sa_per_mail" name="sa_per_mail" value=""><br/>
		<span>Blog：</span><br/>
		<input id="sa_per_blog" name="sa_per_blog" value="http://"><br/>
		<button id="sa_p">上一步</button>
		<input id="sa_submit" type="submit" value="提  交">
	  </div>
   </div>
</form> <!-- end Tabs -->

<!-- Back button -->
<button id="sAdd_backto_main">返 回</button>
<!-- help dialog -->
<div id="sa_help_dialog" title="帮助"></div>
<!-- Tabs end -->
</div> <!-- end sAdd_main_area -->

<!--script type="text/javascript" src="http://kjuly.com/KJuly/wp-content/themes/KJuly_tv2/dev/gpa-calculator/js/jquery-ui-school-add.js"></script> <!-- X -->
<link rel="stylesheet" href="http://kjuly.com/KJuly/wp-content/themes/KJuly_tv2/dev/gpa-calculator/css/jquery-ui-school-add.css" type="text/css" media="screen"/-->
<style type="text/css">
#sAdd_mainarea { width:960px; margin:auto; margin-bottom:30px; overflow:hidden;
	height:auto!important; height:160px; min-height:160px;
}
#sAdd_page_tabs { width:800px; margin:auto; margin-top:30px; }
#sAdd_page_tabs p { line-height:20px; }
#sAdd_page_tabs a { color:#6099ff; text-decoration:none; }
#sAdd_page_tabs a:hover { color:#f90; }
#sAdd_page_tabs span { font-weight:bold; font-size:12px; letter-spacing:3px; }
#sa_form { width:600px; margin:auto; margin-top:30px; margin-bottom:120px; text-align:left; line-height:45px; }
* html #sa_form, *+ html #sa_form { margin-bottom:30px; }
#sa_form input { width:584px; padding:6px; border:#ccc solid 2px; }
#sa_form #new_gpa_formula { text-align:right; width:auto; padding:6px; }
#sa_form textarea { width:584px; height:160px; padding:6px; border:#ccc solid 2px; }
#sa_form input:focus, #sa_form textarea:focus { outline:none; border:#fff solid 2px; -moz-box-shadow: 0 0 5px #5c9ccc; -webkit-box-shadow: 0 0 5px #5c9ccc; }
#sa_form button, input#sa_submit { text-align:center; margin-top:30px; width:100px; }
#sa_form #sa_p { float:left; }
#sa_form #sa_n, #sa_submit { float:right; }
input#sa_submit { border:1px solid #ccc; padding:3px; }
#sa_data_column { display:inline; padding:0 40px; }
#sa_data_column span { font-weight:normal; }
#sa_data_column input { width:25px; text-align:center; margin-right:20px; }
#sa_column_total, #sa_column_score, #sa_column_credits { width:40px; }
#sa_name_help, #sa_algor_help, #sa_column_help { float:right; width:15px; margin:12px 3px; padding:3px; cursor:pointer; }
#sa_help_dialog { display:none; text-align:left; padding:0 60px 30px 60px; }
#sa_help_dialog .center { text-align:center; }
#sa_help_dialog b { margin-left:-20px; }
#sAdd_backto_main { width:805px; margin-top:3px; border:1px solid #1c9cc4; }
input#sa_submit:hover { border:1px solid #79b9e7; }
input[disabled] { color:#888; background-color:#f1f1f1; }
</style>
<script type="text/javascript">
/*****************************************************
 * School Data Add Tab Page
 *****************************************************/
$(function() {
	$('#sAdd_page_tabs').tabs({
		fx:{
			opacity:'toggle',
			height:'toggle',
			duration:'slow'
		},
		disabled:[1,2,3,4] // 除了当前页，剩余页均锁定，点击开始或下一步激活 
	});
	$('button, input#sa_submit').button();
});
/* 上一步 */
$('button#sa_p','#sAdd_page_tabs').click(function() {
	var $tabs = $('#sAdd_page_tabs').tabs();
	var selected = $tabs.tabs('option','selected');
	$tabs.tabs('select',selected-1);
	return false;
});
/* 下一步 */
$('button#sa_n','#sAdd_page_tabs').click(function() {
	var $tabs = $('#sAdd_page_tabs').tabs();
	var select_new = $tabs.tabs('option','selected') + 1;
	$('#sAdd_page_tabs').tabs('enable',select_new); // 激活下一个tab页
	$tabs.tabs('select',select_new);
	return false;
});
/* 是否手动输入GPA计算公式 */
$('#new_gpa_formula').change(function() {
	if( $(this).attr('checked') ) {
		$('#sa_gpa_formula').removeAttr('disabled');
	}
	else {
		$('#sa_gpa_formula').attr({
			value:$('#sa_gpa_formula_copy').val(),
			disabled:'disabled'
		});
	}
});
/*
 * 帮助按钮
 */
$(function() {
	$('#sa_help_dialog').dialog({
		autoOpen:false,
		show:'slide',
		hide:'slide',
		modal:true,
		resizable:false,
		minHeight:120,
		minWidth:600
	});
});
$('#sa_name_help').click(function() {
	$('#sa_help_dialog').html(
		'<b>学校名称：</b><p>&nbsp;&nbsp;&nbsp;&nbsp;您所在学校的中文全名。</p><p>【 示例：浙江工业大学 】</p>' +
		'<b>英文：</b><p>&nbsp;&nbsp;&nbsp;&nbsp;学校的英文名。考虑到中文在编码问题上容易出现乱码，英文名可以作为很好的识别名称，同时这也利于数据恢复工作。</p><p>【 示例：Zhejiang University of Technology 】</p>' +
		'<b>英文缩写：</b><p>&nbsp;&nbsp;&nbsp;&nbsp;学校英文名称的缩写，作为ID的一部分存储于数据库。</p><p>【 示例：zjut 】</p>'
	);
	$('#sa_help_dialog').dialog('open');
});
$('#sa_algor_help').click(function() {
	$('#sa_help_dialog').html(
		'<b>单门学科绩点算法描述：</b><p>&nbsp;&nbsp;&nbsp;&nbsp;您可以从学生手册中找到绩点算法的简单介绍。</p><p>【 示例：</p><p>单门绩点大于60的学科绩点：（成绩-50）/ 10 </p>不及格（<60分）课目绩点：0</p><p>五级制绩点：</p><p>优秀4.5 良好3.5 中等2.5 及格1.5 不及格0  】</p>' +
		'<b>平均绩点(GPA)算法公式：</b><p>&nbsp;&nbsp;&nbsp;&nbsp;GPA算法通常为单门绩点和学分的加权和除以总学分，所以默认情况下已定义，当然，如果您所在学校的GPA算法公式并不如此，请勾选公式下方的复选框，激活公式输入框以进行修改。</p>'
	);
	$('#sa_help_dialog').dialog('open');
});
$('#sa_column_help').click(function() {
	$('#sa_help_dialog').html(
		'<b>数据格式：</b><p>数据格式是为您所在学校的成绩数据的列格式，请务必输入总列数，以及成绩所在列和学分所在列。</p><p>【 示例(您需要和下侧数据实例进行对应)：</p><p>总列数：6 成绩所在列：4 学分所在列6 】</p>' +
		'<b>数据实例：</b><p>您所在学校的成绩数据实例，请至少输入三行，这便于进行测试工作。</p><p>【 示例：</p><p>2008/2009(1) 高等数学AI 普通专业 85 96 6</p><p>2008/2009(1) 线性代数I 普通专业 85 48 2</p><p>2008/2009(1) C程序设计 普通专业 85 72 4 】</p>'
	);
	$('#sa_help_dialog').dialog('open');
});
/* 返回 */
$('button#sAdd_backto_main').click(function() {
	$('#school_add_area').slideToggle('slow');
	$('body').css({overflow:'auto'}); // 恢复滚动条可见
	return false;
});
/* 提交 */
$('form').submit(function() {
	if( check_error() ) { // 对将传递的各参数进行检查
		$.post(
			url_prefix + 'data_send.php',
			$(this).serialize(),
			function(data) {
				$('#sa_help_dialog').html('<p class="center">成功提交！</p>');
				$('#sa_help_dialog').dialog('open');
			}
		);
	}
	return false;
});
/* 方法：数据参数检查 */
function check_error()
{
	var c = ":：<>%!@?";
	var cc = "<>%!";
	if( $('#sa_name').val()=="" ) {
		$('#alert_message').html('请在学校信息页中输入<b>学校名称</b>');
		$('#sa_alert').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( contain( $('#sa_name').val(), c) ) {
		$('#error_message').html('学校信息中的<b>学校名称</b>包含非法字符');
		$('#sa_error').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( $('#sa_name_en').val()=="" ) {
		$('#alert_message').html('请在学校信息页中输入<b>学校英文名</b>');
		$('#sa_alert').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( contain( $('#sa_name_en').val(), c) ) {
		$('#error_message').html('学校信息中的<b>英文</b>处包含非法字符');
		$('#sa_error').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( $('#sa_name_en_short').val()=="" ) {
		$('#alert_message').html('请在学校信息页中输入<b>学校英文名缩写</b>');
		$('#sa_alert').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( contain( $('#sa_name_en_short').val(), c) ) {
		$('#error_message').html('学校信息中的<b>英文缩写</b>包含非法字符');
		$('#sa_error').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( $('#sa_algor').val()=="" ) {
		$('#alert_message').html('请在算法描述页中给出<b>单门绩点的算法描述</b>');
		$('#sa_alert').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( not_num( $('#sa_column_total').val() ) ) {
		$('#alert_message').html('数据格式中的<b>总列数</b>\r请输入0~99之间的数字');
		$('#sa_alert').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( not_num( $('#sa_column_score').val() ) ) {
		$('#alert_message').html('数据格式中的<b>成绩所在列</b>\r请输入0~99之间的数字');
		$('#sa_alert').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( not_num( $('#sa_column_credits').val() ) ) {
		$('#alert_message').html('数据格式中的<b>学分所在列</b>\r请输入0~99之间的数字');
		$('#sa_alert').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( $('#sa_data_eg').val()=="" ) {
		$('#alert_message').html('请在格式定位页中给出至少三条<b>数据实例</b>');
		$('#sa_alert').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( contain( $('#sa_per_name').val(), cc) ) {
		$('#error_message').html('提交人一栏包含非法字符');
		$('#sa_error').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( contain( $('#sa_per_mail').val(), cc) ) {
		$('#error_message').html('E-Mail一栏包含非法字符');
		$('#sa_error').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	else if( contain( $('#sa_per_blog').val(), cc) ) {
		$('#error_message').html('Blog一栏中包含非法字符');
		$('#sa_error').slideToggle().delay(4500).fadeTo(3000,0.1).slideToggle().fadeTo(0,1.0);
		return false;
	}
	return true;
}
function contain( str, charset )
{
	for( var i=0; i<charset.length; ++i ) {
		if( str.indexOf( charset.charAt(i) )>=0 ) return true;
	}
	return false;
}
function not_num( str )
{
	if( str == "" ) return true;
	for( var i=0; i<str.length; i++ ) {
		var c = str.substr(i,1);
		if( c<"0" || c>"9" ) return true;
	}
	return false;
}
</script>
