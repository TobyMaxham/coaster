<?php
/**
 * Created by PhpStorm.
 * User: tmaxham
 * Date: 24.08.17
 * Time: 23:39
 */

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
