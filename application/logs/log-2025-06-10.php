<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-10 09:43:47 --> Severity: Notice --> Undefined variable: to /var/www/html/WORKS/BTCCLUB/application/models/Cron_jobs_model.php 722
ERROR - 2025-06-10 09:43:47 --> Severity: Notice --> Undefined variable: v /var/www/html/WORKS/BTCCLUB/application/models/Cron_jobs_model.php 723
ERROR - 2025-06-10 09:43:47 --> Severity: error --> Exception: Argument 2 passed to element() must be of the type array, null given, called in /var/www/html/WORKS/BTCCLUB/application/models/Cron_jobs_model.php on line 723 /var/www/html/WORKS/BTCCLUB/system/helpers/array_helper.php 65
ERROR - 2025-06-10 09:43:54 --> Severity: Notice --> Undefined variable: v /var/www/html/WORKS/BTCCLUB/application/models/Cron_jobs_model.php 722
ERROR - 2025-06-10 09:43:54 --> Severity: error --> Exception: Argument 2 passed to element() must be of the type array, null given, called in /var/www/html/WORKS/BTCCLUB/application/models/Cron_jobs_model.php on line 722 /var/www/html/WORKS/BTCCLUB/system/helpers/array_helper.php 65
ERROR - 2025-06-10 10:24:11 --> 404 Page Not Found: Cron_jobs/move_transactionFee
ERROR - 2025-06-10 10:24:11 --> 404 Page Not Found: Assets/backend
ERROR - 2025-06-10 10:24:11 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 10:24:11 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 10:24:11 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 10:24:11 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 10:24:11 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 10:24:11 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 10:29:52 --> Query error: Unknown column 'ib.id' in 'field list' - Invalid query: SELECT SUM(lb.total_amount) as sum, `ib`.`id`
FROM `level_bonus` `lb`
JOIN `user_info` `ui` ON `ui`.`user_id` = `lb`.`user_id`
WHERE `lb`.`release_status` = 'pending'
AND `lb`.`missed_income_status` = '1'
ERROR - 2025-06-10 10:29:52 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 10:29:52 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 10:29:52 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 10:43:34 --> Severity: error --> Exception: syntax error, unexpected 'return' (T_RETURN) /var/www/html/WORKS/BTCCLUB/application/models/Cron_jobs_model.php 787
ERROR - 2025-06-10 10:54:05 --> Severity: Notice --> Undefined variable: status_s /var/www/html/WORKS/BTCCLUB/application/controllers/Cron_jobs.php 42
ERROR - 2025-06-10 10:57:39 --> Severity: error --> Exception: Argument 2 passed to element() must be of the type array, string given, called in /var/www/html/WORKS/BTCCLUB/application/models/Cron_jobs_model.php on line 743 /var/www/html/WORKS/BTCCLUB/system/helpers/array_helper.php 65
ERROR - 2025-06-10 11:02:04 --> Severity: Notice --> Array to string conversion /var/www/html/WORKS/BTCCLUB/system/database/DB_driver.php 1471
ERROR - 2025-06-10 11:02:04 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: INSERT INTO `crypto_history` (`transfer_status`, `transaction_id`, `type_amt`, `transactions_data`, `updated_date`, `user_id`, `date_added`, `value`, `missed_ids`) VALUES ('finished', '0x823a398e10e719d591c3d78041a47a92d93d34cf98a21d2f94f6ec3e49fd2c07', 'missedincome', '{\"txId\":\"0x823a398e10e719d591c3d78041a47a92d93d34cf98a21d2f94f6ec3e49fd2c07\"}', '2025-06-10 11:02:04', '16', '2025-06-10 11:02:04', '0.000002', Array)
ERROR - 2025-06-10 11:02:04 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:02:04 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:02:04 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:02:17 --> Severity: Notice --> Array to string conversion /var/www/html/WORKS/BTCCLUB/system/database/DB_driver.php 1471
ERROR - 2025-06-10 11:02:17 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: INSERT INTO `wbtc_balance_sheet` (`user_id`, `amount`, `type`, `transaction_id`, `date`) VALUES ('16', Array, 'missedincome', '0x823a398e10e719d591c3d78041a47a92d93d34cf98a21d2f94f6ec3e49fd2c07', '2025-06-10 11:02:17')
ERROR - 2025-06-10 11:02:18 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:02:18 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:02:18 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:02:19 --> Severity: Notice --> Array to string conversion /var/www/html/WORKS/BTCCLUB/system/database/DB_driver.php 1471
ERROR - 2025-06-10 11:02:19 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: INSERT INTO `wbtc_balance_sheet` (`user_id`, `amount`, `type`, `transaction_id`, `date`) VALUES ('16', Array, 'missedincome', '0x823a398e10e719d591c3d78041a47a92d93d34cf98a21d2f94f6ec3e49fd2c07', '2025-06-10 11:02:19')
ERROR - 2025-06-10 11:02:19 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:02:19 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:02:19 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:02:39 --> Severity: Notice --> Array to string conversion /var/www/html/WORKS/BTCCLUB/system/database/DB_driver.php 1471
ERROR - 2025-06-10 11:02:39 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: INSERT INTO `wbtc_balance_sheet` (`user_id`, `amount`, `type`, `transaction_id`, `date`) VALUES ('16', Array, 'missedincome', '0x823a398e10e719d591c3d78041a47a92d93d34cf98a21d2f94f6ec3e49fd2c07', '2025-06-10 11:02:39')
ERROR - 2025-06-10 11:02:39 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:02:39 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:02:39 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:15:15 --> 404 Page Not Found: Cron_jobs/move_transactionfee_MissedIncome
ERROR - 2025-06-10 11:15:15 --> 404 Page Not Found: Assets/backend
ERROR - 2025-06-10 11:15:15 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:15:15 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:15:15 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:15:15 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:15:16 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:15:16 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:16:50 --> 404 Page Not Found: Cron_jobs/move_transactionfee_MissedIncome
ERROR - 2025-06-10 11:16:50 --> 404 Page Not Found: Assets/backend
ERROR - 2025-06-10 11:16:50 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:16:50 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:16:50 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:16:50 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:16:50 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:16:50 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:06 --> 404 Page Not Found: Assets/backend
ERROR - 2025-06-10 11:30:06 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:06 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:06 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:06 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:06 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:06 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:07 --> 404 Page Not Found: Assets/backend
ERROR - 2025-06-10 11:30:07 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:07 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:07 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:07 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:07 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:07 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-10 11:30:15 --> Could not find the language line "components"
ERROR - 2025-06-10 11:30:15 --> Could not find the language line "users"
ERROR - 2025-06-10 11:30:28 --> Could not find the language line "components"
ERROR - 2025-06-10 11:30:28 --> Could not find the language line "users"
ERROR - 2025-06-10 11:30:31 --> Could not find the language line "username"
ERROR - 2025-06-10 11:30:43 --> Could not find the language line "username"
ERROR - 2025-06-10 11:30:53 --> Could not find the language line "components"
ERROR - 2025-06-10 11:30:53 --> Could not find the language line "users"
ERROR - 2025-06-10 11:30:58 --> Could not find the language line "components"
ERROR - 2025-06-10 11:30:58 --> Could not find the language line "users"
ERROR - 2025-06-10 11:31:01 --> Could not find the language line "components"
ERROR - 2025-06-10 11:31:01 --> Could not find the language line "users"
ERROR - 2025-06-10 11:31:05 --> Could not find the language line "components"
ERROR - 2025-06-10 11:31:05 --> Could not find the language line "users"
ERROR - 2025-06-10 11:32:02 --> Could not find the language line "components"
ERROR - 2025-06-10 11:32:02 --> Could not find the language line "users"
ERROR - 2025-06-10 11:32:05 --> Could not find the language line "components"
ERROR - 2025-06-10 11:32:05 --> Could not find the language line "users"
ERROR - 2025-06-10 11:32:06 --> Could not find the language line "components"
ERROR - 2025-06-10 11:32:06 --> Could not find the language line "users"
ERROR - 2025-06-10 11:32:21 --> Could not find the language line "components"
ERROR - 2025-06-10 11:32:21 --> Could not find the language line "users"
ERROR - 2025-06-10 11:32:22 --> Could not find the language line "components"
ERROR - 2025-06-10 11:32:22 --> Could not find the language line "users"
ERROR - 2025-06-10 11:33:13 --> Could not find the language line "components"
ERROR - 2025-06-10 11:33:13 --> Could not find the language line "users"
ERROR - 2025-06-10 11:33:16 --> Could not find the language line "components"
ERROR - 2025-06-10 11:33:16 --> Could not find the language line "users"
ERROR - 2025-06-10 11:33:17 --> Severity: Notice --> Undefined index: from_id /var/www/html/WORKS/BTCCLUB/application/models/Calculation_model.php 179
ERROR - 2025-06-10 11:33:17 --> Severity: Notice --> Undefined index: service_charge /var/www/html/WORKS/BTCCLUB/application/models/Calculation_model.php 179
ERROR - 2025-06-10 11:33:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'WHERE `user_id` IS NULL' at line 2 - Invalid query: UPDATE `user_wallet` SET transaction_fee = transaction_fee + 
WHERE `user_id` IS NULL
ERROR - 2025-06-10 11:33:17 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:33:17 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:33:17 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-10 11:33:37 --> Severity: Notice --> Undefined index: user_id /var/www/html/WORKS/BTCCLUB/application/models/Calculation_model.php 183
ERROR - 2025-06-10 11:33:37 --> Could not find the language line "components"
ERROR - 2025-06-10 11:33:37 --> Could not find the language line "users"
ERROR - 2025-06-10 11:34:44 --> Could not find the language line "components"
ERROR - 2025-06-10 11:34:44 --> Could not find the language line "users"
ERROR - 2025-06-10 11:34:46 --> Could not find the language line "components"
ERROR - 2025-06-10 11:34:46 --> Could not find the language line "users"
ERROR - 2025-06-10 11:42:59 --> Could not find the language line "components"
ERROR - 2025-06-10 11:42:59 --> Could not find the language line "users"
ERROR - 2025-06-10 11:43:00 --> 404 Page Not Found: Assets/plugins
ERROR - 2025-06-10 11:44:28 --> Could not find the language line "components"
ERROR - 2025-06-10 11:44:28 --> Could not find the language line "users"
ERROR - 2025-06-10 11:44:28 --> 404 Page Not Found: Assets/plugins
ERROR - 2025-06-10 11:44:31 --> Could not find the language line "components"
ERROR - 2025-06-10 11:44:31 --> Could not find the language line "users"
ERROR - 2025-06-10 11:44:37 --> Could not find the language line "components"
ERROR - 2025-06-10 11:44:37 --> Could not find the language line "users"
ERROR - 2025-06-10 12:24:23 -->  POST: {"wallet_address":"0x634Bd26d648897d6ffeh94e0ad0ADd2c804dfbcc7DE5aa6d","sponsor_name":"admin","transaction_id":"0xeec13cd21c6d8ddec57afdh5991f1f504d3f25c789e78e419da4f16536849febfe0ccfcd","register":"free_join"}
ERROR - 2025-06-10 12:24:23 --> Could not find the language line "sponsor_name"
ERROR - 2025-06-10 12:24:23 --> Could not find the language line "user_name"
ERROR - 2025-06-10 12:25:16 --> Could not find the language line "Check_the_fields"
ERROR - 2025-06-10 12:25:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /var/www/html/WORKS/BTCCLUB/system/core/Input.php 182
ERROR - 2025-06-10 12:26:43 --> Could not find the language line "Check_the_fields"
ERROR - 2025-06-10 12:27:44 --> Could not find the language line "components"
ERROR - 2025-06-10 12:27:44 --> Could not find the language line "users"
ERROR - 2025-06-10 12:27:51 --> Could not find the language line "components"
ERROR - 2025-06-10 12:27:51 --> Could not find the language line "users"
ERROR - 2025-06-10 12:28:54 --> Could not find the language line "components"
ERROR - 2025-06-10 12:28:54 --> Could not find the language line "users"
ERROR - 2025-06-10 12:28:54 --> 404 Page Not Found: Assets/plugins
ERROR - 2025-06-10 12:28:59 --> Could not find the language line "components"
ERROR - 2025-06-10 12:28:59 --> Could not find the language line "users"
ERROR - 2025-06-10 12:28:59 --> 404 Page Not Found: Assets/plugins
ERROR - 2025-06-10 12:29:03 --> Could not find the language line "components"
ERROR - 2025-06-10 12:29:03 --> Could not find the language line "users"
ERROR - 2025-06-10 12:29:03 --> 404 Page Not Found: Assets/plugins
ERROR - 2025-06-10 12:29:14 --> Could not find the language line "components"
ERROR - 2025-06-10 12:29:14 --> Could not find the language line "users"
ERROR - 2025-06-10 12:29:14 --> 404 Page Not Found: Assets/plugins
ERROR - 2025-06-10 12:29:46 --> Could not find the language line "components"
ERROR - 2025-06-10 12:29:46 --> Could not find the language line "users"
ERROR - 2025-06-10 12:29:46 --> 404 Page Not Found: Assets/plugins
ERROR - 2025-06-10 12:29:57 --> Could not find the language line "components"
ERROR - 2025-06-10 12:29:57 --> Could not find the language line "users"
ERROR - 2025-06-10 12:30:04 --> Could not find the language line "components"
ERROR - 2025-06-10 12:30:04 --> Could not find the language line "users"
ERROR - 2025-06-10 12:30:08 --> Could not find the language line "components"
ERROR - 2025-06-10 12:30:08 --> Could not find the language line "users"
ERROR - 2025-06-10 12:30:10 --> Could not find the language line "components"
ERROR - 2025-06-10 12:30:10 --> Could not find the language line "users"
ERROR - 2025-06-10 15:16:49 --> Severity: error --> Exception: syntax error, unexpected '->' (T_OBJECT_OPERATOR) /var/www/html/WORKS/BTCCLUB/application/core/Base_Model.php 1602
ERROR - 2025-06-10 15:17:19 --> Query error: Unknown column 'pd.package_id' in 'order clause' - Invalid query: SELECT DISTINCT `pd`.`package_amount`, `pds`.`name`, `pd`.`transaction_id`
FROM `package_upgrade_history` as `pd`
JOIN `package_details` as `pds` ON `pds`.`package_id`=`pd`.`new_package`
WHERE `pd`.`user_id` = '19'
ORDER BY `pd`.`package_id` DESC
 LIMIT 1
