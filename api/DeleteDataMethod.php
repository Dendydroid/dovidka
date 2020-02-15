<?php

/**
 * Class DeleteDataMethod
 */
class DeleteDataMethod extends BaseMethod
{
    protected $requiredKeys = [
        "query"
    ];

    /**
     * @param array $data
     * @return array|string
     */
    public function handleRequest(array $data)
    {
        try {
            $this->getRequiredKeys($data);
        } catch (Exception $exception) {
            http_response_code(Constants::BAD_DATA_RESPONSE_CODE);
            return json_decode($exception->getMessage(), true);
        }
        $query = [];
        try{
            $query = json_decode($data["query"], true);
        }catch (Exception $exception){
            http_response_code(Constants::BAD_DATA_RESPONSE_CODE);
            return Constants::BAD_JSON;
        }
        if(empty($query)){
            http_response_code(Constants::NOT_FOUND);
            return Constants::DATA_WAS_NOT_FOUND;
        }

        $key = array_keys($query)[0];
        $value = $query[$key];

        $this->jsonDatabase->removeOne($key,$value);

        return Constants::DELETE_SUCCESS;
    }
}