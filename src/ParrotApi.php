
<?php

class ParrotApi
{
    private $sendData = [];
    
    /**
     * post ajax request
     * @param  array  $params post parameter
     * @return this
     */
    public function postRequest(array $params)
    {
        $this->sendData['REQUEST_TYPE'] = 'POST';
        $this->setResponseData($params);
        return $this;
    }
    
    /**
     * get ajax request
     * @param  array  $params get parameter
     * @return this
     */
    public function getRequest(array $params)
    {
        $this->sendData['REQUEST_TYPE'] = 'GET';
        $this->setResponseData($params);
        return $this;
    }
    
    /**
     * @return this
     */
    public function noDataRequest()
    {
        $this->sendData['error'] = 'no set data.';
        return $this;
    }
    
    /**
     * response convert json
     * @return json
     */
    public function toJson()
    {
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($this->sendData);
    }
    
    /**
     * set response data
     * @param array $params GET or POST parameter
     */
    private function setResponseData(array $params)
    {
        foreach ($params as $key => $value) {
            if (empty($value)) {
                $this->sendData['data'] = '空だよ..(´；ω；`)ｳｯ';
            } else {
                $this->sendData[$key] = $value;
            }
        }
    }
}