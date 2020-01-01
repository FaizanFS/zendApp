<?php

/**
 * Class Customer_Form_Vehicle
 */
class Customer_Form_Vehicle extends Zend_Form
{
    /**
     * Init form.
     *
     * @throws Zend_Form_Exception
     */
    public function init() {
        $brand = $this->createElement('text', 'brand', [
            'label' => 'Brand :',
            'required' => 'true'
        ]);

        $model = $this->createElement('text', 'model', [
            'label' => 'Model :',
            'required' => 'true'
        ]);

        $reg = $this->createElement('text', 'reg_year', [
            'label' => 'Registration : ',
            'required' => 'true'
        ]);

        $button = $this->createElement('submit', 'addVehicle', ['label' => 'Add Vehicle']);

        $elements = [
            $brand,
            $model,
            $reg,
            $button
        ];

        $this->addElements($elements);
    }
}
