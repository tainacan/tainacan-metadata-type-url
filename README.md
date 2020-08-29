# Tainacan URL Metadata Type

This repo contains an URL Metadata Type plugin for [Tainacan](https://tainacan.org). It accepts URL values and, when possible, renders them as an embed.

Make the script executable:

```sh
chmod u+x build.sh
```

To simply build the necessary `.vue` files into bundled javascript:

```sh
./build.sh
```

To besides that, moving the necessary plugin files to your wordpress plugin directory:

```sh
./build.sh /var/www/html/wp-content/plugins/
```
