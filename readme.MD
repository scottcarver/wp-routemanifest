# wp-routemanifest ⬆️
This WordPress plugin adds new feeds to your WP install that specifically list out the pages/posts/media included on the website. This can be used in tandem with another script for saving the URIs as files, such as [wp-nodeoffliner](https://github.com/scottcarver/wp-nodeoffliner). Many webscrapers rely on link-crawling techniques &mdash; whereas this plugin provides an explicit list of URLs to include/exclude, controlled by the site administrator.

## Automated Feeds
*Note that the following paths are relative to your WP site.* Unlike the WP API, these urls end in .json, which makes them ready for static, which tracks well because the entire point of this project is to generate static WP sites.

### Standard Feeds
1. A list of all content-like routes `/app/index.json` plus optional feeds, when allowed.
1. Changes *since* a specific unixtime and now (query time) `/app/changes-since-1647680271.json`
### Optional Feeds
These can be enabled in the WP admin under *Settings > Manifest*.
1. manifest for mobile PWA (optionally) `/app/manifest.json`
1. `robots.txt` (optionally)
1. A list of redirects from the Redirects plugin as JSON, and also the same data formatted for Netlify: `/app/redirects.json` & `/_redirects_`
1. `serviceworker.js` - this is more powerful when server-generated! Versioning, dynamicly include requirements.

## Example JSON Data:
Both of the Standard feeds (index and changelog) have the same format. The base is not included to reduce the file size, and any consuming script will need to combine `base + url` to make successful requests.

### Debased Mode (default)
The feed will be much smaller by debasing the urls, although depending on compressing it may not matter anyway.
<pre>
{
    "base": "http://yourwebsite.com/",
    "urls": [
        "url1",
        "url2",
        "url3",
        "folder1/url4",
    ]
}
</pre>



# 🚧 Experimental Features 🚧


### Todo
- Many of the optional feeds are placeholders for now
- based mode



### Based Mode
(NEEDS A UI TOGGLE, and INTEGRATION).
The full url scheme is is simpler overall but the file, when saved as a static asset, will be much larger.
<pre>
{
    "permalinks": [
        "http://yourwebsite.com/url1",
        "http://yourwebsite.com/url2",
        "http://yourwebsite.com/url3",
        "http://yourwebsite.com/folder1/url4",
    ]
}
</pre>
