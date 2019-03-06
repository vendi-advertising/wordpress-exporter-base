<?php declare(strict_types=1);

namespace Vendi\Dumper\Transformers;

use Vendi\Dumper\Type\Complex\MediaType;
use Vendi\Dumper\Type\GenericComplex;

class ImageTransformer extends TransformerBase
{
    public function transform_html(string $html) : ?GenericComplex
    {
        if (!$html) {
            return null;
        }

        $result = preg_match('/wp-image-(?<image_id>\d+)/', $html, $matches);
        if (false === $result) {
            throw new \Exception('Could not transform');
        }

        if (0 === count($matches)) {
            throw new \Exception('No Image ID');
        }

        if ($matches && array_key_exists('image_id', $matches)) {
            $ret = new MediaType();
            $ret->set_wordpress_id((int) $matches['image_id']);
            return $ret;
        }

        throw new \Exception('Image transform case not handled');
    }
}
