var echo = require('laravel-echo-server');

var options = {
  authHost: 'http://localhost:8000',
  authPath: '/broadcasting/auth',
  host: 'http://localhost',
  port: 6001
};

echo.run(options);
