<?php

$phpVersion = phpversion();
if (version_compare($phpVersion, '7.3.0', '<'))
{
	die("PHP 7.3.0 or newer is required. $phpVersion does not meet this requirement. Please ask your host to upgrade PHP.");
}

$dir = __DIR__;
require($dir . '/src/Framework.php');


Framework::start($dir);


if (\Framework::requestUrlMatchesApi())
{
	\Framework::runApp('Framework\Api\App');
}
else
{
	\Framework::runApp('Framework\Pub\App');
}
