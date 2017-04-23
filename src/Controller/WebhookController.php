<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Webhook Controller
 *
 * @property \App\Model\Table\WebhookTable $Webhook
 */
class WebhookController extends AppController
{

    public function index(){
        $this->viewBuilder()->layout(false);
    }
}
