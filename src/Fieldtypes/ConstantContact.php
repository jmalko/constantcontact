<?php

namespace Jmalko\ConstantContact\Fieldtypes;

use Statamic\Fields\Fieldtype;
use Jmalko\Constantcontact\Utils;

class ConstantContact extends Fieldtype
{
    /**
     * The blank/default value.
     *
     * @return array
     */
    public function defaultValue()
    {
        return null;
    }

    /**
     * Pre-process the data before it gets sent to the publish page.
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function preProcess($data)
    {
        return $data;
    }

    /**
     * Process the data before it gets saved.
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function process($data)
    {
        return $data;
    }
    protected function configFieldItems(): array
    {

        $lists = collect(Utils::fetchLists(Utils::makeClient()))->mapWithKeys(function($item, $key) {
            return [$item['list_id'] => __($item['name'])];
        })->toArray();

        return [
            'mode' => [
                'display' => 'Contact List',
                'instructions' => 'Choose which Contact List you want to use',
                'type' => 'select',
                'options' => $lists,
                'width' => 50
            ],
            'lists' => [
                'display' => __('Lists Available to Subscribe To'),
                'instructions' => __('statamic::fieldtypes.checkboxes.config.options'),
                'type' => 'array',
                'key_header' => __('Constant Contact Data Key'),
                'value_header' => __('Label').' ('.__('Optional').')',
                'default' => [
                    'email' => 'Email Address',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                ]
            ],
            'options' => [
                'display' => __('Fields Available to Collect'),
                'instructions' => __('statamic::fieldtypes.checkboxes.config.options'),
                'type' => 'array',
                'key_header' => __('Constant Contact Data Key'),
                'value_header' => __('Label').' ('.__('Optional').')',
                'default' => [
                    'email' => 'Email Address',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                ]
            ],
        ];
    }
}
