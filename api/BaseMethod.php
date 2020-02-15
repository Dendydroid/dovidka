<?php

/**
 * Class BaseMethod
 */
abstract class BaseMethod
{
    protected $requiredKeys = [];

    /**
     * @var JsonDatabase $jsonDatabase
     */
    protected $jsonDatabase;

    /**
     * BaseMethod constructor.
     */
    public function __construct()
    {
        $this->jsonDatabase = new JsonDatabase(Path::class);
    }

    /**
     * @param array $data
     * @throws Exception
     */
    protected function getRequiredKeys(array &$data)
    {
        $notSet = [];
        foreach ($this->requiredKeys as $requiredKey) {
            if (!isset($data[$requiredKey]) || empty($data[$requiredKey])) {
                $notSet[] = $requiredKey;
            }
        }
        foreach ($data as $key => $el){
            if(!in_array($key, $this->requiredKeys)){
                unset($data[$key]);
            }
        }
        if (!empty($notSet)) {
            $error = Constants::NO_REQUIRED_ERROR;
            $error["fields"] = $notSet;
            throw new Exception(json_encode($error));
        }
    }

    /**
     * @param array $data
     * @return array
     */
    protected function handleRequest(array $data)
    {
        return [];
    }
}