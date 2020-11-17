<template>
    <div v-if="itemMetadatum">
        <b-input
            :disabled="disabled"
            :id="'tainacan-item-metadatum_id-' + itemMetadatum.metadatum.id + (itemMetadatum.parent_meta_id ? ('_parent_meta_id-' + itemMetadatum.parent_meta_id) : '')"
            :value="value"
            :placeholder="URL"
            @input="onInput($event)"
            @blur="onBlur"
            type="url"
        />
        <div 
                  v-if="itemMetadatum.item.id"
                class="add-new-term">
            <a
                    @click="previewHtml"
                    class="add-link">
                <span class="icon">
                    <i class="tainacan-icon has-text-secondary tainacan-icon-see"/>
                </span>
                <span style="font-size: 0.75em">&nbsp;Preview</span>
            </a>
        </div>
        <transition name="filter-item">
          <div 
              v-if="isPreviewingHtml"
              v-html="singleHTMLPreview"
              />
        </transition>
  </div>
</template>

<script>

export default {
  name: "TainacanMetadataTypeURL",
  props: {
    itemMetadatum: Object,
    value: [String, Number, Array],
    disabled: false
  },
  data() {
    return {
      isPreviewingHtml: false,
      singleHTMLPreview: ''
    }
  },
  methods: {
    onInput(value) {
      this.isPreviewingHtml = false;
      this.singleHTMLPreview = '';
      this.$emit("input", value);
    },
    onBlur() {
      this.$emit("blur");
    },
    createElementFromHTML(htmlString) {
      let div = document.createElement('div');
      div.innerHTML = htmlString.trim();
      return div; 
    },
    previewHtml() {

      // If we are going to display preview, renders it
      if (!this.isPreviewingHtml) {

        // Multivalued metadata need to be split as the values_as_html shows every value
        if (this.itemMetadatum.metadatum.multiple == 'yes') {

          const valuesAsHtml = this.createElementFromHTML(this.itemMetadatum.value_as_html);
          const valuesAsArray = Object.values(valuesAsHtml.children).filter((aValue) => aValue.outerHTML != '<span class="multivalue-separator"> | </span>');

          const singleValueIndex = this.itemMetadatum.value.findIndex((aValue) => aValue == this.value);

          if (singleValueIndex >= 0)
            this.singleHTMLPreview = valuesAsArray[singleValueIndex].outerHTML;
          
        } else {
          this.singleHTMLPreview = this.itemMetadatum.value_as_html;
        }

      }

      // Toggle Preview view
      this.isPreviewingHtml = !this.isPreviewingHtml;
    }
  },
};
</script>