### Run Install Script:

You might wanna run composer install before that, so you could use your own composer's cache.
```
$ ./dev/bin/install
```
The install script should install your app, dependencies, assets etc. and import the database dump. 
During installation the `Incenteev\ParameterHandler\ScriptHandler::buildParameters` would ask you to define your parameters.yml
By default your app will be running on 9001 TCP port.

```
$ open http://localhost:9001 
```

### Accessing containers:
Accessing the containers through docker-compose exec can mess up your files permissions.
To avoid that use the `./dev/bin/exec` bash script.

Here's some sample usage:
```
$ ./dev/bin/exec app php bin/console cache:clear --env=prod
```

### Users credentials:
```
admin / publish
polish_editor / PolishEditor1
english_editor / EnglishEditor1
```

### Available site accesses:
```
http://localhost:9001/en/  // Site access with eng-GB
http://localhost:9001/pl/  // Site access with pol-PL
http://localhost:9001 // This is a default 'site' site access (didn't wanted to delete that)
```

That's it! Have fun!