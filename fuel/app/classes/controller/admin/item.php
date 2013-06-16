<?php
class Controller_Admin_Item extends Controller_Admin 
{

	public function action_index()
	{
		$data['items'] = Model_Item::find('all');
		$this->template->title = "Items";
		$this->template->content = View::forge('admin/item/index', $data);

	}

	public function action_view($id = null)
	{
		$data['item'] = Model_Item::find($id);

		$this->template->title = "Item";
		$this->template->content = View::forge('admin/item/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Item::validate('create');

			if ($val->run())
			{
				$item = Model_Item::forge(array(
					'cost' => Input::post('cost'),
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'qty' => Input::post('qty'),
					'upc' => Input::post('upc'),
				));

				if ($item and $item->save())
				{
					Session::set_flash('success', e('Added item #'.$item->id.'.'));

					Response::redirect('admin/item');
				}

				else
				{
					Session::set_flash('error', e('Could not save item.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Items";
		$this->template->content = View::forge('admin/item/create');

	}

	public function action_edit($id = null)
	{
		$item = Model_Item::find($id);
		$val = Model_Item::validate('edit');

		if ($val->run())
		{
			$item->cost = Input::post('cost');
			$item->name = Input::post('name');
			$item->description = Input::post('description');
			$item->qty = Input::post('qty');
			$item->upc = Input::post('upc');

			if ($item->save())
			{
				Session::set_flash('success', e('Updated item #' . $id));

				Response::redirect('admin/item');
			}

			else
			{
				Session::set_flash('error', e('Could not update item #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$item->cost = $val->validated('cost');
				$item->name = $val->validated('name');
				$item->description = $val->validated('description');
				$item->qty = $val->validated('qty');
				$item->upc = $val->validated('upc');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('item', $item, false);
		}

		$this->template->title = "Items";
		$this->template->content = View::forge('admin/item/edit');

	}

	public function action_delete($id = null)
	{
		if ($item = Model_Item::find($id))
		{
			$item->delete();

			Session::set_flash('success', e('Deleted item #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete item #'.$id));
		}

		Response::redirect('admin/item');

	}


}