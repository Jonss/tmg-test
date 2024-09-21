# TGM Test

## Requirements

- [PHP](https://www.php.net/) > 7
- [Docker](https://www.docker.com/)
- [Composer](https://getcomposer.org/)

#### Not required, but useful
- [Make](https://gnuwin32.sourceforge.net/packages/make.htm)

## Getting Started

you can use the provided make command:


```bash
make run
```

It will start an apache server running on 8080 port. Access `http://localhost:8080/Sample.php`


## Running unit-tests

First, install the dependencies
```bash
composer install
```

Then run

```bash
make test
```



