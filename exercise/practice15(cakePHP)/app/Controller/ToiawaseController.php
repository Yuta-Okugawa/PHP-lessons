<?php
/** 
 * /app/Controller/ToiawaseController.php
 */

class ToiawaseController extends AppController
{ 
    public $components = array('Security','RequestHandler');
    public $uses = array('Validate', 'Zipcode');
    

    
     public function beforeFilter() {
        $this->Security->requireAuth('index', 'confirm');
    }
    
    /*
     *Ajaxアクション
     */
    public function getZip(){
        $this->layout = "";
        $zipno = $this->request->query['zipcode'];
        $data = $this->Zipcode->find('all',
            array(
                'fields' => array('pref_name','city_name','add_name'),
                'conditions' => array('postal_code' => $zipno),
                'limit' => 1,
                'callbacks' => true,
            )
        );
        header('Content-type: application/json');
        print json_encode($data);  
    }
    
    
    /*
     *入力画面アクション
     */
    public function index(){
        $this->Session->write('inputedData',$this->request->data);
        $this->Validate->set($this->request->data);
        if($this->Validate->validates() ){
            $this->redirect('confirm');
        }
    }
    
    /*
     *確認画面アクション
     */
    public function confirm(){
        $inputedData = $this->Session->read('inputedData');
        $this->Validate->set($inputedData);
        if(!empty($this->request->data) && $this->Validate->validates()){
            $this->redirect('complete');
        }
    }
    
    /*
     *完了画面アクション
     */
    public function complete(){
        App::uses( 'CakeEmail', 'Network/Email');
        $inputedData = $this->Session->read('inputedData');
        $email = new CakeEmail('gmail');
        $email->from(array('yuta.okugawa@gmail.com'=>'test'));
        $email->to($inputedData['mail']);
        $email->subject('お問い合わせありがとうございます');
        
        $email->send($inputedData);
    }
}
    