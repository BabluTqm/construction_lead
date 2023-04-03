<?php

declare(strict_types=1);
namespace App\Controller;

    class ProjectsController extends AppController
    {
        public function initialize(): void{
            parent::initialize();

            $this->Model = $this->loadModel('UserProfile');
            $this->Model = $this->loadModel('Users');
            $this->Model = $this->loadModel('Services');
            $this->Model = $this->loadModel('Projects');
            $this->Model = $this->loadModel('AssignedUsers');
            $this->Model = $this->loadModel('OwnerServices');
            
        }

/********************ProjectList requested by owner*********************/
    public function requestedProjectList()
    {
        $auth = $this->Authentication->getIdentity();
        $user = $this->Users->get($auth->id);
        // dd($auth);
        if ($user->complete_status == 1) {
            if ($auth->user_type == 1) {

                $uid = $auth->id;
                $this->viewBuilder()->setLayout('owner_layout');
                $result = $this->Users->get($uid, ['contain' => ['UserProfile']]);
                $projects = $this->Projects->find('all')->where(['user_id' => $uid,'delete_status'=>1])->all();
                $this->set(compact('projects', 'result'));
            } else {
                $this->Flash->error(__('You are not authorize to access that page'));
                return $this->redirect(['controller' => 'contractors', 'action' => 'assigned-project-list']);
            }
        } else {
            $this->Flash->error(__('First you have to complete your profile Then you can Access that page'));
            return $this->redirect(['controller' => 'users', 'action' => 'ownerProfile']);
        }
    }

/******************** function to request new project*********************/

    public function requestNewProject()
    {
        $this->viewBuilder()->setLayout('owner_layout');
        $auth = $this->Authentication->getIdentity();
        $user = $this->Users->get($auth->id);
        // dd($auth);
        if ($user->complete_status == 1) {
        $uid = $auth->id;
        $result = $this->Users->get($uid, ['contain' => ['UserProfile']]);
        if ($auth->user_type == 1) {
            $services = $this->paginate($this->Services);
            $project = $this->Projects->newEmptyEntity();
            if ($this->request->is('post')) {
                $project['user_id'] = $auth->id;
                $project = $this->Projects->patchEntity($project, $this->request->getData());
                if ($this->Projects->save($project)) {
                    $this->Flash->success(__('The project has been created.'));

                    return $this->redirect(['controller' => 'projects', 'action' => 'requested-project-list']);
                }
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
            $this->set(compact('project', 'services', 'auth', 'result'));
        } else {
            $this->Flash->error(__('You are not authorize to access that page'));
            return $this->redirect(['controller' => 'contractors', 'action' => 'assigned-project-list']);
        }
    } else {
        $this->Flash->error(__('First you have to complete your profile Then you can Access that page'));
        return $this->redirect(['controller' => 'users', 'action' => 'ownerProfile']);
    }
    }

/********************function to viewContractor*********************/
    public function viewContractor($id = null){
            $this->viewBuilder()->setLayout('owner_layout');
            $auth = $this->Authentication->getIdentity();
            $uid = $auth->id;
            $result = $this->Users->get($uid, ['contain' => ['UserProfile']]);
            $assignuser = $this->AssignedUsers->find('all')->select(['user_id'])->where(['project_id' => $id])->all();
            $users = $this->Users->find('all')->contain(['UserProfile'])->all();

            $this->set(compact('users', 'assignuser', 'result'));
    }


/********************project edit*********************/

    public function editProject($id = null)
    {
        $this->viewBuilder()->setLayout('owner_layout');
        $auth = $this->Authentication->getIdentity();
        $uid = $auth->id;
        $result = $this->Users->get($uid,['contain'=>['UserProfile']]);
        $services = $this->Services->find('all')->contain(['OwnerServices'=>function($q)use ($id){ return $q->where(['OwnerServices.project_id'=>$id]);}])->all();
        $project = $this->Projects->get($id, [
            'contain' => ['OwnerServices'],
        ]);
        $projects = $this->Projects->get($id, [
            'contain' => ['OwnerServices'],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            // dd($this->request->getData());
            $projects = $this->Projects->patchEntity($projects, $this->request->getData());
            // dd($projects);
            $projects['user_id']=$auth->id;
    /********double forech for check and delete already exist services************* */ 

            foreach($projects->owner_services as $services){
            foreach($project->owner_services as $service){
                if($services->service_id == $service->service_id){
                    $del_service = $this->OwnerServices->get($service->id, [
                       
                    ]);
                   $this->OwnerServices->delete($del_service);
                }
                
            }}
            if ($this->Projects->save($projects)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'requested-project-list']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $users = $this->Projects->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('project', 'users','services','result'));
    }

/********************uncheck services required by owner*********************/
    public function deteleServices(){
        $this->autoRender = false;
         $id = $this->request->getQuery('id');
         $pid = $this->request->getQuery('pid');
         $services = $this->OwnerServices->find('all')->where(['project_id'=>$pid ,'service_id'=>$id])->first();
         if($services){
         if($this->OwnerServices->delete($services)){
            echo 1;
         }else{
            echo 0;
         }
        }       
    }
/********************uncheck services required by owner*********************/
    public function deteleAllServices(){
        $this->autoRender = false;
        $id = $this->request->getData('id');
        $pid = $this->request->getData('pid');
        $services = $this->OwnerServices->find('all')->where(['project_id'=>$pid,'service_id IN'=>$id])->all();
        if($this->OwnerServices->deleteMany($services)){
            echo 1;
        }else{
            echo 0;
        }
    }
}

