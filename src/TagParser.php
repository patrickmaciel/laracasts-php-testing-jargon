<?php

namespace App;

use function preg_split;

class TagParser
{
    public function parse(string $tags)
    {
        return preg_split('/ ?[,|] ?/', $tags);
    }
}
