FROM yiisoftware/yii2-php:7.3-apache
#COPY . /app
#WORKDIR /app
#ADD composer.* /app/
# Apply testing patches
#ADD tests/phpunit_mock_objects.patch /app/tests/phpunit_mock_objects.patch
#ADD tests/phpunit_getopt.patch /app/tests/phpunit_getopt.patch
# Install packgaes
RUN /usr/local/bin/composer install --prefer-dist
#ADD ./ /app
