# Timetable Generator
This is a timetable generator web application which has the capability of generating the schedule in PDF or Excel format.

## Requirements
To install this Laravel project. Kindly refer [here](https://laravel.com/docs/4.2/quick#installation) to perform installation of Laravel successfully

## Installation
1. Clone the code in this repository
    
    ```bash
    git clone https://github.com/Barongobber/timetable_generator.git
    ```

2. On the project root, run `composer install` to install all dependencies.

3. Create database named as `timetable` in your MySQL Database. You may modify it on the `.env.example` file on `DATABASE_NAME` variable.

4. Copy the .env.example and rename it as .env by executing this cmd

    ```cmd
    cp .env.example .env
    ```
    
5. run `php artisan migrate` to run migration database in laravel.

6. run `php artisan key:generate` to generate the key in laravel.

7. run `php artisan config:cache` to quickly restart config cache.

8. run `php artisan serve` to turn on local server. The local website would be accessible on the given link showed in the terminal/bash

9. Play around with the project. 

**Finish!!** The setup should be done. Anything wrong? Hit me up at barongobirn@gmail.com 
