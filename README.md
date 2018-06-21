# MicayaelNotificationBundle

Bundle for user notifications

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require micayael/notification-bundle
```

Step 2: Add routes to the routes.yaml
-------------------------------------

```yaml
micayael_notifications:
    resource: "@MicayaelNotificationBundle/Resources/config/routing.yml"
    prefix: /notificaciones
```

Step 3: Extends the base Notification Entity 
--------------------------------------------