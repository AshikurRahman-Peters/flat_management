<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Admin/login';
$route['login'] = 'Admin/login';




//admin controller 
$route['login_process'] = 'Admin/login_in';
$route['set_branch'] = 'Admin/set_branch';
$route['dashboard'] = 'Dashboard';



$route['unit_bill_entry'] = 'Dashboard/unit_bill_entry';
$route['logout'] = 'Admin/logout';

//floor entry
$route['floor_entry'] = 'Floor/floor_entry';
$route['floor_edit/(:any)'] = 'Floor/edit/$1';
$route['floor_delete/(:any)'] = 'Floor/delete/$1';
$route['floor_insert'] = 'Floor/floor_insert';
$route['floor_update'] = 'Floor/update';
$route['select_floor'] = 'Floor/select_floor';

//unit Entry
$route['unit_entry'] = 'Unit/unit_entry';
$route['unit_insert'] = 'Unit/unit_insert';
$route['select_unit'] = 'Unit/select_unit';
$route['get_floor'] = 'Unit/get_floor';
$route['get_units'] = 'Unit/get_units';
$route['get_unit'] = 'Unit/get_unit';
$route['delete_unit'] = 'Unit/delete_unit';
$route['edit_unit_detail'] = 'Unit/edit_unit_detail';
$route['insert_service_bill'] = 'Unit/insert_service_bill';


//unit Bill Entry
$route['unit_bill_entry'] = 'Service_unit_bill_controller/unit_bill_entry';
$route['unit_bill_insert'] = 'Service_unit_bill_controller/unit_bill_insert';

//Renters from
$route['all_renter_list'] = 'Renter_controller/all_renter_list';
$route['ranter_register'] = 'Renter_controller/ranter_register';
// $route['get_floor'] =  'Renter_controller/get_floor';
$route['get_units'] = 'Renter_controller/get_units';
$route['ranter_insert'] = 'Renter_controller/ranter_insert';
$route['ranter_delete/(:any)'] = 'Renter_controller/delete/$1';

//member added
$route['member_insert'] = 'Renter_controller/member_insert';

//House information
$route['house_info'] = 'House_info_controller/house_info';
$route['house_info_update'] = 'House_info_controller/update';
$route['house_info_insert'] = 'House_info_controller/insert';

//service bill entry
$route['bill_entry'] = 'Service_bill_entry_controller/bill_entry';
$route['get_all_month'] = 'Service_bill_entry_controller/get_all_month';
$route['delete_month/(:any)'] = 'Service_bill_entry_controller/delete/$1';
$route['service_bill_insert'] = 'Service_bill_entry_controller/service_bill_insert';
$route['get_all_bill'] = 'Service_bill_entry_controller/get_all_bill';

//Month Entry entry
$route['month_entry'] = 'Service_unit_bill_controller/month_entry';
$route['insert_month'] = 'Service_unit_bill_controller/insert_month';

//Service Bill collection
$route['Service_collection'] = 'Bill_collection/Service_collection';
$route['select_lest_bill_entry'] = 'Bill_collection/select_lest_bill_entry';
$route['select_lest_rent_entry'] = 'Bill_collection/select_lest_rent_entry';
$route['selectDueAmount'] = 'Bill_collection/selectDueAmount';
$route['selectDueAmountService'] = 'Bill_collection/selectDueAmountService';

$route['InsertAdvance'] = 'Advance_controller/InsertAdvance';

//Report Bill collection
$route['Report_collection'] = 'Report_bill_collection_controller/Service_collection';
$route['select_all_bill_entry'] = 'Report_bill_collection_controller/select_lest_bill_entry';
$route['select_all_rent_entry'] = 'Report_bill_collection_controller/select_lest_rent_entry';
$route['get_all_month'] = 'Report_bill_collection_controller/get_all_month';


//unit rent bill
$route['get_all_rent'] = 'Renter_controller/get_all_rent';
$route['insert_rent_bill'] = 'Renter_controller/insert_rent_bill';


