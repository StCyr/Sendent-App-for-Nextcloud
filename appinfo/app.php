<?php

OCP\Util::addScript('sendent', 'filelist');

\OC::$server->query(\OCA\Sendent\AppInfo\Application::class);
\OC::$server->query(\OCA\Sendent\Service\InitialLoadManager::class);
