<?php

namespace TheCactus117\CacheDebug\Logger;

use Magento\Framework\Logger\Handler\Base;

/**
 * Logger Class Handler.
 * @package TheCactus117\CacheDebug\Logger
 */
class Handler extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/cachedebug.log';

    /**
     * @var int
     */
    protected $loggerType = Logger::DEBUG;
}