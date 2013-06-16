<?php
class Controller_Admin_Transaction_Item extends Controller_Admin 
{

	public function action_index()
	{
		$data['transaction_items'] = Model_Transaction_Item::find('all');
		$this->template->title = "Transaction_items";
		$this->template->content = View::forge('admin/transaction/item/index', $data);

	}

	public function action_view($id = null)
	{
		$data['transaction_item'] = Model_Transaction_Item::find($id);

		$this->template->title = "Transaction_item";
		$this->template->content = View::forge('admin/transaction/item/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Transaction_Item::validate('create');

			if ($val->run())
			{
				$transaction_item = Model_Transaction_Item::forge(array(
					'transaction_id' => Input::post('transaction_id'),
					'item_id' => Input::post('item_id'),
					'qty' => Input::post('qty'),
				));

				if ($transaction_item and $transaction_item->save())
				{
					Session::set_flash('success', e('Added transaction_item #'.$transaction_item->id.'.'));

					Response::redirect('admin/transaction/item');
				}

				else
				{
					Session::set_flash('error', e('Could not save transaction_item.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Transaction_Items";
		$this->template->content = View::forge('admin/transaction/item/create');

	}

	public function action_edit($id = null)
	{
		$transaction_item = Model_Transaction_Item::find($id);
		$val = Model_Transaction_Item::validate('edit');

		if ($val->run())
		{
			$transaction_item->transaction_id = Input::post('transaction_id');
			$transaction_item->item_id = Input::post('item_id');
			$transaction_item->qty = Input::post('qty');

			if ($transaction_item->save())
			{
				Session::set_flash('success', e('Updated transaction_item #' . $id));

				Response::redirect('admin/transaction/item');
			}

			else
			{
				Session::set_flash('error', e('Could not update transaction_item #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$transaction_item->transaction_id = $val->validated('transaction_id');
				$transaction_item->item_id = $val->validated('item_id');
				$transaction_item->qty = $val->validated('qty');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('transaction_item', $transaction_item, false);
		}

		$this->template->title = "Transaction_items";
		$this->template->content = View::forge('admin/transaction/item/edit');

	}

	public function action_delete($id = null)
	{
		if ($transaction_item = Model_Transaction_Item::find($id))
		{
			$transaction_item->delete();

			Session::set_flash('success', e('Deleted transaction_item #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete transaction_item #'.$id));
		}

		Response::redirect('admin/transaction/item');

	}


}