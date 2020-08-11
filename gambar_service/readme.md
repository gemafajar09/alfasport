# RestAPI File Management as Microservice
1. PHP as programming language
1. Sqlite3 as database

# Requirement
1. PHP >= 5.6
1. `sqlite` and `pdo` extension

# Quick Start
1. Clone this repository
1. Rename `.env.example` to `.env`
1. Run `composer update`
1. Run migration file `php migration/create_table.php`
1. Make a `POST` request to `file-add.php` with `form-data` included files to be uploaded with name `_file_upload`. <br> Response return detail file with `image ID` or `id` (int)
1. Make a `POST` request to `file-detail.php` with `id` inside request body and the response return detail file with specified `id`
1. Make a `POST` request to `file-permanent.php` with `id` inside request body to mark file with specified `id` as `permanent`
1. Make a `POST` request to `file-delete.php` with `id` inside request body to delete file with specified `id`
1. Run `cronjob.php` to delete file except for `permanent` file. Run this file with cronjob with specific period.

Take a look at `.env` file for configuration!