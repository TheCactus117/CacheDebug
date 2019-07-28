<?php

namespace TheCactus117\CacheDebug\Plugin;

use TheCactus117\CacheDebug\Helper\Data as CacheDebugHelper;
use Magento\Framework\View\Element\AbstractBlock;

/**
 * Plugin Class DebugBlock.
 * @package TheCactus117\CacheDebug\Plugin
 */
class DebugBlock
{
    /**
     * @var CacheDebugHelper
     */
    protected $cacheDebugHelper;

    /**
     * DebugBlock constructor.
     * @param CacheDebugHelper $cacheDebugHelper
     */
    public function __construct(
        CacheDebugHelper $cacheDebugHelper
    )
    {
        $this->cacheDebugHelper = $cacheDebugHelper;
    }

    /**
     * Report blocks without cache (lifetime or key).
     * @param AbstractBlock $subject
     */
    public function beforeToHtml(
        AbstractBlock $subject
    )
    {
        if ($this->cacheDebugHelper->isCacheDebugEnabled()) {
            $blockData = [
                'class' => get_class($subject),
                'cacheLifetime' => $subject->getData('cache_lifetime'),
                'cacheKey' => $subject->getCacheKey(),
                'nameInLayout' => $subject->getNameInLayout()
            ];

            if (empty($blockData['cacheKey'])) {
                $this->cacheDebugHelper->renderBlockDataMissingCacheKey($blockData);
            }
            if (empty($blockData['cacheLifetime'])) {
                $this->cacheDebugHelper->renderBlockDataMissingCacheLifetime($blockData);
            }
        }
    }
}