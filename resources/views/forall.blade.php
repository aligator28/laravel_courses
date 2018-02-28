    <div class="row justify-content-center">
    	<div class="col-md-8">
    		<div class="card card-default">
    			<div class="card-header">
					<h3>Что уже сделано</h3>
    			</div>


    			<div class="card-body">
    				<dl class="row">
                        <dt class="col-sm-3 alert alert-warning">Для желающих реального теста</dt>
                        <dd class="col-sm-9 alert alert-warning">Напишите свой реальный email, я зарегистрирую на mailgun.com, вы подтвердите, что хотите получать рассылку, и затем можно тестировать</dd>

    					<dt class="col-sm-3">Логин, регистрация</dt>
    					<dd class="col-sm-9">Стандартные Ларавел</dd>

    					<dt class="col-sm-3">Bunches, Subscriber, Templates, Campaign</dt>
    					<dd class="col-sm-9">
    						<p>Bunches <-> Subscribers многие ко многим</p>
    						<p>Bunches <-> Campaign один ко многим, т.е. у одного списка может быть много кампаний</p>
    						<p>Templates <-> Campaign один ко многим, т.е. у одного шаблона может быть много кампаний</p>
    					</dd>

    					<dt class="col-sm-3">Валидация полей</dt>
    					<dd class="col-sm-9">На стороне клиента только с помощью атрибутов тегов "required", "minlenght", "email".<br>

    					На стороне сервера с помощью вспомогательных классов Request</dd>

    					<dt class="col-sm-3 text-truncate">Рассылка почты</dt>
    					<dd class="col-sm-9">Письма приходять не в спам. Используется mailgun.com</dd>
						
						<dt class="col-sm-3">Пользователь видит только свои записи</dt>
    					<dd class="col-sm-9">Реализация через скоупы. Подписчиков видят ВСЕ.</dd>
                        <dt class="col-sm-3 text-truncate">Reports</dt>
                        <dd class="col-sm-9">Реализовано все, кроме находящихся в очереди (это не сложно, просто лень и нет времени). А вот с отписавшимися не понял, было интересно, но как реализовать?</dd>
         
                        <dt class="col-sm-3 text-truncate">Очереди</dt>
                        <dd class="col-sm-9">Понял, но запускать можно только локально, на моем реальном хостинге недоступно.</dd>
  
                        <dt class="col-sm-3">Теги [FNAME], [LNAME]</dt>
                        <dd class="col-sm-9">Сделано</dd>

                        <dt class="col-sm-3 text-truncate">Viewed</dt>
                        <dd class="col-sm-9">Сделано</dd>
    					
                        <dt class="col-sm-3 text-truncate">Лимит на отправку</dt>
                        <dd class="col-sm-9">Это реализовать несложно, нет времени</dd>

                        <dt class="col-sm-3">Отписка от рассылки</dt>
                        <dd class="col-sm-9">Сделано без написания причины по тегу [UNSUBSCRIBE]</dd>

    					</dd>
    				</dl>

    			</div>
    		</div>
    	</div>
    </div>

    <div class="row justify-content-center">
    	<div class="col-md-8">
    		<div class="card card-default">
    			<div class="card-header alert-warning">
					<h3>Трудности</h3>
    			</div>
    			<div class="card-body">
    				<dl class="row">
    					<dt class="col-sm-3">На реальном сервере не работают cron задачи (Observer)</dt>
    					<dd class="col-sm-9"><p>Сервер отвечает: "The Process class relies on proc_open, which is not available on your PHP installation."
    					</p>
    					<p>Локально почта запускается через dispatch()</p>
    					</dd>

    					<dt class="col-sm-3">Протестировать почту сложно.</dt>
    					<dd class="col-sm-9">
						<p>Необходимо регистрировать и подтверждать реальные адреса в mailgun.com (Ограничения бесплатного аккаунта).</p>
    					</dd>

                        <dt class="col-sm-3">Отчет по отписавшимися</dt>
                        <dd class="col-sm-9">
                        <p>Совсем не понял как сделать. В API Mailgun от этом ничего не нашел, только пост http://blog.mailgun.com/tracking-replies-in-mailgun-or-any-other-email/ по которому мало что понятно</p>
                        </dd>

                        <dt class="col-sm-3">Немного не понял очереди</dt>
                        <dd class="col-sm-9">
                        Как создавать и запускать - понятно, а вот как отправить несколько писем через очередь? В цикле?
                        </dd>

    				</dl>
    			</div>
    		</div>
    	</div>
    </div>