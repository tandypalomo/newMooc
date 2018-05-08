<?php

namespace IntecPhp;

use IntecPhp\View\Layout;
use IntecPhp\Middleware\AuthenticationMiddleware;

return [
    [
        'pattern' => '(/|/index|/home)',
        'callback' => function() {
            $layout = new Layout();
            $layout
            ->addScript('/js/home.min.js')
            ->render('home/home');
        },
    ],
    [
        'pattern' => '/aluno',
        'callback' => function() {
            $layout = new Layout();
            $layout
            ->addScript('/js/home-aluno.min.js')
            ->render('aluno/aluno');
        },
    ],
    [
        'pattern' => '/professor',
        'callback' => function() {
            $layout = new Layout();
            $layout
            ->addScript('/js/home-professor.min.js')
            ->render('professor/home');
        },
    ],
    [
        'pattern' => '/components',
        'callback' => function() {
            $layout = new Layout();
            $layout->render('home/bootstrap');
        },
    ],
    [
        'pattern' => '/validator',
        'callback' => function() {
            $layout = new Layout();
            $layout->render('home/validator');
        },
    ],
    [
        'pattern' => '/icons',
        'callback' => function() {
            $layout = new Layout();
            $layout
                ->addStylesheet('/css/icons.min.css')
                ->render('home/icons');
        }
    ],
    [
        'pattern' => '/ajax-form',
        'callback' => function() {
            $layout = new Layout();
            $layout
                ->render('home/ajax-form');
        }
    ],
    [
        'pattern' => '/ajax-form-submit',
        'callback' => function() {
            http_response_code(404);
            echo json_encode([
                'errorMessage' => 'O recurso solicitado não está mais disponível',
            ]);
        }
    ],
    //USER
    [
        'pattern' => '/cadastrar',
        'callback' => function() {
            Controller\Site::cadastrar();
        }
    ],
    [
        'pattern' => '/logar',
        'callback' => function() {
            Controller\Site::logar();
        }
    ],
    [
         'pattern' => '/sair',
         'callback' => function() {
             Controller\Site::logout();
         }
     ],
     //CURSO
     [
         'pattern' => '/cadastrar-curso',
         'callback' => function() {
             Controller\CursoController::cadastrarCurso();
         }
     ],
     [
         'pattern' => '/prof-get-curso',
         'callback' => function() {
             Controller\CursoController::getCurso();
         }
     ],
     [
         'pattern' => '/get-todos-cursos',
         'callback' => function() {
             Controller\CursoController::getAllCurso();
         }
     ],

     [
         'pattern' => '/excluir-curso',
         'callback' => function() {
             Controller\CursoController::deleteCurso();
         }
     ],
     //Aula
     [
         'pattern' => '/cadastrar-aula',
         'callback' => function() {
             Controller\CursoController::cadastrarAula();
         }
     ],
     [
         'pattern' => '/get-aula',
         'callback' => function() {
             Controller\CursoController::getAula();
         }
     ],
    [
        'pattern' => '/user-area',
        'middlewares' => [
            function($request) {
                AuthenticationMiddleware::isAuthenticated($request);
            },
        ],
        'callback' => function() {
            die('Acesso liberado');
        },
    ],
    [
        'pattern' => '/facebook/pages',
        'callback' => function() {
            $layout = new Layout();
            $layout
                ->addScript('/js/facebookPages.min.js')
                ->render('facebook/pages', Controller\FacebookController::page());
        }
    ],
    [
        'pattern' => '/facebook/page',
        'callback' => function() {
            $layout = new Layout();
            $layout
                ->addScript('/js/facebookPages.min.js')
                ->render('facebook/page', Controller\FacebookController::page());
        }
    ],
    [
        'pattern' => '/facebook/page/([a-zA-Z0-9]+)',
        'callback' => function($request) {
            Controller\FacebookController::getUserInfo($request);
        }
    ],
    [
        'pattern' => '/notify',
        'callback' => function($request) {
            Controller\EmailController::simpleEmail($request);
        }
    ]
];
