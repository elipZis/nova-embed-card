# Laravel Nova Embed Card [![GitHub license](https://img.shields.io/github/license/elipzis/nova-embed-card.svg)](https://github.com/elipzis/nova-embed-card/blob/master/LICENSE) [![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.me/elipzis)
A custom [Laravel Nova][4] card to embed external content in an iframe, e.g. from YouTube on a dashboard.

## Installation
You can install the package to your [Laravel Nova][4] enabled project via composer:

```bash
composer require elipzis/nova-embed-card
```

## Usage
Use the `EmbedCard()` by adding it to your `cards` method of the `NovaServiceProvider` or your [custom dashbord][3].

```php
/**
 * Get the cards that should be displayed on the Nova dashboard.
 *
 * @return array
 */
protected function cards() {
    return [
        //Your other cards...
 
        //A most simple embed
        (new EmbedCard())->url('https://www.youtube.com/embed/WhWc3b3KhnY'),
        
        //A more complex embed of raw <iframe>...</iframe> HTML with header and footer
        (new EmbedCard())->header('Spring')->footer('A Blender Open Movie')->code('<iframe width="560" height="315" src="https://www.youtube.com/embed/WhWc3b3KhnY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>')
    ];
}
```

See the [Laravel Nova documentation][2] for more insights about cards.

### Card options

#### Content options
* `url('string')`   : The URL to embed. If an URL is set, code is neglected. 
* `code('string')`  : Raw `<iframe>...</iframe>` HTML content to embed.

**Either `url` or `code` have to be configured**

#### Text options
* `header('string')`: Header text to lead the embedded content as simple text string or raw HTML 
* `footer('string')`: Footer text to conclude the embedded content as simple text string or raw HTML

#### Styling options
* `center('bool')`          : Center texts and content. Defaults to 'true'. 
* `height('string')`        : The height of the card as 'auto', 'default' or a pixel number. Defaults to 'auto'
* `forceFullWidth()`        : Force the card to be full width 
* `cardClasses('string')`   : CSS classes to attach to the card element
* `headerClasses('string')` : CSS classes to attach to the header element
* `footerClasses('string')` : CSS classes to attach to the footer element

## Compatibility
This custom Laravel Nova Embed Card has been tested with Laravel Nova v3.8.2

## License and Credits
The Laravel Nova Embed Card is released under the MIT license by [elipZis][1].

## Disclaimer
This source and the whole package comes without a warranty. 
It may or may not harm your computer. Please use with care. 
Any damage cannot be related back to the author. 
The source has been tested on a virtual environment and scanned for viruses and has passed all tests.

  [1]: https://elipZis.com
  [2]: https://nova.laravel.com/docs/3.0/customization/cards.html
  [3]: https://nova.laravel.com/docs/3.0/customization/dashboards.html
  [4]: https://nova.laravel.com
