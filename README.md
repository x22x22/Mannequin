Mannequin
========

Welcome to the main repository for [Mannequin](https://mannequin.io), a component theming tool for the web.  If you're looking for information on getting started, check [the documentation](https://mannequin.io).  If you're looking for a specific extension, check the [extensions](https://mannequin.io/extensions) page.  Otherwise, this repository is primarily used for development purposes, or for [reporting bugs](https://github.com/LastCallMedia/Mannequin/issues/new).

Development
-----------

To work on this project, you need:

- PHP >= 7.0
- NodeJS >= 6.0

In development, there are two servers that need to be started to see your changes immediately:

* From the /ui directory, run: `yarn start`.  This will start the front end server running on port 3000.
* Next, in .mannequin.php, use the LocalDevelopmentUI as follows:
  ```php
  use LastCall\Mannequin\Core\MannequinConfig;
  use LastCall\Mannequin\Core\Ui\LocalDevelopmentUi;
  
  $config = MannequinConfig::create([
    'ui' => new LocalDevelopmentUi('http://127.0.0.1:3000')
  ])
  ...
  ```
* Finally, run: `src/Core/bin/mannequin start *:8000`.  This will start the backend server, and you should be able to visit http://localhost:8000 in your browser, and see changes to both PHP and React code as you reload the page.

Deployment/Packaging
--------------------

This repository is split using [splitsh-lite](https://github.com/splitsh/lite) running inside of the [derusse/docker-gitsplit](https://github.com/jderusse/docker-gitsplit) Docker container.  Pushes to the master branch, as well as pushes of any tags, will be moved to the downstream repositories.