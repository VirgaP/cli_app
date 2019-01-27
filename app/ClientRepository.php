<?php
/**
 * Created by PhpStorm.
 * User: virga
 * Date: 2019-01-27
 * Time: 16:07
 */

namespace App;


class ClientRepository
{

    protected $model;
    /**
     * ClientRepository constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->model = $client;
    }
    /**
     * @param array $data
     * @return Client
     */
    public function createClient(array $data) : Client
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @return Client
     */
    public function findClient(int $id) : Client
    {

        return $this->model->findOrFail($id);

    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateClient(array $data) : bool
    {

        return $this->model->update($data);

    }

    /**
     * @return bool
     */
    public function deleteClient() : bool
    {
        return $this->model->delete();
    }


}