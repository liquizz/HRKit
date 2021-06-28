$(document).ready(function(){

	$('.cap-btn').click(function(){
		$('.cap-block').css("display","none");
		$('.main-content').css("display","block");
	});

	function set_questions () {
		var arrQuestions = 
			["Имеешь ли ты возможность применять всё разнообразие своих навыков в работе?",
			 "Получаешь ли ты обратную связь от непосредственного руководителя, которая помогает тебе лучше понять как выполнять задачи, которые перед тобой стоят?",
			 "Получаешь ли ты от руководства компании достаточную обратную связь, помогающую понять свой вклад в развитие продукта и своевременно корректировать свои действия?",
			 "Предоставляется ли тебе право автономно и самостоятельно принимать решения, влияющие на достижение конечной цели?",
			 "Всегда ли ты получаешь необходимую тебе информацию от руководства и коллег в ходе работы, помогающую своевременно вносить коррективы в свою работу?",
			 "Проявляешь ли ты в работе все разнообразие своих навыков и способностей?",
			 "Имеешь ли ты понимание как выполнять задачи, которые перед тобой стоят?",
			 "Насколько ты стремишься оказывать значимое влияние на развитие своего проекта, продукта?",
			 "Способен ли ты автономно и самостоятельно принимать решения, влияющие на достижение конечной цели?",
			 "Насколько последовательно ты даешь обратную связь руководству и коллегам в ходе работы?"
			];
		var arrAnswers = [
			"Никогда",
			"Очень редко",
			"Больше нет, чем да",
			"Больше да, чем нет",
			"В большинстве случаев",
			"Всегда"
			];
			
		for(var i = 0; i < 10; i++){
			var newQuestion = document.createElement('div');
			//Добавление класса блоку с текстом вопроса
			newQuestion.className = 'string-class-question';
			newQuestion.innerHTML = arrQuestions[i];
			x = i + 1;
			y = x;
			if (x > 5) {
				y = x - 5;
			}
			
			$('.question-' + x ).append("Вопрос " + y + " из " + 5); // Можно добавить класс
			$('.question-' + x).append(newQuestion);
			
			for(var j = 0; j < arrAnswers.length; j++){
				$('<input/>', { type: 'radio', value: j , name: 'q' + x, id: 'q-' + j + '-' + x, class: 'RadioBtns'}).appendTo('.question-' + x);
				var labelToRadio = document.createElement('label');
				labelToRadio.setAttribute('for', 'q-' + j + '-' + x);
				labelToRadio.className += "labeToRadio";
				labelToRadio.innerHTML = arrAnswers[j];
				$('.question-' + x).append(labelToRadio);
				$('.question-' + x).append("<br>");
				if(i == 1){

				}
			}
		}
		
	}
	
	set_questions(); // Вызов функции первого блока вопросов

	// Вывод контента при нажатии на кнопку

$('.next-question').click(function(){
	//Прокрутка наверх страницы ({xxx: Отступ в пикселях}, время прокрутки)
	$('html, body').animate({scrollTop: 100},1000);

	$('.questions-1').css("display","none");
	$('.questions-2').css("display","block");
	$('.next-question').css("display","none"); // Убираем кнопку после нажатия
	$('.butn-result').css("display", "inline-block"); // Кнопка результатов
	
	$('.btn-prewQuests').css("display", "inline-block"); //Кнопка предидущего вопроса
	
    return false;
});

// Предидущие вопросы
$('.btn-prewQuests').click(function() { 
	$('.questions-1').css("display","block");
	$('.questions-2').css("display","none");
	$('.btn-prewQuests').css("display", "none");
	$('.butn-result').css("display", "none");
	$('.next-question').css("display","block");
})

/* / Оригинальный код */
	 $('.butn-result').click(function(){
		// Масив содержащий результаты ответов
		var arrFinaly1 = [];
		for(var i = 1; i <= 5; i++){
			arrResult1 = document.getElementsByName('q' + i);
			var count1 = 0; // Счетчик результата
			for(var j = 0; j < arrResult1.length; j++) {
				if (arrResult1[j].checked) { // Проперка радиокнопки
					count1++;
					// Получение индекса кнопки
					arrFinaly1.push(arrResult1[j].value); 
				}
			}
			if (count1 == 0) {
				arrFinaly1.push("Nan");
				
			}
		}
		if(arrFinaly1.indexOf("Nan") != -1){
			alert("Заполните все поля в \"Степень мотивации\".");
			//выход из функции
			return;
		}
		else{
			// Формула подсчета результата вопросы ((1 + 2 + 3)/3 + 4 + 5)
			sm = +arrFinaly1[0] + +arrFinaly1[1] + +arrFinaly1[2] + +arrFinaly1[3] + +arrFinaly1[4];
			$(".q-res-deg-of-moti").text(sm); 
			
			//alert("Степень мотивации: " + Math.round(sm));
		}
		arrFinaly1 = []; // Очистка массива
	});

	$('.butn-result').click(function(){
		//Прокрутка наверх страницы ({xxx: Отступ в пикселях}, время прокрутки)
		$('html, body').animate({scrollTop: 500},1500);

		var arrFinaly2 = [];
		for(var i = 6; i <= 10; i++){
			arrResult2 = document.getElementsByName('q' + i);
			var count2 = 0;
			for(var j = 0; j < arrResult2.length; j++) {
				if (arrResult2[j].checked) {
					count2++;
					arrFinaly2.push(arrResult2[j].value);
				}
			}
			if (count2 == 0) {
				arrFinaly2.push("Nan");
			}
		}
		if(arrFinaly2.indexOf("Nan") != -1){
			alert("Заполните все поля в \"Мотивационный потенциал\".");
			// Выход из функции
			return; 
		}
		else{
			mp = +arrFinaly2[0] + +arrFinaly2[1] + +arrFinaly2[2] + +arrFinaly2[3] + +arrFinaly2[4];
 			//alert("Мотивационный потенциал: " + Math.round(mp));
		}
		// Убирает все кнопки и вопросы
		$('.questions-1').css("display","none");
		$('.questions-2').css("display","none");
		$('.btn-prewQuests').css("display", "none");
		$('.butn-result').css("display", "none");
		$('.next-question').css("display","none");
		// Результаты в отдельный блок
		$('.questions-result').css("display","block");

		// Добавление результата на страницу
		$(".q-res-motiv-pot").text(mp); 
		arrFinaly2 = [];
	});
});