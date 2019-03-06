<?php

declare(strict_types=1);

namespace Vendi\Dumper\Type\Complex;

use Vendi\Dumper\Type\GenericComplex;
use Vendi\Dumper\Type\Scalar\Text;

class ImageType extends GenericComplex
{
    public $headshot;

    public function set_url(string $value)
    {
        $this->set_value('url', new Text($value));
    }
}
