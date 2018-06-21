<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Laravel API w/ Token Auth

This is a trial project I am doing with [Kindyhub](http://kindyhub.com.au). It should allow to:
- Have an API endpoint, which returns stuff from the database
- Protect that endpoint with a token
- Have a way to generate that token, expire it, etc.

## To replicate

This repo does not hold a full Laravel source code, but rather is used for the 'moving pieces' in our project. So to replicate, you will need to:
- Install Laravel on your local/remote server
- `git init` in that folder and point it at this repo
- Fetch and overwrite your master branch (`git reset --hard origin/master`)

# Add-ons installed

I have installed the following on my server. It could be worth doing the same, to have an exact copy of this project:
- [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
- [barryvdh/laravel-cors](https://github.com/barryvdh/laravel-cors)
