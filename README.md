# Tiny Blog Engine

The Tiny Blog Engine is a lightweight and highly customizable blog engine that empowers you to create and modify your own blogging platform with ease.

- **Lightweight**: The entire engine is only 230kb in size.
- **Dark & Light Mode**: Enjoy the convenience of built-in dark and light modes.
- **Customization**: Easily customize the colors, fonts, language to match your preferences.
- **Simple Deployment**: Requires only FTP access for deployment (and a server that supports PHP, should be easy to find in 2023)
- **Comments & Interactions**: See below
- **RSS2 Support**: Keeps your readers updated with RSS2 feed compatibility.
- **GDPR Compliant**: The engine respects your privacy by not relying on external dependencies.

![Example showcasing dark and light mode](https://github.com/nithou/tiny-blog-engine/blob/main/assets/img/og.png)

Check out a [live example here](https://nithou.net/sandbox/) or see a modified version on [my personal blog](https://nithou.net/blog/).

## Installation Guide
1. Duplicate this repository to your desired location.
2. Edit the **config.php** file (Remember to set the blog link to your final blog URL).
3. Replace the files located at /assets/img/**icon.png** and /assets/img/**og.png**.
4. Upload the entire repository to your FTP server.

For custom CSS, you can edit the file **/assets/css/custom.css**.

## Writing Blog Posts
1. Create a **Markdown file** following the format **YYYY-MM-DD.md** (e.g., 2023-09-27.md).
2. Begin with a title using the format # Hello World.
3. Write your content freely.
4. Upload the markdown file to the **/posts** folder.
5. Voilà! Your post is now live. The blog displays the latest post first, followed by older ones.

## Creating Pages
1. Create a **Markdown file** and name it as you prefer, replacing spaces with dashes (e.g., About Me becomes About-me.md).
2. Start with a title using the format # Hello World.
3. Fill the content as desired.
4. Upload the markdown file to the **/pages** folder.
5. Your new page is now seamlessly added to the navigation.

Feel free to contribute, modify, and enhance the Tiny Blog Engine to suit your blogging needs!

If you have any questions, suggestions, or issues, please don't hesitate to open an issue or reach out. 

Happy blogging!

## Comment & Interactions

The config.php file provides different comments / reactions systems that you can decide to activate:

- **Kudos**: the simplest system, it allows your user to leave a "like" on your posts without hassle. Same has the "clap" on Medium
- **Webmention.io**: Supported thanks to [this script](https://github.com/PlaidWeb/webmention.js/) integration. You will have to provide both the webmention script & pingback script links ([see this page](https://webmention.io/settings))
- **Commento.io**: You can enable [commento.io](commento.io/) system by providing the URL set in your administration pannel 

## Problems on PHP 8 on some systems

Ensure you have php8.1-xml and php8.1-mbstring installed

## License

This is free and unencumbered software released into the public domain.

Anyone is free to copy, modify, publish, use, compile, sell, or
distribute this software, either in source code form or as a compiled
binary, for any purpose, commercial or non-commercial, and by any
means.

In jurisdictions that recognize copyright laws, the author or authors
of this software dedicate any and all copyright interest in the
software to the public domain. We make this dedication for the benefit
of the public at large and to the detriment of our heirs and
successors. We intend this dedication to be an overt act of
relinquishment in perpetuity of all present and future rights to this
software under copyright law.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.

For more information, please refer to [Unlicense](https://unlicense.org)
