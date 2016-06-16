<?php
namespace Craft;

class NullNumber_SettingsModel extends NumberFieldTypeSettingsModel
{
    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), array(
            'inputSize' => array(AttributeType::Number, 'min' => 1, 'default' => 5),
            'inputAlignment' => array(AttributeType::String),
        ));
    }
}
