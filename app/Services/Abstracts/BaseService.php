<?php

namespace App\Services\Abstracts;

use App\Repositories\Abstracts\EloquentRepository;
use App\Repositories\Interfaces\ModelBaseInterface;
use App\Services\Interfaces\BaseServiceInterface;

abstract class BaseService implements BaseServiceInterface
{

    /**
     * @var EloquentRepository
     */
    protected $repository;

    public function __construct(ModelBaseInterface $baseRepository)
    {
        $this->repository = $baseRepository;
    }

    public function all()
    {
        // TODO: Implement all() method.
        return $this->repository->all();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->repository->find($id);
    }

    public function paginate(int $perPage = 10)
    {
        // TODO: Implement paginate() method.
        return $this->repository->paginate($perPage);
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
        return $this->repository->create($attributes);
    }

    public function update($id, array $attributes)
    {
        // TODO: Implement update() method.
        return $this->repository->update($id, $attributes);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        return $this->repository->delete($id);
    }
}