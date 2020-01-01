<?php

/**
 * Class Customer_OperationController
 */
class Customer_OperationController extends Zend_Controller_Action
{
    /**
     * List action.
     */
    public function listAction()
    {
        $vehicleForm = new Customer_Form_Vehicle();

        if ($this->_request->isPost()) {
            $postData = $this->getRequest()->getParams();
            $isValid = $vehicleForm->isValid($postData);
            if ($isValid) {
                $customerService = new Customer_Service_Operation();
                $customerService->insert($postData);
            }
        }

        /*if (true) {
            $this->render();
            return;
        }*/

        $this->view->vehicleForm = $vehicleForm;
    }

    /**
     * Vehicles action.
     *
     * @return mixed
     */
    public function vehiclesAction()
    {
        $customerService = new Customer_Service_Operation();
        return $this->_helper->json(['data' => $customerService->selectAllVehicle()]);
    }
}
