<template>
    <card class="card flex flex-col justify-center" :class="cardClasses" :style="cardStyles">
        <div class="px-3 py-3">
            <!-- Heading -->
            <template v-if="card.header">
                <h1 :class="headerClasses" v-if="!isHTML(card.header)">{{ card.header }}</h1>
                <div v-else v-html="card.header"></div>
            </template>

            <!-- Embedded content -->
            <template v-if="card.url">
                <iframe width="100%" :height="card.height" :src="card.url"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </template>
            <div v-else v-html="card.code"></div>

            <!-- Footer -->
            <template v-if="card.footer">
                <p :class="footerClasses" v-if="!isHTML(card.footer)">{{ card.footer }}</p>
                <div v-else v-html="card.footer"></div>
            </template>
        </div>
    </card>
</template>

<script>
export default {
    props: ['card'],
    methods: {
        /**
         *
         * @param {string} content
         * @returns {boolean} true if the given content contains <.../> and is potentially HTML content
         */
        isHTML(content) {
            return /<\/?[a-z][\s\S]*>/i.test(content);
        },
        /**
         *
         * @param pixels
         * @returns {string} 'auto', 'XYZpx' or nothing if set to 'default' (may break the layout)
         */
        convertPixels(pixels) {
            if(pixels === 'auto') {
                return 'auto';
            }
            return pixels === 'default' ? '' : parseInt(pixels, 10) + 'px';
        },
    },
    computed: {
        /**
         * @returns {string} All given header classes + a potential center-flag
         */
        headerClasses() {
            return this.card.headerClasses + ' ' + this.textClasses;
        },
        /**
         * @returns {string} All given footer classes + a potential center-flag
         */
        footerClasses() {
            return this.card.footerClasses + ' ' + this.textClasses;
        },
        /**
         * @returns {string} If 'centered' add the 'text-center' class to the other text classes
         */
        textClasses() {
            return this.card.center ? 'text-center' : '';
        },
        /**
         * @returns {string} All given card classes + a potential center-flag
         */
        cardClasses() {
            return this.card.cardClasses + ' ' + (this.card.center ? 'items-center' : '') + ' ' + this.textClasses;
        },
        /**
         * @returns {{height: (string|string)}} The height to use for the card calculated from the given pixel height
         */
        cardStyles() {
            return {
                height: this.card.height ? this.convertPixels(this.card.height) : 'auto',
            };
        }
    },
    mounted() {
        if(this.card.forceFullWidth) {
            this.$parent.$el.classList.remove('w-5/6');
            this.$parent.$el.classList.add('w-full');
        }
    },
};
</script>
