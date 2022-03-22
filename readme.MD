# wp-routemanifest 📜
This WordPress plugin will add new URLs to your WP install that specifically list out the pages/posts included on the website. This can be used in tandem with another script for saving the files, such as [wp-nodeoffliner](https://github.com/scottcarver/wp-nodeoffliner).

## Feed Examples
### All Data:
`[yourwebsite.com]/app/index.json` - a full list of all site URI's

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