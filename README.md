# php-openapi-client-generator
Generate a PHP client for an OPENAPI specification

### Installation
```
composer require --dev vanengers/php-openapi-client-generator
```

### Usage
```
OPENAPI=http://127.0.0.1:8000/docs.json NAMESPACE=VendorName\\PackageName\\Generated OUTPUT_DIR=src/Generated ./bin/api-client-generator generate
```

##### Specify the openapi specifications JSON file
```
OPENAPI=http://127.0.0.1:8000/docs.json
```
##### Specify the namespace for the generated classes
```
NAMESPACE=VendorName\\PackageName\\Generated
```
##### Specify the output directory for the generated classes
```
OUTPUT_DIR=src/Generated
```

### Run the generator
```
./bin/api-client-generator generate
```

### Example client is generated; SampleClient.php
You will need to finish the implementation of the client yourself.
This is for generation of the login methods, which may differ per API.
And you will need to add the correct namespace to the generated classes.
You can also add your own methods to save and retrieve a Saved Token.
```
public function login()
{ ... }
```
```
callable $saveToken = fn (string $token) => saveInterally($token);
```

### This would result in these generated classes

![alt text](https://github.com/vanengers/php-openapi-client-generator/tree/main/img/dirs.png?raw=true)
