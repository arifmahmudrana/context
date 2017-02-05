# PHP Context(Key Value Data Store) 

[![Build Status](https://travis-ci.org/arifmahmudrana/context.svg?branch=master)](https://travis-ci.org/arifmahmudrana/context)

This is nothing but a key value store in the current context. You store value & in other places you retrieve value by it's key.

## Usage

### Step 1: Install Through Composer

```
composer require arifmahmudrana/context
```
and that's it.

## Examples

- [Set Value](#set-value)
- [Get Value](#get-value)
- [Has Value](#has-value)
- [All Value](#all-value)
- [Remove Value](#remove-value)

### Set Value

```
use ArifMahmudRana\Context\ContextContainer;

ContextContainer::set('user', User::find(1))//Save user Returns true
```

### Get Value

```
use ArifMahmudRana\Context\ContextContainer;

ContextContainer::get('user')//Get user
```

### Has Value

```
use ArifMahmudRana\Context\ContextContainer;

ContextContainer::has('user')//Return true
```

### All Value

```
use ArifMahmudRana\Context\ContextContainer;

ContextContainer::all()//Returns key value ['user' => User Object] default empty array
```

### Remove Value

```
use ArifMahmudRana\Context\ContextContainer;

ContextContainer::remove('user')//Returns true removes the key
```

## Important

 1. You can't instantiate this class if tried it will throw `CannotInstantiateClassExceptions` exception
 2. You can use only string as key else it will throw `\InvalidArgumentException` exception

## Tests
To Run the tests
```
./vendor/bin/phpunit //run phpunit
```

## Contributing

All contributions are welcome, for any bug, issue or merge request please [refer to CONTRIBUTING.md](CONTRIBUTING.md)

## License

Released under the MIT License, see LICENSE.