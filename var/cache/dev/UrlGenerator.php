<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '\\d+', 'code'], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    'index' => [[], ['_controller' => 'App\\Controller\\DefaultController::index'], [], [['text', '/']], [], []],
    'ej1' => [[], ['_controller' => 'App\\Controller\\DefaultController::ej1'], [], [['text', '/ej1']], [], []],
    'ej2' => [[], ['_controller' => 'App\\Controller\\DefaultController::ej2'], [], [['text', '/ej2']], [], []],
    'ej3' => [[], ['_controller' => 'App\\Controller\\DefaultController::ej3'], [], [['text', '/ej3']], [], []],
    'ej4' => [[], ['_controller' => 'App\\Controller\\DefaultController::ej4'], [], [['text', '/ej4']], [], []],
    'ej5' => [['id'], ['_controller' => 'App\\Controller\\DefaultController::ej5'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/ej5']], [], []],
    'ej6' => [[], ['_controller' => 'App\\Controller\\DefaultController::ej6'], [], [['text', '/ej6']], [], []],
    'ej7' => [[], ['_controller' => 'App\\Controller\\DefaultController::ej7'], [], [['text', '/ej7']], [], []],
    'ej8' => [[], ['_controller' => 'App\\Controller\\DefaultController::ej8'], [], [['text', '/ej8']], [], []],
];
