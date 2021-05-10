# Simple eWallet System (Backend, Full Stack Developer Challenge)

This is a simple app that implements wallet feature of an e-commerce application. It basically allows customers to pre-load 
their wallets from their Debit cards. It also allows a customer to transfer virtual money as a gift to another customer within the platform.
Other core functionalities like authentication, authorization, etc. are not considered as they are not the goal of this app.  

## Built with
  * PHP/Laravel
  * Bootstrap
  * MySQL
  * Paystack (Laravel Paystack package)
  
## [Live Demo](https://secure-sands-44345.herokuapp.com/)
  
## Getting Started

To get a local copy up and running follow these simple steps.

- On the project GitHub page, navigate to the main page of the repository [this page](https://github.com/teekaytech/E-commerce-wallet-app.git).
- Under the repository name, locate and click on a green button named 'Code'. 
- Copy the project URL as displayed.
- If you're running Windows Operating System, open your command prompt. On Linux, Open your terminal.
- Change the current working directory to the location where you want the cloned directory to be made. Leave as it is if the current location is where you want the project to be.
- Type `git clone`, and then paste the URL you copied in Step 3.<br>
`$ git clone https://github.com/teekaytech/E-commerce-wallet-app.git`
- Press Enter. Your local copy will be created.
 
Please Note that you must have github installed on your PC, this can be done [here](https://gist.github.com/derhuerst/1b15ff4652a867391f03).


### Prerequisites

Since all the code is written with Laravel, `PHP Runtime >= 7.2.0` and `Laravel 6` is required to interpret the code. 
If you don't have Laravel runtime already setup on your computer, follow the instruction for your specific operating system on the [official installation guide](https://laravel.com/docs/6.x).

### Usage (Locally)

After cloning on your computer, open the folder using your terminal/command prompt window and run:

- Run `composer install` to install necessary packages.
- Create a new database and run `php artisan migrate` to generate the database tables
- Setup your .env file for necessary environmental variables like database details, etc.
- Populate your `customer` and `wallet` table with some dummie data, to test the app. (Email field is important. password can be anything)
- Run `php artisan serve` to start the application.
All done.

## Author

👤 **Taofeek Olalere**

- Github: [@teekaytech](https://github.com/teekaytech)
- Twitter: [@ola_lere](https://twitter.com/ola_lere)
- Linkedin: [linkedin](https://linkedin.com/in/olaleretaofeek)

## 🤝 Contributing
Contributions, issues and feature requests are welcome!
   1. Fork the Project
   2. Create your Feature Branch (git checkout -b feature/AmazingFeature)
   3. Commit your Changes (git commit -m 'Add some AmazingFeature')
   4. Push to the Branch (git push origin feature/AmazingFeature)
   5. Open a Pull Request.<br>
Feel free to check the [issues page](issues/).

## Show your support

Give a ⭐️ if you like this project.

## 📝License

This project is [MIT](lic.url) licensed.

## Acknowledgements

- [Laravel 6 Docs](https://laravel.com/docs/6.x)
- [Laravel Paystack package by unicodeveloper](https://github.com/unicodeveloper/laravel-paystack)
- [Braintemple Tutorial on Youtube](https://www.youtube.com/watch?v=V0cC3BAfTto&list=PLnBvgoOXZNCMe8goYLZmKRlathaa7nDKV)
- [Paystack Docs](https://dashboard.paystack.com/#/get-started)
