# Documentation

This document explains how to install, set up, and use Roadmap.


## Installation

Assuming the rest of your self-hosted V0LT web-services are already installed at the root of your web-server, simply copy the `roadmap` directory alongside them, such that they all share the same parent directory. For example, if you use Apache2, you might use the following command to copy the `roadmap` directory: `cp -r ~/Downloads/roadmap /var/www/html/`.

Next, open Roadmap in your browser by navigating to `/roadmap/`. For example, to access Roadmap locally, you would navigate to `http://localhost/roadmap/`. If everything was set-up properly, you should see all of your installed self-hosted V0LT web-services in the interface. If not, see the troubleshooting section below.


## Troubleshooting

If Roadmap doesn't work as expected, try the following troubleshooting steps:

1. Make sure all of your services share the same parent directory. For example, if you have V0LT Optic installed at `/var/www/html/optic/`, Roadmap needs to be installed at `/var/www/html/roadmap/`
2. Make sure all of your self-hosted V0LT services have the directory names that they originally came with. Roadmap expects the name of all of the service directories to be all lowercase, with no spaces.
3. Make sure the service you're trying to get Roadmap to recognize has an entry in the `roadmap/database.json` file.


## Integration

Once everything is working, you may want to add a few finishing touches.

### Redirect

You can streamline the process of accessing the Roadmap interface by adding an index page at the root of your web-server that just redirects to Roadmap. You can do this by creating a file at `/var/www/html/index.php` containing only the following text: `<?php header("Location: /roadmap/"); ?>`

### Customization

If you have custom services that you want to integrate with Roadmap, you can do so by adding them to the `roadmap/database.json` file.

Each entry in the `database.json` file has the following attributes:
- The entry key is a string that determines the directory name that will be identified as this service in the parent directory.
    - `name` is the human-readable name that will be displayed for this service in the Roadmap interface.
    - `description` is a brief tagline that will be displayed with the service in the Roadmap interface.
    - `image` is a path to the image that will be displayed as this service's icon.
