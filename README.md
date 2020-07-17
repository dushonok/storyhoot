# Storyhoot
A tool to download Insta users' stories

# Requirements
- PHP 7.4+
- instagram-user-feed ver 6.3 min
- symfony latest

# Installation
Do install in in the server root folder ~

<code>composer require symfony/symfony</code>

<code>composer require pgrimaud/instagram-user-feed</code>

*Make sure that your code includes the Autoloader line at the beginning of your main php file:
<code>require __DIR__ . '/../../../../master/vendor/autoload.php';</code>*


*Enable SSH for GitHub PROPERLY on Windows*
<code>
eval $(ssh-agent)
ssh-add /c/Users/nadez/.ssh/id_rsa
</code>