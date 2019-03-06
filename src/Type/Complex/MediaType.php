<?php

declare(strict_types=1);

namespace Vendi\Dumper\Type\Complex;

use Vendi\Dumper\Type\GenericComplex;

class MediaType extends GenericComplex
{
    protected $wordpress_id;

    public function set_wordpress_id(int $value)
    {
        $this->wordpress_id = $value;
    }

    public function get_values_for_serialization() : array
    {
        $ret = [];

        $ret['id'] = $this->wordpress_id;

        $obj = \get_post($this->wordpress_id);
        if ($obj instanceof \WP_Post) {
            $ret['alt'] = \get_post_meta($obj->ID, '_wp_attachment_image_alt', true);
            $ret['caption'] = $obj->post_excerpt;
            $ret['description'] = $obj->post_content;
            $ret['title'] = $obj->post_title;
        }

        $valid_keys = ['width', 'height', 'file'];
        $meta = \wp_get_attachment_metadata($this->wordpress_id);
        foreach ($valid_keys as $key) {
            if (array_key_exists($key, $meta)) {
                $ret[$key] = $meta[$key];
            }
        }

        // dd($meta);

        return $ret;
    }
}
