
<?php

class test
{
    private $sendData = [];

    public static function forge()
    {
        return new self();
    }

    public function render()
    {
        include('../views/demo.php');
    }

    public function receiveAjaxRequest($id)
    {
        $this->sendData['radio'] = $this->stb_radio($id);
        $this->sendData['text']  = $this->stb_text($id);
        return $this;
    }

    public function toJson()
    {
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($this->sendData);
        exit;
    }

    public function stb_radio($id = 1)
    {
        switch ($id) {
            case 1:
                $ret = ['checked' => '1'];
                break;
            case 2:
                $ret = ['checked' => '2'];
                break;
        }
        return $ret;
    }

    public function stb_text($id = 1)
    {
        switch ($id) {
            case 1:
                $ret = [
                    'text_1' => 'test',
                    'text_2' => 'testtest',
                    'text_3' => 'testtesttest',
                ];
                break;
            case 2:
                $ret = [
                    'text_1' => 'test',
                    'text_2' => 'testtest',
                    'text_3' => 'testtesttest',
                ];
                break;
        }
        return $ret;
    }

}

//ajaxリクエスト取得用
if (isset($_POST['request'])) {
    $id = $_POST['request'];
    test::forge()->receiveAjaxRequest($id)->toJson();
}

//render
test::forge()->render();
