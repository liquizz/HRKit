$(document).ready(function(){

	$('.cap-btn').click(function(){
		$('.cap-block').css("display","none");
		$('.main-content').css("display","block");
	});

	function set_questions () {
		var arrQuestions = 
			["Я точно знаю, в чем состоит глобальная стратегическая цель моей организации.",
			 "Руководство уделяет достаточно много времени, чтобы разъяснить цели организации.",
			 "Я задавал вопросы и получал ответы по тем целям, которые мне были непонятны.",
			 "Я знаю, какими способами и методами организация собирается достигать своих целей.",
			 "Меня устраивают способы достижения цели, принятые в организации.",
			 "Система ценностей, принятая в организации, очень близка мне.",
			 "Мне не пришлось «ломать» себя, чтобы приспособиться к целям организации.",
			 "Мне нравятся цели, стоящие перед моей организацией, я готов их разделить."
			];

		var arrAnswers = [
			"+3",
			"+2",
			"+1",
			"0",
			"-1",
			"-2",
            "-3"
			];
        
      
			
		for(var i = 0; i < 10; i++){
			var newQuestion = document.createElement('div');
			//Добавление класса блоку с текстом вопроса
			newQuestion.className = 'string-class-question';
			newQuestion.innerHTML = arrQuestions[i];
			x = i + 1;
			y = x;
			
			
			$('.question-' + x ).append("Вопрос " + y + " из " + 8); // Можно добавить класс
			$('.question-' + x).append(newQuestion);
			 k=3;
			for(var j = 0; j < arrAnswers.length; j++){
				$('<input/>', { type: 'radio', value: k , name: 'q' + x, id: 'q-' + j + '-' + x, class: 'RadioBtns'}).appendTo('.question-' + x);
				var labelToRadio = document.createElement('label');
				labelToRadio.setAttribute('for', 'q-' + j + '-' + x);
				labelToRadio.className += "labeToRadio";
				labelToRadio.innerHTML = arrAnswers[j];
				$('.question-' + x).append(labelToRadio);
				$('.question-' + x).append("<br>");
				if(i == 1){

				}
                k=k-1;
			}
		}
		
	}
	
	set_questions(); // Вызов функции первого блока вопросов

	// Вывод контента при нажатии на кнопку



/* / Оригинальный код */
	 $('.butn-result').click(function(){
		// Масив содержащий результаты ответов
		var arrFinaly1 = [];
		for(var i = 1; i <= 8; i++){
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
			alert("Заполните все поля!");
			//выход из функции
			return;
		}
		else{
			
			sm = +arrFinaly1[0] + +arrFinaly1[1] + +arrFinaly1[2] + +arrFinaly1[3] + +arrFinaly1[4]
            + +arrFinaly1[5]+ +arrFinaly1[6]+ +arrFinaly1[7];
            
         
           if (sm<8){
            $(".tract").text("От -24 до 8: Низкая оценка уровня информированности о ценностях, целях организации и способах их достижения.");  
         } 
            else if (sm>8 && sm<20){
                $(".tract").text("От 8 до 20: Средняя оценка уровня информированности.");  
            }
            else{
                $(".tract").text("Больше 20: Оценка, вероятно, завышена, и ее нельзя принимать в расчет.");  
            }
		$('.questions-1').css("display","none");
		$('.questions-2').css("display","none");
		$('.btn-prewQuests').css("display", "none");
		$('.butn-result').css("display", "none");
		$('.next-question').css("display","none");
		// Результаты в отдельный блок
		$('.questions-result').css("display","block");

		// Добавление результата на страницу
		$(".q-res-deg-of-moti").text(sm); 
		
			
			//alert("Степень мотивации: " + Math.round(sm));
		}
         
		arrFinaly1 = []; // Очистка массива
	});

	
});