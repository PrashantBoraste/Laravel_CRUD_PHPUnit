# Steps to Build a Laravel Blog Project.

 Reference :: https://laravel.com/docs/5.0/installation 

1)Step to install and Run Laravel Project:

1. download or clone project
2. Go to the folder application using cd
3. Run composer install on your cmd or terminal  >> composer install (Vendor folder get install)
4. Copy .env.example file to .env on root folder. 
    You can type copy .env.example .env if using command prompt Windows 
     or cp .env.example .env if using terminal Ubuntu
5. Open your .env file and change the database name (DB_DATABASE)
6. Run php artisan key:generate
7. Run php artisan migrate :: To Migrate DB use following command
8. Run php artisan serve


2) Migrations :: (Reference :: https://laravel.com/docs/5.2/migrations)

   A)Creating Migrations :: To create a migration, you can use the make:migration command on the Artisan CLI:

   1)php artisan make:migration create_users_table
   2)php artisan make:migration create_posts_table
   3)php artisan make:migration create_categories_table

  B)Running Migration :: To run All Migrations,use the migrate Artisan command.
  
>>php artisan migrate 

 C) Rolling Back Migrations :: To rollback the latest migration "operation", you may use the rollback command.
>> php artisan migrate:rollback 


3) Writing Seeders ::  To generate a seeder, execute the make:seeder Artisan command. All seeders generated by the framework will be placed in the database/seeds directory:

	 1)php artisan make:seeder UsersTableSeeder
	 2)php artisan make:seeder CategoryTableSeeder
	 3)php artisan make:seeder BookTableSeeder

	 
4) Running Seeders:: To seed your database, you may use the db:seed command on the Artisan CLI.By default, the db:seed command runs the DatabaseSeeder class, which may be used to call other seed classes 

    1)php artisan db:seed	 (By default, the db:seed command runs the DatabaseSeeder class, which may be used to call other seed classes)
    2)php artisan db:seed --class=UserTableSeeder (you may use the --class option to specify a specific seeder class to run individually)
    3)php artisan db:seed --class=PostsTableSeeder
    4)php artisan db:seed --class=PostsTableSeeder
    5)php artisan migrate:refresh --seed ( to rollback and re-run all of your migrations)

 
5)To Run All Test Cases : You can run your PHPUnit tests by running the phpunit command
>> phpunit

 Defining & Running Tests ::

To create a new test case, use the make:test Artisan command:

>> php artisan make:test UserTest  (test/UserTest file get generated).

 Running the test ::
  Now to run test, go to your application terminal and run the following command.
  
  1)Run Single Test Case ::
     >> phpunit --filter testBlogExample  (By using –filter we can run a single Test Class or a single Test method)
	
   CRUD Test cases Example:
   
  2)Test Case ::  User can read all the BlogPost (Reference :: tests\BlogTest.php) 
  
    Run Test Case :: >> phpunit --filter test_user_can_read_all_the_blogpost 
	
  3)Test Case :: A user can read a single BlogPost	
  
    Run Test Case :: >> phpunit --filter test_user_can_read_single_blogpost.

  4)Test Case :: A user can Update BlogPost	using testcase
  
   Run Test Case :: >> phpunit --filter test_user_can_update_the_blogpost
  
  5)Test Case :: A user can Delete BlogPost	using testcase
  
   Run Test Case :: >> phpunit --filter test_user_can_delete_the_blogpost.  
	







 