//print bill entry
$route['service_bill_print'] = 'Bill_print_controller/service_bill_print';
$route['service_rent_print'] = 'Bill_print_controller/service_rent_print';
$route['print_service_bill'] = 'Bill_print_controller/print_service_bill';
$route['print_rent_bill'] = 'Bill_print_controller/print_rent_bill';


//Single print report

$route['single_report_rent_print/(:any)'] = 'Single_print_controller/single_report_rent_print/$1';
$route['single_report_bill_print/(:any)'] = 'Single_print_controller/single_report_bill_print/$1';
$route['print_service_bills'] = 'Single_print_controller/print_service_bill';
$route['print_rent_bills'] = 'Single_print_controller/print_rent_bill';

//renter details

$route['renter_details/(:any)'] = 'Details_renter_controller/renter_details/$1';

//User Access

$route['User_access'] = 'User_access_controller';

$route['userInsert'] = 'User_access_controller/userInsert';
$route['userEdit/(:any)'] = 'User_access_controller/edit/$1';
$route['userUpdate'] = 'User_access_controller/update';
$route['userDelete/(:any)'] = 'User_access_controller/delete/$1';

//Menu Access
$route['menu_access/(:any)'] = 'User_access_controller/menu_access/$1';

$route['select_user'] = 'User_access_controller/select_user';
$route['add_user_access'] = 'User_access_controller/add_user_access';
$route['get_menu'] = 'User_access_controller/get_menu';

//Branch access
$route['branch_access'] = 'Branch_controller/branch_access';
$route['branchInsert'] = 'Branch_controller/branchInsert';
$route['branchUpdate'] = 'Branch_controller/update';
$route['branchEdit/(:any)'] = 'Branch_controller/edit/$1';
$route['branchDelete/(:any)'] = 'Branch_controller/delete/$1';

//cash Transaction 
$route['Cash_transaction']= 'Cash_transaction_controller';
$route['account']= 'Cash_transaction_controller/add_account';
$route['get_expense']= 'Cash_transaction_controller/get_expense';
$route['expense_insert']= 'Cash_transaction_controller/expense_insert';
$route['update_expense']= 'Cash_transaction_controller/update_expense';
$route['deleteExpense']= 'Cash_transaction_controller/deleteExpense';
$route['get_account_code']= 'Cash_transaction_controller/getAccountCode';

///cash Transaction Expense
$route['get_expense_code']= 'Cash_transaction_controller/getExpenseCode';
$route['Account_expense_insert']= 'Cash_transaction_controller/Account_expense_insert';
$route['get_account_expense']= 'Cash_transaction_controller/get_account_expense';
$route['account_expense_insert']= 'Cash_transaction_controller/account_expense_insert';
$route['account_update_expense']= 'Cash_transaction_controller/account_update_expense';
$route['updateAccountExpense']= 'Cash_transaction_controller/updateAccountExpense';
$route['deleteAccountExpense']= 'Cash_transaction_controller/deleteAccountExpense';

$route['InsertAdvance']= 'Cash_transaction_controller/InsertAdvance';
$route['get_advance']= 'Cash_transaction_controller/get_advance';
$route['AdvanceDelete']= 'Cash_transaction_controller/AdvanceDelete';

$route['advance'] = 'Advance_controller/advance';

///////// report expense ////////
$route['expense_report']= 'Expense_report_controller';
$route['get_expense_name']= 'Expense_report_controller/get_expense_name';
$route['get_Floor']= 'Expense_report_controller/get_Floor';
$route['get_all_receive_data']= 'Expense_report_controller/get_all_receive_data';

//////// collation //////
$route['update_service'] = 'Cash_transaction_controller/update_service';
$route['update_rent'] = 'Cash_transaction_controller/update_rent';

///// cash transaction Report ////
$route['all_expense_report'] = 'Cash_transaction_report_controller/transaction_report';
$route['get_all_transaction'] = 'Cash_transaction_report_controller/get_all_transaction';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
