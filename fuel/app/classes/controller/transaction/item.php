<?php
class Controller_Transaction_Item extends Controller_Template{

	public function action_index()
	{
		$data['transaction_items'] = Model_Transaction_Item::find('all');
		$this->template->title = "Transaction_items";
		$this->template->content = View::forge('transaction\item/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('transaction/item');

		if ( ! $data['transaction_item'] = Model_Transaction_Item::find($id))
		{
			Session::set_flash('error', 'Could not find transaction_item #'.$id);
			Response::redirect('transaction/item');
		}

		$this->template->title = "Transaction_item";
		$this->template->content = View::forge('transaction\item/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Transaction_Item::validate('create');
			
			if ($val->run())
			{
				$transaction_item = Model_Transaction_Item::forge(array(
					'transcation_id' => Input::post('transcation_id'),
					'item_id' => Input::post('item_id'),
				));

				if ($transaction_item and $transaction_item->save())
				{
					Session::set_flash('success', 'Added transaction_item #'.$transaction_item->id.'.');

					Response::redirect('transaction/item');
				}

				else
				{
					Session::set_flash('error', 'Could not save transaction_item.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Transaction_Items";
		$this->template->content = View::forge('transaction\item/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('transaction/item');

		if ( ! $transaction_item = Model_Transaction_Item::find($id))
		{
			Session::set_flash('error', 'Could not find transaction_item #'.$id);
			Response::redirect('transaction/item');
		}

		$val = Model_Transaction_Item::validate('edit');

		if ($val->run())
		{
			$transaction_item->transcation_id = Input::post('transcation_id');
			$transaction_item->item_id = Input::post('item_id');

			if ($transaction_item->save())
			{
				Session::set_flash('success', 'Updated transaction_item #' . $id);

				Response::redirect('transaction/item');
			}

			else
			{
				Session::set_flash('error', 'Could not update transaction_item #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$transaction_item->transcation_id = $val->validated('transcation_id');
				$transaction_item->item_id = $val->validated('item_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('transaction_item', $transaction_item, false);
		}

		$this->template->title = "Transaction_items";
		$this->template->content = View::forge('transaction\item/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('transaction/item');

		if ($transaction_item = Model_Transaction_Item::find($id))
		{
			$transaction_item->delete();

			Session::set_flash('success', 'Deleted transaction_item #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete transaction_item #'.$id);
		}

		Response::redirect('transaction/item');

	}


}