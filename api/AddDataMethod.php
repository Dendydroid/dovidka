<?php

/**
 * Class AddDataMethod
 */
class AddDataMethod extends BaseMethod
{
    protected $requiredKeys = [
        "data"
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
        try{
            $insert = [json_decode($data["data"], true)];
        }catch (Exception $exception){
            http_response_code(Constants::BAD_DATA_RESPONSE_CODE);
            return Constants::BAD_JSON;
        }
        if(!empty($insert)){
            $this->jsonDatabase->addOne($insert);
        }else{
            http_response_code(Constants::BAD_DATA_RESPONSE_CODE);
            return Constants::ADD_FAILED;
        }

        return Constants::ADD_SUCCESS;
    }
}