<?php
App::uses('AppController', 'Controller');
/**
 * Produtos Controller
 *
 * @property Produto $Produto
 * @property PaginatorComponent $Paginator
 */
class ProdutosController extends AppController {
    
    	public $components = array('Paginator');

        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow(array('index', 'destaque', 'maisvendidos', 'novos', 'ver'));
        }
        
        public function destaque($limit = 6){
            if($this->request->is('requested')){
                return $this->Produto->destaque($limit);
            }
        }
        
        public function maisVendidos($limit = 6){
            if($this->request->is('requested')){
                return $this->Produto->maisVendidos($limit);
            }
        }       
        
        public function novos($limit = 6){
            if($this->request->is('requested')){
                return $this->Produto->novos($limit);
            }
        }
        
	public function ver($slug = null) {            
		$conditions = array('Produto.slug'=>$slug);
		$produto = $this->Produto->find('first', compact('conditions'));
                
		if (empty($produto)) {
			throw new NotFoundException('Produto não encontrado');
		}

		$this->set(compact('produto'));

	}
        	
        public function index() {
		$this->Produto->recursive = 0;
		$this->set('produtos', $this->Paginator->paginate());
	}

	public function admin_index() {
		$this->Produto->recursive = 0;
		$this->set('produtos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Produto->exists($id)) {
			throw new NotFoundException(__('Invalid produto'));
		}
		$options = array('conditions' => array('Produto.' . $this->Produto->primaryKey => $id));
		$this->set('produto', $this->Produto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Produto->create();
			if ($this->Produto->save($this->request->data)) {
				$this->Session->setFlash(__('The produto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produto could not be saved. Please, try again.'));
			}
		}
		$parentProdutos = $this->Produto->ParentProduto->find('list');
		$usuarios = $this->Produto->Usuario->find('list');
		$categorias = $this->Produto->Categoria->find('list');
		$compras = $this->Produto->Compra->find('list');
		$this->set(compact('parentProdutos', 'usuarios', 'categorias', 'compras'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Produto->exists($id)) {
			throw new NotFoundException(__('Invalid produto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Produto->save($this->request->data)) {
				$this->Session->setFlash(__('The produto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Produto.' . $this->Produto->primaryKey => $id));
			$this->request->data = $this->Produto->find('first', $options);
		}
		$parentProdutos = $this->Produto->ParentProduto->find('list');
		$usuarios = $this->Produto->Usuario->find('list');
		$categorias = $this->Produto->Categoria->find('list');
		$compras = $this->Produto->Compra->find('list');
		$this->set(compact('parentProdutos', 'usuarios', 'categorias', 'compras'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Produto->id = $id;
		if (!$this->Produto->exists()) {
			throw new NotFoundException(__('Invalid produto'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Produto->delete()) {
			$this->Session->setFlash(__('The produto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The produto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        

}
