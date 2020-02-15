<?php

/**
 * Class Constants
 */
class Constants
{
    const BAD_DATA_RESPONSE_CODE = 400;
    const NOT_FOUND = 404;

    const NO_REQUIRED_ERROR = [
        "error" => "Required fields aren't set or empty.",
        "fields" => []
    ];

    const ADD_SUCCESS = [
        "status" => true,
        "message" => "Data was successfully added!"
    ];

    const ADD_FAILED = [
        "status" => false,
        "message" => "Data insert failed!"
    ];

    const BAD_JSON = [
        "status" => false,
        "message" => "Invalid JSON!"
    ];

    const DATA_WAS_NOT_FOUND = [
        "status" => false,
        "message" => "Data was not found!!"
    ];

    const DELETE_SUCCESS = [
        "status" => true,
        "message" => "Data was successfully deleted!"
    ];
}