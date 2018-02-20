    <div class="row justify-content-center">
    	<div class="col-md-8">
    		<div class="card card-default">
    			<div class="card-header">
					<h3>Что уже сделано</h3>
    			</div>


    			<div class="card-body">
    				<dl class="row">
    					<dt class="col-sm-3">Логин, регистрация</dt>
    					<dd class="col-sm-9">Стандартные Ларавел</dd>

    					<dt class="col-sm-3">Bunches, Subscriber, Templates, Campaign</dt>
    					<dd class="col-sm-9">
    						<p>Bunches <-> Subscribers многие ко многим</p>
    						<p>Bunches <-> Campaign один ко многим, т.е. у одного списка может быть много кампаний</p>
    						<p>Templates <-> Campaign один ко многим, т.е. у одного шаблона может быть много кампаний</p>
    					</dd>

    					<dt class="col-sm-3">Валидация полей</dt>
    					<dd class="col-sm-9">На стороне клиента только с помощью атрибутов тегов "required", "minlenght", "email"</dd>
    					<dd class="col-sm-9">На стороне сервера с помощью вспомогательных классов Request</dd>

    					<dt class="col-sm-3 text-truncate">Рассылка почты</dt>
    					<dd class="col-sm-9">Письма приходять не в спам. Используется mailgun.com</dd>
						
						<dt class="col-sm-3 text-truncate">Пользователь видит только свои записи</dt>
    					<dd class="col-sm-9">Реализация через скоупы. Подписчиков видят ВСЕ.</dd>
    					
    					</dd>
    				</dl>

    			</div>
    		</div>
    	</div>
    </div>

        <div class="row justify-content-center">
    	<div class="col-md-8">
    		<div class="card card-default">
    			<div class="card-header">
					<h3>Пока не сделано</h3>
    			</div>
    			<div class="card-body">
    				<dl class="row">
    					<dt class="col-sm-3"></dt>
 						<dd>Просмотр подписчков в списке должен быть доступер по URL такого вида:
http://laravel.loc/list/( list_id )/subscriber/ ( subscriber_id )</dd>
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

    				</dl>
    			</div>
    		</div>
    	</div>
    </div>