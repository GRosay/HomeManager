# HomeManager

There's no place like 127.0.0.1, right ? That's why it's important to keep your stuff done in a really quick and easy way !

HomeManager is here to help you in all administrative tasks and to keep an eye on what's going in your house.

## How to install
As this project use Vagrant, you can easily and quickly start a fully functional environment by using `vagrant up` in your terminal/console.

All tools will be installed by default.

If you want to install the project on your own server or environment, you just have to copy all files and then import database.sql in your database and, finally, adapt your config in `inc/settings.inc.php`.

Default logins for admin are:

* login: user@mail.com
* password: password

## Features

### Weather

Adding your city let you know the current weather at your location.

It also show you the weather at your current location (GeoIP).

### Webcam

You have an IP webcam ? Well, just add it to your settings and you'll be able to see it directly through the Manager !

### Bill Manager

It's the biggest part of the Manager. It's **the** feature that makes me start this project.

This Bill Manager let you add your bill, add a date and... it will alert you when you have to pay it !

Of course, as many bills comes from the same supplier, you can manage a list of suppliers => you won't have to enter his datas (accounts details, adress, ...) each time ! You just do it the very first time and you're good to go !

I almost forgot... You can add redundant bills, so you have a reminder every months, trimester or semester !

### Shopping List

Well, that's not a secret. When you have your own house or flat, you have to buy a lot of things. Why not add it every time you think about it ? Oh! As well as for the bills, you can make an article to be redundant! By example, if you buy your favorite chocolate every weeks, and your afraid to forget it, why don't you add it as a weekly reminder ?

### Task list

With this feature, you'll never forget to call the doctor again ! It's magic !

### Warranty manager

Tired of wondering if your phone or your computer is still under warranty ? Well, just add your product in the system, with a copy of your original warranty, and you'll be good !

## Project status

As it's a fresh project, not all features are implemented for now.

* **Dashboard**: wainting on other features
* **Weather**: In progess - miss city setup
* **Webcam**: In progress
* **Bill Manager**: Ready (V1) - updates to come
* **ShoppingList**: Not started
* **TaskList**: Not started
* **Warranty Manager**: Not started
* **Design**: Finished, but in constant movement :)
* **Localization**: Not started - only in French for now
* **Users**: In progress - is working but no registration is possible for now

## Tools and Libraries

* PHP
* MySQL
* MAMP
* Bootstrap
* jQuery
* Gritter
* Pikaday
* fineUpload
* AdminLTE
* Gravatar
* Vagrant
* Many more :)