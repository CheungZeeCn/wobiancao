<?php
App::uses('AppController', 'Controller');
/**
 * ShopCategories Controller
 *
 * @property ShopCategory $ShopCategory
 * @property PaginatorComponent $Paginator
 */
class ShopCategoriesController extends AppController {

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
	//public function index() {
	//	$this->ShopCategory->recursive = 0;
	//	$this->set('shopCategories', $this->Paginator->paginate());
	//}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	//public function view($id = null) {
	//	if (!$this->ShopCategory->exists($id)) {
	//		throw new NotFoundException(__('Invalid shop category'));
	//	}
	//	$options = array('conditions' => array('ShopCategory.' . $this->ShopCategory->primaryKey => $id));
	//	$this->set('shopCategory', $this->ShopCategory->find('first', $options));
	//}

/**
 * add method
 *
 * @return void
// */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->ShopCategory->create();
//			if ($this->ShopCategory->save($this->request->data)) {
//				$this->Flash->success(__('The shop category has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Flash->error(__('The shop category could not be saved. Please, try again.'));
//			}
//		}
//	}
//
///**
// * edit method
// *
// * @throws NotFoundException
// * @param string $id
// * @return void
// */
//	public function edit($id = null) {
//		if (!$this->ShopCategory->exists($id)) {
//			throw new NotFoundException(__('Invalid shop category'));
//		}
//		if ($this->request->is(array('post', 'put'))) {
//			if ($this->ShopCategory->save($this->request->data)) {
//				$this->Flash->success(__('The shop category has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Flash->error(__('The shop category could not be saved. Please, try again.'));
//			}
//		} else {
//			$options = array('conditions' => array('ShopCategory.' . $this->ShopCategory->primaryKey => $id));
//			$this->request->data = $this->ShopCategory->find('first', $options);
//		}
//	}
//
///**
// * delete method
// *
// * @throws NotFoundException
// * @param string $id
// * @return void
// */
//	public function delete($id = null) {
//		$this->ShopCategory->id = $id;
//		if (!$this->ShopCategory->exists()) {
//			throw new NotFoundException(__('Invalid shop category'));
//		}
//		$this->request->allowMethod('post', 'delete');
//		if ($this->ShopCategory->delete()) {
//			$this->Flash->success(__('The shop category has been deleted.'));
//		} else {
//			$this->Flash->error(__('The shop category could not be deleted. Please, try again.'));
//		}
//		return $this->redirect(array('action' => 'index'));
//	}
}
