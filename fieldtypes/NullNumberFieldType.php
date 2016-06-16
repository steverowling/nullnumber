<?php
/**
 * Null Number plugin for Craft CMS
 *
 * NullNumber FieldType
 *
 * --snip--
 * Whenever someone creates a new field in Craft, they must specify what type of field it is. The system comes with
 * a handful of field types baked in, and we’ve made it extremely easy for plugins to add new ones.
 *
 * https://craftcms.com/docs/plugins/field-types
 * --snip--
 *
 * @author    Steve Rowling
 * @copyright Copyright (c) 2016 Steve Rowling
 * @link      https://springworks.co.uk
 * @package   NullNumber
 * @since     1.0.0
 */

namespace Craft;

class NullNumberFieldType extends NumberFieldType
{
    /**
     * Returns the name of the fieldtype.
     *
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('Null Number');
    }

    /**
     * @inheritDoc IFieldType::defineContentAttribute()
     *
     * @return mixed
     */
    public function defineContentAttribute()
    {
        $attribute = ModelHelper::getNumberAttributeConfig($this->settings->min, $this->settings->max, $this->settings->decimals);
        $attribute['default'] = null;

        return $attribute;
    }

    /**
     * @inheritDoc ISavableComponentType::getSettingsHtml()
     *
     * @return string|null
     */
    public function getSettingsHtml()
    {
        return craft()->templates->render('nullnumber/settings', array(
            'settings' => $this->settings
        ));
    }

    /**
     * @inheritDoc IFieldType::getInputHtml()
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        if ($this->isFresh() && ($value < $this->settings->min || $value > $this->settings->max))
        {
            $value = null;
        }

        $vars = array(
            'name'  => $name,
            'size'  => $this->settings->inputSize,
            'value' => $value === null ? '' : craft()->numberFormatter->formatDecimal($value, false),
        );

        if ($this->settings['inputAlignment'])
        {
            $vars['style'] = 'direction: ' . $this->settings['inputAlignment'] . ';';
        }

        return craft()->templates->render('_includes/forms/text', $vars);
    }

    /**
     * @inheritDoc IFieldType::prepValueFromPost()
     *
     * @param mixed $data
     *
     * @return mixed
     */
    public function prepValueFromPost($data)
    {
        if ($data === '')
        {
            return null;
        }
        else
        {
            return LocalizationHelper::normalizeNumber($data);
        }
    }

    protected function getSettingsModel()
    {
        return new NullNumber_SettingsModel();
    }

}
