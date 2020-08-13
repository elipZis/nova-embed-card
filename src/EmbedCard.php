<?php

namespace Elipzis\NovaEmbedCard;

use Laravel\Nova\Card;

/**
 * A simple embedding widget card to allow the integration of an url
 * or <iframe>...</iframe> context on e.g. a dashboard.
 */
class EmbedCard extends Card {

    /**
     * @param $component
     */
    public function __construct($component = null) {
        parent::__construct($component);
        $this->withMeta([
            //The content
            'code'           => false,
            'url'            => false,
            //The pre-/sub-text
            'header'         => false,
            'footer'         => false,
            //Styling
            'center'         => true,
            'height'         => 'auto',
            'forceFullWidth' => false,
            'cardClasses'    => '',
            'headerClasses'  => '',
            'footerClasses'  => '',
        ]);
    }

    /**
     * Add classes to the element
     *
     * @param string $cardClasses Additional style classes to attach to the element
     * @return EmbedCard
     */
    public function cardClasses(string $cardClasses) {
        return $this->withMeta(['cardClasses' => $cardClasses]);
    }

    /**
     * Add classes to the element
     *
     * @param string $headerClasses Additional style classes to attach to the element
     * @return EmbedCard
     */
    public function headerClasses(string $headerClasses) {
        return $this->withMeta(['headerClasses' => $headerClasses]);
    }

    /**
     * Add classes to the element
     *
     * @param string $footerClasses Additional style classes to attach to the element
     * @return EmbedCard
     */
    public function footerClasses(string $footerClasses) {
        return $this->withMeta(['footerClasses' => $footerClasses]);
    }

    /**
     * The raw code to embed
     *
     * @param string $code The plain html code to embed, normally <iframe>...</iframe>
     * @return EmbedCard
     */
    public function code(string $code) {
        return $this->withMeta(['code' => $code]);
    }

    /**
     * The url to embed
     *
     * @param string $url The url to load into an <iframe>...</iframe>
     * @return EmbedCard
     */
    public function url(string $url) {
        return $this->withMeta(['url' => $url]);
    }

    /**
     * Set a header text
     *
     * @param string $text A simple text or HTML to lead the embedded content
     * @return EmbedCard
     */
    public function header(string $text): EmbedCard {
        return $this->withMeta(['header' => $text]);
    }

    /**
     * Set a footer text
     *
     * @param string $text A simple text or HTML to lead the embedded content
     * @return EmbedCard
     */
    public function footer(string $text): EmbedCard {
        return $this->withMeta(['footer' => $text]);
    }

    /**
     * Center the content
     *
     * @param bool $boolean
     * @return EmbedCard
     */
    public function center($boolean = true): EmbedCard {
        return $this->withMeta(['center' => $boolean]);
    }

    /**
     * Set the height of the card
     *
     * @param string $height 'auto', 'default' or a number of pixels
     * @return EmbedCard
     */
    public function height($height = 'auto'): EmbedCard {
        return $this->withMeta(['height' => $height]);
    }

    /**
     * Force a full width card
     *
     * @return EmbedCard
     */
    public function forceFullWidth(): EmbedCard {
        return $this->withMeta(['forceFullWidth' => true, 'width' => '5/6']);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component() {
        return 'nova-embed-card';
    }
}
