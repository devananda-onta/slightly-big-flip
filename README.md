# Slightly-big-Flip

Slightly-big Flip is a 3rd party created by Flip. The service handle a request from the user to withdraw their balance using Slightly-big Flip API. This service was developed using PHP.

## Requirement
* PHP
* Curl

## Config File
Please edit both of these files after cloning the repository, thanks!

The config file of this service is located in  */application/config/vars.php* so please change the config here.
Here is the example of the config file :

```php
$config['api_url'] = '<flip_url>';
$config['api_key'] = '<flip_key>';
$config['db_host'] = 'localhost';
$config['db_username'] = '<db_username>';
$config['db_password'] = '<db_password>';
$config['db_name'] = 'disburse';
```
The config BASE URL is located in */application/config/config.php* so please change the BASE URL here.
```php
$config['base_url'] = 'http://<your_base_url>/slightly-big-flip/';
```
## How To Run
### Migration
To run the table migration, please access the following URL in the browser after cloning the repository
```
http://<your_base_url>/slightly-big-flip/index.php/migration
```
### Request Withdrawal
To request a withdrawal just fill out the form under the Request Withdrawal tab.
For example, you also can fill the form based on the placeholder.
### Check and Update Withdrawal Status
To check your withdrawal status, fill the Transaction ID field based on the ID you get after request.
