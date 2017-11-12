<?php

namespace TobyMaxham\Coaster;

use CoasterCms\Models\Block;

/**
 * Class CoasterBlockHelper
 * @package TobyMaxham\Coaster
 * @author Tobias Maxham <git2017@maxham.de>
 */
class CoasterBlockHelper
{

    /**
     * @var array
     */
    protected $hasBlock = [];

    /**
     * @param $blockName
     * @return bool
     */
    public function hasBlock($blockName) : bool
    {
        if (isset($this->hasBlock[$blockName])) {
            return $this->hasBlock[$blockName];
        }
        return $this->hasBlock[$blockName] = Block::preloadClone($blockName)->exists;
    }
}
