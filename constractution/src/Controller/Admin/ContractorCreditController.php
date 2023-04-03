<?php
declare(strict_types=1);

namespace App\Controller\Admin;
use App\Controller\AppController;
use App\Model\Entity\Service;

class ContractorCreditController extends AppController
{
   
    /*************set initial function to load all required Models and layout**************/
    public function initialize(): void
    {
        parent::initialize();
         $this->loadModel('SetCredit');
         $this->loadModel('Users');
         $this->loadModel('UserProfile');
         $this->loadModel('UserServices');
         $this->loadModel('Services');
        
    }

    /*************set credit globaly**************/
   
    public function setCredit()
    {
        $this->viewBuilder()->setLayout('admin_layout');
        $auth = $this->Authentication->getIdentity();
        $uid = $auth->id;
        $admin = $this->Users->get($uid,['contain'=>['UserProfile']]);
        $credit = $this->SetCredit->find('all')->where(['user_id'=>$uid])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $credit = $this->SetCredit->patchEntity($credit, $this->request->getData());
            if ($this->SetCredit->save($credit)) {
                $this->Flash->success(__('The credit has been saved.'));

                return $this->redirect(['action' => 'setCredit',$uid]);
            }
            $this->Flash->error(__('The credit could not be saved. Please, try again.'));
        }
        $this->set(compact('credit','admin'));
    }
   
    /************* all credit assign gc and sc**************/
    public function assignCredit()
    {
        $this->viewBuilder()->setLayout('admin_layout');
        // for navbar use 
        $auth = $this->Authentication->getIdentity();
        $admin = $this->Users->get($auth->id,['contain'=>['UserProfile']]);
        // total $credits get 
        $total_service = $this->Services->find('all')->toArray();
        $service_get = array();
        foreach($total_service as $credits){
            $service_get[] = $credits->id;
        }
        // assign credit list 
        $gc_credit = $this->UserServices->find('all')->distinct('UserServices.user_id')->contain(['Users.UserProfile','Users'=>function($q){ return $q->where(['Users.user_type'=>2,'Users.status'=>1,'Users.delete_status'=>1,'Users.approve_status'=>1]);}])->where(['service_id IN' => $service_get])->toArray();
        // sc credit
        $sc_credit = $this->UserServices->find('all')->distinct('UserServices.user_id')->contain(['Users.UserProfile','Users'=>function($q){ return $q->where(['Users.user_type'=>3,'Users.status'=>1,'Users.delete_status'=>1,'Users.approve_status'=>1]);}])->where(['service_id IN' => $service_get])->toArray();

        $this->set(compact('admin','gc_credit','sc_credit'));

    }

     /*************get credit add**************/
     public function getGcCredit()
     {
        $this->autoRender = false;
        if($this->request->is('ajax')){
            $id = $this->request->getQuery('id');
            $check_assign_credit = $this->ContractorCredit->find('all')->where(['user_id'=>$id])->first();        
            if($check_assign_credit){
                echo json_encode(['status'=>1,
                'data'=>$check_assign_credit]);
            }else{
                echo  json_encode(['status'=>0,
                'data'=>$id]);
            }
            
        }
    }

    public function addCredits(){
        $this->autoRender = false;
        if($this->request->is('ajax')){
           
            $id = $this->request->getData('user_id');
            // dd($id);
            $credit = $this->ContractorCredit->find('all')->where(['user_id'=>$id])->first();
            if($credit){
                $credit->total_credit+=$this->request->getData('total_credit');
                if ($this->ContractorCredit->save($credit)) {
                   echo 1;
                }else{
                    echo 0;
                }
            } else{
                $credits = $this->ContractorCredit->newEmptyEntity();
                $data = array();
                    if ($this->request->is('post')) {
                    $data['user_id'] = $this->request->getData('user_id'); 
                    $data['total_credit'] = $this->request->getData('total_credit'); 
                    $credits = $this->ContractorCredit->patchEntity($credits,$data);
                    if ($this->ContractorCredit->save($credits)) {
                        echo 1;
                    }else{
                        echo 0;
                    }

                }
            }
        }
    }
}
