<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Banner Controller
 *
 * @property \App\Model\Table\BannerTable $Banner
 *
 * @method \App\Model\Entity\Banner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BannerController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Upload');
    }

    public function upload() {
        if (!empty($this->request->getData())) {
            return $this->Upload->send($this->request->getData('arquivo'));
        }
    }

    public function index() {
        $banner = $this->paginate($this->Banner);
        $this->set(compact('banner'));
    }

    public function view($id = null) {
        $banner = $this->Banner->get($id, [
            'contain' => []
        ]);
        $this->set('banner', $banner);
    }

    public function add() {
        $banner = $this->Banner->newEntity();
        if ($this->request->is('post')) {
            $arrBanner['titulo'] = $this->request->getData('titulo');
            $arrBanner['arquivo'] = $this->upload($this->request->getData('arquivo'));
            $banner = $this->Banner->patchEntity($banner, $arrBanner);
            if ($arrBanner['arquivo'] == 'erro_1') {
                $this->Flash->error(__('Extenção não permitida.'));
            } elseif ($arrBanner['arquivo'] == 'erro_2') {
                $this->Flash->error(__('Arquivo não enviado.'));
            } elseif ($this->Banner->save($banner)) {
                $this->Flash->success(__('Banner salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro, por favor tente novamente.'));
            }
        }
        $this->set(compact('banner'));
    }

    public function edit($id = null) {
        $banner = $this->Banner->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $arrBanner['id'] = $banner->id;
            $arrBanner['titulo'] = $this->request->getData('titulo');
            $arrBanner['arquivo'] = $this->upload($this->request->getData('arquivo'));
            $banner = $this->Banner->patchEntity($banner, $arrBanner);
            if ($arrBanner['arquivo'] == 'erro_1') {
                $this->Flash->error(__('Extenção não permitida.'));
            } elseif ($arrBanner['arquivo'] == 'erro_2') {
                $this->Flash->error(__('Arquivo não enviado.'));
            } elseif ($this->Banner->save($banner)) {
                $this->Flash->success(__('Banner salvo com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um erro, por favor tente novamente.'));
            }
        }
        $this->set(compact('banner'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $banner = $this->Banner->get($id);
        $filename = WWW_ROOT . 'uploads' . DS . $banner->arquivo;
        if ($this->Banner->delete($banner)) {
            unlink($filename);
            $this->Flash->success(__('Banner excluído com sucesso.'));
        } else {
            $this->Flash->error(__('The banner could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
