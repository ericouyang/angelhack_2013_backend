<?php

class Controller_Api extends Controller_Rest
{
    
  public function get_item()
  {
      return $this->response(
                    Model_Item::find('first', array(
                         'where' => array(
                              array('upc', Input::get('upc')),
                          )))
              );
  }
  public function get_transaction()
  {
      return $this->response(
                    Model_Transaction::query()
                    ->related('transaction_items')
                    ->related('transaction_items.item')
                    ->where('paypal_id', Input::get('id'))
                    ->get_one()
                );
  }
}