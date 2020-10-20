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
        <div class="add-new-term">
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
              v-html="itemMetadatum.value_as_html"
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
    disabled: false,
  },
  data() {
    return {
      isPreviewingHtml: false
    }
  },
  methods: {
    onInput(value) {
      this.$emit("input", value);
    },
    onBlur() {
      this.$emit("blur");
    },
    previewHtml() {
      this.isPreviewingHtml = !this.isPreviewingHtml;
    }
  },
};
</script>