<?php
return [
 'default'=>env('LOG_CHANNEL','stack'),
 'channels'=>[
  'stack'=>['driver'=>'stack','channels'=>['single'],'ignore_exceptions'=>false],
  'single'=>['driver'=>'single','path'=>storage_path('logs/laravel.log'),'level'=>env('LOG_LEVEL','debug'),'replace_placeholders'=>true],
  'daily'=>['driver'=>'daily','path'=>storage_path('logs/laravel.log'),'level'=>env('LOG_LEVEL','debug'),'days'=>14],
  'stderr'=>['driver'=>'monolog','level'=>'debug','handler'=>Monolog\Handler\StreamHandler::class,'with'=>['stream'=>'php://stderr']],
  'null'=>['driver'=>'monolog','handler'=>Monolog\Handler\NullHandler::class],
 ],
];
