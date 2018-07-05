<?php
/**
 * Created by PhpStorm.
 * User: XiaoLin
 * Date: 2018-06-29
 * Time: 12:13 PM
 */

define('CONFIG',[
    /**
     * WebSocket 服务器配置
     */
    'ws_host' => '0.0.0.0',
    'ws_port' => 9501,

    /**
     * 酷Q HTTP API 插件服务器地址
     */
    'CQ_HTTP_url' => 'http://127.0.0.1:5700',

    /**
     * cloudimage.io 密钥
     */
    'cloudimage_token' => 'f23rrwar3r',

    /**
     * Telegram Bot API Token
     */
    'bot_token' => '123456789:QWERTYUIPASFDGHJKLZXCVBM',

    /**
     * Telegram 管理员 CHAT ID
     */
    'admin_id' => '346077324',

    /**
     * 群组对应关系设置
     */
    'group_settings' => [
        12345678 => [
            'chat_id' => -87654321,
        ],
    ],

    /**
     * MySQL 数据库配置
     */
    'database' => [
        'host' => '127.0.0.1',
        'port' => 3306,
        'username' => 'username',
        'password' => 'password',
        'database' => 'database',
    ],

    /**
     * HTTP 代理配置
     */
    'HTTP_proxy_host' => '',
    'HTTP_proxy_port' => 0,

    /**
     * 是否保存消息(可能会占用大量内存)
     */
    'save_messages' => false,

    /**
     * 请求 Telegram API 服务器超时设置(单位s)
     */
    'http_timeout' => 10.0,
]);

