
# QQ2TG
帮助QQ与Telegram互联的小程序

第一次写文档，写的不好还请多多指教 )

## 灵感
最近新入手了一台万普拉斯，艹了几天之后发现除了屏幕外就是QQ最耗电了，几乎占了7%，再加上以前就有这个念头，又正好是暑假，就挖了这个无底洞

## 简述
这个程序主体使用`PHP`编写，依赖于拓展`swoole`，配合酷Q的[coolq-http-api](https://github.com/richardchien/coolq-http-api)插件使用

目前还不是十分完善，可能存在消息转发不及时、各种报错，还请各位dalao指点一二

## Feature
- 使用 `Swoole` 的异步 HTTP Client 请求 Telegram Bot API 服务器
- 将QQ图片缓存为 Telegram File ID , 提高效率
- 拓展性较高, 可轻松支持一个新的 CQ 码或 Telegram 消息格式
实在编不出来了...  /滑稽

## 使用
1. 将代码拖到本地 :  ```git clone https://github.com/XiaoLin0815/QQ2TG.git```
2. 将`config\Config.example.php`改名为`config\Config.php`并填写完整
    - `ws_host`/`ws_port` :  `String/Int` 本地`websocket`的主机和端口
    - `CQ_HTTP_url` :  `String` 酷Q HTTP-API的HTTP服务器地址
    - `cloudimage_token` :  `String` 用于将`webp`格式的sicker转换为jpg的api token, 地址[在此](https://www.cloudimage.io)，一定限度内免费
    - `bot_token` :  `String` Telegram Bot API token, Telegram `@BotFather`获取
    - `admin_id` :  `Int` Telegram 管理员的 `chat_id`, 目前用于发送性能调试数据
    - `group_settings` :  `Array` 配置QQ群组与Telegram群组的对应关系, 请按照示例添加
    - `database` :  `Array` MySQL数据库基本信息(后续可能会支持更多数据库)
    - `HTTP_proxy_host/port` :  `String/Int` HTTP代理, 用于请求Telegram服务器
    - `save_messages` : `Boolean` 是否保存群消息(可能会占用大量内存)
3. 安装酷Q(若要发送图片则要求安装Pro版本)以及[coolq-http-api](https://github.com/richardchien/coolq-http-api)插件，并添加配置以下参数:
    - use_ws_reverse :  使用反向 WebSocket 通讯
    - ws_reverse_api_url/ws_reverse_event_url ： 反向WS服务器地址，对应操作2中配置的`ws_host`/`ws_port`
    - host/port/use_http :  HTTP服务器设置，对应操作2中配置的`CQ_HTTP_url`
    ```
    "use_ws_reverse": true,
    "ws_reverse_api_url": "ws://192.168.31.120:9501",
    "ws_reverse_event_url": "ws://192.168.31.120:9501",
    
    "host": "0.0.0.0",
    "port": 5700,
    "use_http": true,
    ```
4. 确保您本地配置好科学上网工具或填写好了`HTTP_proxy_host/port`(若不需要请留空)
5. 确保您的PHP已安装了`swoole`扩展
6. 进入目录, 输入```composer update```
7. 输入```php run.php```
8. 在网站环境中设置 `/WebHook` 为运行目录
8. 访问 `https://api.telegram.org/bot<bot_token>/setWebHook?url=https://<Your_URL>/WebHook.php` 设置WebHook, 若认为不安全, 可自行改变文件名
9. enjoy it

## 问题
现在可能会出现消息**错乱**等情况，应该会在以后的版本中进行修正

若要修改消息样式，可前往 `core\Event\GroupMessage.php` 自行修改

**有可能**会出现程序运行时意外退出，若出现请将控制台输出日志提交为Issue，如果不弃坑的话应该会帮助解答/修正的

QQ中的表情包(不包括漫游表情等图片表情)暂未找到方法获取，若找到方法会添加的

## TODO
- ~~异步消息发送~~
- ~~图片信息缓存~~
- ~~用户群名片缓存~~
- 支持私聊消息
- 更多CQ码兼容

dalao们如果有任何问题或者建议请在Issue中提出直接提交PR，感谢万分

## 题外话
毕竟初中生, 就是头脑简单四肢发达, 思维一坨屎, 英语极差, 导致代码里很多奇怪或者重复的变量名, 还请多多包涵,
有些地方代码质量不高、效率低下, 或者结构有问题的, 还请 dalao 们多多指点 

或许真的要像[LWL](https://lwl.moe)说的那样`变得更优秀`吧

## 更新日志
2018/07/05 添加图片信息缓存、消息异步发送、群名片缓存, 支持保存消息
2018/07/02 第一版，支持QQ与Telegram消息双向互通，支持图片、sticker发送