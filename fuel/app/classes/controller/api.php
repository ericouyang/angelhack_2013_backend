<?php

class Controller_Api extends Controller_Rest
{
    
  public function get_item()
  {
    if (Input::get('id') != null)
    {
      $item = Model_Item::find(Input::get('id'));
    }
    else if (Input::get('upc') != null)
    {
      $upc = Input::get('upc');
      if (strlen($upc) == 13) $upc = substr ($upc, 1);
      
      $item = Model_Item::find('first', array(
                           'where' => array(
                                array('upc', $upc),
                            )));
    }
    
    if ($item == null)
      return $this->response(array(
                 'error' => 'Item not found'
            ));
    else
      return $this->response($item);
  }
  
  public function get_transaction()
  {
    $transaction = Model_Transaction::query()
                    ->related('transaction_items')
                    ->related('transaction_items.item')
                    ->where('id', Input::get('id'))
                    ->get_one();
    if ($transaction == null)
      return $this->response(array(
                 'error' => 'Transaction not found'
            ));
    else
      return $this->response($transaction);
  }
  
  public function get_transaction_create()
  {
    $new = new Model_Transaction();
    $new->user_id = Input::get('user_id');
    $new->save();
    
    return $this->response($new->id);
  }
  
  public function get_transaction_item_add()
  {
    $new = new Model_Transaction_Item();
    $new->transaction_id = Input::get('transaction_id');
    $new->item_id = Input::get('item_id');
    $new->qty = Input::get('quantity') == null ? 1 : Input::get('quantity');
    $new->save();
    
    $new->item->qty = $new->item->qty - $new->qty;
    $new->item->save();
    
    return $this->response($new->id);
  }
  
  public function get_transaction_complete()
  {
    $transaction = Model_Transaction::find(Input::get('transaction_id'));
    $transaction->paypal_id = Input::get('paypal_id');
    $transaction->save();
  }
  
  public function get_transaction_item_update_quantity()
  {
    $transaction_item = Model_Transaction_Item::find(Input::get('id'));
    $quantity_added = $transaction_item->qty;
    $transaction_item->qty = Input::get('quantity') == null ? 1 : Input::get('quantity');
    $transaction_item->save();
    
    $transaction_item->item->qty = $transaction_item->item->qty + $quantity_added - $transaction_item->qty;
    $transaction_item->item->save();
  }
  
  public function get_transaction_item_delete()
  {
    $transaction_item = Model_Transaction_Item::find(Input::get('id'));
    $transaction_item->item->qty = $transaction_item->item->qty + $transaction_item->qty;
    $transaction_item->item->save();
    $transaction_item->delete();
  }
  
  public function get_transaction_delete()
  {
    $transaction = Model_Transaction::find(Input::get('id'));
    $transaction->delete();
  }
  
}