<?php

namespace Pixelco\Image\Templates;

use Pixelco\Image\Image;
use Pixelco\Image\Filters\FilterInterface;

class Small implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(120, 90);
    }
}
