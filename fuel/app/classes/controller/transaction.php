<?php
class Controller_Transaction extends Controller_Template{

	public function action_index()
	{
		$data['transactions'] = Model_Transaction::find('all');
		$this->template->title = "Transactions";
		$this->template->content = View::forge('transaction/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('transaction');

		if ( ! $data['transaction'] = Model_Transaction::find($id))
		{
			Session::set_flash('error', 'Could not find transaction #'.$id);
			Response::redirect('transaction');
		}

		$this->template->title = "Transaction";
		$this->template->content = View::forge('transaction/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Transaction::validate('create');
			
			if ($val->run())
			{
				$transaction = Model_Transaction::forge(array(
					'user_id' => Input::post('user_id'),
					'paypal_id' => Input::post('paypal_id'),
				));

				if ($transaction and $transaction->save())
				{
					Session::set_flash('success', 'Added transaction #'.$transaction->id.'.');

					Response::redirect('transaction');
				}

				else
				{
					Session::set_flash('error', 'Could not save transaction.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Transactions";
		$this->template->content = View::forge('transaction/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('transaction');

		if ( ! $transaction = Model_Transaction::find($id))
		{
			Session::set_flash('error', 'Could not find transaction #'.$id);
			Response::redirect('transaction');
		}

		$val = Model_Transaction::validate('edit');

		if ($val->run())
		{
			$transaction->user_id = Input::post('user_id');
			$transaction->paypal_id = Input::post('paypal_id');

			if ($transaction->save())
			{
				Session::set_flash('success', 'Updated transaction #' . $id);

				Response::redirect('transaction');
			}

			else
			{
				Session::set_flash('error', 'Could not update transaction #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$transaction->user_id = $val->validated('user_id');
				$transaction->paypal_id = $val->validated('paypal_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('transaction', $transaction, false);
		}

		$this->template->title = "Transactions";
		$this->template->content = View::forge('transaction/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('transaction');

		if ($transaction = Model_Transaction::find($id))
		{
			$transaction->delete();

			Session::set_flash('success', 'Deleted transaction #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete transaction #'.$id);
		}

		Response::redirect('transaction');

	}


}
