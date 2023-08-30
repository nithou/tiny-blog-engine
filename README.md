# Tiny Blog Engine
A very small blog engine that allows extensive modification.

- **Lightweight** : 230kb
- **Dark & light mode** natively
- Allows **color customisation** easily
- You just need an **FTP access**
- Support **Webmention.io**
- **RSS2** support
- **GDPR** compliant (as it uses no external dependencies)

![Example of the system with dark & light mode](https://github.com/nithou/tiny-blog-engine/blob/main/assets/img/og.png)

You can see a [running example here](https://nithou.net/sandbox/) or a modified version on [my personal blog](https://nithou.net/blog/)

## How to install it?
- Duplicate this repository
- Edit the **config.php** (don't forget to set the blog link to the final URL of your blog)
- Replace /assets/img/**icon.png**
- Replace /assets/img/**og.png**
- Upload on your FTP

If you want to add custom CSS here, edit the file **/assets/css/custom.css**

## How to write posts?
- Create a **Mardown file** in the format **YYYY-MM.DD.md** (2023-09-27.md)
- Start with a title like # Hello World
- Write as you want
- Upload the files to the **/posts** folder
- It's online!

The blog displays the last post first then all the others

## How to write pages?
- Create a **Mardown file** named as you want, replace the spaces by dashes (About Me --> About-me.md)
- Start with a title like # Hello World
- Write as you want
- Upload the files to the **/pages** folder
- It's added to the navigation!
