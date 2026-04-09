<?php

namespace Pixelco\Image\Templates;

use Pixelco\Image\Image;
use Pixelco\Image\Filters\FilterInterface;

class Large implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(480, 360);
    }
}
