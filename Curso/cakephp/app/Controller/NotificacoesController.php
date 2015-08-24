<?php
App::uses('AppController', 'Controller');
/**
 * Notificacoes Controller
 *
 * @property Notificacao $Notificacao
 * @property PaginatorComponent $Paginator
 */
class NotificacoesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Notificacao->recursive = 0;
		$this->set('notificacoes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Notificacao->exists($id)) {
			throw new NotFoundException(__('Invalid notificacao'));
		}
		$options = array('conditions' => array('Notificacao.' . $this->Notificacao->primaryKey => $id));
		$this->set('notificacao', $this->Notificacao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Notificacao->create();
			if ($this->Notificacao->save($this->request->data)) {
				$this->Session->setFlash(__('The notificacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notificacao could not be saved. Please, try again.'));
			}
		}
		$compras = $this->Notificacao->Compra->find('list');
		$this->set(compact('compras'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Notificacao->exists($id)) {
			throw new NotFoundException(__('Invalid notificacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Notificacao->save($this->request->data)) {
				$this->Session->setFlash(__('The notificacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notificacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Notificacao.' . $this->Notificacao->primaryKey => $id));
			$this->request->data = $this->Notificacao->find('first', $options);
		}
		$compras = $this->Notificacao->Compra->find('list');
		$this->set(compact('compras'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Notificacao->id = $id;
		if (!$this->Notificacao->exists()) {
			throw new NotFoundException(__('Invalid notificacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Notificacao->delete()) {
			$this->Session->setFlash(__('The notificacao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The notificacao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
