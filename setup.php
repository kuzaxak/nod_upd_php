<?php
// Подробное описание инсталяции и настройки см
//http://www.volmed.org.ru/wiki/index.php/Скрипт_по_обновлению_антивирусных_баз_NOD32_под_Linux_(PHP)

//Путь до директории хранения файлов
define("DEFAULT_SAVE_PATH","/var/lib/nod32");

//Имя пользователя, от которого работает WEB сервер
// В данном случае apache
define("HTTP_USER", "apache");


// Архиватор unrar, распостраняемый по GNU (https://gna.org/projects/unrar/)
$unrar='/usr/local/bin/unrar';

//Программа закачки файлов обновлений
// Если Вы хотите использовать wget разкоментируйте следующую строку
// Если она закоментирована, будет использоваться php-curl

$download_pr="wget";

// У меня, например, все что запускается из крона и выводит сообщения в консоль,
// отправляются на п/я root'а и пересылаются мне.
//Если нужно, что бы сообщения по обновлению баз дополнительно посылались 
// на определенный  п/я ящик, то снимаем ремарку со следующей строки и указываем 
// нужный адрес.

$user_mail="user@server";

// Но при этом дб настроен и запущен почтовый сервер (postfix, sendmail или другой).

/////////////////////////////////////////////////////
// Эта функция работает с версии php 5.1 и выше
// Если Вы хотите или должны использовать HTTP-Proxy, пожалуйста, разкоментируйте 
// следующую строку  укажите, что все что Вам нужно

// Возможен один из вариантов указанных ниже:
//
// $proxy = 'http://username:password@servername_OR_ip:port';
// $proxy = 'http://username@servername_OR_ip:port';
// $proxy = 'http://servername_OR_ip:port';
/////////////////////////////////////////////////////

// $quit=1 - Не отображать сообщения на консоли, кроме сообщений об ошибках
// $quit=0 - Отображать сообщения на консоли
$quiet=0;



$servers = array(
	array(
		// Адрес сервера (Если закачка с офа, то строку 'host' надо заремить)
		//'host'=>'http://www.kristel.ru/nod32/eset_upd/',
		// Web каталог для баз
		'www'=>'/var/www/nod32/',
		// Имя пользователя (может не присутствовать)
		//'user'=>'',
		'user'=>'EAV-12345662',
		// Пароль (может не присутствовать)
		//'password'=>'',
		'password'=>'qwerwgfwek5',
		// Если используется имя и пароль для доступа к базам, а 
		// файл update.ver и файлы бызы в одной директории на сервере, 
		// с которого скачиваются обновления, тогда "all_in_one'=>1,"
		// Для официальных серверов "all_in_one'=>0,"
		'all_in_one'=>0,
		//Закачивать ли программные компоненты (В большинстве случаев они 
		// не нужны и занимают только место на сервере) В прочем для V2 я бы оставил
		// Заремарте ненужные строки
		'compons'=>array(
			'0'=>'en',
			'1'=>'ru',
		),

		// Версия (дб обязательно)
		'type' => 'V2',
	),

	array(
		// Адрес сервера (Если закачка с офа, то строку 'host' надо заремить)
		//'host'=>'http://www.kristel.ru/nod32/eset_upd/',
		// Web каталог для баз
		'www'=>'/var/www/nod323/',
		// Имя пользователя (может не присутствовать)
		'user'=>'EAV-12345678',
		//'user'=>'',
		// Пароль (может не присутствовать)
		'password'=>'12345678k5',
		//'password'=>'',
		// Если используется имя и пароль для доступа к базам, а 
		// файл update.ver и файлы бызы в одной директории на сервере, 
		// с которого скачиваются обновления, тогда "all_in_one'=>1,"
		// Для официальных серверов "all_in_one'=>0,"
		'all_in_one'=>0,
		//Закачивать ли программные компоненты (В большинстве случаев они 
		// не нужны и занимают только место на сервере)
		// Заремарте ненужные строки
		'compons' => array(
			//'0'=>'en',
			//'1'=>'ru',
		),
		
		// ess
		// 0 - Если у Вас логин и пароль для версии NOD Antivirus
		// 1 - Если у Вас логин и пароль для версии NOD ESS
		'ess'=>1,                
		// Версия (дб обязательно)
		'type' => 'V3',
	),

);

?>