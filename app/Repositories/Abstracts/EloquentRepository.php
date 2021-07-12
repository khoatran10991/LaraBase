<?php

namespace App\Repositories\Abstracts;

use App\Repositories\Interfaces\ModelBaseInterface;
use Illuminate\Support\Facades\Auth;

abstract class EloquentRepository implements ModelBaseInterface
{
	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $_model;

	/**
	 * EloquentRepository constructor.
	 */
	public function __construct()
	{
		$this->setModel();
	}

	/**
	 * @return mixed
	 */
	abstract protected function getModel();

	/**
	 * Set model
	 *
	 */
	private function setModel(): void
	{
		$this->_model = app()->make($this->getModel());
	}

	/**
	 * Get All
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all($columns = ['*'])
	{

		return $this->_model::all($columns);
	}

	/**
	 * Get one
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function find($id)
	{
		return $this->_model::find($id) ?? false;
	}

	/**
	 * Create
	 *
	 * @param array $attributes
	 *
	 * @return mixed
	 */
	public function create(array $attributes)
	{
		if ($this->_model->isFillable('CreatedBy') && !isset($attributes['CreatedBy'])) {
			$attributes['CreatedBy'] = Auth::id();
		}
		return $this->_model->create($attributes);
	}

	/**
	 * Update
	 *
	 * @param       $id
	 * @param array $attributes
	 *
	 * @return bool|mixed
	 */
	public function update($id, array $attributes)
	{
		$item = $this->_model->find($id);
		if ($item) {
			if ($this->_model->isFillable('UpdatedBy') && !isset($attributes['UpdatedBy'])) {
				$attributes['UpdatedBy'] = Auth::id();
			}
			return $item->update($attributes);
		}
		return false;
	}

	/**
	 * Delete
	 *
	 * @param $id
	 *
	 * @return bool
	 */
	public function delete($id)
	{
		$result = $this->find($id);
		if ($result) {
			$result->delete();
			return true;
		}
		return false;
	}

	/**
	 * Custom Soft Delete
	 *
	 * @param $id
	 * @return bool
	 */
	public function softDelete($id)
	{
		if ($item = $this->find($id)) {
			if ($this->_model->isFillable('UpdatedBy')) {
				$attributes['UpdatedBy'] = Auth::id();
			}
			$attributes['IsDeleted'] = 1;
			return $item->update($attributes);
		}
		return false;
	}

	/**
	 * Insert Or Ignore Duplicate Errors
	 *
	 * @param array $attributes
	 *
	 * @return mixed
	 */
	public function insertOrIgnore(array $attributes)
	{
		if ($this->_model->isFillable('CreatedBy')) {
			$attributes['CreatedBy'] = Auth::id();
		}
		if ($this->_model->isFillable('LastUpdatedBy')) {
			$attributes['LastUpdatedBy'] = Auth::id();
		}
		return $this->_model->insertOrIgnore($attributes);
	}

	public function updateOrInsert(array $condition,array $attributes)
	{
		if ($this->_model->isFillable('CreatedBy')) {
			$attributes['CreatedBy'] = Auth::id();
		}
		if ($this->_model->isFillable('LastUpdatedBy')) {
			$attributes['LastUpdatedBy'] = Auth::id();
		}
//		try {
//		}catch (\Exception $e){
//			dd($e->getMessage());
//		}
		$res = $this->_model->updateOrInsert($condition,$attributes);
		return $res->first();
	}

}