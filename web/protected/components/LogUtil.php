<?php

/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 16/7/26
 * Time: 下午11:37
 */
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LogUtil
{
    const ERROR_LEVEL_DEBUG = 1;
    const ERROR_LEVEL_INFO = 2;
    const ERROR_LEVEL_NOTICE = 3;
    const ERROR_LEVEL_WARNING = 4;
    const ERROR_LEVEL_ERROR = 5;
    const ERROR_LEVEL_CRITICAL = 6;
    const ERROR_LEVEL_EMERGENCY = 7;


    public static function log($title, $message, $error_level, $content, $file = 'error')
    {
        if (!is_array($content))
            $content = array($content);
        
        switch ($error_level) {
            case self::ERROR_LEVEL_DEBUG:
                self::addDebug($title, $message, $content, $file);
                break;
            case self::ERROR_LEVEL_INFO:
                self::addInfo($title, $message, $content, $file);
                break;
            case self::ERROR_LEVEL_NOTICE:
                self::addNotice($title, $message, $content, $file);
                break;
            case self::ERROR_LEVEL_WARNING:
                self::addWarning($title, $message, $content, $file);
                break;
            case self::ERROR_LEVEL_ERROR:
                self::addError($title, $message, $content, $file);
                break;
            case self::ERROR_LEVEL_CRITICAL:
                self::addCritical($title, $message, $content, $file);
                break;
            case self::ERROR_LEVEL_EMERGENCY:
                self::addEmergency($title, $message, $content, $file);
                break;
            default:
                self::addWarning($title, $message, $content, $file);
                break;
        }
    }

    private static function addDebug($title, $message, $content, $file)
    {
        $log = new Logger($title);
        $filePath = dirname(__FILE__) . "/../runtime/" . $file . '_' . date('Y-m-d') . '.log';
        $log->pushHandler(new StreamHandler($filePath), Logger::DEBUG);
        $log->addDebug($message, $content);
    }

    private static function addInfo($title, $message, $content, $file)
    {
        $log = new Logger($title);
        $filePath = dirname(__FILE__) . "/../runtime/" . $file . '_' . date('Y-m-d') . '.log';
        $log->pushHandler(new StreamHandler($filePath), Logger::INFO);
        $log->addInfo($message, $content);
    }

    private static function addNotice($title, $message, $content, $file)
    {
        $log = new Logger($title);
        $filePath = dirname(__FILE__) . "/../runtime/" . $file . '_' . date('Y-m-d') . '.log';
        $log->pushHandler(new StreamHandler($filePath), Logger::NOTICE);
        $log->addNotice($message, $content);
    }

    private static function addWarning($title, $message, $content, $file)
    {
        $log = new Logger($title);
        $filePath = dirname(__FILE__) . "/../runtime/" . $file . '_' . date('Y-m-d') . '.log';
        $log->pushHandler(new StreamHandler($filePath), Logger::WARNING);
        $log->addWarning($message, $content);
    }

    private static function addError($title, $message, $content, $file)
    {
        $log = new Logger($title);
        $filePath = dirname(__FILE__) . "/../runtime/" . $file . '_' . date('Y-m-d') . '.log';
        $log->pushHandler(new StreamHandler($filePath), Logger::ERROR);
        $log->addError($message, $content);
    }

    private static function addCritical($title, $message, $content, $file)
    {
        $log = new Logger($title);
        $filePath = dirname(__FILE__) . "/../runtime/" . $file . '_' . date('Y-m-d') . '.log';
        $log->pushHandler(new StreamHandler($filePath), Logger::CRITICAL);
        $log->addCritical($message, $content);
    }

    private static function addEmergency($title, $message, $content, $file)
    {
        $log = new Logger($title);
        $filePath = dirname(__FILE__) . "/../runtime/" . $file . '_' . date('Y-m-d') . '.log';
        $log->pushHandler(new StreamHandler($filePath), Logger::EMERGENCY);
        $log->addEmergency($message, $content);
    }


}