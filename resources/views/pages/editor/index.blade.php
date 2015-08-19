@extends('layout.master')
@section('content')
<style>
	iframe {
    border: 1px solid #ccc;
    min-height: 300px;
    width: 100%;
}
</style>
<div class="row">
	<!--start left sidebar-->
	@widget('UserMenu')
	<!--end left sidebar-->
	<div class="col-md-9">
		<main class="content">
			<script>
// ***********************
// ШАГ 1: Выводим iframe и получаем доступ к нему
// ***********************

// Выводим в HTML-поток iframe
document.write("<iframe scrolling='no' frameborder='no' src='#' id='frameId' name='frameId'></iframe><br/>");
// Определим Gecko-браузеры, т.к. они отличаются в своей работе от Оперы и IE
var isGecko = navigator.userAgent.toLowerCase().indexOf("gecko") != -1;
// Получаем доступ к объектам window & document для ифрейма
var iframe = (isGecko) ? document.getElementById("frameId") : frames["frameId"];
var iWin = (isGecko) ? iframe.contentWindow : iframe.window;
var iDoc = (isGecko) ? iframe.contentDocument : iframe.document;

// ***********************
// ШАГ 2: Добавим на пустую страницу ифрейма произвольный HTML-код
// ***********************

// Формируем HTML-код
iHTML = "<html><head>\n";
iHTML += "<style>\n";
iHTML += "body, div, p, td {font-size:12px; font-family:tahoma; margin:0px; padding:0px;}";
iHTML += "body {margin:5px;}";
iHTML += "</style>\n";
iHTML += '<body>{!!$text!!}</body>';
iHTML += "</html>";
// Добавляем его с помощью методов объекта document
iDoc.open();
iDoc.write(iHTML);
iDoc.close();

// ***********************
// ШАГ 3: Инициализация свойства designMode объекта document
// ***********************

if (!iDoc.designMode) alert("Визуальный режим редактирования не поддерживается Вашим браузером");
else iDoc.designMode = (isGecko) ? "on" : "On";

// ***********************
// ШАГ 4: Простейшие элементы редактирования: жирность, курсив, подчеркивание
// ***********************

// Запишем код функции, для выставления форматирования
// Используется метод execCommand объекта document
function setBold() {
 iWin.focus();
 iWin.document.execCommand("bold", null, "");
}

function setCenter() {
 iWin.focus();
 iWin.document.execCommand("justifyCenter", null, "");
}
</script>
		<input type="text" id="page" value="1"><button id="page-btn">Перейти</button><br>
		<input type='button' value='Ж' onclick='setBold()' class='bold' />
		<input type='button' value='Выровнять' onclick='setCenter()' class='center' />
		<button id="save-text">Сохранить</button>
		</main>
	</div>
	<div class="push"></div>
</div>
<script>
	$('#save-text').click(function(){
		$.ajax({
				beforeSend: function(xhr) {
					xhr.setRequestHeader("X-CSRF-Token", "<?php echo csrf_token()?>");
				},
				method:"POST",
				url:"{!!route('user.publication.editor.save',$pubId)!!}",
				data:{
					page:1,
					text:$('#frameId').contents().find('body').html(),
					pubId:<?php echo $pubId?>
				},
		});
	});

	$('#page-btn').click(function(){
		$.ajax({
				beforeSend: function(xhr) {
					xhr.setRequestHeader("X-CSRF-Token", "<?php echo csrf_token()?>");
				},
				method:"POST",
				url:"{!!route('user.publication.editor.page',$pubId)!!}",
				data:{
					page:$('#page').val(),
				},
		}).done(function(e){
			$('#frameId').contents().find('body').html(e);
		});
	});
</script>
@endsection