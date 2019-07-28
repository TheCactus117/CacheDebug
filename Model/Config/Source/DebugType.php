<?php

namespace TheCactus117\CacheDebug\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Model Class DebugType.
 * @package TheCactus117\CacheDebug\Model\Config\Source
 */
class DebugType implements ArrayInterface
{
    /**
     * Return array of options as value-label pairs.
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'log', 'label' => 'Log files'],
            ['value' => 'frontend', 'label' => 'Frontend']
        ];
    }
}