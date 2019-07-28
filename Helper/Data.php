<?php

namespace TheCactus117\CacheDebug\Helper;

use TheCactus117\CacheDebug\Logger\Logger as CacheDebugLogger;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

/**
 * Helper Class Data.
 * @package TheCactus117\CacheDebug\Helper
 */
class Data extends AbstractHelper
{
    /**
     * Constants
     */
    const XML_PATH_CACHEDEBUG_ENABLED = 'cachedebug/general/enabled';

    const XML_PATH_CACHEDEBUG_TYPE = 'cachedebug/general/type';

    /**
     * @var CacheDebugLogger
     */
    protected $cacheDebugLogger;

    public function __construct(
        Context $context,
        CacheDebugLogger $cacheDebugLogger
    )
    {
        parent::__construct($context);
        $this->cacheDebugLogger = $cacheDebugLogger;
    }

    /**
     * Is module enabled.
     * @return boolean
     */
    public function isCacheDebugEnabled()
    {
        return (boolean) $this->scopeConfig->getValue(self::XML_PATH_CACHEDEBUG_ENABLED, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Is module enabled.
     * @return string
     */
    public function getCacheDebugType()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_CACHEDEBUG_TYPE, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Render block data without cache key.
     * @param array $blockData
     */
    public function renderBlockDataMissingCacheKey($blockData)
    {
        $blockData['description'] = 'Missing cache key';
        $this->renderBlockData($blockData);
    }

    /**
     * Render block data without cache lifetime.
     * @param array $blockData
     */
    public function renderBlockDataMissingCacheLifetime($blockData)
    {
        $blockData['description'] = 'Missing cache lifetime';
        $this->renderBlockData($blockData);
    }

    /**
     * Render block data according to debug type.
     * @param array $blockData
     */
    public function renderBlockData($blockData)
    {
        $logTxt = __($blockData['description']) . ' | ' .
            __('BLOCK : ') . $blockData['class'] . ' | ' .
            __('CACHE KEY : ') . $blockData['cacheKey'] . ' | ' .
            __('CACHE LIFETIME : ') . $blockData['cacheLifetime'] . ' | ' .
            __('NAME IN LAYOUT : ') . $blockData['nameInLayout'];
        switch ($this->getCacheDebugType()) {
            case 'log':
                $this->cacheDebugLogger->debug($logTxt);
                break;
            case 'frontend':
                echo $logTxt . '<br />';
                break;
        }
    }
}