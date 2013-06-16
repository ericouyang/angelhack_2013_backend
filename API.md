GET /api/transaction.json
* id - internal transaction id

GET /api/item.json
* upc - UPC of the item

POST /api/transaction_create.json
* user_id - Who's creating the transaction

POST /api/transaction_add_item.json
* transaction_id - what transaction to add this to
* item_id - internal item id
* qty - defaults to 1

POST /api/transaction_complete.json
* transaction_id - what transaction to complete
* paypal_id - PayPal ID of transaction

POST /api/transaction_item_update_quantity.json
* id - of the transaction item
* qty - new quantity

POST /api/transaction_item_delete.json
* id - of the transaction item

POST /api/transaction_delete.json
* id - of the transaction 