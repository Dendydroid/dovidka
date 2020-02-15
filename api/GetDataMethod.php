<?php

/**
 * Class GetDataMethod
 */
class GetDataMethod extends BaseMethod
{
    protected $requiredKeys = [];

    /**
     * @param array $data
     * @return mixed
     */
    public function handleRequest(array $data)
    {
        return $this->jsonDatabase->getAll();
    }

}