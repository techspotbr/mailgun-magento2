<?php

namespace MageMontreal\Mailgun\Model\Config\Source;

class Endpoint implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'api.mailgun.net', 'label' => __('Mailgun API (live)')],
            ['value' => 'bin.mailgun.net', 'label' => __('Mailgun Postbin (debug)')]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'api.mailgun.net' => __('Mailgun API (live)'),
            'bin.mailgun.net' => __('Mailgun Postbin (debug)')
        ];
    }
}
