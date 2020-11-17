window.tainacan_extra_components = typeof window.tainacan_extra_components != "undefined" ? window.tainacan_extra_components : {};

const TainacanMetadataFormURLType = {
    name: "TainacanMetadataFormTypeURL",
    props: {
        value: [String, Number, Array]
    },
    data: function() {
        return {
            forceIframe: [ String ],
            iframeMinimumHeight: [ Number ],
            iframeAllowfullscreen: [ String ]
        }
    },
    created: function() {
        this.forceIframe = this.value && this.value['force-iframe'] ? this.value['force-iframe'] : 'no';
        this.iframeMinimumHeight = this.value && this.value['iframe-min-height'] ? this.value['iframe-min-height'] : '';
        this.iframeAllowfullscreen = this.value && this.value['iframe-allowfullscreen'] ? this.value['iframe-allowfullscreen'] : 'no';
    },
    methods: {
        onUpdateForceIframe: function(value) {
            this.$emit('input', { 'force-iframe': value, 'iframe-min-height': this.iframeMinimumHeight, 'iframe-allowfullscreen': this.iframeAllowfullscreen });
        },
        onUpdateIframeMinimumHeight: function(value) {
            this.$emit('input', { 'force-iframe': this.forceIframe, 'iframe-min-height': value, 'iframe-allowfullscreen': this.iframeAllowfullscreen });
        },
        onUpdateIframeAllowfullscreen: function(value) {
            this.$emit('input', { 'force-iframe': this.forceIframe, 'iframe-min-height': this.iframeMinimumHeight, 'iframe-allowfullscreen': value });
        },
    },
    template: `
    <div>
        <b-field 
                :addons="false"
                :label="$i18n.getHelperTitle('tainacan-metadata-type-url', 'force-iframe')">
            &nbsp;
            <b-switch
                size="is-small" 
                v-model="forceIframe"
                @input="onUpdateForceIframe"
                true-value="yes"
                false-value="no" />
            <help-button
                    :title="$i18n.getHelperTitle('tainacan-metadata-type-url', 'force-iframe')"
                    :message="$i18n.getHelperMessage('tainacan-metadata-type-url', 'force-iframe')"/>
        </b-field>

        <b-field 
                v-if="forceIframe == 'yes'"
                :addons="false">
            <label class="label is-inline-block">
                {{ $i18n.getHelperTitle('tainacan-metadata-type-url', 'iframe-min-height') }}
                <help-button
                    :title="$i18n.getHelperTitle('tainacan-metadata-type-url', 'iframe-min-height')"
                    :message="$i18n.getHelperMessage('tainacan-metadata-type-url', 'iframe-min-height')"/>
            </label>
            <b-numberinput
                size="is-small"
                step="1" 
                v-model="iframeMinimumHeight"
                @input="onUpdateIframeMinimumHeight" />
        </b-field>

        <b-field 
                v-if="forceIframe == 'yes'"
                :addons="false"
                :label="$i18n.getHelperTitle('tainacan-metadata-type-url', 'iframe-allowfullscreen')">
            &nbsp;
            <b-switch
                size="is-small" 
                v-model="iframeAllowfullscreen"
                @input="onUpdateIframeAllowfullscreen"
                true-value="yes"
                false-value="no" />
            <help-button
                    :title="$i18n.getHelperTitle('tainacan-metadata-type-url', 'iframe-allowfullscreen')"
                    :message="$i18n.getHelperMessage('tainacan-metadata-type-url', 'iframe-allowfullscreen')"/>
        </b-field>
    </div>
    `
}
window.tainacan_extra_components["tainacan-metadata-form-type-url"] = TainacanMetadataFormURLType;
