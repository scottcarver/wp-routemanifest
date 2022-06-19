# wp-routemanifest 📜
This WordPress plugin adds new Feeds to your WP install that specifically list out the pages/posts included on the website. This can be used in tandem with another script for saving the files, such as [wp-nodeoffliner](https://github.com/scottcarver/wp-nodeoffliner). The background on this is that many webscrapers rely on link-crawling, this plugin provides an explicit list of URLs to crawl.

## Feed Examples

1. All Content Routes
2. manifest for mobile PWA (optionally)
3. robots.txt (optionally)
4a/b. app/redirects.json contain a list of redirects from the Redirects plugin. _redirects is the same data formatted for Netlify.
5. serviceworker.js - this is more powerful when server-generated! Versioning, dynamicly include requirements.

### All Data:
`[yourwebsite.com]/app/index.json` - a full list of all site URI's

### Manifest
`[yourwebsite.com]/app/manifest.json` - this is optionally added to support PWA

### Redirects
`[yourwebsite.com]/_redirects` - a list of redirects in a Netlify-friendly format
`[yourwebsite.com]/app/redirects.json` - feed of redirects

### Changes Only: 
`[yourwebsite.com]/app/changes-since-1647680271.json` - a list of site changes since a specific unix time. This is used in a `WP_Query` to be economical about only getting URIs that changed since specified modified date. 

## Example JSON Data:
Both feeds (index and changelog) have the same format. The base is not included to reduce the file size, and any consuming script will need to combine `base + url` to make successful requests. 

<pre>
{
    "base": "http://yourwebsite.com",
    "urls": [
        url1,
        url2,
        url3,
        folder1/url4,
    ]
}
</pre>


# 🚧 Experimental Features 🚧
This plugin also generates these urls, and includes them in the feed. In the future this will become optional.
- `_redirects` - a format used by netlify (in progress)
- `serviceworker.js` - a dynamically generated service worker (in progress)
- `app/manifest.json` - a config file used by PWAs (in progress)