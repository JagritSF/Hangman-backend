
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Steps for running this application

1.Ensure that you have installed PHP 8 and MySQL in your system.
2.Install composer from https://getcomposer.org/ in your system
3.Run composer install in the terminal.
4.Create a .env file in the directory, there is a .env.example file you can take refernce from it
5.Define Database and its username and password in the file as same as in .env.example file.
6.Run php artisan migrate command in terminal to run the database migrations.
7.Run php artisan serve for running the server on you local.

## API’s 
1.start-game
    Users will get registered in Database and if the user has any previous game incomplete it will return last incomplete game word, correct letters, wrong letters
2. save-last-word
    Save the last random word to Database which is to be guessed by the user 
3.save-wrong-letters
    Save wrong letters to Database guessed by the user
4.save-correct-letters
    Save correct letters to Database guessed by the user

