# Minimal Laravel to test awesome [pmochine/Laravel-Tongue](https://github.com/pmochine/Laravel-Tongue)

```
composer create-project laravel/laravel laravel-tongue-test
composer require barryvdh/laravel-debugbar --dev
php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
composer require pmochine/laravel-tongue
php artisan vendor:publish --provider="Pmochine\LaravelTongue\ServiceProvider" --tag="config"
```

## Issue
[Source issue](https://github.com/pmochine/Laravel-Tongue/issues/31)

I want to set the main locale as `fr` without subdomain.

I have created 4 domains :
- [http://my-domain.dv](http://my-domain.dv) : FR (by default)
- [http://en.my-domain.dv](http://en.my-domain.dv) : EN
- [http://es.my-domain.dv](http://es.my-domain.dv) : ES
- [http://fr.my-domain.dv](http://fr.my-domain.dv) : FR (only for testing)

There is 1 localized route for test.

The localized domains (with sudomains) are working properly but the generic (http://my-domain.dv) depends on the last visited subdomain.

The localized routes are not translated.


## Expectation
### en.my-domain.dv
- [x] Language : EN
- [x] Localized route : /localized
- [x] Current URL is correct
- Redirecting localized route :
	- [ ] In French : ~~http://my-domain.dv/traduite~~ http://en.my-domain.dv/localized
	- [ ] In Spanish : ~~http://es.my-domain.dv/traducida~~ http://en.my-domain.dv/localized

### es.my-domain.dv
- [x] Language : ES
- [x] Localized route : /traducida
- [x] Current URL is correct
- Redirecting localized route :
	- [ ] In French : ~~http://my-domain.dv/traduite~~ http://es.my-domain.dv/traducida
	- [ ] In English : ~~http://en.my-domain.dv/localized~~ http://es.my-domain.dv/traducida

### my-domain.dv
For the first access, FR is by default (correct) but after depends on the last visited subdomain.

Sometimes, http://en.my-domain.dv redirects to http://my-domain.dv

## Comments
When installing the package, warning from Composer : **Package layershifter/tld-support is abandoned, you should avoid using it. No replacement was suggested.**