ERROR - 2025-06-10 15:17:41 --> Query error: Expression #1 of ORDER BY clause is not in SELECT list, references column 'btcclub.pd.id' which is not in SELECT list; this is incompatible with DISTINCT - Invalid query: SELECT DISTINCT `pd`.`package_amount`, `pds`.`name`, `pd`.`transaction_id`
FROM `package_upgrade_history` as `pd`
JOIN `package_details` as `pds` ON `pds`.`package_id`=`pd`.`new_package`
WHERE `pd`.`user_id` = '19'
ORDER BY `pd`.`id` DESC
 LIMIT 1
ERROR - 2025-06-10 17:23:50 -->  POST: {"wallet_address":"0x634Bd26d648897d6ffeh94e0ad0ADd2c804dfbcc7DE5aa6d","sponsor_name":"admin","transaction_id":"0xeec13cd21c6d8ddec57afdh5991f1f504d3f25c789e78e419da4f16536849febfe0ccfcd","register":"free_join"}
ERROR - 2025-06-10 17:23:50 --> Could not find the language line "sponsor_name"
ERROR - 2025-06-10 17:23:50 --> Could not find the language line "Check_the_fields"
ERROR - 2025-06-10 17:23:54 -->  POST: {"wallet_address":"0x634Bd26d648897d6ffeh94e0fad0ADd2c804dfbcc7DE5aa6d","sponsor_name":"admin","transaction_id":"0xeec13cd21c6d8ddec57afdh5991ff1f504d3f25c789e78e419da4f16536849febfe0ccfcd","register":"free_join"}
ERROR - 2025-06-10 17:23:54 --> Could not find the language line "sponsor_name"
ERROR - 2025-06-10 17:23:54 --> Could not find the language line "user_name"
