<?php

/**
 * Class SearchDataMethod
 */
class SearchDataMethod extends BaseMethod
{
    protected $requiredKeys = [
        "query"
    ];

    /**
     * @param array $data
     * @return array|false|string
     */
    public function handleRequest(array $data)
    {
        try {
            $this->getRequiredKeys($data);
        } catch (Exception $exception) {
            http_response_code(Constants::BAD_DATA_RESPONSE_CODE);
            return json_decode($exception->getMessage(), true);
        }
        $query = $data['query'];

        $result = [];
        $dbData = $this->jsonDatabase->getAll();
        foreach ($dbData as $number => $el) {
            foreach ($el as $rowNumber => $arr) {
                foreach ($arr as $key => $value) {
                    if (is_int(mb_strpos($key, $query)) || is_int(mb_strpos($value, $query))) {
                        $result[$number] = $el;
                        break;
                    }
                }
            }
        }
        return $result;
    }
}