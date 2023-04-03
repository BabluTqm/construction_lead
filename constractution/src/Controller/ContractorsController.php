<?php
declare(strict_types=1);
namespace App\Controller;
class ContractorsController extends AppController

{

    public function beforeFilter(\Cake\Event\EventInterface $event){
        parent::beforeFilter($event);
        $this->loadModel('Users');
        $this->loadModel('UserProfile');
        $this->loadModel('Projects');
        $this->loadModel('OwnerServices');
        $this->loadModel('UserServices');
        $this->loadModel('Services');
        $this->loadModel('OwnerServices');
        $this->loadModel('AssignedUsers');
        $this->loadModel('ContractorCredit');
        $this->viewBuilder()->setLayout('scgc_layout');
    }

/*********************ScGc Profile ********************** */

    public function gcscProfile()
    {
        $auth = $this->Authentication->getIdentity();
        $id = $auth->id;
        
            $result = $this->Users->get($id,['contain'=>['UserProfile']]);
            // $services = $this->paginate($this->Services->find('all')->contain(['UserServices'])->where(['service_status'=>1]));
            $services = $this->Services->find('all')->contain(['UserServices'=>function($q)use ($id){ return $q->where(['UserServices.user_id'=>$id]);}])->all();
            $userservices = $this->UserServices->find('all')->contain('Services')->where(['user_id'=>$id])->all();
            $this->viewBuilder()->setLayout('scgc_layout');
            $gcsc = $this->Users->get($id,['contain' => ['UserProfile']]);
           
            if ($this->request->is(['patch', 'post', 'put'])) {
                
                $data = $this->request->getData();
                if($result->complete_status == 0){
                    $data['complete_status'] = 1;
               }
                $user = $this->Users->patchEntity($gcsc, $data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The contractor profile has been updated .'));
                    return $this->redirect(['controller'=>'contractors','action' => 'assigned-project-list']);
                }
                $this->Flash->error(__('The contractor could not be updated. Please, try again.'));
            }
            $this->set(compact('gcsc','services' , 'auth','userservices','result'));
        
    }

/************************Assigned Project list********************* */

    public function assignedProjectList(){
        $auth = $this->Authentication->getIdentity();
        $uid = $auth->id;
        // dd($auth);
        $user = $this->Users->get($auth->id);
        if ($user->complete_status == 1) {
        $this->viewBuilder()->setLayout('scgc_layout');
        $result = $this->Users->get($uid,['contain'=>['UserProfile']]);
        $abc = $this->AssignedUsers->find('all')->contain(['ContractorCredit'])->all();
        $assignedUsers =  $this->AssignedUsers->find('all')->contain(['Projects.Users','Projects.UserProfile'])->where(['AssignedUsers.user_id'=>$auth->id,'AssignedUsers.credit_status'=>0])->toArray();
        $this->set(compact('assignedUsers','result'));
    } else {
        $this->Flash->error(__('First you have to complete your profile Then you can Access that page'));
        return $this->redirect(['controller' => 'contractors', 'action' => 'editProfile/'.$auth->id]);
    }
            
    }

    public function purchagedProjectList(){
        $auth = $this->Authentication->getIdentity();
        $uid = $auth->id;
        // dd($auth);
        $user = $this->Users->get($auth->id);
        if ($user->complete_status == 1) {
        $this->viewBuilder()->setLayout('scgc_layout');
        $result = $this->Users->get($uid,['contain'=>['UserProfile']]);

        //dd($result->own_status);
        // $purchedUsers =   $this->paginate($this->AssignedUsers->find('all')->contain(['Projects.Users','Projects.UserProfile','Users','UserProfile','Users.ContractorCredit','Projects'=>function($q){ return $q->where(['assigned_status'=>1,'delete_status'=>1]);}])->where(['AssignedUsers.user_id'=>$auth->id]));
        $purchedUsers =  $this->AssignedUsers->find('all')->contain(['Projects.Users','Projects.UserProfile'])->where(['AssignedUsers.user_id'=>$auth->id,'AssignedUsers.credit_status'=>1])->toArray();
        //dd($assignedUsers);
        $this->set(compact('purchedUsers','result'));
    } else {
        $this->Flash->error(__('First you have to complete your profile Then you can Access that page'));
        return $this->redirect(['controller' => 'contractors', 'action' => 'editProfile/'.$auth->id]);
    }
    }

/*********************Project Details************************ */
    public function projectDetails($id = null){
        $auth = $this->Authentication->getIdentity();
        $uid = $auth->id;
        $result = $this->Users->get($uid,['contain'=>['UserProfile']]);
        $assigned =  $this->AssignedUsers->find('all')->contain(['Projects.Users','Projects.UserProfile','Projects','Users','UserProfile'])->where(['AssignedUsers.id'=>$id])->first();
        $owner_services = $this->OwnerServices->find('all')->contain(['Services'])->where(['project_id'=>$assigned->project->id])->all();
        $this->set(compact('assigned','owner_services','result'));
    }


//=================Contractor Profile edit===================//

    public function editProfile($id = null)
    {
        $this->viewBuilder()->setLayout('scgc_layout');
        $auth = $this->Authentication->getIdentity();
        $uid = $auth->id;

        $result = $this->Users->get($uid,['contain'=>['UserProfile']]);
        $services = $this->Services->find('all')->contain(['UserServices'=>function($q)use ($id){ return $q->where(['UserServices.user_id'=>$id]);}])->all();
        $user = $this->Users->get($id, [
            'contain' => ['UserServices'],
        ]);
        $users = $this->Users->get($id, [
            'contain' => ['UserServices','UserProfile'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if($users->complete_status == 0){
                $data['complete_status'] = 1;
            }
            $users = $this->Users->patchEntity($users, $data);
/**********************double forech for check and delete already exist services********************* */ 
            foreach($users->user_services as $services){
            foreach($user->user_services as $service){
                if($services->service_id == $service->service_id){
                    
                    $del_service = $this->UserServices->get($service->id, [
                       
                    ]);
                   $this->UserServices->delete($del_service);
                }
                
            }}
           
            if ($this->Users->save($users)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'assigned-project-list']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        
        $this->set(compact('users','services','result','auth'));
    }

    // ================delete services=============//
    public function deteleServices(){
        $this->autoRender = false;
         $id = $this->request->getQuery('id');
         $uid = $this->request->getQuery('uid');
         $services = $this->UserServices->find('all')->where(['user_id'=>$uid ,'service_id'=>$id])->first();
        //  dd($services);
         if($services){
         if($this->UserServices->delete($services)){
            echo 1;
         }else{
            echo 0;
         }
        }       
    }

    /****************************** */

    public function ownStatus($id = null, $own_status)
    {
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
        if ($own_status == 1)
            $user->own_status = 0;
        else
            $user->own_status = 1;
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Your Account has update status')); {
                return $this->redirect(['controller' => 'Contractors','action' => 'assignedProjectList']);
            }
        }
    }
    /***************************************** */

}