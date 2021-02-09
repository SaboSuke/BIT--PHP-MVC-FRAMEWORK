<h1 align="center">
    <br>
    <img width="500" src="https://firebasestorage.googleapis.com/v0/b/php-mvc-framework-a74d3.appspot.com/o/BIT%20Logo.svg?alt=media&token=dfd627a2-477d-4f47-b193-544929725450" alt="BIt">
    <br>
    <br>
    <br>
</h1>

> A PHP mvc framework, built from absolute scratch(BIT - Better In Time).
[![Composer Version](https://firebasestorage.googleapis.com/v0/b/php-mvc-framework-a74d3.appspot.com/o/composer.svg?alt=media&token=16800661-e162-456c-89dc-c12ebda2b2ab)](#Composer) [![PHP Version](https://firebasestorage.googleapis.com/v0/b/php-mvc-framework-a74d3.appspot.com/o/php.svg?alt=media&token=73bcd493-79dc-451a-a414-a27f657426fb)](#PHP) [![Better In Time Version](https://firebasestorage.googleapis.com/v0/b/php-mvc-framework-a74d3.appspot.com/o/BIT.svg?alt=media&token=fc4a7635-e52b-42be-bda9-39ddbb4f0c83)](#SoftwareVersion)

BIT(Better In Time) is a PHP MVC framework, it was created for educational purposes but now it's under development to becoming a real open-source framework.

# Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md).

# Contributors

This project exists thanks to all the people who contribute. [[Contribute](CONTRIBUTING.md)].


# Installation

* Clone the project then install its core by running run  
    - ```composer require sabosuke/sabophp-mvc-core```

* Configure the ```.env``` file that contains your database dns, user and password 

* Run the migrations.php file
    - comment these lines of code inside the Application's constructor class which is inside the package you just installed 
    
    > .\vendor\sabosuke\sabophp-mvc-core\Application.php
    
    ```$this->userClass = $config['userClass'];```

    ```$primaryValue = $this->session->get('user');```

    ```if ($primaryValue){```

    ```$primaryKey = $this->userClass::primaryKey();```

    ```$this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);```
    
    ```}else```
        
    ```$this->user = null;```
    
    > since there's no user in the database that will generate an error, We're working on a fix for this problem.

    - ```php migrations.php```

* Lastly Run the server  
    
    - ```php -S localhost:8085 -t public/```

* To install the latest version
    - ```composer require sabosuke/sabophp-mvc-core:^1.0.4```
# Features 

## Version 2.0

    Next version will Implement sql generator methods to simplify writing sql queries

## Forms
* Implement send mail method

## Response
* Implement an encryption to request

## Style
* Implement Favicon
* Implement new style sheet 'bootswatch'
    + materia
    + fatly

## Framework Name
* We've been thinking about the name of this framework and then we said let's just use it's purpose so here it is
    - Better In Time => BIT