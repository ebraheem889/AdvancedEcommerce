<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

class Repository implements \App\Http\Interfaces\RepositoryInterface
{

    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;

    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }


    public function update(array $data ,$id)
    {
        $record = $this->model->find($id);
        return $record->update();
    }

    public function destroy($id)
    {
        $record = $this->model->destroy($id);

    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getModel(){

        return $this->model;
    }

    public function setModel($model){

            $this->model = $model;
            return $this;
    }

    public function With($relations){

            return $this->model->with($relations);

    }
}
