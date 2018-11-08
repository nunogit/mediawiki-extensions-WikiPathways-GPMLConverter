# GPMLConverter

## How to Install

1. Clone Repo

```sh
$ git submodule add https://github.com/wikipathways/mediawiki-extensions-WikiPathways-GPMLConverter.git GPMLConverter
$ cd GPMLConverter
```

Note: this is the SSH URL, which you can use as an alternative to the HTTPS URL:
> git@github.com:wikipathways/mediawiki-extensions-WikiPathways-GPMLConverter.git

2. Install GPMLConverter Dependencies

```sh
$ sudo -i bash "$(pwd)/install"
```

## How to Use
Try converting some data.

The bare metal version
```sh
$ curl "http://vm1.wikipathways.org/Pathway:WP554?action=raw&oldid=77712" | \
	gpml2pvjson --id http://identifiers.org/wikipathways/WP554 \
	--pathway-version 77712 > WP554.json
```

Using the included PHP scripts when this is installed as a MediaWiki extension:
``` sh
$ php maintenance/convertPathway.php -o json -r 77712 WP554
The JSON for Revision #77712 of Pathway WP554 (ACE Inhibitor Pathway) is stored at WP554.json
```

or another format:
``` sh
$ php maintenance/convertPathway.php -o SVG -r 77712 WP554
An SVG file for Revision #77712 of Pathway WP554 (ACE Inhibitor Pathway) stored at WP554.svg
```
