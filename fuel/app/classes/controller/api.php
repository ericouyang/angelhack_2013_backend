<?php

class Controller_Api extends Controller_Rest
{

    public function get_items()
    {
        return $this->response(array(
            Model_Item::find('all')
        ));
    }
}