<?php
App::uses('AppController', 'Controller');
/**
 * CouponsCategories Controller
 *
 * @property CouponsCategory $CouponsCategory
 * @property PaginatorComponent $Paginator
 */
class CouponsCategoriesController extends AppController {

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
// */
//	public function index() {
//		$this->CouponsCategory->recursive = 0;
//		$this->set('couponsCategories', $this->Paginator->paginate());
//	}
//
///**
// * view method
// *
// * @throws NotFoundException
// * @param string $id
// * @return void
// */
//	public function view($id = null) {
//		if (!$this->CouponsCategory->exists($id)) {
//			throw new NotFoundException(__('Invalid coupons category'));
//		}
//		$options = array('conditions' => array('CouponsCategory.' . $this->CouponsCategory->primaryKey => $id));
//		$this->set('couponsCategory', $this->CouponsCategory->find('first', $options));
//	}
//
///**
// * add method
// *
// * @return void
// */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->CouponsCategory->create();
//			if ($this->CouponsCategory->save($this->request->data)) {
//				$this->Flash->success(__('The coupons category has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Flash->error(__('The coupons category could not be saved. Please, try again.'));
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
//		if (!$this->CouponsCategory->exists($id)) {
//			throw new NotFoundException(__('Invalid coupons category'));
//		}
//		if ($this->request->is(array('post', 'put'))) {
//			if ($this->CouponsCategory->save($this->request->data)) {
//				$this->Flash->success(__('The coupons category has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Flash->error(__('The coupons category could not be saved. Please, try again.'));
//			}
//		} else {
//			$options = array('conditions' => array('CouponsCategory.' . $this->CouponsCategory->primaryKey => $id));
//			$this->request->data = $this->CouponsCategory->find('first', $options);
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
//		$this->CouponsCategory->id = $id;
//		if (!$this->CouponsCategory->exists()) {
//			throw new NotFoundException(__('Invalid coupons category'));
//		}
//		$this->request->allowMethod('post', 'delete');
//		if ($this->CouponsCategory->delete()) {
//			$this->Flash->success(__('The coupons category has been deleted.'));
//		} else {
//			$this->Flash->error(__('The coupons category could not be deleted. Please, try again.'));
//		}
//		return $this->redirect(array('action' => 'index'));
//	}
}
