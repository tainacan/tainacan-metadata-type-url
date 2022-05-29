window.tainacan_extra_components = typeof window.tainacan_extra_components != "undefined" ? window.tainacan_extra_components : {};

const TainacanMetadataFormURLType = {
    name: "TainacanMetadataFormTypeURL",
    props: {
        value: [String, Number, Array]
    },
    data: function() {
        return {
            linkAsButton: [ String ],
            forceIframe: [ String ],
            iframeMinimumHeight: [ Number ],
            iframeAllowfullscreen: [ String ],
            isImage: [ String ]
        }
    },
    created: function() {
        this.linkAsButton = this.value && this.value['link-as-button'] ? this.value['link-as-button'] : 'no';
        this.forceIframe = this.value && this.value['force-iframe'] ? this.value['force-iframe'] : 'no';
        this.iframeMinimumHeight = this.value && this.value['iframe-min-height'] ? this.value['iframe-min-height'] : '';
        this.iframeAllowfullscreen = this.value && this.value['iframe-allowfullscreen'] ? this.value['iframe-allowfullscreen'] : 'no';
        this.isImage = this.value && this.value['is-image'] ? this.value['is-image'] : 'no';
    },
    methods: {
        onUpdateLinkAsButton: function(value) {
            this.$emit('input', { 'link-as-button': value, 'force-iframe': this.forceIframe, 'iframe-min-height': this.iframeMinimumHeight, 'iframe-allowfullscreen': this.iframeAllowfullscreen, 'is-image': this.isImage });
        },
        onUpdateForceIframe: function(value) {
            this.$emit('input', { 'link-as-button': this.linkAsButton, 'force-iframe': value, 'iframe-min-height': this.iframeMinimumHeight, 'iframe-allowfullscreen': this.iframeAllowfullscreen, 'is-image': this.isImage });
        },
        onUpdateIframeMinimumHeight: function(value) {
            this.$emit('input', { 'link-as-button': this.linkAsButton, 'force-iframe': this.forceIframe, 'iframe-min-height': value, 'iframe-allowfullscreen': this.iframeAllowfullscreen, 'is-image': this.isImage });
        },
        onUpdateIframeAllowfullscreen: function(value) {
            this.$emit('input', { 'link-as-button': this.linkAsButton, 'force-iframe': this.forceIframe, 'iframe-min-height': this.iframeMinimumHeight, 'iframe-allowfullscreen': value, 'is-image': this.isImage });
        },
        onUpdateIsImage: function(value) {
            this.$emit('input', { 'link-as-button': this.linkAsButton, 'force-iframe': this.forceIframe, 'iframe-min-height': this.iframeMinimumHeight, 'iframe-allowfullscreen': this.iframeAllowfullscreen, 'is-image': value });
        },
    },
    template: `
    <div>
        <b-field 
                :addons="false"
                :label="$i18n.getHelperTitle('tainacan-metadata-type-url', 'link-as-button')">
            &nbsp;
            <b-switch
                size="is-small" 
                v-model="linkAsButton"
                @input="onUpdateLinkAsButton"
                true-value="yes"
                false-value="no" />
            <help-button
                    :title="$i18n.getHelperTitle('tainacan-metadata-type-url', 'link-as-button')"
                    :message="$i18n.getHelperMessage('tainacan-metadata-type-url', 'link-as-button')"/>
        </b-field>

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

        <b-field 
                v-if="forceIframe == 'yes'"
                :addons="false"
                :label="$i18n.getHelperTitle('tainacan-metadata-type-url', 'is-image')">
            &nbsp;
            <b-switch
                size="is-small" 
                v-model="isImage"
                @input="onUpdateIsImage"
                true-value="yes"
                false-value="no" />
            <help-button
                    :title="$i18n.getHelperTitle('tainacan-metadata-type-url', 'is-image')"
                    :message="$i18n.getHelperMessage('tainacan-metadata-type-url', 'is-image')"/>
        </b-field>
    </div>
    `
}
window.tainacan_extra_components["tainacan-metadata-form-type-url"] = TainacanMetadataFormURLType;
